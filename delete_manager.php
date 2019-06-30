<?php
include 'db_confing.php';
include 'functions.php';

$connessione = connect_database($servername, $username, $password, $dbname);

if ($connessione && $connessione->connect_error) {
  echo ('Connessione fallita: '.$connessione->connect_error);
  exit();
}

if(empty($_POST)) {
  echo 'Si è verificato un errore';
  exit();
}

$id_stanza = intval($_POST['id']);
$sql = "DELETE FROM stanze WHERE id = $id_stanza";
$result = $connessione->query($sql);
?>

<?php include 'layout/_head.php'; ?>
<?php include 'layout/navbar.php'; ?>
<?php if ($result) { ?>
  <div class="container">
    <div class="row">

        <h2>Stanza eliminata con successo</h2>

    </div>
    <div class="row">
      <div class="go_back">
        <a href="index.php" class="btn btn-success">
          Torna alla pagina principale
        </a>
      </div>
    </div>
  </div>
<?php } else { ?>
  <div class="container">
    <div class="row">
      <div class="titolo">
        <h2>Eliminazione non eseguita</h2>
        <p> Dati inseriti non  validi</p>
      </div>
    </div>
    <div class="row">
      <div class="go_back">
        <a href="index.php" class="btn btn-success">
          Torna alla pagina gestione Camere
        </a>
      </div>
    </div>
  </div>
<?php } ?>
<?php include 'layout/_footer.php'; ?>
<?php $connessione->close(); ?>
