<?php

namespace WeTheFuture\Form\Field;

use \WeTheFuture\Form\Form;

/**
 * Represents a checkbox field
 */
class CheckboxField extends AbstractField {
	use LabelTrait, SupportsPrefilledValueTrait;
	/**
	 * Return the field's HTML input
	 * 
	 * @return string The HTML to display
	 */
	public function getHtml() : string {
		$str = '';
		
		$str .= '<p';
		$str .= ' class="col s12 small-margin"';
		$str .= '>';

		$str .= '<label';
		$str .= ' for="'.htmlspecialchars($this->getId()).'"';
		$str .= '>';

		$str .= '<input';
		$str .= ' data-error="'.htmlspecialchars($this->getErrorMessage($this->getInvalidErrorCode())).'"';
		$str .= ' type="checkbox"';
		$str .= ' id="'.htmlspecialchars($this->getId()).'"';
		$str .= ' class="filled-in"';
		if ($this->isFieldPrefilled()) {
			if (!is_bool($this->getPrefilledValue())) {
				$this->throwInvalidPrefilledValueError();
			}
			if ($this->getPrefilledValue()) {
				$str .= ' checked="checked"';
			}
		}
		if ($this->isRequired()) {
			$str .= ' required="required"';
		}
		$str .= '>';

		$str .= '<span';
		$str .= ' data-error="'.htmlspecialchars($this->getErrorMessage($this->getInvalidErrorCode())).'"';
		$str .= '>';

		$str .= ($this->getLabel());
		
		if ($this->isRequired()) {
			$str .= '<span class="red-text">';
			$str .= '&nbsp;*';
			$str .= '</span>';
		}

		$str .= '</span>';

		$str .= '</label>';

		$str .= '</p>';

		return $str;
	}

	/**
	 * Full JS validation code, including if statement and all
	 * 
	 * @return string The JS to validate the field
	 */
	public function getJsValidator() : string {
		$str = '';

		if ($this->isRequired()) {
			$str .= 'if (';
			$str .= '!$(document.getElementById('.json_encode($this->getId()).')).is(":checked")';
			$str .= ') {';
			$str .= 'window.log('.json_encode(basename(__CLASS__)).', '.json_encode($this->getId()." - field is required, but was not checked").', true);';
			$str .= 'markInputInvalid('.json_encode('#'.$this->getId()).', '.json_encode($this->getErrorMessage($this->getInvalidErrorCode())).');';
			$str .= Form::CANCEL_SUBMISSION_JS;
			$str .= '}';
		}

		return $str;
	}

	/**
	 * Return JS code to store the field's value in $formDataName
	 * 
	 * @param string $formDataName The name of the FormData variable
	 * @return string Code to use to store field in $formDataName
	 */
	public function getJsAggregator(string $formDataName) : string {
		return $formDataName.'.append('.json_encode($this->getDistinguisher()).', $(document.getElementById('.json_encode($this->getId()).')).is(":checked"));';
	}

	/**
	 * Check the field's forms on the servers side
	 * 
	 * @param array $requestArr Array to find the form data in
	 */
	public function checkServerSide(?array &$requestArr=null) : void {
		if (is_null($requestArr)) {
			if ($this->getForm()->getMethod() == Form::POST) {
				$requestArr = &$_POST;
			} else {
				$requestArr = &$_GET;
			}
		}
		if (!array_key_exists($this->getDistinguisher(), $requestArr)) {
			$this->throwMissingError();
		}
		if ($this->isRequired()) {
			if ($requestArr[$this->getDistinguisher()] !== "true") {
				$this->throwMissingError();
			}
		}
	}
}
