<?php


$GLOBALS['TYPO3_CONF_VARS']['SYS']['trustedHostsPattern'] = '.*';

$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default'] = array_merge($GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default'],
    [
        'dbname' => 'db',
        'host' => 'db',
        'password' => 'db',
        'port' => '3306',
        'user' => 'db',
    ]);

$GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask'] = '*';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors'] = 1;

// Backend
$GLOBALS['TYPO3_CONF_VARS']['BE']['debug'] = true;

// Frontend
$GLOBALS['TYPO3_CONF_VARS']['FE']['debug'] = true;

// Mask path configuration
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['mask']['backend'] = 'EXT:sitepackage/Resources/Private/Extensions/Mask/Backend/Templates';
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['mask']['backendlayout_pids'] = '0,1';
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['mask']['content'] = 'EXT:sitepackage/Resources/Private/Extensions/Mask/Frontend/Templates';
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['mask']['json'] = 'EXT:sitepackage/Configuration/Mask/mask.json';
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['mask']['layouts'] = 'EXT:sitepackage/Resources/Private/Extensions/Mask/Frontend/Layouts';
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['mask']['layouts_backend'] = 'EXT:sitepackage/Resources/Private/Extensions/Mask/Backend/Layouts';
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['mask']['partials'] = 'EXT:sitepackage/Resources/Private/Extensions/Mask/Frontend/Partials';
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['mask']['partials_backend'] = 'EXT:sitepackage/Resources/Private/Extensions/Mask/Backend/Partials';
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['mask']['preview'] = 'EXT:sitepackage/Resources/Private/Extensions/Mask/Backend/Previews';



// Do some smpt
$GLOBALS['TYPO3_CONF_VARS']['MAIL']  = [
    'defaultMailFromAddress' => 'noreply@',
    'defaultMailFromName' => '',
    'defaultMailReplyToAddress' => 'noreply@',
    'defaultMailReplyToName' => '',
    'transport' => 'smtp',
    'transport_sendmail_command' => '',
    'transport_smtp_encrypt' => 'tls',
    'transport_smtp_password' => '',
    'transport_smtp_server' => '',
    'transport_smtp_username' => ''
];

// Ahh no, save mails locally
#$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport'] = 'mbox';
#$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_mbox_file'] = '/var/www/html/public/fileadmin/mbox.txt';
