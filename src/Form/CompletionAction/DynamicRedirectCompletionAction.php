<?php

namespace WeTheFuture\Form\CompletionAction;

/**
 * Redirects to a given URL
 */
class DynamicRedirectCompletionAction extends AbstractCompletionAction {
	/**
	 * Create a new DynamicRedirectCompletionAction.
	 */
	public function __construct() {}

	/**
	 * Get JavaScript to run on success
	 * 
	 * @return string JS code for success
	 */
	public function getJs() : string {
		$str = '';
		$str .= 'window.log('.json_encode(basename(__CLASS__)).', '.json_encode("dynamically redirecting to /").'+data.data["redirect"]);';
		$str .= 'window.location = $("html").attr("data-rootdir")+data.data["redirect"];';
		return $str;
	}
}

