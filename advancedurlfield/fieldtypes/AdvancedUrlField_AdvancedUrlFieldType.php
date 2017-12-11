<?php

namespace Craft;

class AdvancedUrlField_AdvancedUrlFieldType extends BaseFieldType implements IPreviewableFieldType
{
	
	public function getName()
	{
		return Craft::t('Advanced URL');
	}
	
	public function getSettingsHtml()
	{
		return craft()->templates->render('advancedurlfield/settings', array(
			'settings' => $this->getSettings(),
		));
	}

	public function defineContentAttribute()
	{
		return array(
			AttributeType::String,
			'maxLength' => 2000, // Urls should not be too long, this is a pretty safe limit, mostly because IE generally can't handle anything much longer than this.
		);
	}

	public function getInputHtml($name, $value)
	{
		return craft()->templates->render('advancedurlfield/input', array(
			'name'  => $name,
			'value' => $value,
			'settings' => $this->getSettings(),
		));
	}
	
	protected function defineSettings()
	{
		return array(
			// Stores flags for what kind of URIs are allowed.
			'urlType' => array(
				AttributeType::Mixed,
			),
			// Text shown when the input is blank.
			'placeholder' => array(
				AttributeType::String,
			)
		);
	}

	public function getTableAttributeHtml($value)
	{
		// In the table, just provide the URL as a link.
		if ($value) {
			return '<a href="' . $value . '" target="_blank">' . $value . '</a>';
		}
	}
	
	public function validate($value)
	{
		
		// Make types into keys for easy reference.
		$allowedtypes = array_flip($this->getSettings()['urlType']);

		// Make sure the value matches at least one of the allowed types.
		$matches = false;
		if (isset($allowedtypes['relative'])) {
			// Starts with a forward slash, and contains no whitespace.
			$matches = $matches | preg_match('/^\/\S*$/iu', $value);
		}

		if (isset($allowedtypes['absolute'])) {
			// Regex by diegoperini, documented at https://mathiasbynens.be/demo/url-regex
			$matches = $matches | preg_match('/^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)(?:\.(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)*(?:\.(?:[a-z\x{00a1}-\x{ffff}]{2,})))(?::\d{2,5})?(?:\/[^\s]*)?$/iu', $value);
		}

		if (isset($allowedtypes['mailto'])) {
			// Begins with 'mailto:' and contains at least one @ symbol.
			$matches = $matches | preg_match('/^mailto:.*@.*/u', $value);
		}

		if (isset($allowedtypes['tel'])) {
			// Begins with 'tel:'.
			$matches = $matches | preg_match('/^tel:.*/u', $value);
		}
		
		if (!$matches) {
			return Craft::t('Invalid url');
		}
		return true;
	}
}
