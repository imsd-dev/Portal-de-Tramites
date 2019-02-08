<?php
/**
 * Description of Correo
 *
 * @author Ruth Escobar
 */
class Correo {
    
    private $mbox;
    
    function __construct() {
        
        $this->mbox = imap_open(MAIL_HOSTNAME, MAIL_USERNAME, MAIL_PASS)
                      or die("no se puede conectar: " . imap_last_error());
    }
    
    function __destruct() {    
        imap_close($this->mbox);
    }
}
