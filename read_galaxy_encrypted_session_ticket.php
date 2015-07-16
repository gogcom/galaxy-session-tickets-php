<?php

require_once('UrlSafeBase64Encoder.php');
require_once('ExampleData.php');
require_once('MCryptConfig.php');

$clientPrivateKey       = UrlSafeBase64Encoder::decode(ExampleData::$clientPrivateKey); // decode client private key string to binary data
$encryptedSessionTicket = UrlSafeBase64Encoder::decode(ExampleData::$encryptedSessionTicket); // decode the session ticket string to binary data

$ivSize    = mcrypt_get_iv_size(MCryptConfig::$mcryptCipher, MCryptConfig::$mcryptMode); // Initial Vector size depends on cipher used
$iv        = substr($encryptedSessionTicket, 0, $ivSize); // read the Initial Vector from the cipher string
$encrypted = substr($encryptedSessionTicket, $ivSize); // read the encrypted payload string

$plaintext = mcrypt_decrypt(MCryptConfig::$mcryptCipher, $clientPrivateKey, $encrypted, MCryptConfig::$mcryptMode, $iv);
$plaintext = rtrim($plaintext, "\0"); // clean up empty chars (added by the encryption algorithm as block padding)

if ($plaintext === ExampleData::$plainTextSessionTicket) {
    echo $plaintext . "\n";
} else {
    throw new \Exception('Encrypted Session Ticket decryption failed');
}