<?php
// Ustawienia połączenia z bazą danych
$host = 'localhost';
$db = 'generowaniehaseł';
$user = 'root';
$pass = '';

// Klasa PasswordGenerator
class PasswordGenerator {
    private $minLength;
    private $maxLength;

    public function __construct($minLength, $maxLength) {
        if ($minLength < 8 || $maxLength > 64 || $minLength > $maxLength) {
            throw new Exception('Minimalna długość hasła musi wynosić co najmniej 8 znaków, a maksymalna długość nie może przekraczać 64 znaków. Dodatkowo minimalna długość nie może być większa od maksymalnej.');
        }
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
    }

    public function generate() {
        $length = rand($this->minLength, $this->maxLength);

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Mieszanie znaków, aby hasło było bardziej losowe
        $password = str_shuffle($password);

        return $password;
    }
}

// Funkcja do zapisywania hasła w pliku tekstowym na pulpicie
function savePasswordToFile($password) {
    $desktopPath = 'C:\\laragon\\www\\lista_haseł.txt';
    file_put_contents($desktopPath, $password . PHP_EOL, FILE_APPEND);
}

// Funkcja do zapisywania hasła w bazie danych
function savePasswordToDatabase($password, $host, $db, $user, $pass) {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("INSERT INTO passwords (haslo) VALUES (:password)");
        $stmt->execute(['password' => $password]);
        return true;
    } catch (PDOException $e) {
        echo "Błąd: " . $e->getMessage();
        return false;
    }
}

// Obsługa formularza
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $minLength = intval($_POST['min_length']);
    $maxLength = intval($_POST['max_length']);

    if ($minLength < 8 || $maxLength > 64 || $minLength > $maxLength) {
        echo 'Minimalna długość hasła musi wynosić co najmniej 8 znaków, a maksymalna długość nie może przekraczać 64 znaków. Dodatkowo minimalna długość nie może być większa od maksymalnej.';
    } else {
        try {
            $passwordGenerator = new PasswordGenerator($minLength, $maxLength);
            $password = $passwordGenerator->generate();

            if (savePasswordToDatabase($password, $host, $db, $user, $pass)) {
                savePasswordToFile($password);
                echo "Wygenerowane hasło: " . htmlspecialchars($password);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator Haseł</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="number"], input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Generator Haseł</h1>
        <form method="post">
            <label for="min_length">Minimalna długość hasła (min 8):</label>
            <input type="number" id="min_length" name="min_length" min="8" max="64" required>
            
            <label for="max_length">Maksymalna długość hasła (max 64):</label>
            <input type="number" id="max_length" name="max_length" min="8" max="64" required>
            
            <input type="submit" value="Generuj i Zapisz Hasło">
        </form>
    </div>
</body>
</html>
