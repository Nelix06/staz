<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podsumowanie zamówienia</title>
</head>
<body>
  <?php    
    
    $paczkow = $_POST['paczkow'];
    $grzebieni = $_POST['grzebieni'];
    $suma = 0.99*$paczkow + 1.29*$grzebieni;
     
     if ((strlen($paczkow<0) || (strlen($grzebieni<0)))) {
      echo '<span style="color:red">podano nieprawidłową ilość. Spróbuj ponownie</span>';
      echo '<br /><a href="index.php">Spróbuj ponownie</a>';
    }
    else{
    
echo<<<END

     <h2>Podsumowanie zamówienia</h2>
     <table border="1" cellpadding="10" cellspacing="0">
     <tr> 
        <td>Pączek (0,99PLN/szt)</td> <td>$paczkow</td>
     </tr>
     <tr>
        <td>Grzebień (1,29 PLN/szt</td> <td>$grzebieni</td>
     </tr>
     <tr>
        <td>SUMA</td> <td>$suma PLN</td>
     </tr>
     </table>
     <br /><a href="index.php">Powrót do strony głównej</a>
END;
}
  ?>
</body>
</html>