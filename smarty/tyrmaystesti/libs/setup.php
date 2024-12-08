<?php

require(APP_DIR . 'libs/sql.lib.php');
require(APP_DIR . 'libs/tyrmays.lib.php');
require(SMARTY_DIR . 'Smarty.class.php');
require('DB.php');

// database connection configuration
// - initialize connection
class Tyrmays_SQL extends SQL {
  function Tyrmays_SQL() {
	  
	$db_username = 'uno3396_script';
	$db_password = '2067e265';
	$db_host = 'localhost';
	$db_database = 'uno3396';

    $dsn = 'mysql://uno3396_script:2067e265@localhost/uno3396';

    $options = array(
		     'debug'       => 2,
		     //		     'result_buffering' => false,
		     'portability' => DB_PORTABILITY_ALL,
		     );

    $this->connect($dsn, $options);
    if (PEAR::isError($db)) {
      die($db->getMessage());
    }
  }
}

// smarty configuration
// - set up the Smarty directory structure
//
class Tyrmays_Smarty extends Smarty {
  function Tyrmays_Smarty() {
    $this->template_dir = APP_DIR . 'templates';
    $this->compile_dir = APP_DIR . 'templates_c';
    $this->config_dir = APP_DIR . 'configs';
    $this->cache_dir = APP_DIR . 'cache';
  }
}

?>
