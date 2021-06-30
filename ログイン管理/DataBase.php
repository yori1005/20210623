<?php
session_start();
require "DataBaseConfig.php";

class DataBase
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
    }

    function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->connect;
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }

    function logIn($table, $id, $pass)
    {
        $id = $this->prepareData($id);
        $pass = $this->prepareData($pass);
        $this->sql = "select * from " . $table . " where id = '" . $id . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
			$dbname = $row['name'];
            $dbid = $row['id'];
            $dbpassword = $row['pass'];
            if ($dbid == $id && password_verify($pass, $dbpassword)) {
                $login = true;
				$_SESSION['id'] = $dbid;
				$_SESSION['pass'] = $dbpassword;
				$_SESSION['name'] = $dbname;
            } else $login = false;
        } else $login = false;

        return $login;
    }

    function signUp($table, $name, $id, $pass)
    {
        $name = $this->prepareData($name);
        $id = $this->prepareData($id);
        $pass = $this->prepareData($pass);
        $pass = password_hash($pass, PASSWORD_DEFAULT);
		
		$this->sql = "select * from " . $table . " where id = '" . $id . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
		if (mysqli_num_rows($result) != 0) {
			$dbname = $row['name'];
            $dbid = $row['id'];
            $dbpassword = $row['pass'];
			if($dbid == $id){
				return false;
			}
		}
        $this->sql =
            "INSERT INTO " . $table . " (name, id, pass) VALUES ('" . $name . "','" . $id . "','" . $pass . "')";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
	}


}

?>