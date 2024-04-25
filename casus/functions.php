<?php
include 'dbconfig.php';

function getZiekmeldingen() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM Ziekmelding");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addZiekmelding($docent_naam, $datum) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO Ziekmelding (docent_naam, datum) VALUES (:docent_naam, :datum)");
    $stmt->bindParam(':docent_naam', $docent_naam);
    $stmt->bindParam(':datum', $datum);
    return $stmt->execute();
}

function updateZiekmelding($id, $docent_naam, $datum) {
    global $conn;
    $stmt = $conn->prepare("UPDATE Ziekmelding SET docent_naam = :docent_naam, datum = :datum WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':docent_naam', $docent_naam);
    $stmt->bindParam(':datum', $datum);
    return $stmt->execute();
}

function deleteZiekmelding($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM Ziekmelding WHERE id = :id");
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
?>
