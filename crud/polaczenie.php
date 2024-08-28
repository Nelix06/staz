<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $servername = 'localhost';
    $nameuser = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=crud", $nameuser, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
      }
    ?>
</body>
</html>