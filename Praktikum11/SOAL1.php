<?php
$saldo_akhir = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil input dari form
    $saldo_awal_input = filter_var($_POST['saldo_awal'], FILTER_SANITIZE_NUMBER_INT);
    $n_bulan = filter_var($_POST['n_bulan'], FILTER_SANITIZE_NUMBER_INT);
    
    // Konversi ke angka
    $saldo_awal = (float)$saldo_awal_input;
    $n_bulan = (int)$n_bulan;

    // Inisialisasi
    $saldo_saat_ini = $saldo_awal;
    $biaya_admin = 9000;
    $batas_saldo = 1100000;
    
    // Perhitungan
    for ($i = 1; $i <= $n_bulan; $i++) {
        // Tentukan Bunga Tahunan (p.a.)
        if ($saldo_saat_ini < $batas_saldo) {
            $bunga_pa = 0.03; // 3% p.a.
        } else {
            $bunga_pa = 0.04; // 4% p.a.
        }
        
        // Bunga Bulanan
        $bunga_bulanan = $bunga_pa / 12;
        
        // Hitung Bunga (Rp)
        // Bunga dihitung dari besar saldo terakhir (saldo bulan sebelumnya)
        $bunga_rp = $saldo_saat_ini * $bunga_bulanan;
        
        // Hitung Saldo Akhir Bulan
        $saldo_saat_ini = $saldo_saat_ini + $bunga_rp - $biaya_admin;
        
        // Pastikan saldo tidak negatif (walaupun dalam skenario ini saldo awal sudah besar)
        if ($saldo_saat_ini < 0) {
            $saldo_saat_ini = 0;
            break; 
        }
    }
    
    $saldo_akhir = $saldo_saat_ini;
}

// Fungsi untuk format mata uang
function format_rupiah($angka) {
    return "Rp. " . number_format($angka, 2, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perhitungan Saldo Tabungan</title>
</head>
<body>
    <h1>Perhitungan Saldo Tabungan Bank X</h1>
    
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="saldo_awal">Saldo Awal (Rp.):</label>
        <input type="number" id="saldo_awal" name="saldo_awal" value="<?php echo isset($_POST['saldo_awal']) ? $_POST['saldo_awal'] : '1000000'; ?>" required min="1">
        <br><br>
        <label for="n_bulan">Jangka Waktu (N Bulan):</label>
        <input type="number" id="n_bulan" name="n_bulan" value="<?php echo isset($_POST['n_bulan']) ? $_POST['n_bulan'] : '12'; ?>" required min="1">
        <br><br>
        <button type="submit">Hitung Saldo Akhir</button>
    </form>

    <hr>

    <?php if ($saldo_akhir !== null): ?>
        <h2>Hasil Perhitungan</h2>
        <p><strong>Saldo Awal:</strong> <?php echo format_rupiah($saldo_awal); ?></p>
        <p><strong>Jangka Waktu (N):</strong> <?php echo $n_bulan; ?> Bulan</p>
        <p><strong>Saldo Akhir Setelah <?php echo $n_bulan; ?> Bulan:</strong> 
           <strong><?php echo format_rupiah($saldo_akhir); ?></strong>
        </p>
    <?php endif; ?>

</body>
</html>