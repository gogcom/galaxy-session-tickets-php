<?php

require_once('SessionTicketDecoder.php');

$plaintext = SessionTicketDecoder::decode(ExampleData::$encryptedSessionTicket, ExampleData::$clientPrivateKey);

if ($plaintext === ExampleData::$plainTextSessionTicket) {
    echo $plaintext . "\n";
} else {
    throw new \Exception('Encrypted Session Ticket decryption failed');
}