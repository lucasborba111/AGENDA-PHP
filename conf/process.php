<?php 
    session_start();

    include_once("connection.php");
    include_once("url.php");

    $data = $_POST;

    if(!empty($data)){
        if($data["type"]==="create"){
            $name = $data['name'];
            $phone = $data['phone'];
            $observations = $data['observations'];
    
            $query = "INSERT INTO contacts  (name,phone,observations) VALUES (:name,:phone,:observations)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":name",$name);
            $stmt->bindParam(":phone",$phone);
            $stmt->bindParam(":observations",$observations);
        }
       try{
        $_SESSION['msg']='Contato criado com sucesso';
        $stmt->execute();
        header("Location:" . $BASE_URL . "../templates/index.php");//redirecionando

       }
       catch(PDOException $e){
        $error = $e->getMessage();
        echo "error: $error";
    }
    }
    else{
        $id;

        if(!empty($_GET)){
            $id = $_GET['id'];
        }
    
        if(!empty($id)){
            $query = "SELECT * FROM contacts WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $contacts = $stmt->fetch();
        }
        else{
            $contacts = [];
            $query = "SELECT * FROM contacts";
        
            $stmt = $conn->prepare($query);
            $stmt->execute();
        
            $contacts = $stmt->fetchAll();
        }
    }
   
    //retorna apenas um contato

    //retorna todos contatos


?>