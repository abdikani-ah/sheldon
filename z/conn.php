<?php
	$conn = new PDO('sqlite:db_member.sqlite3');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$query = "CREATE TABLE IF NOT EXISTS member(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username TEXT, password TEXT, email Text, phone Text)";
	$files = "CREATE TABLE IF NOT EXISTS caschoices(id integer primary key, userid integer, username text, creativity text, activity text, service text, studentjob text)";
	
	$conn->exec($query);
	$conn->exec($files);
?>
