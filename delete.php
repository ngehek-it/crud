<?php 

include('connection.php');
if (!empty($_GET['id'])) {
  $warga = $conn->prepare("DELETE FROM warga WHERE id = :id");
  $warga->execute([
    ':id' => $_GET['id']
  ]);
  header('Location: index.php');
}else {
  header('Location: index.php');
}

?>