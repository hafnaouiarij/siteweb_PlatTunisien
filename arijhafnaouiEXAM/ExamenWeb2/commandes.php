<?php
include('commande.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'], $_POST['date_creation'], $_POST['total'])) {
        $commande = new Commande();
        $commande->id = $_POST['id'];
        $commande->date_creation = $_POST['date_creation'];
        $commande->total = $_POST['total'];

        if ($commande->create_plat()) {
            echo "Plat ajouté";
        } else {
            echo "Plat n'est pas ajouté";
        }
    } else {
        echo "Tous les champs requis ne sont pas fournis.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Régal Tunisien</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ajout de styles spécifiques qui ne sont pas couverts par Bootstrap */
        body {
            background-color: #f8f9fa;
        }
        .menu-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .menu-container img {
            margin: 20px auto;
            display: block;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="menu-container">
        <div class="text-right mb-4">
            <a href="menu.html" class="btn btn-primary">Menu du jour</a>
        </div>
        <h1 class="text-center">Le Régal Tunisien</h1>
        <div class="text-center">
            <img src="logo.jpeg" height="150" width="150" alt="Logo">
        </div>
        <h1 class="text-center mb-4">Mes commandes</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Date de création</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $commande = new Commande();
                    $sql = "SELECT * FROM orders";
                    $resultat = $commande->conn->query($sql);
                    if ($resultat) {
                        while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['date_creation']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['total']) . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

