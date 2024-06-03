<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
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
    <h1>Kunde suchen</h1>
</header>

<nav>
    <!--<div class="link-container">
        <a href="#" class="link">Zurück</a>
        <a href="#" class="link"> Startseite</a>
        <a href="#" class="link"> Kunde anlegen</a>
        <a href="#"class="link"><i class="bi bi-door-closed"></i> Abmelden</a>
    </div>-->
    <div class="link-container">
        <a href="#" class="link"><i class="bi bi-arrow-left"></i> Zurück</a>
        <a href="#" class="link" onclick="event.preventDefault();"><i class="bi bi-house"></i> Startseite</a>
        <a href="#" class="link"><i class="bi bi-pencil"></i> Kunde anlegen</a>
        <a href="#"class="link"><i class="bi bi-door-closed"></i> Abmelden</a>
        <div id="kundenIdDiv">
           <!-- Kunden-ID: <span id="kundenIdSpan"></span> -->
        </div>
    </div>
</nav>

<section id="mainContent">
    <div class="container">
        <nav>
            <a href="#" class="link" onclick="event.preventDefault(); switchTab('benutzerdaten')">Benutzerdaten</a>
            <a href="#" class="link" onclick="event.preventDefault(); switchTab('kontaktdaten')">Kontaktdaten</a>
            <a href="#" class="link" onclick="event.preventDefault(); switchTab('zahlungsdaten')">Zahlungsdaten</a>
            <a href="#" class="link" onclick="event.preventDefault(); switchTab('kennzahlen')">Kennzahlen</a>
        </nav>
        <div id="benutzerdaten" class="content">
            <div class="input-title">Benutzerdaten</div>

            <!-- Radiobuttons für Privat und Geschäftskunde -->
            <label>
                <input type="radio" name="kundentyp" value="privat" onclick="toggleFirmaFeld()" checked> Privat
            </label>
            <label>
                <input type="radio" name="kundentyp" value="geschaeft" onclick="toggleFirmaFeld()"> Geschäftskunde
            </label>
            <br><br>

            <label for="benutzername">Benutzername:</label><br>
            <input type="text" class="input-field" id="benutzername" disabled><br>
            <label for="passwort">Passwort:</label><br>
            <input type="password" class="input-field" id="passwort" disabled><br>
            <label for="name">Name:</label><br>
            <input type="text" class="input-field" id="name" disabled><br>
            <label for="vorname">Vorname:</label><br>
            <input type="text" class="input-field" id="vorname" disabled><br>
            <label for="geburtsdatum">Geburtsdatum:</label><br>
            <input type="date" class="input-field" id="geburtsdatum" disabled><br>

            <!-- Feld Firma, das ein-/ausgeblendet wird -->
            <div id="firmaContainer" style="display: none;">
                <label for="firma">Firma:</label><br>
                <input type="text" class="input-field" id="firma" disabled><br>
            </div>
        </div>
        <div id="kontaktdaten" class="content" style="display:none;">
            <div class="input-title">Kontaktdaten</div>
            <label for="strasse">Straße:</label><br>
            <input type="text" class="input-field" id="strasse" disabled><br>
            <label for="ort">Ort:</label><br>
            <input type="text" class="input-field" id="ort" disabled><br>
            <label for="postleitzahl">Postleitzahl:</label><br>
            <input type="text" class="input-field" id="postleitzahl" disabled><br>
            <label for="telefonnummer">Telefonnummer:</label><br>
            <input type="text" class="input-field" id="telefonnummer" disabled><br>
            <label for="mailadresse">Mailadresse:</label><br>
            <input type="text" class="input-field" id="mailadresse" disabled><br>
        </div>
        <div id="zahlungsdaten" class="content" style="display:none;">
            <div class="input-title">Zahlungsdaten</div>
            <label for="blz">BLZ:</label><br>
            <input type="text" class="input-field" id="blz" disabled><br>
            <label for="institut">Institut:</label><br>
            <input type="text" class="input-field" id="institut" disabled><br>
            <label for="iban">IBAN:</label><br>
            <input type="text" class="input-field" id="iban" disabled><br>
            <label for="inhaber">Inhaber:</label><br>
            <input type="text" class="input-field" id="inhaber" disabled><br>
        </div>
        <div id="kennzahlen" class="content" style="display:none;">
            <div class="input-title">Kennzahlen</div>
            <label for="bonitaetsklasse">Bonitätsklasse:</label><br>
            <input type="text" class="input-field" id="bonitaetsklasse" disabled><br>
            <label for="abc_klassifikation">ABC-Klassifikation:</label><br>
            <input type="text" class="input-field" id="abc_klassifikation" disabled><br>
        </div>
        
    </div>
    
</section>

    

<section class="container">
    <form method="POST" action="kundeSuchen.php">
        <div class="input-title">Suche nach Kunden</div>
        
        <div class="form-group">
            <label for="kundenId">Kunden-ID:</label>
            <input type="text" class="input-field" id="kundenId" name="kundenId">
        </div>
        
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="input-field" id="name" name="name">
        </div>
        
        <div class="form-group">
            <label for="vorname">Vorname:</label>
            <input type="text" class="input-field" id="vorname" name="vorname">
        </div>
        
        <button type="submit">Suchen <i class="bi bi-search"></i></button>
    </form>


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
    if (!empty($_GET['kundenId'])) {
        $kundenId = $conn->real_escape_string($_GET['kundenId']);
        $sql .= " AND FKundenID = '$kundenId'";
    }

    if (!empty($_GET['name'])) {
        $name = $conn->real_escape_string($_GET['name']);
        $sql .= " AND Name LIKE '%$name%'";
    }

    if (!empty($_GET['vorname'])) {
        $vorname = $conn->real_escape_string($_GET['vorname']);
        $sql .= " AND Vorname LIKE '%$vorname%'";
    }

    $result = $conn->query($sql);

    
    ?>
</section>

<footer>
    <p>&copy; 2024 CRM-System. Alle Rechte vorbehalten.</p>
</footer>

</body>

</html>
