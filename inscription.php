<?php
    print_r($_POST);
    try {
    $conn = new PDO("mysql:host=db;dbname=satom", "root", "secret");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;  echo "Connexion réussie";
    $requete = $conn->prepare("SELECT * FROM users");
    $requete->execute();
    $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
    
    } catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    }
?>