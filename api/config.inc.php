<?php
/**
 * This is the FreeAgent PHP API configuration file.
 */

/*
 * The location of the FreeAgent RESTful API. Comment out for development / production needs as required.
 */
$cfg['api_url'] = 'https://api.sandbox.freeagent.com/v2'; /* FOR __DEVELOPMENT__ PURPOSES ONLY */
// $cfg['api_url'] = 'https://api.freeagent.com/v2'; /* FOR __PRODUCTION__ PURPOSES ONLY */


/*
 * The User Agent string to be passed to the FreeAgent API
 */
$cfg['user_agent'] = 'FreeAgent PHP API v0.1 (https://github.com/nickheppleston/freeagent-api-php)';

?>