<?php 

$ch = curl_init(); // Inisialisasi session cURL

// Atur opsi cURL
curl_setopt($ch, CURLOPT_URL, "https://klikyuk.com/ngankngonk/fadli/project-pkl/api.php"); // URL yang akan diakses
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Mengembalikan hasil respons sebagai string
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Nonaktifkan verifikasi SSL (untuk pengembangan, sebaiknya diaktifkan di produksi)

$response = curl_exec($ch); // Eksekusi permintaan cURL dan simpan respons

if ($response === false) {
    echo "Error: " . curl_error($ch);  
} else {
   $data = json_decode($response, true); // Mendekode data JSON menjadi array asosiatif

    if ($data === null) {
        echo "Error decoding JSON: " . json_last_error_msg();
    } else {
        echo json_encode($data); // Tampilkan data JSON yang sudah didekode
    }
}

curl_close($ch); // Tutup session cURL

?>