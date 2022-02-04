<?php

include('../connection.php');

$id = $_GET['id'];

$query = "DELETE FROM jadwal WHERE id = $id";

$hapus = mysqli_query($connection, $query);

if ($hapus) {
  header('Location: ../jadwal/index.php');
}
