<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package    local_sqljob
 * @copyright  2019 tim.stclair@gmail.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ( $hassiteconfig ){


	// Create the new settings page
	// - in a local plugin this is not defined as standard, so normal $settings->methods will throw an error as
	// $settings will be NULL
	$sqljob_settings = new admin_settingpage( 'local_sqljob', 'SQLJob Settings' );
 
	// Create 
	$ADMIN->add( 'localplugins', $sqljob_settings );
 
	// Add a setting field to the settings for this page
	$sqljob_settings->add( new admin_setting_configtextarea(
 
		// This is the reference you will use to your configuration
		'local_sqljob/sql',
 
		// This is the friendly title for the config, which will be displayed
		get_string('label','local_sqljob'),
 
		// This is helper text for this config field
		get_string('label_desc','local_sqljob'),
 
		// This is the default value
		'',
 
		// This is the type of Parameter this config is
		PARAM_RAW
 
	) );


}
