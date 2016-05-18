
A simple MediaWiki extension for rendering Scratch blocks.

Transforms `<scratchblocks>` tags inside wiki articles into `<pre class="blocks">`
in the HTML, which are then rendered to scratch blocks using CSS and JS
included in the page. Inline blocks are rendered with `<sb>` tags, and become
`<code class="blocks">` tags.

- Maintained by ErnieParke ([@Choco31415](https://github.com/Choco31415)).
- Authored by tjvr


Installation
============

This repository uses Git submodules. If you `git clone`, make sure to include the `--recursive` option.

    $ cd extensions
    $ git clone --recursive http://github.com/tjvr/wiki-scratchblocks ScratchBlocks

Just drop this folder into MediaWiki's "extensions/" folder, and add

    require_once( "$IP/extensions/ScratchBlocks/ScratchBlocks.php" );

to your "LocalSettings.php". If running Mediawiki 1.25 or greater, you can use

    wfLoadExtension( "ScratchBlocks" );

instead of the require statement.

