<?php

	require_once 'Connection.simple.php';
	$conn = dbConnect();
	$OK = true; 
	if (isset($_GET['tytul'])) {
		$data = "%".$_GET['tytul']."%";
		$data2 = $_GET['gatunek'];
		$sql = 'SELECT * FROM ksiazki as k JOIN gatunek as g ON g.id = k.gatunek WHERE tytul like ? AND gatunek='.$data2.'';
		$stmt = $conn->prepare($sql);
		$results = $stmt->execute(array($data));
		$rows = $stmt->fetchAll();
		$error = $stmt->errorInfo();
	}
	if(empty($rows)) {
		echo "<tr>";
			echo "<td colspan='4'>Brak wyników!</td>";
		echo "</tr>";
	}
	else {
		foreach ($rows as $row) {
			echo "<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['tytul']."</td>";
				echo "<td>".$row['autor']."</td>";
				echo "<td>".$row['nazwa']."</td>";
				echo "<td><a href='download/".$row['pobierz']."'><img src='src/down.png' alt='Pobierz' /></a></td>";
			echo "</tr>";
		}
	}
?>