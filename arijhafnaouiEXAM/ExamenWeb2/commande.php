<?php

class Commande

{   public $id, $date_creation , $total ;
    public $conn;
    
    public  $serv = 'localhost', $user = 'root', $pass = '', $bdname = 'resto';


    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->serv;dbname=$this->bdname", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function create_plat(){
        $req = "INSERT INTO orders (date_creation ,total ) VALUES (:date_creation, :total)";
        $stmt = $this->conn->prepare($req);
        return $stmt->execute(array(
            ':date_creation' => $this->date_creation,
            ':total' => $this->total
            ));

           
    }
    public function delete_plat($id){
        $req = "DELETE FROM oders WHERE id = :id";
        $stmt = $this->conn->prepare($req);
        return $stmt->execute(array(
            ':id' => $id

        ));
    }
    public function update_plat($id,$date_creation,$total){
        $req = "UPDATE oders SET date_creation = :date_creation , total = :total WHERE id = :id";
        $stmt = $this->conn->prepare($req);
        return $stmt->execute(array(
            ':date_creation' => $this->date_creation,
            ':total' => $this->total,
            ':id' => $id
            ));

        
    }
    public function edit_plat($id){
        $req = "SELECT * FROM oders WHERE id = :id";
        $stmt = $this->conn->prepare($req);
        $stmt->execute(array(':id' => $id));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
    }




}
?>
