<?php

include 'db_confing.php';
include 'functions.php';


$connessione = connect_database($servername, $username, $password, $dbname);
if ($connessione && $connessione->connect_error) {
  echo ('Connessione fallita: '.$connessione->connect_error);
  exit();
}
$sql = "SELECT * FROM stanze";
$result = $connessione->query($sql);
?>

<?php include 'layout/_head.php'; ?>
<?php include 'layout/navbar.php'; ?>

<div class="container">
    <div class="row">
      <h2>Gestione Camere</h2>
    </div>
    <div class="row">
      <?php if ($result && $result->num_rows > 0) { ?>
        <table class="table table-hover">
          <thead class="table-bordered thead-dark">
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">NUMERO CAMERA</th>
              <th class="text-center">PIANO CAMERE</th>
              <th class="text-center">LETTI DISPONIBILI</th>
              <th class="text-center">CREATO IL</th>
              <th class="text-center">ULTIMA MODIFICA</th>
              <th class="text-center">ACTION</th>
            </tr>
          </thead>
          <?php while($row = $result->fetch_assoc()) { ?>
          <tbody>
            <tr>
              <td class="text-center"><?php echo $row['id']; ?></td>
              <td class="text-center"><?php echo $row['room_number']; ?></td>
              <td class="text-center"><?php echo $row['floor']; ?></td>
              <td class="text-center"><?php echo $row['beds']; ?></td>
              <td class="text-center"><?php echo $row['created_at']; ?></td>
              <td class="text-center"><?php echo $row['updated_at']; ?></td>
              <td class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-primary active">
                    <a href="show.php?id=<?php echo $row['id']; ?>">
                      <input type="radio" name="options" id="option1" autocomplete="off" checked> INFO
                    </a>
                  </label>
                  <label class="btn btn-primary">
                    <a href="edit.php?id=<?php echo $row['id']; ?>">
                      <input type="radio" name="options" id="option2" autocomplete="off"> MODIFICA
                    </a>
                  </label>
                  <label class="btn btn-warning">
                    <a href="delete.php?id=<?php echo $row['id']; ?>">
                    <input type="radio" name="options" id="option3" autocomplete="off"> CANCELLAZIONE
                  </label>
                </div>
              </td>
            </tr>
          </tbody>
          <?php } ?>
        </table>
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
