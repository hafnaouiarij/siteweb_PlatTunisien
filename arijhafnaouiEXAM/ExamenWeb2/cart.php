<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .menu-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        button {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="menu-container">
        <h1>Mon Panier</h1>
        <form action="commandes.php" method="POST">
            <table>
                <tr>
                    <th>Plat</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Sous-total</th>
                </tr>
                <tr>
                    <td><?php echo htmlspecialchars($_POST['n1']); ?></td>
                    <td><?php echo htmlspecialchars($_POST['p1']); ?> DT</td>
                    <td><?php echo htmlspecialchars($_POST['q1']); ?></td>
                    <td><?php echo htmlspecialchars($_POST['p1'] * $_POST['q1']); ?> DT</td>
                </tr>
                <tr>
                    <td><?php echo htmlspecialchars($_POST['n2']); ?></td>
                    <td><?php echo htmlspecialchars($_POST['p2']); ?> DT</td>
                    <td><?php echo htmlspecialchars($_POST['q2']); ?></td>
                    <td><?php echo htmlspecialchars($_POST['p2'] * $_POST['q2']); ?> DT</td>
                </tr>
                <tr>
                    <td><?php echo htmlspecialchars($_POST['n3']); ?></td>
                    <td><?php echo htmlspecialchars($_POST['p3']); ?> DT</td>
                    <td><?php echo htmlspecialchars($_POST['q3']); ?></td>
                    <td><?php echo htmlspecialchars($_POST['p3'] * $_POST['q3']); ?> DT</td>
                </tr>
            </table>
            <input type="hidden" name="id" value="<?php echo uniqid(); ?>">
            <input type="hidden" name="date_creation" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <input type="hidden" name="total" value="<?php echo ($_POST['p1'] * $_POST['q1']) + ($_POST['p2'] * $_POST['q2']) + ($_POST['p3'] * $_POST['q3']); ?>">
            <button type="submit">Confirmer</button>
        </form>
    </div>
</body>
</html>
