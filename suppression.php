<?php
    try {
        $conn = new PDO("mysql:host=db;dbname=satom", "root", "secret");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
        $requete = $conn->prepare('DELETE FROM users WHERE id = ' . $_GET['id']);
        $requete->execute();
        header("Location: index.php");
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
?>