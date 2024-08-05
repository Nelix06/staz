<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="container">
        <p>Ile ocen chcesz podac?</p>
        <form action="zadanie_2.php" method="get">
            <input type="text" name='liczba' id="liczba">
            <input type="submit" name="Dalej" id="przycisk" value="OK">
         </form>   
    </div>
<script>
    fucntion Ileocen{
    var liczba = document.getElementById("liczba")
    var przycisk = document.getElementById("przycisk")

    if (przycisk.onclick) {
 //chcialbym zeby tu tez inputa utworzylo aby wpisac koncowe oceny,tez mam z tym problem (po czym bym mogl w phpie obliczyc srednia)

    }
}
</script>

<?php    
    if (isset($_GET['liczba']) and !empty($_GET['liczba'])) 
    {
        $a = $_GET['liczba'];
        echo "podaj oceny z przedmiotów";
        
    }
    else {
        echo 'nie podano ocen';
    }
?>
</body>
</html>