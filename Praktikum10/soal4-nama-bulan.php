<?php
// Menentukan bulan dan tahun saat ini
$bulan = date("n"); // angka bulan (1–12)
$tahun = date("Y"); // tahun saat ini

// Tentukan jumlah hari menggunakan switch
switch ($bulan) {
    case 1: case 3: case 5: case 7: case 8: case 10: case 12:
        $hari = 31;
        $nama_bulan = "memiliki 31 hari";
        break;
    case 4: case 6: case 9: case 11:
        $hari = 30;
        $nama_bulan = "memiliki 30 hari";
        break;
    case 2:
        // Cek apakah tahun kabisat
        if (($tahun % 4 == 0 && $tahun % 100 != 0) || ($tahun % 400 == 0)) {
            $hari = 29;
        } else {
            $hari = 28;
        }
        $nama_bulan = "memiliki $hari hari (Februari)";
        break;
    default:
        $hari = 0;
        $nama_bulan = "tidak diketahui";
}

// Menampilkan hasil
$nama_bulan_str = date("F"); // Nama bulan dalam teks (misal: November)
echo "Bulan $nama_bulan_str tahun $tahun $nama_bulan.";
?>
