<?php

require_once('vendor/autoload.php');

$plaintext = \GOG\SessionTickets\SessionTicketDecoder::decode(
    \GOG\SessionTickets\ExampleData::$encryptedSessionTicket,
    \GOG\SessionTickets\ExampleData::$clientPrivateKey
);

if ($plaintext === \GOG\SessionTickets\ExampleData::$plainTextSessionTicket) {
    echo $plaintext . "\n";
} else {
    throw new \Exception('Encrypted Session Ticket decryption failed');
}