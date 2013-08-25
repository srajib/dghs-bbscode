<?php
/**
 * 
 * @package default
 * @author Rajib Ahmed
 */

class AppModel extends Model {
	
	//to set off all auto association use containable beahavior 
 // public $actsAs = array('Containable');
   //public $recursive 		= -1;
    
	CONST DEFAULT_LOGINTIME	= "09:30:59";
	CONST DEFAULT_LOGINTIME_POLICY2	= "16:00:00";
	CONST DEFAULT_TIME_PERIOD= "08:59:59";
	CONST DEFAULT_TIME_PERIOD_POLICY2= "04:59:59";
	//CONST DEFAULT_FACTION 	= 0;
	//CONST DEFAULT_LEVEL 	= 1;
	//CONST DEFAULT_MONEY		= 2000;
	
	CONST APP_LANGUAGE 		= 1; // en = 1

	//CONST TOKEN_LENGTH 		= 20;
	//CONST USER_FLAG 		= 1;
	//CONST PASS_LENGTH		= 4;
	
	CONST ADMIN 			= 2;
	CONST TRANSLATOR 		= 1;
	//CONST GOOD_USER 		= 1;
	////////////////////////////////////////////CONST EVIL_USER 		= 2;
   CONST IS_ACTIVE 		= 1;
    
  CONST MAP_MATRIX		= 8; //for 8x8 map tiles
   // CONST MAP_EXTEND		= 2; // extend map tiles by this value in each axis*/

    /**
	* Sets the configurations to use production database
	*
	* @var string
	*/	    
   // public $useDbConfig= 'development';

}
?>
