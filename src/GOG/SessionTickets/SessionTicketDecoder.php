<?php

namespace GOG\SessionTickets;

class SessionTicketDecoder
{
    /**
     * mcrypt cipher to be used (Rijandel aka AES with 128 bit block size)
     */
    const MCRYPT_CIPHER = MCRYPT_RIJNDAEL_128;

    /**
     * mcrypt cipher mode (Cipher Block Chaining)
     */
    const MCRYPT_MODE = MCRYPT_MODE_CBC;

    public static function decode($encryptedTicket, $privateKey)
    {
        // decode client private key string to binary data
        $clientPrivateKey = UrlSafeBase64Encoder::decode($privateKey);

        // decode the session ticket string to binary data
        $encryptedTicket = UrlSafeBase64Encoder::decode($encryptedTicket);

        // Length of the Initial Vector size depends on cipher/mode used
        $ivSize = mcrypt_get_iv_size(self::MCRYPT_CIPHER, self::MCRYPT_MODE);

        // read the Initial Vector from the cipher string
        $iv = substr($encryptedTicket, 0, $ivSize);

        // read the encrypted payload string
        $encrypted = substr($encryptedTicket, $ivSize);

        // decrypt the ticket:
        $plaintext = mcrypt_decrypt(self::MCRYPT_CIPHER, $clientPrivateKey, $encrypted, self::MCRYPT_MODE, $iv);

        // clean up empty chars (added by the encryption algorithm as block padding)
        $plaintext = rtrim($plaintext, "\0");

        return $plaintext;
    }
}