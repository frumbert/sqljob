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
namespace local_sqljob\task;

/**
 * @package    local_sqljob
 * @copyright  2019 tim.stclair@gmail.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();
/*
 * local_sqljob is standard cron function
 */
class sqljob_task extends \core\task\scheduled_task {
    /**
     * Get a descriptive name for this task (shown to admins).
     *
     * @return string
     */
    public function get_name() {
        return get_string('pluginname', 'local_sqljob');
    }
    /**
     * Execute.
     */
    public function execute() {
	    global $DB, $CFG;
	    $jobs = trim(get_config('local_sqljob', 'sql'));
	    if (empty($jobs)) return;
	    $src = explode(';', $jobs);
	    $sqls = array_filter($src); // prune empty
	    foreach ($sqls as $sql) {
	        $DB->execute($sql);
	    }
    }//end of function execute()
}// End of class
