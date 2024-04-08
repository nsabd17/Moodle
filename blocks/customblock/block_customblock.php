<?php
// This is the PHP code for the customblock block plugin.

class block_customblock extends block_base {

    function init() {
        $this->title = get_string('pluginname', 'block_customblock'); // Display name for the block.
    }

    function instance_allow_multiple() {
        return true; // Allow multiple instances of the block on a page.
    }

    function has_config() {
        return true; // Indicates that the block has configuration settings.
    }

    function get_content() {
        global $CFG, $OUTPUT, $DB, $PAGE;

        $PAGE->requires->js('/blocks/customblock/js/jquery-3.7.1.min.js');
        $PAGE->requires->js('/blocks/customblock/js/main.js');

        if ($this->content !== null) {
            return $this->content;
        }

        // $this->content = new stdClass;

        // // Retrieve block settings (if needed)
        // $config = $this->config;

        // // Example: Displaying a custom message
        // $custom_message = '<div class="custom-block-message">Hello, this is a custom block!</div>';

        // // Example: Displaying a link
        // $link_text = 'Click here for more information';
        // $link_url = 'http://localhost/moodle_project/moodle/mod/page/view.php';
        // $link = html_writer::link($link_url, $link_text);

        // // Example: Displaying an image
        // $image_url = $CFG->wwwroot . '/blocks/customblock/images/custom_image.png';
        // $image_html = html_writer::empty_tag('img', array('src' => $image_url, 'alt' => 'Custom Image'));

        // // Combine all content
        // $content_html = $custom_message . '<br>' . $link . '<br>' . $image_html;

        // // Set content
        // $this->content->text = $content_html;
        // $this->content->footer = '';

        $sql = "SELECT * FROM mdl_course WHERE id != ?";
        $result = $DB->get_records_sql($sql, array(1));
        $records['data'] = array_values($result);

        $this->content->text = $OUTPUT->render_from_template('block_customblock/list', $records);

        return $this->content;
    }

    function specialization() {
        if (!empty($this->config->title)) {
            $this->title = $this->config->title;
        } else {
            $this->config->title = 'Custom Block';
        }
    }

    function instance_allow_config() {
        return true; // Allow instances of the block to be configured.
    }

    function instance_config_form($mform) {
        $mform->addElement('header', 'config_header', get_string('blocksettings', 'block'));

        // Example: Adding a text field for a setting
        $mform->addElement('text', 'config_text', get_string('text', 'block_customblock'));
        $mform->setDefault('config_text', $this->config->text);
        $mform->setType('config_text', PARAM_TEXT);

        // Add more elements as needed for additional settings
    }

    function instance_config_save($data, $nolongerused = false) {
        $config = $this->config;

        // Example: Saving a text field setting
        $config->text = $data->config_text;

        // Save additional settings as needed

        parent::instance_config_save($config);
    }
}
