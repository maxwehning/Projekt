<?php
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

// SQL-Abfrage
$sql = "SELECT FKundenID, Name, Vorname, GebDatum, FirmenID, ZahlungsID FROM firmenkunde";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ausgabe der Ergebnisse als HTML-Tabelle
    echo "<style>
            table {
                border-collapse: collapse;
                width: 100%;
                margin: 20px 0;
                font-family: Arial, sans-serif;
            }
            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            th {
                background-color: #f2f2f2;
            }
            tr:nth-child(even) {
                background-color: #f9f9f9;
            }
            tr:hover {
                background-color: #e0e0e0;
                cursor: pointer;
            }
          </style>";

    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Vorname</th>
            <th>Geburtsdatum</th>
            <th>FirmenID</th>
            <th>ZahlungsID</th>
          </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr onclick=\"window.location.href='detail.php?id=" . $row["FKundenID"] . "';\">";
        echo "<td>" . $row["FKundenID"] . "</td>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["Vorname"] . "</td>";
        echo "<td>" . $row["GebDatum"] . "</td>";
        echo "<td>" . $row["FirmenID"] . "</td>";
        echo "<td>" . $row["ZahlungsID"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
