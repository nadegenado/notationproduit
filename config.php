<?php

$host       = "localhost";
$username   = "root";
$password   = "";
$dbname     = "db_produit"; 
$dsn        = "mysql:host=$host;dbname=$dbname"; 
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );