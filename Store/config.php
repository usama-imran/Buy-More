<?php

/**
	 * Will handel establising a connection to the server & database 
	 * @return void
	 */
class Connection 
{
	private $_connection;
	
	private $_host = "localhost"; // host provider
	private $_username = "root"; // username of the database
	private $_password = ""; // password of the databse
	private $_database = "store"; // name of the database

	
	/**
	 * Constructor method which will fire anytime the object of this class is created
	 * Will create the connection with the Server & Database
	 * @return void
	 */
	public function __construct()
	{
		$this->_connection = new mysqli($this->_host, $this->_username, 
			$this->_password, $this->_database); // creating the connection

		//Error Handelling
		if(mysqli_connect_error()) 
		{
                    trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),E_USER_ERROR);
		}
		
	}

	/**
	 * Get MySql Connection
	 * @return _connection
	 */
	public function getConnection() {
		return $this->_connection;
	}

}
	

?>