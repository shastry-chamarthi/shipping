 <?php
return array(
	//Rules for AWB Controller
	 
	//'<bill><action:\w+>'=>'<awb>/<action>',
	
	// Defaults -- keep at bottom.
	'<controller:\w+>/<id:\d+>'=>'<controller>/view',
	'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
	'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				
)

 ?>
 