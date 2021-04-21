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
 * Display page for signupcode error. Display support contact details.
 *
 * @package    local_signupcode
 * @author     CBusch
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once($CFG->libdir . '/authlib.php');

$authplugin = signup_is_enabled();

if (!$authplugin) {
    // Redirect user if signup is disabled.
    redirect(new moodle_url('/'), get_string('verifycodenotpossible', 'local_signupcode'));
}

$PAGE->set_context(context_system::instance());
$PAGE->set_url($CFG->wwwroot.'/local/signupcode/error_code.php');

if (isloggedin() and !isguestuser()) {
    // Prevent signing up when already logged in.
    redirect(new moodle_url('/'), get_string('cannotsignup', 'error', fullname($USER)));
}

    $iscode = cache::make('core', 'presignup')->get('local_signupcode_iscode');
if (!$iscode) {
    // Redirect when the signup session does not exists, code check has not been done.
    redirect(new moodle_url('/login/index.php'));
}

$PAGE->navbar->add(get_string('login'));
$PAGE->navbar->add(get_string('signupcodeincorrect', 'local_signupcode'));

$PAGE->set_pagelayout('login');
$PAGE->set_title(get_string('signupcodeincorrect', 'local_signupcode'));
$sitename = format_string($SITE->fullname);
$PAGE->set_heading($sitename);

$page = new \local_signupcode\output\error_code_page();

echo $OUTPUT->header();
echo $OUTPUT->render($page);
echo $OUTPUT->footer();

