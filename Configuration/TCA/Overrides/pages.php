<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

// Register Page TSconfig for inclusion
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'sitepackage',
    'Configuration/PageTs/AdditionalTsConfig/Page.txt',
    'EXT:sitepackage - Website Package Configuration'
);
