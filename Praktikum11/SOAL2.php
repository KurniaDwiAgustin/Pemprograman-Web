<?php

$target = 25;
$jumlah_penyelesaian = 0;
$solusi_array = [];

for ($x = 1; $x <= $target - 2; $x++) { // x maksimum 23
    for ($y = 1; $y <= $target - $x - 1; $y++) { // y maksimum 23, dan y < 25 - x
        // Hitung z yang dibutuhkan untuk memenuhi persamaan
        $z_hitung = $target - $x - $y;
        
        // Loop ke-3 untuk validasi
        // Sebenarnya kita hanya perlu memastikan $z_hitung >= 1
        for ($z = $z_hitung; $z <= $z_hitung; $z++) { 
            // Cek apakah $z$ yang dihasilkan adalah bilangan asli (z >= 1)
            // Cek apakah persamaan terpenuhi (hanya formalitas, karena $z$ dihitung dari persamaan)
            if ($z >= 1 && $x + $y + $z == $target) {
                // Tambahkan solusi
                $solusi_array[] = "x = $x, y = $y, z = $z";
                $jumlah_penyelesaian++;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Solusi Persamaan X + Y + Z = 25</title>
    <style>
        .solusi-list {
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #ccc;
            padding: 10px;
            font-family: monospace;
        }
    </style>
</head>
<body>
    <h1>Solusi Persamaan $x + y + z = 25$</h1>
    <p>dengan $x, y, z$ adalah *bilangan asli* ($x, y, z \ge 1$).</p>

    <h2>Daftar Solusi:</h2>
    <div class="solusi-list">
        <?php
        foreach ($solusi_array as $solusi) {
            echo $solusi . "<br>";
        }
        ?>
    </div>

    <h2>Jumlah Penyelesaian:</h2>
    <p>Total pasangan nilai $x, y, z$ yang memenuhi persamaan adalah: <strong><?php echo $jumlah_penyelesaian; ?></strong></p>
    
    <?php 
    ?>

</body>
</html>