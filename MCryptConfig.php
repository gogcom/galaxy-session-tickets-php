<?php

class MCryptConfig
{
    public static $mcryptCipher = MCRYPT_RIJNDAEL_128;   // Cipher to be used (Rijandel aka AES with 128 bit block size)
    public static $mcryptMode = MCRYPT_MODE_CBC;       // Cipher mode (CBC)
}