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
 * Signup Code renderable.
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

require_once($CFG->libdir.'/formslib.php');

/**
 * Signup Code renderable class.
 *
 * @author    CBusch
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class verify_code_page implements renderable, templatable {

    /** @var mform The form object */
    protected $form;

    /** @var string Error message */
    protected $errormessage;

    /**
     * Constructor
     *
     * @param mform $form The form object
     * @param string $errormessage The error message.
     */
    public function __construct($form, $errormessage = null) {
        $this->form = $form;
        $this->errormessage = $errormessage;
    }

    /**
     * Export the page data for the mustache template.
     *
     * @param renderer_base $output renderer to be used to render the page elements.
     * @return stdClass
     */
    public function export_for_template(renderer_base $output) {
        global $CFG, $SITE;

        $sitename = format_string($SITE->fullname);
        $formhtml = $this->form->render();
        $error = $this->errormessage;
        $config = get_config('local_signupcode');
        $signupcodeinfo = format_text($config->signupcodeinfo);

        $context = [
            'sitename' => $sitename,
            'formhtml' => $formhtml,
            'error'    => $error,
            'signupcodeinfo' => $signupcodeinfo
        ];

        return $context;
    }
}
