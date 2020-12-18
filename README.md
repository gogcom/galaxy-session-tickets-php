# GOG Galaxy Encrypted Session Tickets

GOG Galaxy SDK provieds access to Encrypted Session Tickets, which can be accessed in the games runtime 
and allow seamless user authenticatication in any third-party backend.

Encrypted Session Tickets are created and encrypted in Galaxy backend using a shared Private Key. The game can request
the ticket for the current user, and the ticket can be passed to any third party backed that also knows the Private Key
and will be able to decrypt the data and thus confirm User identity and his licence for the game.

## Encryption

Session Tickets are encrypted using [AES (Rijandel)](https://en.wikipedia.org/wiki/Advanced_Encryption_Standard) with 128 bit block size, 256 bit encryption key in CBC mode.

## Refference PHP Implementaion

This is an example [PHP implementaion](https://github.com/gogcom/galaxy-session-tickets-php/blob/master/index.php)
of Galaxy Encrypted Session Tickets decryption algorithm.
