<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="formularz_fotka.php" method="post" enctype="multipart/form-data">
    Imie: <br />   <input type="text" name="imie"> <br />
    Nazwisko: <br /> <input type="text" name="nazwisko"> <br />
    Wiek: <br />   <input type="number" name="wiek">   <br />
    PESEL: <br />  <input type="number" name="pesel">  <br />
    E-mail: <br />  <input type="text" name="email">   <br />
    Ulica: <br />  <input type="text" name="ulica">    <br />
    Kod Pocztowy: <br />  <input type="tet" name="kod_pocztowy">   <br />
    <br /> Płeć: <select id="plec" name="plec">  
                <option value=1>---</option>
                <option value=2>mężczyzna</option>
                <option value=3>kobieta</option>
            </select> <br />
<br />    Zdjęcie:    <br />    <input type="file" name="zdjecie"> <br />
        <br />   <input type="submit" name="wyslij" value="wyslij">

    </form>
</body>
</html>