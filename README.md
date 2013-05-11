c5-rss-displayer-templates
==========================

Show Thumbnails and Show Images custom templates for the concrete5 core
RSS Displayer block.

Usage
-----

This directory belongs under blocks/rss_displayer/ *NOT*
concrete/blocks/rss_displayer/. Since these are only templates, there is
no block to install.

Simply add the core RSS Displayer block to any page, then select a custom
template of either Show Thumbnails or Show Images and save the block. If
the feed contains images, the first one will be displayed.

Each directory contains a view.css file that you can customize, or you can
override them in individual block Design CSS.

Notes
-----

The show_thumbnail templates don't actually create thumbnails, but instead
just set the max width and height.  So if the original image is huge you
still get that bandwidth needed to download it to the browser.  It just
looks smaller.

:)

Contact
-------

John Steele

Steelesoft Consulting

http://steelesoftconsulting.com/

https://www.concrete5.org/profile/-/view/13433/
