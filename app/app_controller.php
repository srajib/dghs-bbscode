<?php
class AppController extends Controller
{
	var $components = array('Auth' => array(
									'authorize' => 'controller',
									'loginAction' => array('controller' => 'users', 'action' => 'login')
								),
								'Session', 
           'RequestHandler'
							);
							
	var $helpers = array('Js', 'Html', 'Form', 'Session');
	
	function beforeFilter()
	{
		
		$this->Auth->allow('all','display','geohierarchy','search','disReport','divReport','upazillaReport','unionReport','getdistricts','getupozila','getunion','keywordReport','division','district','upazilla', 'getdistrictbydivid', 'getUpazilabydivid');
	}
	
	function isAuthorized()
  	{
		if( $this->Auth->User('group_id') != '1' && $this->Auth->User('group_id') != '3' && $this->Auth->User('group_id') != '4')
		{
			$this->Auth->deny($this->action);
		}
		else
		{
			return true;
		}
	}
	
  
  
    
   	function lists($type)
	{

		
		$options['banglanewspaper'] = array(
				'The Daily Prothom-Alo'=>'The Daily Prothom-Alo',
				'The Daily Ittefaq'=>'The Daily Ittefaq',
				'The Daily Amader Somoy'=>'The Daily Amader Somoy',
				'The Daily Jugantor'=>'The Daily Jugantor',
				'The Daily Songbad' => 'The Daily Songbad',
				'The Daily Shamokal'=>'The Daily Shamokal',
				'The Daily Khabar'=>'The Daily Khabar',
				'The Daily AmarDesh'=>'The Daily AmarDesh',
				'The Daily Nayadiganta'=>'The Daily Nayadiganta',
				'The Daily BhorerKagoj'=>'The Daily BhorerKagoj',
				'The Daily Janakantha'=>'The Daily Janakantha',
				'The Daily AjkerKagoj'=>'The Daily AjkerKagoj',
				'The Daily Inqilab'=>'The Daily Inqilab',
				'The Daily Manav Jamin'=>'The Daily Manav Jamin',
				'The Daily Jaijaidin'=>'The Daily Jaijaidin',
				'The Daily Ananda Bazar'=>'The Daily Ananda Bazar',
				);
				
		$options['englishnewspaper'] = array(
				'The Daily New Nation'=>'The Daily New Nation',
				'The Daily Star'=>'The Daily Star',
				'The Daily New Age'=>'The Daily New Age',
				'The Daily Independent' => 'The Daily Independent',
				'The Financial Express'=>'The Financial Express',
				'The Daily Observer'=>'The Daily Observer',
				'The Daily News Today '=>'The Daily News Today ',
				);		
	
		return  $options[$type];
	}

   



}
?>