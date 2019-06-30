<?php include 'layout/_head.php'; ?>
<?php include 'layout/navbar.php'; ?>

  <div class="container">
    <div class="row">
      <h2>Aggiungi una Camera</h2>
    </div>
    <div slass="row">
      <div class="col-md-4">
        <form method="post" action="create_manager.php">
          <div class="form-group">
            <label for="room_number">Numero Camera</label>
            <input type="text" class="form-control" name="room_number" value="" placeholder="Numero camera">
          </div>
          <div class="form-group">
            <label for="beds">Posti letto</label>
            <input type="number" class="form-control" name="beds" value="" placeholder="Numero camere">
          </div>
          <div class="form-group">
            <label for="floor">Piano</label>
            <input type="number" class="form-control" name="floor" value="" placeholder="Piano">
          </div>
          <div class="submit_form">
            <input class="btn btn-primary" type="submit" value="Inserisci Camera">
            <a href="index.php" class="btn btn-danger">
              Annulla
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php include 'layout/_footer.php'; ?>
<?php $connessione->close(); ?>
