<?php
// This file is part of the Local Signupcode module for Moodle - http://moodle.org/
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
 * Local Signupcode core interaction API
 *
 * @package    local_signupcode
 * @author C Busch
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/************************************************************************
 * Called from core function pre_signup_requests. *
 * Requires entering code if configured.*
 ************************************************************************/
function local_signupcode_pre_signup_requests() {
    global $CFG;

    $config = get_config('local_signupcode');
    // Do nothing if not set for presignup code.
    if (empty($config->signupcode)) {
        return;
    }

    $iscode = cache::make('core', 'presignup')->get('local_signupcode_iscode');
    if (!$iscode || $iscode == 'no') {
        // Redirect to verify code before signup.
        redirect(new moodle_url('/local/signupcode/verify_code.php'));
    }

}
