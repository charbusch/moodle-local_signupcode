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
 * Contains helper class for Signup Code.
 *
 * @package    local_signupcode
 * @author     CBusch
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_signupcode;

defined('MOODLE_INTERNAL') || die();

/**
 * Helper class for Signup Code.
 *
 * @author C Busch
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class verify_code {


    /**
     * Checks when a user has entered code.
     *
     * @param int $age
     * @return bool
     */
    public static function is_code($code) {
        global $CFG;

        $config = get_config('local_signupcode');
        $codeconfig = $config->signupcode;
            return $code == $codeconfig ? 'yes' : 'no';
    }

}
