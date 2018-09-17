<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'sitepackage',
    'Configuration/TypoScript',
    'Website Package Configuration'
);
