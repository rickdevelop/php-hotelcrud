<?php

include 'db_confing.php';

include 'functions.php';

$connessione = connect_database($servername, $username, $password, $dbname);

if ($connessione && $connessione->connect_error) {
  echo ('Connessione fallita: '.$connessione->connect_error);
  exit();
}
$id_stanza = intval($_GET['id']);
$sql = "SELECT * FROM stanze WHERE id = $id_stanza";
$result = $connessione->query($sql);
?>

<?php include 'layout/_head.php'; ?>
<?php include 'layout/navbar.php'; ?>

<div class="container">
  <h2>Dettaglio Camera: <?php echo $id_stanza; ?></h2>
  <?php
  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc(); ?>

    <div class="card" style="width: 18rem;">

      <div class="card-header">
        Numero stanza : <?php echo $row['room_number']; ?>
      </div>

      <ul class="list-group">
        <li class="list-group-item">Piano: <?php echo $row['floor']; ?></li>
        <li class="list-group-item">Posti Letto: <?php echo $row['beds']; ?></li>
        <li class="list-group-item">Creata il: <?php echo $row['created_at']; ?></li>
        <li class="list-group-item">Aggiornata il: <?php echo $row['updated_at']; ?></li>
      </ul>
    </div>
  <?php
  } else if ($result) {
    echo "Nessun risultato";
  } else {
    echo "Query error";
  }
  ?>
  <div class="go_back">
    <a href="index.php" class="btn btn-info">
      Ritorna a guarda tutte le camere
    </a>
  </div>
</div>
<?php include 'layout/_footer.php'; ?>
<?php $connessione->close(); ?>
