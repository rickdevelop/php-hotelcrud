<?php
function connect_database($servername, $username, $password, $dbname) {
  $connessione = new mysqli($servername, $username, $password, $dbname);
  return $connessione;
}
?>
