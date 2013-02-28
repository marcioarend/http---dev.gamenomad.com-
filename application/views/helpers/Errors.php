<?php
class Zend_View_Helper_Errors extends Zend_View_Helper_Abstract
{
	/**
	 * Outputs errors using a uniform format
	 *
	 * @param Array $errors
	 * @return nil
	 */
	public function Errors($errors)
	{
		if (count($errors) > 0) {
			echo "<div id='errors'>";
			echo "<ul>";
			foreach ($errors AS $error) {
				if ($error[0] != "") {
					printf("<li>%s</li>", $error[0]);
				}
			}
			echo "</ul>";
			echo "</div>";
		}
	}
}
