<?php
    try {
        $conn = new PDO("mysql:host=db;dbname=satom", "root", "secret");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
        $requete = $conn->prepare('INSERT INTO users (name,email,password) VALUES ("' . $_POST['nom'] . '", "' . $_POST['email'] . '", "' . $_POST['mot_de_passe'] . '")');
        $requete->execute();
        header("Location: index.php");
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
?>