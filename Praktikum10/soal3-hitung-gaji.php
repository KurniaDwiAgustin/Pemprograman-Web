<form method="post">
  Jam kerja: <input type="number" name="jam"><br>
  Golongan:
  <select name="gol">
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
  </select>
  <input type="submit" value="Hitung">
</form>
<?php
if (isset($_POST['jam'])) {
  $jam = $_POST['jam'];
  $gol = $_POST['gol'];
  $upah_lembur = 25000;

  switch ($gol) {
    case 'A': $upah = 150000; break;
    case 'B': $upah = 115000; break;
    case 'C': $upah = 80000; break;
    case 'D': $upah = 75000; break;
  }

  if ($jam > 48) {
    $lembur = $jam - 48;
    $total = (48 * $upah) + ($lembur * $upah_lembur);
  } else {
    $total = $jam * $upah;
  }
  echo "Total upah golongan $gol: Rp. " . number_format($total, 0, ',', '.');
}
?>
