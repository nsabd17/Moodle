<?php

require_once("$CFG->libdir/formslib.php");

// class simplehtml_form extends moodleform {
//     // Add elements to form.
//     public function definition() {
//         // A reference to the form is stored in $this->form.
//         // A common convention is to store it in a variable, such as `$mform`.
//         $mform = $this->_form; // Don't forget the underscore!

//         // Add elements to your form.
//         $mform->addElement('text', 'email', get_string('email'));

//         // Set type of element.
//         $mform->setType('email', PARAM_NOTAGS);

//         // Default value.
//         $mform->setDefault('email', 'Please enter email');
//     }

//     // Custom validation should be added here.
//     function validation($data, $files) {
//         return [];
//     }
// }

class simplehtml_form extends moodleform {
    //Add elements to form
    public function definition() {
        global $CFG;
       
        $mform = $this->_form; // Don't forget the underscore! 
        $conditionArray = array('maxlength'=>20, 'minlength'=>3);
        // $mform->addElement('text', 'email', get_string('email')); // Add elements to your form.
        // $mform->setType('email', PARAM_NOTAGS);                   // Set type of element.
        // // $mform->setDefault('email', 'Please enter email');        // Default value.
        // $mform->addRule('email', get_string('missingemail'), 'required', null, 'server');

        $mform->addElement('text', 'name', get_string('name'), $conditionArray); // Add elements to your form.
        $mform->setType('name', PARAM_NOTAGS);                   // Set type of element.
        // $mform->setDefault('name', 'Please enter name');        // Default value.
        $mform->addRule('name', 'Name is required', 'required', null, 'server');

        // $mform->addElement('filepicker', 'shree_file', get_string('file'), null,
        //            array('accepted_types' => '*'));
        $mform->addElement('filepicker', 'modelfile', get_string('file'), null, ['accepted_types' => '.zip']);

        $this->add_action_buttons();
    }
    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
} 