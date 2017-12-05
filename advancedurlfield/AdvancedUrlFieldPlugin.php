<?php

namespace Craft;

class AdvancedUrlFieldPlugin extends BasePlugin {
	
	public function getVersion() {
        return '1.0.0';
    }
	
    public function getName() {
        return Craft::t('Advanced URL Field');
    }
	
	public function getDescription() {
		return Craft::t('Provides a configurable URL-only text field.');
	}
	
	public function getDeveloper() {
		return 'Charlie Development';
	}

	public function getDeveloperUrl() {
		return 'http://charliedev.com/';
	}
	
	public function getReleaseFeedUrl()
	{
		return 'https://raw.githubusercontent.com/charliedevelopment/Advanced-URL-Field/master/release.json';
	}	
}
