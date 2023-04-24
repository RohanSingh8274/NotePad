<?php
  class loginModel
  {
    public $servername = "localhost";
    public $dbusername = "root";
    public $dbpassword = "Anju@8274";
    public $dbname = "notepad";
    public $num = '';
    public $passReset="";
    public $passResetErr = '';
    public $mailSend = false;
    public $mailSendFailErr = '';
    public $info;
  
  /**
   * function to check input. 
   * 
   *  @param string $data
   *    input data
   */
    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  
    /* 
     * this function checks if the database is successfully connected or not 
     */
    function checkConnection()
    {
      //Create connection 
      $conn = new mysqli($this->servername, $this->dbusername, $this->dbpassword, $this->dbname);
      //Check connection
       
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      return $conn;
    }
  
    /**
     * login function to validate login. 
     * 
     *  @param string $email
     *    email id for login
     * 
     *  @param string $pass
     *    password
     */
    function login($email, $pass)
    {
      $conn = $this->checkConnection();
      $sql = "SELECT * FROM userInfo where email = '" . $email . "' AND password = '" . $pass . "'";
      $res = $conn->query($sql);
      
      //It will return the number of rows having the following details in the db
      $this->num = mysqli_num_rows($res);
      $this->info = mysqli_fetch_assoc($res);
    }
  
  }

?>

