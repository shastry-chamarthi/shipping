<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Express Services',
	'theme'=>'classic',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.*',
		'application.modules.rights.*', 
		'application.modules.user.*', 
		'application.modules.user.models.*', 
		'application.modules.user.components.*', 
		'application.modules.rights.components.*',
		'application.extensions.awegen.components.*',
		'application.extensions.awegen.*'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		 
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array(
				'ext.awegen', // AweCrud generators
			),
		),
		
		'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',
 
            # send activation email
            'sendActivationMail' => false,
 
            # allow access for non-activated users
            'loginNotActiv' => true,
 
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => true,
 
            # automatically login from registration
            'autoLogin' => true,
 
            # registration path
            'registrationUrl' => array('/user/registration'),
 
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
 
            # login form path
            'loginUrl' => array('/user/login'),
 
            # page after login
            'returnUrl' => array('/user/profile'),
 
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),
		
		'rights'=>array( 
			'superuserName'=>'admin', // Name of the role with super user privileges. 
			'authenticatedName'=>'user', // Name of the authenticated user role. 
			'userIdColumn'=>'user_id', // Name of the user id column in the database. 
			'userNameColumn'=>'username', // Name of the user name column in the database. 
			'enableBizRule'=>false, // Whether to enable authorization item business rules. 
			'enableBizRuleData'=>false, // Whether to enable data for business rules. 
			'displayDescription'=>true, // Whether to use item description instead of name. 
			'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages. 
			'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages. 
			'install'=>false, // Whether to install rights. 
			'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested. 
			'layout'=>'rights.views.layouts.main', // Layout to use for displaying Rights. 
			'appLayout'=>'application.views.layouts.main', // Application layout. 
			'cssFile'=>'rights.css', // Style sheet file to use for Rights. 			  
			'debug'=>true, // Whether to enable debug mode. 
		),
		 
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class'=>'RWebUser',
			'loginUrl' => array('/user/login'),
		),
		// uncomment the following to enable URLs in path-format
		'authManager'=>array( 
			'class'=>'RDbAuthManager', 
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			 
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		/* 
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		 
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=courier',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => '',
		),
		 
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				 
				array(
					'class'=>'CWebLogRoute',
				),
				 
			),
		),
	),
	 
	 
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);