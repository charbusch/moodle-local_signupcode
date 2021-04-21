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
 * Signup code renderable.
 *
 * @package    local_signupcode
 * @author     CBusch
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_signupcode\output;

defined('MOODLE_INTERNAL') || die();

use renderable;
use renderer_base;
use templatable;

/**
 * Signup code renderable.
 *
 * @author    CBusch
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class error_code_page implements renderable, templatable {

    /**
     * Export the page data for the mustache template.
     *
     * @param renderer_base $output renderer to be used to render the page elements.
     * @return stdClass
     */
    public function export_for_template(renderer_base $output) {
        global $SITE, $CFG;

        $sitename = format_string($SITE->fullname);
        $supportname = $CFG->supportname;
        $supportemail = $CFG->supportemail;
        $config = get_config('local_signupcode');
        $signupcodeerror = format_text($config->signupcodeerror);

        $context = [
            'sitename' => $sitename,
            'supportname' => $supportname,
            'supportemail' => $supportemail,
            'signupcodeerror' => $signupcodeerror,
            'backlink' => new \moodle_url('/login/index.php')
        ];

        return $context;
    }
}
