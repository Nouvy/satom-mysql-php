<?php
    try {
        $id = $_GET['id'];
        $conn = new PDO("mysql:host=db;dbname=satom", "root", "secret");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
        $requete = $conn->prepare('UPDATE users SET name="' . $_POST['nom'] . '",email="' . $_POST['email'] . '",password="' . $_POST['mot_de_passe'] . '" WHERE id=' . $id);
        $requete->execute();
        header("Location: index.php");
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
?>