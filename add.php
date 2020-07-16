<?php
if (!empty($_POST['name']) && !empty($_POST['address'])) {
	include('connection.php');
	$simpan = $conn->prepare("INSERT INTO warga (nama, alamat) VALUES (:name, :address)");
	$simpan->execute([
		':name' => $_POST['name'],
		':address' => $_POST['address']
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
    <title>Form Tambah Data</title>
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
                <h2 class="font-weight-bold text-mine">Form Tambah Data</h2>
              </div>
              <form action="add.php" method="post">
                <div class="form-group">
                  <label for="name" class="font-weight-bold text-mine">Nama Lengkap</label>
                  <input id="name" class="form-control" type="text" name="name" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="address" class="font-weight-bold text-mine">Alamat Rumah</label>
                  <input id="address" class="form-control" type="text" name="address" autocomplete="off">
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