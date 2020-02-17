<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// add custom field 'tx_ptm_iconbox_color' to tt_content
$temporaryColumns = array(
    'px_bootstrap_row' => array(
        'exclude' => 1,
        'label' => 'Laufweite Inhalt',
        'config' => array(
            'type' => 'select',
            'items' => array(),
            'size' => 1,
            'maxitems' => 1,
        )
    ),
    'px_header_class' => array(
        'exclude' => 1,
        'label' => 'Überschrift Optik',
        'config' => array(
            'type' => 'select',
            'items' => array(),
            'size' => 1,
            'maxitems' => 1,
        )
    ),
    'px_additional_css_class' => array(
        'exclude' => 1,
        'label' => 'Zusätzliche CSS Klassen',
        'config' => array(
            'type' => 'input',
            'size' => 80
        )
    )
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tt_content',
    $temporaryColumns
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    'px_bootstrap_row',
    '',
    'after:layout'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    'px_header_class',
    '',
    'after:header_layout'
);
