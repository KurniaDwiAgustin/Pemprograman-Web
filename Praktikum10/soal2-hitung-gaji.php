<form method="post">
  Jam kerja: <input type="number" name="jam">
  <input type="submit" value="Hitung">
</form>
<?php
if (isset($_POST['jam'])) {
  $jam = $_POST['jam'];
  $upah_normal = 100000;
  $upah_lembur = 25000;
  if ($jam > 48) {
    $lembur = $jam - 48;
    $total = (48 * $upah_normal) + ($lembur * $upah_lembur);
  } else {
    $total = $jam * $upah_normal;
  }
  echo "Total upah: Rp. " . number_format($total, 0, ',', '.');
}
?>
