<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunde suchen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('hintergrundbild.jpg'); /* Hintergrundbild einfügen */
            background-size: cover; /* Bildgröße anpassen */
            background-repeat: no-repeat; /* Wiederholung des Bildes verhindern */
            background-attachment: fixed; /* Hintergrundbild fixieren */
            background-color: rgba(255, 255, 255, 0.8); /* Transparente Hintergrundfarbe */
            color: #000; /* Schriftfarbe schwarz */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #555;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav .link-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
        }

        nav a:hover {
            background-color: #777;
        }

        .container {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            width: 80%; /* Set the width to 80% */
            max-width: 900px; /* Reduce the max-width */
            margin: 20px auto; /* Center the container */
            background-color: rgba(255, 255, 255, 0.9); /* Weißer transparenter Hintergrund */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px; /* Reduced gap between input fields */
            margin-bottom: 15px; /* Added margin-bottom for better spacing */
        }

        .form-group label {
            flex: 1 1 100%;
            font-weight: bold;
            margin-bottom: 5px; /* Reduced bottom margin for labels */
        }

        .input-field {
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            flex: 1 1 calc(50% - 22px); /* Adjusted width for better spacing */
            box-sizing: border-box;
            background-color: #fff; /* Hintergrundfarbe der Eingabefelder weiß */
            color: #000; /* Schriftfarbe der Eingabefelder schwarz */
        }

        .input-title {
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 1.2em; /* Increased font size for emphasis */
            text-align: center;
            width: 100%;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: relative;
        }

        button {
            padding: 10px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            cursor: pointer;
            display: block;
            width: 100%;
            max-width: 200px;
            margin-left: auto;
            margin-right: auto;
        }

        button:hover {
            background-color: #ffffff;
            color: #333;
        }
    </style>
</head>

<body>

<header>
    <h1>Kunden Suche</h1>
</header>

<nav>
    <div class="link-container">
        <a href="#" class="link">Zurück</a>
        <a href="#" class="link">Startseite</a>
        <a href="#" class="link">Kundenliste</a>
        <a href="#" class="link">Neue Kunden</a>
    </div>
</nav>

<section class="container">
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
    $sql = "SELECT FKundenID, Name, Vorname, GebDatum, FirmenID, ZahlungsID FROM firmenkunde WHERE 1=1";

    // Filter hinzufügen
    if (!empty($_POST['kundenId'])) {
        $kundenId = $conn->real_escape_string($_POST['kundenId']);
        $sql .= " AND FKundenID = '$kundenId'";
    }

    if (!empty($_POST['name'])) {
        $name = $conn->real_escape_string($_POST['name']);
        $sql .= " AND Name LIKE '%$name%'";
    }

    if (!empty($_POST['vorname'])) {
        $vorname = $conn->real_escape_string($_POST['vorname']);
        $sql .= " AND Vorname LIKE '%$vorname%'";
    }

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
                echo "<tr onclick=\"window.location.href='kundeAnzeigen.html?id=" . $row["FKundenID"] . "';\">";
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
</section>

<footer>
    <p>&copy; 2024 CRM-System. Alle Rechte vorbehalten.</p>
</footer>

</body>

</html>
