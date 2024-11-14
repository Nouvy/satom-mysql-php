<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion des Utilisateurs</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body class="bg-light">
        <div class="container my-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-primary">Liste des Utilisateurs</h2>
                <a href="inscription.html" class="btn btn-info">Créer un utilisateur</a>
            </div>
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                try {
                                    $conn = new PDO("mysql:host=db;dbname=satom", "root", "secret");
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $requete = $conn->prepare("SELECT * FROM users");
                                    $requete->execute();
                                    $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($resultat as $ligne) {
                                        echo '<tr>
                                                <th scope="row" class="table-primary">' . htmlspecialchars($ligne['id']) . '</th>
                                                <td>' . htmlspecialchars($ligne['name']) . '</td>
                                                <td>' . htmlspecialchars($ligne['email']) . '</td>
                                                <td class="text-center">
                                                    <a href="modification.php?id=' . $ligne['id'] . '" class="btn btn-sm btn-warning me-1">Modifier</a>
                                                    <a href="suppression.php?id=' . $ligne['id'] . '" class="btn btn-sm btn-danger">Supprimer</a>
                                                </td>
                                              </tr>';
                                    }
                                } catch (PDOException $e) {
                                    echo "<tr><td colspan='4' class='text-center text-danger'>Erreur de connexion : " . htmlspecialchars($e->getMessage()) . "</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
