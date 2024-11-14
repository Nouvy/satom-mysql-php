<?php
    $id = $_GET['id'];
    $conn = new PDO("mysql:host=db;dbname=satom", "root", "secret");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $requete = $conn->prepare("SELECT * FROM users WHERE id=" . $id);
    $requete->execute();
    $resultat = $requete->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modification Utilisateur</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body class="bg-light">
        <div class="container my-5">
            <div class="card shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Modifier les informations de l'utilisateur</h4>
                </div>
                <div class="card-body p-4">
                    <form action="modification-database.php?id=<?php echo $id ?>" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Nom :</label>
                            <input value="<?php echo htmlspecialchars($resultat['name']); ?>" name="nom" type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Adresse email :</label>
                            <input value="<?php echo htmlspecialchars($resultat['email']); ?>" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Ne partagez jamais vos identifiants.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mot de passe :</label>
                            <input value="<?php echo htmlspecialchars($resultat['password']); ?>" name="mot_de_passe" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                            <a href="index.php" class="btn btn-outline-danger">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
