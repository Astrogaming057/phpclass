<?php
$session = session();
$UID     = $session->get('UID');
$roleID  = $session->get('roleID');

if (! $UID || (int) $roleID !== 4) {
    header('Location: ' . base_url() . '#login');
    exit;
}
