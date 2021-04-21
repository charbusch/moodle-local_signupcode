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
 *
 * @package    local_signupcode
 * @author     CBusch
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {

    $ADMIN->add('localplugins', new \admin_category('local_signupcode', get_string('pluginname', 'local_signupcode')));

    $settings = new admin_settingpage(
        'signupcode',
        get_string('pluginname', 'local_signupcode')
    );

    $settings->add(
        new admin_setting_heading(
            'local_signupcode_presignup',
            get_string('presignupconfig', 'local_signupcode'),
            get_string('presignupconfig_desc', 'local_signupcode')
        )
    );

    $settings->add(
        new admin_setting_configtext(
            'local_signupcode/signupcode',
            get_string('signupcode', 'local_signupcode'),
            get_string('signupcode_desc', 'local_signupcode'), '')
    );

    $settings->add(
        new admin_setting_confightmleditor(
            'local_signupcode/signupcodeinfo',
            get_string('signupcodeinfo', 'local_signupcode'),
            get_string('signupcodeinfo_desc', 'local_signupcode'), '')
    );

    $settings->add(
        new admin_setting_confightmleditor(
            'local_signupcode/signupcodeerror',
            get_string('signupcodeerror', 'local_signupcode'),
            get_string('signupcodeerror_desc', 'local_signupcode'), '')
    );

    $ADMIN->add('local_signupcode', $settings);
}
