<?php

namespace GOG\SessionTickets;

class ExampleData
{
    /**
     * example encrypted session ticket
     */
    const ENCRYPTED_SESSION_TICKET = 'csEYJ2MWR53QssNNqFgO87sRNktqgGsIfcq7Od4298Tr3ssV-qeBaxYsY15xVlc1sEj092Fp2IJdtYz8zjHF1FvdRXgOYI84bTikl5saOcmrqZZ1QkDNoBqaoYbMznEz';

    /**
     * expected decrypted plain text string
     */
    const PLAINTEXT_SESSION_TICKET = '["46987466337914189","46700618453700513",1437033367,"Example Additional Data"]';

    /**
     * example client_id
     */
    const CLIENT_ID = '46700618453700513';

    /**
     * example client private key (used to encrypt the example ticket)
     */
    const CLIENT_PRIVATE_KEY = 'prvXiC_DHrvaSVKxsuxN_Lkpu-jsHzvk_JPEodLI_pU';
}