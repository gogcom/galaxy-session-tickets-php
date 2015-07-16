<?php

require_once('UrlSafeBase64Encoder.php');
require_once('ExampleData.php');
require_once('MCryptConfig.php');

class SessionTicketDecoder
{
    public static function decode($encryptedTicket, $privateKey)
    {
        $clientPrivateKey = UrlSafeBase64Encoder::decode($privateKey); // decode client private key string to binary data
        $encryptedTicket  = UrlSafeBase64Encoder::decode($encryptedTicket); // decode the session ticket string to binary data

        $ivSize    = mcrypt_get_iv_size(MCryptConfig::$mcryptCipher, MCryptConfig::$mcryptMode); // Initial Vector size depends on cipher used
        $iv        = substr($encryptedTicket, 0, $ivSize); // read the Initial Vector from the cipher string
        $encrypted = substr($encryptedTicket, $ivSize); // read the encrypted payload string

        $plaintext = mcrypt_decrypt(MCryptConfig::$mcryptCipher, $clientPrivateKey, $encrypted, MCryptConfig::$mcryptMode, $iv);
        $plaintext = rtrim($plaintext, "\0"); // clean up empty chars (added by the encryption algorithm as block padding)

        return $plaintext;
    }
}