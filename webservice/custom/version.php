<?php
/**
 * Version details.
 *
 * This file defines the version details for the custom REST API plugin.
 *
 * @package    webservice_custom
 */

defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2024040400; // The current plugin version (Date: YYYYMMDDXX).
$plugin->requires  = 2020110900; // Requires Moodle 3.10 or later.
$plugin->component = 'webservice_custom'; // Full name of the plugin (used for diagnostics).

// Release notes (optional).
$plugin->release   = '1.0.0';
$plugin->maturity  = MATURITY_STABLE;
