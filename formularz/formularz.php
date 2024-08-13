<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
    Imie: <br />   <input type="text" name="imie" value= <?php if(isset($_SESSION['e_imie'])){
        echo '<div class="error">'.$_SESSION['e_imie'].'</div>';
        unset($_SESSION['e_nick']);
        
    }
    ?>  
    > <br />
    Nazwisko: <br /> <input type="text" name="nazwisko" value= <?php if(isset($_SESSION['e_nazwisko'])){
        echo '<div class="error">'.$_SESSION['e_nazwisko'].'</div>';
        unset($_SESSION['e_nazwisko']);
        
    }
    ?>  > <br />
    Wiek: <br />   <input type="number" name="wiek">   <br />
    PESEL: <br />  <input type="number" name="pesel">  <br />
    E-mail: <br />  <input type="text" name="email">   <br />
    Ulica: <br />  <input type="text" name="ulica">    <br />
    Kod-Pocztowy: <br />  <input type="number" name="kod_pocztowy">   <br />
    <br />  <select id="plec" name="plec">  
                <option value=1>mężczyzna</option>
                <option value=2>kobieta</option>
            </select>   <br />
        <br />    <input type="submit" name="wyslij" value="wyslij">

    <?php
    session_start();

    $Imie = $_POST['imie'];
    $Nazwisko = $_POST['nazwisko'];
    $Wiek = $_POST['wiek'];
    $PESEL = $_POST['pesel'];
    $Email = $_POST['email'];
    $ulica = $_POST['ulica'];
    $Kod_Pocztowy = $_POST['kod_pocztowy'];
    $plec = $_POST['plec'];

    $Wszystko_git = true;


    if (strlen($Imie)<1) {
        
        $Wszystko_git = false;
        $_SESSION['e_imie'] = "Podaj Imię";

    } 
     if (strlen($Nazwisko)<1) {
        $Wszystko_git = false;
        $_SESSION['e_nazwisko'] = "Podaj Nazwisko";
    } else

    session_destroy();
    ?>
</body>
</html>