<?php 
$dbms = 'mysql';
$host = 'localhost';
$port = '3306';
$charset = 'utf8';
$dbname = 'bbs';
$dns = "$dbms:host=$host;port=$port;charset=$charset;dbname=$dbname";
$user = 'root';
$pass = 'root';
$pdo = new PDO($dns,$user,$pass);
