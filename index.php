<?php 

include('connection.php');
$listWarga = $conn->prepare("SELECT * FROM warga");
$listWarga->execute();
$results = $listWarga->fetchAll();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Daftar Warga</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="custom.css">
  </head>
  <body>
    <div class="container">
      <div class="row vh-100 justify-content-center align-content-center">
        <div class="col-7">
          <div class="card rounded-mine">
            <div class="card-body p-5">
              <div class="card-title d-flex justify-content-between">
                <h2 class="font-weight-bold text-mine d-inline mb-0">Data Warga</h2>
                <a href="add.php" class="btn btn-success">Tambah</a>
              </div>
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($results as $key => $result): ?>
                    <tr>
                      <th><?= $key+1 ?></th>
                      <td><?= $result['nama'] ?></td>
                      <td><?= $result['alamat'] ?></td>
                      <td scope="row">
                        <a href="edit.php?id=<?= $result['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?= $result['id'] ?>" class="btn btn-danger">Hapus</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>