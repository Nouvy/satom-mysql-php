
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
        <a href="inscription.html" class="btn btn-info">Créer un utilisateur</a>
            <table class="table">
                <thead>
                  <tr class="table-dark">
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Suppression</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  try {
                    $conn = new PDO("mysql:host=db;dbname=satom", "root", "secret");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
                    $requete = $conn->prepare("SELECT * FROM users");
                    $requete->execute();
                    $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($resultat as $ligne) {
                      echo '<tr class="table-primary">
                              <th scope="row">' . $ligne['id'] . '</th>
                              <td>' . $ligne['name'] . '</td>
                              <td>' . $ligne['email'] . '</td>
                              <td><a href="suppression.php?id=' . $ligne['id'] . '" class="btn btn-danger">Supprimer</a></td>
                            </tr>';
                    }
                  } catch (PDOException $e) {
                    echo "Erreur de connexion : " . $e->getMessage();
                  }
                ?>
                </tbody>
              </table>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>