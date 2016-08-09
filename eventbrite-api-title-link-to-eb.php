<?php
/*
Plugin Name: Eventbrite API - Title Link to Eventbrite
Plugin URI: https://github.com/Automattic/eventbrite-api-title-link-to-eb
Description: Rather than linking to the post single view, event titles will link to the event on eventbrite.com
Version: 1.0
Author: Automattic
Author URI: http://automattic.com
License: GPL v2 or newer <https://www.gnu.org/licenses/gpl.txt>
*/

/**
 * Filter the title link to return a URL direct to the event's eventbrite.com page.
 *
 * @param $link The original WordPress-generated title link
 * @param $event The WP_Post object of the current event
 * @return string escaped URL to the event's eventbrite.com page
 */
function eventbrite_api_title_link_to_eb( $link, $event ) {
	if ( eventbrite_is_event() ) {
		return esc_url( $event->url );
	} else {
		return $link;
	}
}
add_filter( 'post_link', 'eventbrite_api_title_link_to_eb', 11, 2 );
