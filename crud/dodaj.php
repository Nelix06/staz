<?php
    include "polaczenie.php";

    if(isset($_POST['submit'])) {
       
        header("Location: sprawdzenie.php");

    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj uzytkownika!</title>
</head>
<body>
<form action="sprawdzenie.php" method="post"> 
<br />imie:    <input type='text' name='imie'> <br />
<br />nazwisko:   <input type='text' name='nazwisko'> <br />
<br />wiek:   <input type='number' name='wiek'> <br />
<br />PESEL:    <input type='number' name='pesel'> <br />
<br />e-mail:    <input type='text' name='email'> <br />
<br />ulica:   <input type='text' name='ulica'> <br />
<br />kod pocztowy:   <input type='text' name='kodpocztowy'> <br />
<br />plec:   <select name='plec'> <br />
        <option value=1>---</option>
        <option value=2>mezczyzna</option>
        <option value=3>kobieta</option>
    </select>    <br />
    <br />    <input type='submit' name='dodaj'> 
</form>
</body>
</html><br /><br />