<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        addZiekmelding($_POST['docent_naam'], $_POST['datum']);
    } elseif (isset($_POST['update'])) {
        updateZiekmelding($_POST['id'], $_POST['docent_naam'], $_POST['datum']);
    } elseif (isset($_POST['delete'])) {
        deleteZiekmelding($_POST['id']);
    }
}

$ziekmeldingen = getZiekmeldingen();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Ziekmeldingen</title>
</head>
<body>
    <h1>Ziekmeldingen</h1>
    <form method="post">
        <input type="text" name="docent_naam" placeholder="Docent Naam">
        <input type="text" name="datum" placeholder="Datum">
        <button type="submit" name="add">Toevoegen</button>
    </form>
    
    <h2>Overzicht</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Docent Naam</th>
            <th>Datum</th>
            <th>Acties</th>
        </tr>
        <?php foreach ($ziekmeldingen as $ziekmelding): ?>
        <tr>
            <td><?php echo $ziekmelding['id']; ?></td>
            <td><?php echo $ziekmelding['docent_naam']; ?></td>
            <td><?php echo $ziekmelding['datum']; ?></td>
            <td>
            <form method="post" style="display: inline-block;">
    <input type="hidden" name="id" value="<?php echo $ziekmelding['id']; ?>">
    <input type="text" name="docent_naam" value="<?php echo $ziekmelding['docent_naam']; ?>">
    <input type="text" name="datum" value="<?php echo $ziekmelding['datum']; ?>">
    <button type="submit" name="update">Wijzigen</button>
</form>

                <form method="post" style="display: inline-block;">
                    <input type="hidden" name="id" value="<?php echo $ziekmelding['id']; ?>">
                    <button type="submit" name="delete">Verwijderen</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
