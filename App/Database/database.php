<?php

class Database{
    private $conn;
    public function __construct($type, $host, $db, $user, $pass){   
        $dsn = "$type:host=$host;dbname=$db";
        $this->conn = $this->connect($dsn, $user, $pass);
    }

    private function connect($dsn, $user=NULL, $password=NULL){
        $dbc = NULL;
        try {
            $dbc = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return $dbc;
    }

    public function test(){
        $sql = "SELECT * FROM books";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    private function get_data(){
        $db = array();
        if(file_exists($this->dbPath)){
            $json = file_get_contents('db.json');
            $db = json_decode($json, true);
        }
        return $db;
    }
    private function write_data($data_arr){
        $json_sting = json_encode($data_arr);
        file_put_contents('db.json', $json_sting);
        return true;
    }

    private function validate($data){
        $schema = [
            'title' => 'string',
            'author' => 'string',
            'available' => 'integer',
            'isbn' => 'string'
        ];
        foreach($schema as $key => $value){
            if( !isset($data[$key]) || ( gettype($data[$key]) != $schema[$key] ) ){
                return false;
            }
        }
        return true;
    }

    public function list(){
        $sql = "SELECT * FROM books";
        $res = $this->conn->query($sql);
        return $res;
    }

    public function search($content, $search_type = 'title'){ 
        $sql = "SELECT * FROM books WHERE $search_type LIKE '%$content%'";
        $res = $this->conn->query($sql);
        return $res;

        // $data = $this->get_data();
        // $res = array();
        // foreach($data as $key => $obj){
        //     if($obj[$search_type] === $content ){
        //         array_push($res, $obj);
        //     }
        // }
        // return $res;
    }

    public function create($data){
        if($this->validate($data)){
            $sql = "INSERT INTO books (title, author, available, isbn) VALUES (:title, :author, :available, :isbn)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':title', $data['title']);
            $stmt->bindParam(':author', $data['author']);
            $stmt->bindParam(':available', $data['available']);
            $stmt->bindParam(':isbn', $data['isbn']);
            $stmt->execute();
            $res = $this->conn->lastInsertId();
            return $res;

            // $db = $this->get_data();
            // array_push($db, $data);
            // $this->write_data($db);
            // return count($db);
        }else{
            return 0;
        }        
    }

    public function get($id){
        $sql = "SELECT * FROM books WHERE id = $id";
        $sth = $this->conn->prepare($sql);
        $sth->execute();
        $res = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $res[0];

        // $db = $this->get_data();
        // if($id <= count($db)){
        //     return $db[$id-1];
        // }else{
        //     return array();
        // }
    }
    public function update($id, $data){
        $sql = "UPDATE books SET title = :title, author = :author, available = :available, isbn = :isbn WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':author', $data['author']);
        $stmt->bindParam(':available', $data['available']);
        $stmt->bindParam(':isbn', $data['isbn']);
        $stmt->execute();
        return true;

        // $db = $this->get_data();
        // if($id <= count($db)){
        //     $db[$id-1] = $data;
        //     $this->write_data($db);
        //     return true;
        // }
        // return false;
    }
    public function delete($id){
        $sql = "DELETE FROM books WHERE id = $id";
        $res = $this->conn->query($sql);
        return $res;

        // $db = $this->get_data();
        // $out = array();
        // if($id <= count($db)){
        //     $out = array_splice($db, $id-1, 1);
        //     $this->write_data($db);
        //     return $out;
        // }
        // return $out;
    }
}