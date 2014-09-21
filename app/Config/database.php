<?php

class DATABASE_CONFIG {

	 public $default = array(
              'datasource' => 'Database/Mysql',
              'persistent' => false,
              'host' => '103.3.189.166',
              'port' => '3306',
              'login' => 'www',
              'password' => 'cirkit06',
              'database' => 'hackathon',
              'prefix' => '',
              'encoding' => 'utf8',
         );

	public $test = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'user',
		'password' => 'password',
		'database' => 'test_database_name',
		'prefix' => '',
		//'encoding' => 'utf8',
	);
}

