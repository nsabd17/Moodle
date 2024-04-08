<?php

require_once('../../config.php');
require_once('classes/external/custom.php');

$server = new webservice_server($CFG);
$server->register_class(new webservice_custom_external());
$server->execute();

?>
