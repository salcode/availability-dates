<?php
/*
 * Plugin Name: Availability Dates
 * Plugin URI: http://salferrarello.com/
 * Description: Shortcode [fe_availability_dates weekdaystart="monday" offset="2" offsetunit="weeks" startingafter="2017-03-15" date_format="l F j, Y"], will output "Monday March 14, 2017. [fe_availability_dates] will output the first Monday starting two weeks from today."
 * Version: 0.1.0
 * Author: Sal Ferrarello
 * Author URI: http://salferrarello.com/
 * Text Domain: availability-dates
 * Domain Path: /languages
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Add Shortcode
function fe_availability_dates_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'weekdaystart' => false,
			'offset' => 2,
			'offsetunit' => 'weeks',
			'startingafter' => '2000-01-01',
			'date_format' => get_option( 'date_format' ),
		),
		$atts
	);

	$now = current_time('timestamp');

	// determine available date based on offset
	$offset_str = $atts['offset'] . ' ' . $atts['offsetunit']; // e.g. '2 weeks'
	$available = strtotime( $offset_str, $now );

	// if startingafter_time is after current available, update available
	$startingafter_time = strtotime( $atts['startingafter'] ) + get_option( 'gmt_offset' ) * HOUR_IN_SECONDS;
	if ( $startingafter_time > $available ) {
		$available = $startingafter_time;
	}

	if ( $atts['weekdaystart'] ) {
		// a specific weekday start is set (e.g. "monday")

		$available_day_of_the_week = date( 'l', $available );
		if ( strtolower( $atts['weekdaystart'] ) !== date( 'l', $available ) ) {
			// the specific weekday start does not match the $available weekday

			// find the next weekday after $available
			$available = strtotime( 'next ' . $atts['weekdaystart'], $available );
		}

	}

	return date_i18n( $atts['date_format'], $available );
}
add_shortcode( 'fe_availability_dates', 'fe_availability_dates_shortcode' );
