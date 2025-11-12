<form method="post">
  Masukkan tahun: <input type="number" name="tahun">
  <input type="submit" value="Cek">
</form>
<?php
if (isset($_POST['tahun'])) {
  $tahun = $_POST['tahun'];
  if (($tahun % 4 == 0 && $tahun % 100 != 0) || ($tahun % 400 == 0)) {
    echo "$tahun adalah tahun kabisat";
  } else {
    echo "$tahun bukan tahun kabisat";
  }
}
?>
