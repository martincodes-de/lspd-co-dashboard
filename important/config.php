<?php

# Allgemeine Einstellungen

$site_fullname = "LSPD: Commanding Officer Dashboard";
$site_shortname = "LSPD: CO-Dashboard";
$site_version = "[DEV] 27.11.2020";
$site_programmer = "martincodes";

# Datenbank Einstellungen

$db_host = "localhost";
$db_name = "lspd-co-dashboard";
$db_username = "root";
$db_userpassword = "";
$db_charset = "utf8";

# Try-Catch-Verbindung + Sicherheitsfeature

try {
  $db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=$db_charset", $db_username, $db_userpassword);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
  echo 'Datenbankverbindung fehlgeschlagen: ' . $e->getMessage();
}

# Klassen- und Funktionseinbindung
require_once("classes/InformationClass.php");
