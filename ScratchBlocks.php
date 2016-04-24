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


// Hooks

$wgExtensionFunctions[] = 'sbSetup';
$wgHooks['ParserFirstCallInit'][] = 'sbParserInit';
 

// Hook callback function into parser

function sbParserInit (Parser $parser) {
    // Register <scratchblocks> and <sb> tag
    $parser->setHook('scratchblocks', 'sbRenderTag');
	$parser->setHook('sb', 'sbRenderInlineTag');
    return true;
}
 

// Ouput HTML for <scratchblocks> tag

function sbRenderTag ($input, array $args, Parser $parser, PPFrame $frame) {
    return '<pre class="blocks">' . htmlspecialchars($input) . '</pre>';
}

// Output HTML for inline <sb> tag

function sbRenderInlineTag ($input, array $args, Parser $parser, PPFrame $frame) {
	//throw new Exception("what");
    return '<code class="blocks">' . htmlspecialchars($input) . '</code>';
}


// Make wiki load resources

function sbSetup () {
    global $wgOut;
    $wgOut->addModules('ext.scratchBlocks');
}


// Define resources

$wgResourceModules['ext.scratchBlocks'] = array(
    'scripts' => array(
        'ScratchBlocks/src/scratchblocks.js',
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
