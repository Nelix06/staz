<?php
require_once('polaczenie.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM `uzytkownicy` WHERE id = $id";
    $stmt = $conn->query($sql);
        if($stmt->execute()) {
            header("Location: glowna.php");
        }
?>