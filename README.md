# GOG GALAXY Encrypted App Tickets

The GOG GALAXY SDK provides [access to Encrypted App Tickets](https://docs.gog.com/galaxyapi/classgalaxy_1_1api_1_1IUser.html#a29f307e31066fc39b93802e363ea2064), which can be used by a game for seamless GOG user authorization in any third-party backend.

Encrypted App Tickets are created and encrypted in the GOG GALAXY backend using a shared Private Key. The game can request the ticket for the current user, and the ticket can be passed to any third-party backend that also knows the Private Key and will be able to decrypt the data and thus confirm the user’s identity and their license for the game.

## Encryption

App Tickets are encrypted using [AES (Rijandel)](https://en.wikipedia.org/wiki/Advanced_Encryption_Standard) with a 128-bit block size, 256-bit encryption key in the CBC mode.

## Reference PHP Implementation

This is an example [PHP Implementation](https://github.com/gogcom/galaxy-session-tickets-php/blob/master/index.php)
of the GOG GALAXY Encrypted App Tickets decryption algorithm.
