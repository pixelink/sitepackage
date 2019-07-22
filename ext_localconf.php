<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

# Add Basic PageTs
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:sitepackage/Configuration/PageTs/Page.txt">'
);
// Configure the RTE
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['default'] = 'EXT:sitepackage/Configuration/RTE/Default.yaml';

// Install tool settings
$GLOBALS['TYPO3_CONF_VARS']['BE']['disable_exec_function'] = '1';
$GLOBALS['TYPO3_CONF_VARS']['BE']['fileCreateMask'] = '0755';
$GLOBALS['TYPO3_CONF_VARS']['BE']['folderCreateMask'] = '0755';
$GLOBALS['TYPO3_CONF_VARS']['BE']['forceCharset'] = 'utf-8';
$GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'] = '100400';
$GLOBALS['TYPO3_CONF_VARS']['BE']['versionNumberInFilename'] = '0';

$GLOBALS['TYPO3_CONF_VARS']['FE']['disableNoCacheParameter'] = '1';
$GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFound_handling'] = '/404-error/';
$GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFound_handling_statheader'] = 'HTTP/1.0 404 Not Found';
$GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFoundOnCHashError'] = '0';
$GLOBALS['TYPO3_CONF_VARS']['FE']['hidePagesIfNotTranslatedByDefault'] = '1';
$GLOBALS['TYPO3_CONF_VARS']['FE']['compressionLevel'] = '3';

$GLOBALS['TYPO3_CONF_VARS']['GFX']['im_path'] = '/usr/bin/';
$GLOBALS['TYPO3_CONF_VARS']['GFX']['im_path_lzw'] = '/usr/bin/';
$GLOBALS['TYPO3_CONF_VARS']['GFX']['im_version_5'] = 'gm';
$GLOBALS['TYPO3_CONF_VARS']['GFX']['im_useStripProfileByDefault'] = '0';
$GLOBALS['TYPO3_CONF_VARS']['GFX']['gdlib_2'] = '0';
$GLOBALS['TYPO3_CONF_VARS']['GFX']['TTFdpi'] = '96';
$GLOBALS['TYPO3_CONF_VARS']['GFX']['jpg_quality'] = '100';
$GLOBALS['TYPO3_CONF_VARS']['GFX']['png_truecolor'] = '1';

$GLOBALS['TYPO3_CONF_VARS']['SYS']['curlUse'] = '1';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['ddmmyy'] = 'd.m.Y';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors'] = '0';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['enableDeprecationLog'] = '0';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['syslogErrorReporting'] = '0';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['belogErrorReporting'] = '0';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['setDBinit'] = 'SET NAMES \'utf8\';';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['sqlDebug'] = '0';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['UTF8filesystem'] = '0';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['systemLocale'] = 'de_DE.UTF-8';


// Navtitle im Pagetree
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('options.pageTree.showNavTitle = 1');

// Meta Tags
$rootlinefields = & $GLOBALS['TYPO3_CONF_VARS']['FE']['addRootLineFields'];

if ($rootlinefields != '') {
    $rootlinefields .= ' , ';
}

$rootlinefields .= 'description,keywords,subtitle';
