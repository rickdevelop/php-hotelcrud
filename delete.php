<?php
include 'db_confing.php';
include 'functions.php';

$connessione = connect_database($servername, $username, $password, $dbname);

if ($connessione && $connessione->connect_error) {
  echo ('Connessione Fallita: '.$connessione->connect_error);
  exit();
}
$id_stanza = intval($_GET['id']);
$sql = "SELECT * FROM stanze WHERE id = $id_stanza";
$result = $connessione->query($sql);
?>

<?php include 'layout/_head.php'; ?>
<?php include 'layout/navbar.php'; ?>

  <div class="container">
    <div class="row">

        <h2>Elimina la stanza con numero id: <?php echo $id_stanza; ?></h2>

    </div>

    <div class="row">
      <?php
      if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc(); ?>
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <div class="card-header">
              Stanza n: <?php echo $row['room_number']; ?>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Piano: <?php echo $row['floor']; ?></li>
              <li class="list-group-item">Posti Letto: <?php echo $row['beds']; ?></li>
              <li class="list-group-item">Creata il: <?php echo $row['created_at']; ?></li>
              <li class="list-group-item">Aggiornata il: <?php echo $row['updated_at']; ?></li>
            </ul>
          </div>


          <form method="post" action="delete_manager.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="submit_form">
              <input class="btn btn-danger" type="submit" value="Cancella stanza">
              <a href="index.php" class="btn btn-light">
                Annulla Modifica
              </a>
            </div>
          </form>
        </div>

      <?php
      } else if ($result) {
        echo "Nessun risultato";
      } else {
        echo "Query error";
      }
      ?>

    </div>
  </div>
<?php include 'layout/_footer.php'; ?>
<?php $connessione->close(); ?>
