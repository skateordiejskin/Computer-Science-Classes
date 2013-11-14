<?php
	require_once 'systemComponent.inc';
	
	class DBConnector extends systemComponent{
		var $theQuery;
		var $link;
		
		function DBconnector(){
			
			//load settings from parent class
			$settings = systemComponent::getSettings();
			
			$host = $settings['dbhost'];
			$user = $settings['dbUser'];
			$password = $settings['dbPass'];
			$db = $settings['dbName'];
			
			//connect database
			
			$this->link = mysql_connect($host, $user, $password);
							mysql_select_db($db);
							register_shutdown_function(array(&$this, 'close'));
							}
			function query($query){
				$this->theQuery = $query;
				return mysql_query($query, $this ->link);
				}
				
			function fetchArray($result){
				return mysql_fetch_array($result);
				}
			function numRows($result){
				return mysql_num_rows($result);
				}
			function close(){
				mysql_Close($this->link);
				}
				}
				?>