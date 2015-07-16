<?php

require_once('vendor/autoload.php');

$plaintext = \GOG\SessionTickets\SessionTicketDecoder::decode(
    \GOG\SessionTickets\ExampleData::ENCRYPTED_SESSION_TICKET,
    \GOG\SessionTickets\ExampleData::CLIENT_PRIVATE_KEY
);

if ($plaintext === \GOG\SessionTickets\ExampleData::PLAINTEXT_SESSION_TICKET) {
    echo $plaintext . "\n";
} else {
    throw new \Exception('Encrypted Session Ticket decryption failed');
}