<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        session_start();

        if(!isset($_SESSION['zalogowany']))
        {
            header('Location: index.php');
            exit();
        }
        echo "<p>Witaj ".$_SESSION['user'].'![<a href="logout.php">Wyloguj się!</a>]</p>';
        echo "<p><b>Drewno</b>:".$_SESSION['drewno'];
        echo "| <b>Kamień</b>:".$_SESSION['kamien'];
        echo "| <b>Zboże</b>:".$_SESSION['zboze']."</p>";

        echo "<p><b>E-mail</b>:".$_SESSION['email'];
        echo "<br /><b>Dni premium</b>:".$_SESSION['dnipremium']."</p>";
    ?>

</body>
</html>