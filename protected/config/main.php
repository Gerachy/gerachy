<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Project Ahpla',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
		'application.extensions.*',
	),

	'modules'=>array(
		'user',
		
		't',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			'ipFilters'=>array('127.0.0.1','::1'),
		),

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('/login'),	// 默认登录地址
		),

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>FALSE,
			'rules'=>array(
				'signup' => 'user/default/signup',
				'login' => 'user/default/login',
				'logout' => 'user/default/logout',
				'forgetpassword' => 'user/default/forgetpassword',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=g',
			'emulatePrepare' => true,
			'enableParamLogging'=>true,
			'enableProfiling'=>true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),

	    
	    // MemCache缓存
	    // 'cache'=>array(
            // 'class'=>'CMemCache',
            // 'servers'=>array(
                // array(
                    // 'host'=>'kibey_memcache',
                    // 'port'=>11211,
                // ),
            // ),
		// ),

   		// 文件缓存
	 	'cache'=>array(
			'class'=>'CFileCache',
		),

	    // SESSION保存在缓存中
        'session' => array (
            'class'=> 'CCacheHttpSession',
            'cacheID' => 'cache',
            'cookieMode' => 'only',
            'timeout' => 1200
        ),

        // SESSION保存在数据库中
		// 'session' => array (
		//     'class' => 'system.web.CDbHttpSession',
		//     'connectionID' => 'db',
		//     'sessionTableName' => 'actual_table_name',
		// ),  


		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CProfileLogRoute',
				),				
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				array(
					'class'=>'CWebLogRoute',
					// 'levels'=>'error, warning',					
				),
			),
		),
	),

	
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'org'=>'EOHO Committee',
		'adminEmail'=>'gerachy@qq.com',
		'admin'=>'Gerachy',
	),
	
);