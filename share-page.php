<?php 
/**
*share-page.php
*@package cc-social-media-timeline
*/

/*
Plugin Name: CC Social Media Timeline
Plugin URI: http://codeycave.com/Plugins/cc-social-media-timeline
Description: A simple wordpress plugin to display social share page in any where on your website.
Author: Codycave Team
Author URI: http://codycave.com
License: GPLv2 or later
Tags: codycave, sidebar, facebook, twitter, facebook feed, twitter feed, feed, facebook timeline, timeline, twitter timeline.
Requires at least: 3.0.1
Text Domain: cc-social-media-timeline
*/
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


// CC Facebook Timeline Shortcode
function cc_facebook_timeline_shortcode($atts) {

	extract(shortcode_atts(array(
      	'page_id' 		=> 'codycaveltd',
      	'page_title' 	=> 'Cody Cave',
      	'small_header' 	=> 'false',
      	'cover' 		=> 'false',
 	), $atts));

    $value = '<div class="fb-page" data-href="https://www.facebook.com/'.$page_id.'/" 
    			data-tabs="timeline" data-small-header="'.$small_header.'" data-adapt-container-width="true" 
    			data-hide-cover="'.$cover.'" data-show-facepile="true">
    				<div class="fb-xfbml-parse-ignore">
    					<blockquote cite="https://www.facebook.com/'.$page_id.'/">
    						<a href="https://www.facebook.com/'.$page_id.'/">'.$page_title.'</a>
    					</blockquote>
    				</div>
    			</div>';

  return $value;

}
add_shortcode('cc_fb_timeline', 'cc_facebook_timeline_shortcode');

// Add Facebook Code on header
function cc_add_fb_code() {

	echo '<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=108065795969606";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, "script", "facebook-jssdk"));</script>';

}
add_action('wp_footer', 'cc_add_fb_code');


// CC Twitter Timeline Shortcode
function cc_twitter_timeline_shortcode($atts) {

	extract(shortcode_atts(array(
      	'page_id' 		=> 'robicse11127'
 	), $atts));

    $value = '<a class="twitter-timeline"  href="https://twitter.com/'.$page_id.'" 
    		data-widget-id="675272974128181248">Tweets by @'.$page_id.'</a>
            <script>
            	!function(d,s,id){
            		var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";
            		if(!d.getElementById(id)){
            			js=d.createElement(s);
            			js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
            			fjs.parentNode.insertBefore(js,fjs);
            		}}(document,"script","twitter-wjs");
            </script>';

  return $value;

}
add_shortcode('cc_twt_timeline', 'cc_twitter_timeline_shortcode');


// Activating shortcode for widget
add_filter('widget_text', 'do_shortcode');


