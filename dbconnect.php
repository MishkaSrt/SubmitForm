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
            if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email'])){
                if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email'])){
                    $fname = $_POST['firstname'];
                    $lname = $_POST['lastname'];
                    $email = $_POST['email'];

                    $query = 'INSERT INTO users (fname, lname, email) VALUES (:fname, :lname, :email)';
                    $res = $this->connection->prepare($query);
                    $exec = $res->execute(array(":fname"=>$fname,":lname"=>$lname, ":email"=>$email));

                    try {
                        if($exec){
                            $result = $res->fetchAll();
                            echo 'Data inserted';
                        }
                    } catch (Exception $e)  {
                        echo "Error in query";
                    }
                }else{
                    echo 'All fields are required';

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