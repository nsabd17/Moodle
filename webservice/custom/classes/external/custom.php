<?php

require_once($CFG->libdir . '/externallib.php');

class webservice_custom_external extends external_api {

    public static function use_parameters() {
        return new external_function_parameters(
            array(
                // Define parameters here if needed
            )
        );
    }

    public static function use_returns() {
        return new external_single_structure(
            array(
                'message' => new external_value(PARAM_TEXT, 'Random message'),
            )
        );
    }

    public static function use($args) {
        $messages = array(
            'Hello there!',
            'Welcome to our service.',
            'Have a great day!',
            'Random message generated.',
            // Add more random messages here
        );

        // Get a random index
        $random_index = array_rand($messages);

        // Return the random message
        return array('message' => $messages[$random_index]);
    }

}

?>
