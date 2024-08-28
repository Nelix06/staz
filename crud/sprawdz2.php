<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type='hidden' name='id' value='<?php echo $id; ?>'>
</body>
</html>
<?php
require_once('polaczenie.php');
        $id = $_GET['id'];
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $wiek = $_POST['wiek'];
        $pesel = $_POST['pesel'];
        $email = $_POST['email'];
        $emailb = filter_var($email, FILTER_SANITIZE_EMAIL);
        $ulica = $_POST['ulica'];
        $kodpocztowy = $_POST['kodpocztowy'];
        $plec = $_POST['plec'];
        
        $wszystko_git = true;
        if (strlen(trim($imie)) == 0) 
            {
                $wszystko_git = false;
                echo '<span style="color:red">Nie podano Imienia, podaj imie!</span>';
                echo '<br /><a href="dodaj.php">Spróbuj ponownie!</a> <br />';
                exit();
                } 
                else if(!ctype_alpha($imie)) {
                    $wszystko_git = false;
                    echo '<span style="color:red">Podana wartosc jest nieprawidlowa (Imie) </span>';
                    echo '<br /><a href="dodaj.php">Spróbuj ponownie!</a> <br />';
                    exit();
                
            }
        
            if (strlen(trim($nazwisko)) == 0) {          
                $wszystko_git = false;
                echo '<span style="color:red">Nie podano Nazwiska, podaj Nazwisko!</span> ';
                echo '<br /><a href="dodaj.php">Spróbuj ponownie!</a> <br />';
                exit();
                } 
                else if(!ctype_alpha($nazwisko))  {
                    $wszystko_git = false;
                    echo '<span style="color:red">Podana wartosc jest nieprawidlowa (Nazwisko) </span>';
                    echo '<br /><a href="dodaj.php">Spróbuj ponownie!</a> <br />';
                    exit();
            }
        
            if (intval(trim($wiek)) == 0) {          
                $wszystko_git = false;
                echo '<span style="color:red">Nie podano Wieku, podaj Wiek!</span> ';
                echo '<br /><a href="dodaj.php">Spróbuj ponownie!</a> <br />';
                exit();
                } 
                else if(!ctype_digit($wiek))  {
                    $wszystko_git = false;
                    echo '<span style="color:red">Podana wartosc jest nieprawidlowa (Wiek) </span>';
                    echo '<br /><a href="dodaj.php">Spróbuj ponownie!</a> <br />';
                    exit();
                }
        
            if (intval(trim($pesel)) == 0) {          
                $wszystko_git = false;
                echo '<span style="color:red">Nie podano PESELU, podaj PESEL!</span> ';
                echo '<br /><a href="dodaj.php">Spróbuj ponownie!</a> <br />';
                exit();
                } 
                else if(!ctype_digit($pesel))  {
                    $wszystko_git = false;
                    echo '<span style="color:red">Podana wartosc jest nieprawidlowa (PESEL) </span>';
                    echo '<br /><a href="dodaj.php">Spróbuj ponownie!</a> <br />';
                    exit();
            }
        
            if (strlen(trim($emailb)) == 0)  {          
                $wszystko_git = false;
                echo '<span style="color:red">Nie podano E-mail, podaj E-mail!</span> ';
                echo '<br /><a href="dodaj.php">Spróbuj ponownie!</a> <br />';
                exit();
                } 
                else if((filter_var($emailb, FILTER_VALIDATE_EMAIL)==false) || ($emailb != $email)){
                    $wszystko_git = false;
                    echo '<span style="color:red">Podana wartosc jest nieprawidlowa (E-mail) </span>';
                    echo '<br /><a href="dodaj.php">Spróbuj ponownie!</a> <br />';
                    exit();
            }
            
            if (strlen(trim($ulica)) == 0)  {          
                $wszystko_git = false;
                echo '<span style="color:red">Nie podano ulicy, podaj Ulicy!</span> ';
                echo '<br /><a href="dodaj.php">Spróbuj ponownie!</a> <br />';
                exit();
                } 
                else if(!preg_match('/^[\p{L}\s\d\.\-]+$/u', $ulica))  {
                    $wszystko_git = false;
                    echo '<span style="color:red">Podana wartosc jest nieprawidlowa (Ulice) </span>';
                    echo '<br /><a href="dodaj.php">Spróbuj ponownie!</a> <br />';
                    exit();
            }
        
            if ((strlen(trim($kodpocztowy)) == 0)) {          
                $wszystko_git = false;
                echo '<span style="color:red">Nie podano Kodu pocztowego, podaj Kod Pocztowy!</span> ';
                echo '<br /><a href="dodaj.php">Spróbuj ponownie!</a> <br />';
                exit();
                } 
                else if(!preg_match('/^\d{2}-\d{3}$/', $kodpocztowy)) {
                    $wszystko_git = false;
                    echo '<span style="color:red">Podana wartosc jest nieprawidlowa (Kod Pocztowy) </span>';
                    echo '<br /><a href="dodaj.php">Spróbuj ponownie!</a> <br />';
                    exit();
                }
                if($plec == 1) {
                    $wszystko_git = false;
                    echo '<span style="color:red">Podaj Płeć! </span><br />';
                    echo '<br /><a href="dodaj.php">Spróbuj ponownie!</a> <br />';
                    exit();
                } else if ($plec == 2) {
                $plecodp = "mężczyzna";
                    }
                else if ($plec == 3)
                 {  $plecodp = "kobieta";
                   }
        
        if($wszystko_git){
            $stmt = $conn->prepare("UPDATE `uzytkownicy` SET `imie` = :imie, `nazwisko` = :nazwisko, `wiek` = :wiek, 
            `pesel` = :pesel, `email` = :emailb, `ulica` = :ulica, `kodpocztowy` = :kodpocztowy, 
            `plec` = :plecodp WHERE `id` = :id");
$stmt->bindParam(':imie', $imie);
$stmt->bindParam(':nazwisko', $nazwisko);
$stmt->bindParam(':wiek', $wiek);
$stmt->bindParam(':pesel', $pesel);
$stmt->bindParam(':emailb', $emailb);
$stmt->bindParam(':ulica', $ulica);
$stmt->bindParam(':kodpocztowy', $kodpocztowy);
$stmt->bindParam(':plecodp', $plecodp);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
header('Location: glowna.php?msg=Dane zostaly zmienione pomyslnie');
exit();  
} else {
echo "Błąd przy edycji danych. Spróbuj ponownie!";
}
}

?>