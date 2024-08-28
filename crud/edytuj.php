<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj uzytkownika!</title>
</head>
<body>
<?php
    include "polaczenie.php";

    $id = intval($_GET['id']);
    $sql = "SELECT * FROM `uzytkownicy` WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<form action="sprawdz2.php" method="post"> 
<br />imie:    <input type='text' name='imie' value='<?php echo $row['imie']?>'> <br />
<br />nazwisko:   <input type='text' name='nazwisko' value='<?php echo $row['nazwisko']?>'> <br />
<br />wiek:   <input type='number' name='wiek' value='<?php echo $row['wiek']?>'> <br />
<br />PESEL:    <input type='number' name='pesel' value='<?php echo $row['pesel']?>'> <br />
<br />e-mail:    <input type='text' name='email' value='<?php echo $row['email']?>'> <br />
<br />ulica:   <input type='text' name='ulica' value='<?php echo $row['ulica']?>'> <br />
<br />kod pocztowy:   <input type='text' name='kodpocztowy' value='<?php echo $row['kodpocztowy']?>'> <br />
<br />plec:   <select name='plec'> <br />
        <option value="1">---</option>
        <option value="2" <?php echo ($row['plec'] == '2') ? "selected" : ""; ?>>mężczyzna</option>
        <option value="3" <?php echo ($row['plec'] == '3') ? "selected" : ""; ?>>kobieta</option>
    </select>    <br />
    <br />    <input type='submit' name='edytuj'> 
</form>
</body>
</html><br /><br />