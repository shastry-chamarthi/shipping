<?php 
/*
 * Auto loads listed widgets. Helps to load widgets, which just need init and no calling on specific element. 
 * Loop through the available list. We can control the list from config/main.php
 * 
 * @Author - Sathyanarayana Sastry Chamarthi
 * @Author Mail: sathyanarayanasastry@gmail.com
 */

class AutoloadWidget extends CWidget
{

	public $extensionsList = array();	
	
	public function init(){
		$this->extensionsList = explode(",",Yii::app()->params['auload_widget_list']);
		//echo "Auto load started";
		foreach($this->extensionsList as $extension)
		{
			$this->widget($extension);			
		}		
	}
	
}

?>