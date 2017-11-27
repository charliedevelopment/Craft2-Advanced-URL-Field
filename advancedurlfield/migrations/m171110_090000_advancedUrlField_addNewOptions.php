<?php

namespace Craft;

class m171110_090000_advancedUrlField_addNewOptions extends BaseMigration {

    public function safeUp() {

		// Field settings are changing, so we need to update those on any url field.
		// We need to get all url fields, regardless of context, which as of the time of writing, can only be done manually.
		$results = craft()->db->createCommand()
			->select('f.id, f.settings')
			->from('fields f')
			->where('f.type = \'UrlField_Url\'')
			->queryAll();
		
		foreach ($results as $result) {
			if ($result['settings']) {
				$result['settings'] = JsonHelper::decode($result['settings']);
			}
			
			// Convert the old settings type to the new flag format.
			switch ($result['settings']['urlType']) {
				case 'relative':
					$result['settings']['urlType'] = array('relative');
					break;
				case 'absolute':
					$result['settings']['urlType'] = array('absolute');
					break;
				case 'any':
					$result['settings']['urlType'] = array('relative', 'absolute');
					break;
			}
			craft()->db->createCommand()->update('fields', array('settings' => JsonHelper::encode($result['settings'])), 'id = :id', array(':id' => $result['id']));
		}

        return true;
    }
}