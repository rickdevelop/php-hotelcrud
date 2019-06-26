
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>prova connessione al database</title>
    <link rel="stylesheet" href="public/css/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
  </head>

  <body>


    <?php

      $servername = "localhost";
      $username = "root";
      $password = "root";
      $dbname = "database_hotel";

      // http://localhost:8888/db_hotel/index.php


      $connessione = new mysqli($servername, $username, $password, $dbname);

      if ($connessione && $connessione->connect_error) {
      echo ("Connessione fallita: " . $connessione->connect_error);
      }
      $sql = "SELECT room_number, floor, beds FROM stanze  ";
      $result = $connessione->query($sql);
      if ($result && $result->num_rows > 0) {

        ?>


          <div class="container">
            <h1>Tabella stanze - piano e posti letto</h1>
            <table class="table">
              <thead>
                <tr>
                  <th>Stanza numero</th>
                  <th>Piano</th>
                  <th>Posti letto</th>

                </tr>
              </thead>
              <tbody>
                <?php
                  while($row = $result->fetch_assoc()){
                ?>
                <tr>
                  <td><?php echo $row['room_number'];
                  ?></td>
                  <td><?php echo $row['floor'];
                ?></td>
                <td><?php echo $row['beds'];
              }?></td>



                </tr>
              </tbody>
            </table>
          </div>
          <?php
      } elseif ($result) {
        echo "0 results";
      } else {
        echo "query error";
      }
    ?>



    <script src="public/js/app.js"></script>

  </body>
</html>
