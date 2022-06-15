<?php

// Class where every method is defined that we need, inserting and displaying data in separate file.

class DbConnect{
    private $dbhost = 'localhost';
    private $port = '3308';
    private $dbname = 'my_db';
    private $username = 'root';
    private $password = '';
    public $connection;


    public function __construct(){
        
        try {
            $this->connection = new PDO("mysql:host=$this->dbhost;port=$this->port;dbname=$this->dbname", $this->username, $this->password);
        } catch (PDOException $e) {
            echo "Connection error ". $e.getMessage();
        }
    }


    public function insert(){
        if(isset($_POST['submit'])){
            

            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            if(empty($fname) || (empty($lname) || (empty($email)))){
                return 'Please fill in the blanks';
            } else{
                $sql = "INSERT INTO `users` (`fname`, `lname`, `email`) VALUES (:fname, :lname, :email)";
                $res = $this->connection->prepare($sql);
                $exec = $res->execute(array(":fname"=>$fname, ":lname"=>$lname, ":email"=>$email));

                if($exec){
                    echo "<div> Data inserted </div>";
                }

            }
    }

}

    public function fetchData(){
        $data = null;

        $select_stmt = $this->connection->prepare('SELECT * FROM users');

        $select_stmt->execute();

        $data = $select_stmt->fetchAll();

        return $data;
    }
}