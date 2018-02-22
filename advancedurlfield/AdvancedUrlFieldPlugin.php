<?php

namespace Craft;

class AdvancedUrlFieldPlugin extends BasePlugin
{
	
	public function getVersion()
	{
		return '1.0.5';
	}
	
	public function getName()
	{
		return Craft::t('Advanced URL Field');
	}
	
	public function getDescription()
	{
		return Craft::t('Provides a configurable URL-only text field.');
	}
	
	public function getDeveloper()
	{
		return 'Charlie Development';
	}

	public function getDeveloperUrl()
	{
		return 'http://charliedev.com/';
	}

	public function getDocumentationUrl()
	{
		return 'https://github.com/charliedevelopment/Craft2-Advanced-URL-Field/blob/master/README.md';
	}
	
	public function getReleaseFeedUrl()
	{
		return 'https://raw.githubusercontent.com/charliedevelopment/Craft2-Advanced-URL-Field/master/release.json';
	}
	
	public function getSchemaVersion()
	{
		return '1.0.0';
	}
}
