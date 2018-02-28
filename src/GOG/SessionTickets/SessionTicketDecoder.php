<?php

namespace GOG\SessionTickets;

interface SessionTicketDecoder
{
    public static function decode($encryptedTicket, $privateKey);
}