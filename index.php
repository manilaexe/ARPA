<!DOCTYPE html>
<html>
<head>
    <title>Rilevazione temperatura</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .lala{
            decoration: none;
            border: none;
            font-size: 30px;
            width: 60px;
        }
    </style>
</head>
<body>
    <header>
        <h1 class="ciao">TEMPERATURA RILEVATA</h1>
    </header>
	<div class="container">
    <form method="post" enctype="multipart/form-data">
		<div class="aaa">
			<h2>Inserire nome sostanza:</h2>
			<input id="sostanza" type="text" name="sostanza">
		</div>
		<div class="random-number">
            <input class="lala" type="text" id="inputValore" name="inputValore" value="">
			<script>
				var min = -5;
				var max = 25;
				var valore = Math.floor(Math.random() * (max - min + 1)) + min;
				document.getElementById("inputValore").value = valore + " °C";
			</script>
		</div>
	</div>
	    <div class="button">
            <button id="invia" name="invia">INVIA</button>
        </div>
    </form>
</body>
</html>

<?php
    if(isset($_POST['invia'])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "arpa";
     
        $temp = $_REQUEST["inputValore"];
        $sostanza = $_REQUEST["sostanza"];

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $sql = "INSERT INTO rilevazione (temp, sostanza) VALUES (:temp, :sostanza)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':temp', $temp);
            $stmt->bindParam(':sostanza', $sostanza);
            $stmt->execute();

        } catch(PDOException $e) {
            echo "Errore nell'inserimento dei valori nel database: " . $e->getMessage();
        }
    }
?>
