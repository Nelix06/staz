<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
 
</style>
</head>
<div id="container">
<form action="zadanie_1.php" method="post">
    <select id="bryla" name="bryla">
        <option value="1" name="kula">kula</option>
        <option value="2" name="prostopadloscian">prostopadloscian</option>
        <option value="3" name="stozek">stozek</option>
    </select>
    <input type="submit" name="przycisk" onclick="przycisk()" value="wybierz" id="przycisk"></input> 
    </form>
    <form action="zadanie_1.php" method="get">
    </form>

<script>
    function przycisk(){
    var bryla = document.getElementById('bryla')
    var przycisk = document.getElementById('przycisk')


    if (bryla == "1") {
        //chcialbym zeby tu inputa utworzylo aby wpisac wymiary, nie wiem jak to zrobic ( po czym po wpisaniu wartosci by obliczalo to co powinno obliczac(wzor by bralo z phpa))
if (!name.length) {
    console.log("Pole nie ma żadnej wartości")
} else {
   
}
      
    }
}
</script>
</div>    
<?php
    switch ('bryla') {
        case 0:
        $a = $_GET['liczba1'];
        $b = $_GET['liczba2'];
        $tav = explode(",", $a);
        $Pp = 4*3.14;
            
    }
    
?>
</body>
</html>