<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel glowny</title>
</head>
<body>
    <?php 
    require_once('polaczenie.php');
         $zapytanie = "SELECT * FROM uzytkownicy";
         $dane = $conn->query($zapytanie);
         $odp = $dane->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <a href="dodaj.php">dodaj uzytkownika</a>
        <table>
            <tr>
                <td>id</td>
                <td>imie</td>
                <td>nazwisko </td>
                <td>wiek </td>
                <td>pesel </td>
                <td>email </td>
                <td>ulica </td>
                <td>kodpocztowy </td>
                <td>plec </td>
            </tr>
            <?php foreach($odp as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['imie'] ?></td>
            <td><?= $row['nazwisko'] ?></td>
            <td><?= $row['wiek'] ?></td>
            <td><?= $row['pesel'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['ulica'] ?></td>
             <td><?= $row['kodpocztowy'] ?></td>
            <td><?= $row['plec'] ?></td>
         <td><a href="usun.php?id=<?= $row['id'] ?>">Usuń</a></td>
         <td><a href="edytuj.php?id=<?= $row['id'] ?>">Edytuj</a></td>
        </tr>
<?php endforeach; ?>
        </table>
        
</body>
</html>