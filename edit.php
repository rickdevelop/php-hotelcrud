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
    <div class="row">
      <h2>Modifica dati stanza id: <?php echo $id_stanza; ?></h2>
    </div>
    <div class="row">
      <?php
      if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc(); ?>
        <div class="col-md-4">
          <form method="post" action="edit_manager.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
              <label for="room_number">Numero stanza</label>
              <input type="text" class="form-control" name="room_number" value="<?php echo $row['room_number']; ?>" placeholder="Numero stanza">
            </div>
            <div class="form-group">
              <label for="beds">Numero letti</label>
              <input type="number" class="form-control" name="beds" value="<?php echo $row['beds']; ?>" placeholder="Numero letti">
            </div>
            <div class="form-group">
              <label for="floor">Piano</label>
              <input type="number" class="form-control" name="floor" value="<?php echo $row['floor']; ?>" placeholder="Piano">
            </div>
            <div class="submit_form">
              <input class="btn btn-success" type="submit" value="Salva">
              <a href="index.php" class="btn btn-danger">
                Annulla
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
