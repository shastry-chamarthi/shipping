<?php
/**
 * Makes dropdowns searchable. Uses jquery and files in js folder
 */
class JSelectsearch extends  CWidget {
	public $baseurl;
	 
	public function init()
	{
		$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'js';
		$this->baseurl = Yii::app()->getAssetManager()->publish($dir);
		Yii::app()->clientScript->registerCoreScript('jquery');
		$cs = Yii::app()->getClientScript();
		$cs->registerScriptFile($this->baseurl."/jquery.searchabledropdown-1.0.8.min.js");
		$init = 'jQuery("select").searchable({ maxListSize: 25});';
		Yii::app()->clientScript->registerScript("jselect", $init,CClientScript::POS_READY);		
	}
	 	
	 
}
 
 