<?php

namespace GOG\SessionTickets;

class OpenSSLSessionTicketDecoder implements SessionTicketDecoder
{
    const OPENSSL_METHOD_NAME = 'AES-256-CBC';

    public static function decode($encryptedTicket, $privateKey)
    {
        // decode client private key string to binary data
        $clientPrivateKey = UrlSafeBase64Encoder::decode($privateKey);

        // decode the session ticket string to binary data
        $encryptedTicket = UrlSafeBase64Encoder::decode($encryptedTicket);

        // Length of the Initial Vector size depends on cipher/mode used
        $ivSize = openssl_cipher_iv_length(self::OPENSSL_METHOD_NAME);

        // read the Initial Vector from the cipher string
        $iv = substr($encryptedTicket, 0, $ivSize);

        // read the encrypted payload string
        $encrypted = substr($encryptedTicket, $ivSize);

        // decrypt the ticket:
        $plaintext = openssl_decrypt(
            base64_encode($encrypted),
            self::OPENSSL_METHOD_NAME,
            $clientPrivateKey,
            OPENSSL_ZERO_PADDING,
            $iv
        );

        // clean up empty chars (added by the encryption algorithm as block padding)
        $plaintext = rtrim($plaintext, "\0");

        return $plaintext;
    }
}