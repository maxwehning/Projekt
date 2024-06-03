<?php
header('Content-Type: application/json');

// Verbindungsdaten
$servername = "localhost";
$username = "projektwinfo";
$password = "Ocm394Ldmc";
$dbname = "portal";

// Verbindung herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Verbindung prüfen
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kunden-ID aus der Anfrage abrufen
$kundenId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($kundenId > 0) {
    // SQL-Abfrage
    $sql = "SELECT Benutzername, Name, Vorname, GebDatum, Firma, Strasse, Ort, Postleitzahl, Telefonnummer, Mailadresse, BLZ, Institut, IBAN, Inhaber, Bonitaetsklasse, ABC_Klassifikation, Kundentyp 
            FROM firmenkunde 
            WHERE FKundenID = $kundenId";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        echo json_encode(["error" => "No customer found"]);
    }
} else {
    echo json_encode(["error" => "Invalid ID"]);
}

$conn->close();
?>
