<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "glx"
 *
 *  search and replace Pixel Ink test with project name
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Webseite Konfiguration',
    'description' => 'Site Package with Page definition',
    'category' => 'Deployment Package',
    'author' => 'Benjamin Riezler',
    'author_email' => 'b.riezler@pixel-ink.de',
    'author_company' => 'Pixel Ink',
    'shy' => '',
    'priority' => '',
    'module' => '',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'modify_tables' => '',
    'clearCacheOnLoad' => 0,
    'lockType' => '',
    'version' => '8.7.3',
    'constraints' => array(
        'depends' => array(
            'extbase' => '8.7',
            'fluid' => '8.7',
            'typo3' => '8.7',
            'saltedpasswords' => '8.7',
            'fluid_styled_content' => '8.7',
            'rsaauth' => '8.7',
            'realurl' => '2.2.0',
            'mask' => '3.0',
            'gridelements' => '8.0'
        ),
        'conflicts' => array(
            'css_styled_content' => '8.7'
        ),
        'suggests' => array(
        ),
    ),
);

?>
