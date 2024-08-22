<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuń dane</title>
</head>
<body> 
    <form method="post">
        <input type="hidden" name="id_uzyt" value="<?= $_GET['id'] ?>">
        <input type="submit" name="usun" value="Usuń">
    </form>

    <?php
    require_once('polaczenie.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $conn = new PDO("mysql:host=$nazwaSerwera;dbname=formularz", $nazwaUsera, $haslo);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Połączenie nieudane: " . $e->getMessage();
            exit;
        }

        if (isset($_POST['id_uzyt']) && !empty($_POST['id_uzyt'])) {
            $id_uzyt = $_POST['id_uzyt'];

            $polecenie = $conn->prepare("DELETE FROM `formularz` WHERE ID = :id_uzyt");
            $polecenie->bindParam(':id_uzyt', $id_uzyt, PDO::PARAM_INT);

            if ($polecenie->execute()) {
                echo "Dane zostały usunięte.";
            } else {
                echo "Błąd podczas usuwania użytkownika.";
            }
        } else {
            echo "Nie podano ID użytkownika.";
        }
    }
    ?>
</body>
</html>