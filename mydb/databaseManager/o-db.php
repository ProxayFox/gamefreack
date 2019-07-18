	<?php

class myDB extends mysqli {
		
	// Single instance of self - shared among all instances - known as "Singleton"
	private static $instance = null;
	
	// Database connection configuration variables
	private $dbHost = "localhost";
	private $dbName = "forum";
	private $user = "root";
	private $pass = "";

			
	//This method must be static, and must return an instance of the object if the object
	//does not already exist.
	public static function getInstance() {
	if (!self::$instance instanceof self) {
		self::$instance = new self;
		}
		return self::$instance;
	}
	
	// The clone and wakeup methods prevents external instantiation of copies of the Singleton class,
	// thus eliminating the possibility of duplicate objects.
	public function __clone() {
		trigger_error('Clone is not allowed.', E_USER_ERROR);
	}
	public function __wakeup() {
		trigger_error('Deserializing is not allowed.', E_USER_ERROR);
	}
	
	//  Constructor - establishes database connection
	public function __construct() { 
		parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName); 
		if (mysqli_connect_error()) { 
			exit('Connect Error ('.mysqli_connect_errno().') '. mysqli_connect_error());      
		} 
		parent::set_charset('utf-8'); 				
	}
	
	// START - SQL Sqecific Methods --------------------------------------------------------- 
  public function verifyLogin ($name, $password) {
    $name = $this->real_escape_string($name);
    $password = $this->real_escape_string($password);
    $hashedPWD = hash('sha512', $password);
    $result = $this->query("
			SELECT LID, CPID
			FROM login
			WHERE Uname = '".$name."' AND PWD = '". $hashedPWD."'
		");
    $row = $result->fetch_row();
    if ($row == null) {
      return false;
    }
    $lid = $row[0];
    $cpid = $row[1];
    $_SESSION['lid'] = $lid;
    $_SESSION['cpid'] = $cpid;
    return true;
  }
  public function addLogin($uid, $uname, $pwd) {
    $hashedPWD = hash('sha512', $pwd);
    return $this->query("
				INSERT INTO login 
				(LID, CPID, UName, PWD) 
				VALUES 
				(NULL,'".$uid."','".$uname."','".$hashedPWD."');
			");
  }

		public function getAllUsers(){
			return $this->query("
				SELECT * 
				FROM clientProfile
				");
		}

  	public function addUser($email) {
		return $this->query("
			INSERT INTO clientProfile 
			(CPID, email)
			VALUES 
			(NULL,'".$email."');
		");
		}

	public function getUser($email) {
		return $this->query("
			SELECT * 
			FROM clientProfile 
			WHERE email='".$email."'
		");
	}

	public function getUserByEmail($email) {
		return $this->query("
			SELECT * 
			FROM clientProfile 
			WHERE email='".$email."'
		");
	}

	public function getUserByMPhone($mPhone) {
		return $this->query("
			SELECT * 
			FROM clientProfile 
			WHERE mPhone = '".$mPhone."'
		");
	}
	public function getUserByUsername($uname) {
		return $this->query("
			SELECT * 
			FROM login 
			WHERE uname='".$uname."' 
			");
	}


	public function creatThread($title, $info, $date) {
	  return $this->query("
	    INSERT INTO thread
	    (TID, CPID, title, info, created)
	    VALUE 
	    (NULL, '".$_SESSION['cpid']."', '".$title."', '".$info."', '".$date."');
	  ");
  }
  //for the posts section of the website
  public function getAllPosts($TID) {
    return $this->query("
			SELECT *
			FROM post
			WHERE TID= '".$TID."'
		");
  }

  public function creatPosts($TID, $title, $info, $date) {
    return $this->query("
	    INSERT INTO post
	    (PID, CPID, TID, title, info, created, replies, views)
	    VALUE 
	    (NULL, '".$_SESSION['cpid']."', '".$TID."', '".$title."', '".$info."', '".$date."', NULL, NULL);
	  ");
  }
}
?>