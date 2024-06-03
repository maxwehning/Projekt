<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <title>CRM-System</title>
    <style>
        html, body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
            background-image: url('hintergrundbild.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: rgba(244, 244, 244, 0.2);
            color: #333;
            overflow-x: hidden;
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

        #mainContent {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            width: 100%;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            width: 100%;
        }

        .link {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
        }

        .link:hover {
            background-color: #777;
        }

        .input-field {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: calc(100% - 22px);
            box-sizing: border-box;
            background-color: #fff;
            color: #333;
        }

        .input-title {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 5px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .container {
            max-width: 800px;
            width: 100%;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content {
            padding: 20px;
            border-bottom: 1px solid #ccc;
        }
        
        .btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: flex;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

<header>
    <h1 id="pageTitle">Kundendaten suchen</h1>
</header>

<nav>
    <div class="link-container">
        <a href="#" class="link" onclick="event.preventDefault();"><i class="bi bi-house"></i> Startseite</a>
        <a href="#" class="link" onclick="event.preventDefault(); toggleBearbeitungsmodus()"><i class="bi bi-pencil"></i> Daten ändern</a>
        <a href="#" class="link" onclick="event.preventDefault(); speichereDaten()" id="speichernLink" style="display: none;">Daten speichern</a>
        <a href="#" class="link"><i class="bi bi-door-closed"></i> Abmelden</a>
        <div id="kundenIdDiv">
           <!-- Kunden-ID: <span id="kundenIdSpan"></span> -->
        </div>
    </div>
</nav>

<section id="mainContent">
    <div class="container">
        <form action="kundeSuchen.php" method="get">
            <nav>
                <a href="#" class="link" onclick="event.preventDefault(); switchTab('benutzerdaten')">Benutzerdaten</a>
                <a href="#" class="link" onclick="event.preventDefault(); switchTab('kontaktdaten')">Kontaktdaten</a>
                <a href="#" class="link" onclick="event.preventDefault(); switchTab('zahlungsdaten')">Zahlungsdaten</a>
                <a href="#" class="link" onclick="event.preventDefault(); switchTab('kennzahlen')">Kennzahlen</a>
            </nav>
            <div id="benutzerdaten" class="content">
                <div class="input-title">Benutzerdaten</div>

                <label for="benutzername">Benutzername:</label><br>
                <input type="text" class="input-field" id="benutzername" name="benutzername"><br>
                <label for="name">Name:</label><br>
                <input type="text" class="input-field" id="name" name="name"><br>
                <label for="vorname">Vorname:</label><br>
                <input type="text" class="input-field" id="vorname" name="vorname"><br>
                <label for="geburtsdatum">Geburtsdatum:</label><br>
                <input type="date" class="input-field" id="geburtsdatum" name="geburtsdatum"><br>
            </div>
            <div id="kontaktdaten" class="content" style="display:none;">
                <div class="input-title">Kontaktdaten</div>
                <label for="strasse">Straße:</label><br>
                <input type="text" class="input-field" id="strasse" name="strasse"><br>
                <label for="ort">Ort:</label><br>
                <input type="text" class="input-field" id="ort" name="ort"><br>
                <label for="postleitzahl">Postleitzahl:</label><br>
                <input type="text" class="input-field" id="postleitzahl" name="postleitzahl"><br>
                <label for="telefonnummer">Telefonnummer:</label><br>
                <input type="text" class="input-field" id="telefonnummer" name="telefonnummer"><br>
                <label for="mailadresse">Mailadresse:</label><br>
                <input type="text" class="input-field" id="mailadresse" name="mailadresse"><br>
            </div>
            <div id="zahlungsdaten" class="content" style="display:none;">
                <div class="input-title">Zahlungsdaten</div>
                <label for="blz">BLZ:</label><br>
                <input type="text" class="input-field" id="blz" name="blz"><br>
                <label for="institut">Institut:</label><br>
                <input type="text" class="input-field" id="institut" name="institut"><br>
                <label for="iban">IBAN:</label><br>
                <input type="text" class="input-field" id="iban" name="iban"><br>
                <label for="inhaber">Inhaber:</label><br>
                <input type="text" class="input-field" id="inhaber" name="inhaber"><br>
            </div>
            <div id="kennzahlen" class="content" style="display:none;">
                <div class="input-title">Kennzahlen</div>
                <label for="bonitaetsklasse">Bonitätsklasse:</label><br>
                <input type="text" class="input-field" id="bonitaetsklasse" name="bonitaetsklasse"><br>
                <label for="abc_klassifikation">ABC-Klassifikation:</label><br>
                <input type="text" class="input-field" id="abc_klassifikation" name="abc_klassifikation"><br>
            </div>
            <input type="submit" class="btn" value="Suchen">
        </form>
    </div>
</section>

<footer>
    <p>&copy; 2023 Autovermietung. Alle Rechte vorbehalten.</p>
</footer>

<script>
    function toggleBearbeitungsmodus() {
        var inputs = document.querySelectorAll('.input-field');
        var isReadOnly = inputs[0].hasAttribute('readonly');
        for (var i = 0; i < inputs.length; i++) {
            if (isReadOnly) {
                inputs[i].removeAttribute('readonly');
            } else {
                inputs[i].setAttribute('readonly', 'readonly');
            }
        }
        var speichernLink = document.getElementById('speichernLink');
        if (isReadOnly) {
            speichernLink.style.display = 'inline';
        } else {
            speichernLink.style.display = 'none';
        }
    }

    function switchTab(tabName) {
        var tabs = ['benutzerdaten', 'kontaktdaten', 'zahlungsdaten', 'kennzahlen'];
        for (var i = 0; i < tabs.length; i++) {
            var tab = document.getElementById(tabs[i]);
            if (tabs[i] === tabName) {
                tab.style.display = 'block';
            } else {
                tab.style.display = 'none';
            }
        }
    }
</script>

</body>

</html>
