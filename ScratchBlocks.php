<?php
/*
 * ScratchBlocks extension for MediaWiki
 * Renders <scratchblocks> tags to shiny scratch blocks
 *
 * Copyright 2013, Tim Radvan
 * MIT Licensed
 * http://opensource.org/licenses/MIT
 *
 * Includes scratchblocks v3
 * https://github.com/tjvr/scratchblocks
 *
 */


if (!defined('MEDIAWIKI')) {
    die();
}

require_once __DIR__ . "/ScratchblockHooks.php";

// Hooks

$wgExtensionFunctions[] = 'ScratchblockHook::sbSetup';
$wgHooks['ParserFirstCallInit'][] = 'ScratchblockHook::sbParserInit';


// Define resources

$wgResourceModules['ext.scratchBlocks'] = array(
    'scripts' => array(
        'scratchblocks/src/scratchblocks.js',
        'scratchblocks/src/translations.js',
        'run_scratchblocks.js',
    ),

    'styles' => '/inline.css',

    // jQuery is loaded anyway
    'dependencies' => array(),

    // Where the files are
    'localBasePath' => __DIR__,
    'remoteExtPath' => 'ScratchBlocks'
);

$wgExtensionCredits['parserhook'][] = array(
    'name' => "Scratchblocks",           // Name of extension - string
    'description' => "This plugin takes text-based Scratch code and renders it in a graphical format.",    // Description of what the extension does - string. Omit in favour of descriptionmsg.
    'version' => 3.1,         // Version number of extension - number or string
    'author' => ["ErnieParke","blob8108"],         // The extension author's name - string or array for multiple
    'url' => "https://github.com/tjvr/wiki-scratchblocks",            // URL of extension (usually instructions) - string
    'license-name' => "MIT",   // Short name of the license, links LICENSE or COPYING file if existing - string, added in 1.23.0
);
