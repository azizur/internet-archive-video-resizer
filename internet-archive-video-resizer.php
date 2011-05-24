<?php
/*
Plugin Name: Internet Archive Video Resizer
Plugin URI: http://azizur.com/wordpress/plugins/internet-archive-video-resizer/
Description: This plugin will resize the video embed code from archive.org to a size that fits nicely within Twenty Eleven Theme.
Version: 1.0
Author: Azizur Rahman
Author URI: http://azizur.com
License: GPL2

Copyright 2011  Azizur Rahman  (http://azizur.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/


add_filter('the_content', 'propack_internet_archive_video_resizer');

function propack_internet_archive_video_resizer($content) {

	// check if the content has a archive.org url
	preg_match('/(archive\.org)/', $content, $matches);
	if(!count($matches)) {return $content; }

	// check if the content has a archive.org video embed code
	preg_match('/(\.swf|\.mp4)/', $content, $matches);
	if(!count($matches)) {return $content; }

	if(count($matches)) {
		// replace the hight and width
		$pattern = array('/width="\d{3}"/','/height="\d{3}"/');
		$replacement = array('width=\"584\"','height=\"461\"');

		$content = preg_filter ( $pattern , $replacement , $content ) ;
	}

	return $content;
}