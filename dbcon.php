<?php
try {
  $conn = new PDO("mysql:host=localhost:3306;dbname=XlXi16", "XlXi16", "v2g4ZtKcWLbZm6P2");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	header("Content-Type: application/json");
	exit('{"error":"Failed to connect to database."}');
}