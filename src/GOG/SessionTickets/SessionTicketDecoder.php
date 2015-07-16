<?php

namespace GOG\SessionTickets;

class SessionTicketDecoder
{
    const MCRYPT_CIPHER = MCRYPT_RIJNDAEL_128;  // Cipher to be used (Rijandel aka AES with 128 bit block size)
    const MCRYPT_MODE = MCRYPT_MODE_CBC;        // Cipher mode (CBC)

    public static function decode($encryptedTicket, $privateKey)
    {
        $clientPrivateKey = UrlSafeBase64Encoder::decode($privateKey); // decode client private key string to binary data
        $encryptedTicket  = UrlSafeBase64Encoder::decode($encryptedTicket); // decode the session ticket string to binary data

        $ivSize    = mcrypt_get_iv_size(self::MCRYPT_CIPHER, self::MCRYPT_MODE); // Initial Vector size depends on cipher used
        $iv        = substr($encryptedTicket, 0, $ivSize); // read the Initial Vector from the cipher string
        $encrypted = substr($encryptedTicket, $ivSize); // read the encrypted payload string

        $plaintext = mcrypt_decrypt(self::MCRYPT_CIPHER, $clientPrivateKey, $encrypted, self::MCRYPT_MODE, $iv);
        $plaintext = rtrim($plaintext, "\0"); // clean up empty chars (added by the encryption algorithm as block padding)

        return $plaintext;
    }
}