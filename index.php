<?php
/**
 * Simple php server based captcha using GD
 * https://github.com/pstimpel/phpcaptcha
 *
 * See config.php for configuration
 *
 */

session_start();



include(dirname(__FILE__).'/config.php');

include(dirname(__FILE__).'/php/functions.php');

checkConfig($phpcaptchaConfig);

$captchaChallenge = getRandomString($phpcaptchaConfig);

setSession($phpcaptchaConfig, $captchaChallenge);

renderImage($phpcaptchaConfig, $captchaChallenge);