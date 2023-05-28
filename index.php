<!DOCTYPE html>
<html>
<head>
    <title>Rilevazione temperatura</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1 class="ciao">TEMPERATURA RILEVATA</h1>
    </header>
	<div class="container">
    <form method="post">
		<div class="aaa">
			<h2>Inserire nome sostanza:</h2>
			<input id="sostanza" type="text" name="sostanza">
		</div>
		<div class="random-number">
            <input type="hidden" id="inputValore" name="inputValore"/>
			<script>
                var valore = document.getElementById("inputValore").value;
				var min = -5;
				var max = 25;
				valore = Math.floor(Math.random() * (max - min + 1)) + min;
				document.write(valore + " °C");
			</script>
		</div>
    </form>
	</div>
    <form method="post">
	    <div class="button" name="invia"><button>INVIA</button></div>
    </form>
</body>
</html>

<?php
    if(isset($_POST['invia'])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ArpaDb";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $temp = $_POST["inputValore"];;
            $data = date('Y-m-d');
            $sostanza = $_POST["sostanza"];

            $sql = "INSERT INTO rilevazione (temp, sostanza) VALUES (:temp, :sostanza)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':temp', $temp);
            //$stmt->bindParam(':data', $data);
            $stmt->bindParam(':sostanza', $sostanza);
            $stmt->execute();

            echo "Valori inseriti correttamente nel database";
        } catch(PDOException $e) {
            echo "Errore nell'inserimento dei valori nel database: " . $e->getMessage();
        }
    }
?>
