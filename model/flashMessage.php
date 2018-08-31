<?php
/**
 * model\flashMessage.php
 * @author Fabian Huber
 * 31.08.2018
 * Message flash qui apparaissent pour confirmer des trucs
 */


if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

const MESSAGEFLASH = 'MessageFlash';

/**
 * Définit un message flash
 * @param string $msg Le message à conserver
 */
function SetMessageFlash($msg) {
    $_SESSION[MESSAGEFLASH] = $msg; 
}

/**
 * Récupère l'éventuel message flash, et le supprime de la session
 * @return string le message flash
 */
function GetMessageFlash() {
    $msg = empty($_SESSION[MESSAGEFLASH]) ? '' : $_SESSION[MESSAGEFLASH];
    unset($_SESSION[MESSAGEFLASH]);
    return $msg;
}



