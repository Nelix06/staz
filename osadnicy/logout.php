<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyloguj</title>
</head>
<body>
    <form action="index.php" method="post">
    <p>Czy napewno chcesz sie wylogować?  <br /><br /> 
    <input type="submit" name="wyloguj" value="tak">
    <input type="submit" name="niewyloguj" value="nie">
    </form>
<?php    
    session_start();
   

        if (isset($_SESSION['wyloguj'])) {
            $_SESSION['zalogowany'] == false;
            header('Location:index.php');
        } else if (isset($_SESSION['niewyloguj'])) {
            $_SESSION['zalogowany'] == true;
            header('gra.php');
        }
    session_unset();
?>

</body>
</html>