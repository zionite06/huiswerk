<?php
include 'functions.php';

$ziekmeldingen = getZiekmeldingen();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Leerling - Ziekmeldingen</title>
</head>
<body>
    <h1>Ziekmeldingen</h1>
    
    <h2>Overzicht</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Docent Naam</th>
            <th>Datum</th>
        </tr>
        <?php foreach ($ziekmeldingen as $ziekmelding): ?>
        <tr>
            <td><?php echo $ziekmelding['id']; ?></td>
            <td><?php echo $ziekmelding['docent_naam']; ?></td>
            <td><?php echo $ziekmelding['datum']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
