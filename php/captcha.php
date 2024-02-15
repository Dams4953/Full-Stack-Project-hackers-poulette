<?php
require_once '../captcha/autoload.php';

if (isset($_POST['captcha-submit'])) {
    $recaptcha = new \ReCaptcha\ReCaptcha("6Lcaa3IpAAAAAHHYjaJv8QL5eomJYBFVShuVb8yc");

    $gRecaptchaResponse = $_POST['g-recaptcha-response'];

    $remoteIp = $_SERVER['REMOTE_ADDR'];

    $resp = $recaptcha->setExpectedHostname('projets.test')
        ->verify($gRecaptchaResponse, $remoteIp);
    if ($resp->isSuccess()) {
        echo "success";
    } else {
        $errors = $resp->getErrorCodes();
    }
}