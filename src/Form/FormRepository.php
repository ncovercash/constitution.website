<?php

namespace WeTheFuture\Form;

use \WeTheFuture\API\ErrorCodes;
use \WeTheFuture\Form\Form;
use \WeTheFuture\User\{
	DeactivateFormTrait,
	EmailVerificationFormTrait,
	LoginFormTrait,
	RegisterFormTrait,
	SettingsFormTrait,
	TOTPLoginFormTrait,
	User};
use \WeTheFuture\Record\RecordSearchFormTrait;
use \WeTheFuture\Quiz\Quiz;
use \ReflectionClass;

/**
 * Simply a repository of forms for the site.
 * 
 * Methods should not be defomed in this file, but in traits which are used here
 */
class FormRepository {
	/**
	 * Get a distinguisher from __FUNCTION__ (convert to dash case and remove get)
	 * 
	 * I like this method as it ensures unique names (you can't redefine a function!)
	 * (ok lets be honest this is php you can fucking redefine constants but whatever)
	 * 
	 * @param string $in Function name to get a distinguisher from
	 * @return string Dash-case formatted distinguisher
	 */
	public static function getDistinguisherFromFunctionName(string $in) : string {
		// remove get
		$withoutGet = preg_replace('/^get/', '', $in);
		// convert to dash-case
		$toDashCase = preg_replace('/([a-z])([A-Z])/', '\1-\2', $withoutGet);
		// force lowercase
		return strtolower($toDashCase);
	}

	use LoginFormTrait;
	use TOTPLoginFormTrait;
	use RegisterFormTrait;
	use EmailVerificationFormTrait;
	use SettingsFormTrait;
	use DeactivateFormTrait;

	use RecordSearchFormTrait;

	/**
	 * Get all Forms functions defined in the repository
	 * @return Form[] All forms in the repository
	 */
	public static function getAllForms() : array {
		$reflectedClass = new ReflectionClass(__CLASS__);
		$classMethods = $reflectedClass->getMethods();

		$usedTraits = $reflectedClass->getTraits();
		foreach ($usedTraits as $trait) {
			$classMethods += $trait->getMethods();
		}

		$forms = [];
		foreach ($classMethods as $method) {
			$r = $method->getReturnType();
			if (is_null($r)) {
				continue;
			}
			if ($r->getName() == Form::class) {
				$forms[] = call_user_func([__CLASS__, $method->getName()]);
			}
		}

		foreach (Quiz::getAll() as $quiz) {
			$forms[] = $quiz->getForm();
		}

		return $forms;
	}
}
