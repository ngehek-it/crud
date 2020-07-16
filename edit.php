<?php
include('connection.php');
if (!empty($_GET['id'])) {
  $warga = $conn->prepare("SELECT * FROM warga WHERE id = :id");
  $warga->execute([
    ':id' => $_GET['id']
  ]);
  $result = $warga->fetch();
  if (!$result) {
    header('Location: index.php');
  }
}else {
  header('Location: index.php');
}

if (!empty($_POST['name']) && !empty($_POST['address'])) {
	$simpan = $conn->prepare("UPDATE warga SET nama = :name, alamat = :address WHERE id = :id");
	$simpan->execute([
		':name' => $_POST['name'],
		':address' => $_POST['address'],
    ':id' => $_GET['id']
	]);
	if ($simpan) {
		header('Location: index.php');
	}
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Form Edit Data</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="custom.css">
  </head>
  <body>
    <div class="container">
      <div class="row vh-100 justify-content-center align-content-center">
        <div class="col-md-5">
          <div class="card rounded-mine">
            <div class="card-body p-5">
              <div class="card-title">
                <h2 class="font-weight-bold text-mine">Form Edit Data</h2>
              </div>
              <form action="edit.php?id=<?= $result['id'] ?>" method="post">
                <div class="form-group">
                  <label for="name" class="font-weight-bold text-mine">Nama Lengkap</label>
                  <input id="name" class="form-control" type="text" name="name" autocomplete="off" value="<?= $result['nama'] ?>">
                </div>
                <div class="form-group">
                  <label for="address" class="font-weight-bold text-mine">Alamat Rumah</label>
                  <input id="address" class="form-control" type="text" name="address" autocomplete="off" value="<?= $result['alamat'] ?>">
                </div>
                <div class="form-group pt-2">
                  <input type="submit" class="btn btn-mine float-right rounded-lg" value="Simpan">
                </div>
              </form>
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