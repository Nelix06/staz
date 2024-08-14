<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
function Generuj($dlugosc = 8, $hasel = 100) {
$znaki = "abcdefghijklmnoprstuwxyzABCDEFGHIJKLMNOPRSTUWXYZ1234567890$%#@";

$max = strlen($znaki) - 1;



$plik = fopen('hasla.txt', "w+");
    if ($plik) {
for ($j = 0; $j < $hasel; $j++){
    $haslo = '';
    for ($i = 0; $i < $dlugosc; $i++) {
            $haslo .= $znaki[rand(0, $max)];
    }
        fwrite($plik, $haslo . PHP_EOL);
        }
    
        fclose($plik);
        echo "hasla zostaly wygenerowane";
    } else {
        echo "wystapił błąd, spróbuj ponownie!";
}
}
Generuj();
    ?>
</body>
</html>