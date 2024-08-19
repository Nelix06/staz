<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $Imie = $_POST['imie'];
    $Nazwisko = $_POST['nazwisko'];
    $Wiek = $_POST['wiek'];
    $PESEL = $_POST['pesel'];
    $Email = $_POST['email'];
    $Emailb = filter_var($Email, FILTER_SANITIZE_EMAIL);
    $ulica = $_POST['ulica'];
    $Kod_Pocztowy = $_POST['kod_pocztowy'];
    $plec = $_POST['plec'];
    $zdjecie = $_FILES['zdjecie'];



    $wszystko_git = true;


    if (strlen(trim($Imie)) == 0) 
    {
        $wszystko_git = false;
        echo '<span style="color:red">Nie podano Imienia, podaj imie!</span>';
        echo '<br /><a href="index.php">Spróbuj ponownie!</a> <br />';
        exit();
        } 
        else if(!ctype_alpha($Imie)) {
            $wszystko_git = false;
            echo '<span style="color:red">Podana wartosc jest nieprawidlowa (Imie) </span>';
            echo '<br /><a href="index.php">Spróbuj ponownie!</a> <br />';
            exit();
        
    }

    if (strlen(trim($Nazwisko)) == 0) {          
        $wszystko_git = false;
        echo '<span style="color:red">Nie podano Nazwiska, podaj Nazwisko!</span> ';
        echo '<br /><a href="index.php">Spróbuj ponownie!</a> <br />';
        exit();
        } 
        else if(!ctype_alpha($Nazwisko))  {
            $wszystko_git = false;
            echo '<span style="color:red">Podana wartosc jest nieprawidlowa (Nazwisko) </span>';
            echo '<br /><a href="index.php">Spróbuj ponownie!</a> <br />';
            exit();
    }

    if (intval(trim($Wiek)) == 0) {          
        $wszystko_git = false;
        echo '<span style="color:red">Nie podano Wieku, podaj Wiek!</span> ';
        echo '<br /><a href="index.php">Spróbuj ponownie!</a> <br />';
        exit();
        } 
        else if(!ctype_digit($Wiek))  {
            $wszystko_git = false;
            echo '<span style="color:red">Podana wartosc jest nieprawidlowa (Wiek) </span>';
            echo '<br /><a href="index.php">Spróbuj ponownie!</a> <br />';
            exit();
        }

    if (intval(trim($PESEL)) == 0) {          
        $wszystko_git = false;
        echo '<span style="color:red">Nie podano PESELU, podaj PESEL!</span> ';
        echo '<br /><a href="index.php">Spróbuj ponownie!</a> <br />';
        exit();
        } 
        else if(!ctype_digit($PESEL))  {
            $wszystko_git = false;
            echo '<span style="color:red">Podana wartosc jest nieprawidlowa (PESEL) </span>';
            echo '<br /><a href="index.php">Spróbuj ponownie!</a> <br />';
            exit();
    }

    if (strlen(trim($Emailb)) == 0)  {          
        $wszystko_git = false;
        echo '<span style="color:red">Nie podano E-mail, podaj E-mail!</span> ';
        echo '<br /><a href="index.php">Spróbuj ponownie!</a> <br />';
        exit();
        } 
        else if((filter_var($Emailb, FILTER_VALIDATE_EMAIL)==false) || ($Emailb != $Email)){
            $wszystko_git = false;
            echo '<span style="color:red">Podana wartosc jest nieprawidlowa (E-mail) </span>';
            echo '<br /><a href="index.php">Spróbuj ponownie!</a> <br />';
            exit();
    }
    
    if (strlen(trim($ulica)) == 0)  {          
        $wszystko_git = false;
        echo '<span style="color:red">Nie podano ulicy, podaj Ulicy!</span> ';
        echo '<br /><a href="index.php">Spróbuj ponownie!</a> <br />';
        exit();
        } 
        else if(!preg_match('/^[\p{L}\s\d\.\-]+$/u', $ulica))  {
            $wszystko_git = false;
            echo '<span style="color:red">Podana wartosc jest nieprawidlowa (Ulice) </span>';
            echo '<br /><a href="index.php">Spróbuj ponownie!</a> <br />';
            exit();
    }

    if ((strlen(trim($Kod_Pocztowy)) == 0)) {          
        $wszystko_git = false;
        echo '<span style="color:red">Nie podano Kodu pocztowego, podaj Kod Pocztowy!</span> ';
        echo '<br /><a href="index.php">Spróbuj ponownie!</a> <br />';
        exit();
        } 
        else if(!preg_match('/^\d{2}-\d{3}\s\p{L}+$/', $Kod_Pocztowy)) {
            $wszystko_git = false;
            echo '<span style="color:red">Podana wartosc jest nieprawidlowa (Kod Pocztowy) </span>';
            echo '<br /><a href="index.php">Spróbuj ponownie!</a> <br />';
            exit();
        }

        $dozwolone_typy = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        if (!in_array($zdjecie['type'], $dozwolone_typy)) {
            $wszystko_git = false;
            echo '<span style="color:red">Nieprawidłowy typ zdjęcia! Dozwolone formaty: jpg, jpeg, png, gif.</span><br />';
        } else if ($zdjecie['size'] > 2000000) {
            $wszystko_git = false;
            echo '<span style="color:red">Zdjęcie jest za duże! Maksymalny rozmiar to 2 MB.</span><br />';
        }

        if($wszystko_git) {
            $target_dir = "pobrane/";
            $target_file = $target_dir . basename($zdjecie["name"]);
            move_uploaded_file($zdjecie["tmp_name"], $target_file);
            echo "<img src='$target_file' alt='Zdjęcie' style='max-width: 300px; height: auto;'><br />";
        }
        
    ?>
</body>
</html>