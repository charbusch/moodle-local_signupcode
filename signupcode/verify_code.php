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
 * Display page to enter signup code. Display support contact details.
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
$PAGE->set_url($CFG->wwwroot.'/local/signupcode/verify_code.php');

if (isloggedin() and !isguestuser()) {
    // Prevent signing up when already logged in.
    redirect(new moodle_url('/'), get_string('cannotsignup', 'error', fullname($USER)));
}

$PAGE->navbar->add(get_string('login'));
$PAGE->navbar->add(get_string('signupcodeverification', 'local_signupcode'));

$PAGE->set_pagelayout('login');
$PAGE->set_title(get_string('signupcodeverification', 'local_signupcode'));
$sitename = format_string($SITE->fullname);
$PAGE->set_heading($sitename);

$mform = new \local_signupcode\form\verify_code_form();
$page = new \local_signupcode\output\verify_code_page($mform);

if ($mform->is_cancelled()) {
    redirect(new moodle_url('/login/index.php'));
} else if ($data = $mform->get_data()) {
    $iscode = \local_signupcode\verify_code::is_code($data->code);
        cache::make('core', 'presignup')->set('local_signupcode_iscode', $iscode);
    if ($iscode == 'yes') {
        redirect(new moodle_url('/login/signup.php'));
    } else {
        redirect(new moodle_url('/local/signupcode/error_code.php'));
    }

} else {
    echo $OUTPUT->header();
    echo $OUTPUT->render($page);
    echo $OUTPUT->footer();
}