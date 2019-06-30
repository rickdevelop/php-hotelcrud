<?php
include 'db_confing.php';
include 'functions.php';

$connessione = connect_database($servername, $username, $password, $dbname);

if ($connessione && $connessione->connect_error) {
  echo ('Connessione fallita: '.$connessione->connect_error);
  exit();
}

if(empty($_POST)) {
  echo ' errore';
  exit();
}

$room_number = intval($_POST['room_number']);
$beds = intval($_POST['beds']);
$floor = intval($_POST['floor']);
$sql = "INSERT INTO stanze (id, room_number, floor, beds, created_at, updated_at) VALUES (NULL, $room_number, $beds, $floor, NOW(), NOW())";
$result = $connessione->query($sql);
?>

<?php include 'layout/_head.php'; ?>
<?php include 'layout/navbar.php'; ?>

  <div class="container">

    <div class="row">
      <h2>Inserimento stanza avvenuto con successo!</h2>
    </div>

    <div class="row">

      <div class="go_back">
        <a href="index.php" class="btn btn-success">
          Ritorna alla gestione camere
        </a>
      </div>
    </div>
  </div>

<?php include 'layout/_footer.php'; ?>

<?php $connessione->close(); ?>
