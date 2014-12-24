<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstraps', dirname(__FILE__) . '/../extensions/yiibooster');
Yii::setPathOfAlias('adminlte', dirname(__FILE__) . '/../extensions/adminlte');

//Yii::setPathOfAlias('aliases'=> array('adminlte' => 'application.extensions.adminlte'));
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'ระบบ Training',
	'language' => 'th',     
    'theme' => 'mytheme',
    'defaultController' => 'main', 
    'timeZone' => 'Asia/Bangkok', 
    // preloading 'log' component
    'preload' => array('bootstraps', 'adminlte'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    //    'application.extensions.image.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'root',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'bootstraps.gii'
            ),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'loginUrl' => array('login/login'),
            'allowAutoLogin' => true,
            'class' => 'WebUser',
        ),
        'bootstraps' => array(
            'class' => 'ext.yiibooster.components.Booster',
            //'coreCss' => false,
            'responsiveCss' => true,
        ),
        // uncomment the following to enable URLs in path-format
        /*
          'urlManager'=>array(
          'urlFormat'=>'path',
          'showScriptName'=>false,
          'rules'=>array(
          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
          ),
         */
        //'db'=>array(
        //	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
        //),
        // uncomment the following to use a MySQL database
        'db' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=training_db',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'admin',
            'charset' => 'utf8',
            'initSQLs' => array("SET time_zone = '+7:00'"),
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),/*
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            
              array(
              'class'=>'CWebLogRoute',
              ),
             
            ),
        ),*/
      'ePdf' => array(
        'class' => 'ext.yii-pdf.EYiiPdf',
        'params' => array(
           'HTML2PDF' => array(
           'librarySourcePath' => 'ext.html2pdf.*',
           'classFile' => 'html2pdf.class.php',
            'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                        'orientation' => 'P', // landscape or portrait orientation
                        'format'      => 'A4', // format A4, A5, ...
                        'language'    => 'fr', // language: fr, en, it ...
                        'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                        'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                        'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                    )
               )
            )
       ),  
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
         'DevEmail' => 'Dev.niwath@gmail.com',     
         'pagessize' =>20,     
    ),
);
