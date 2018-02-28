<?php

require_once('vendor/autoload.php');

$mcryptPlaintext = \GOG\SessionTickets\MCryptSessionTicketDecoder::decode(
    \GOG\SessionTickets\ExampleData::ENCRYPTED_SESSION_TICKET,
    \GOG\SessionTickets\ExampleData::CLIENT_PRIVATE_KEY
);

$openSSLplaintext = \GOG\SessionTickets\OpenSSLSessionTicketDecoder::decode(
    \GOG\SessionTickets\ExampleData::ENCRYPTED_SESSION_TICKET,
    \GOG\SessionTickets\ExampleData::CLIENT_PRIVATE_KEY
);

if ($openSSLplaintext === $mcryptPlaintext && $mcryptPlaintext === \GOG\SessionTickets\ExampleData::PLAINTEXT_SESSION_TICKET) {
    echo $openSSLplaintext."\n";
} else {
    throw new \Exception('Encrypted Session Ticket decryption failed');
}