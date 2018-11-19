<?php


/**
 * @param $phpcaptchaConfig
 */
function checkConfig(&$phpcaptchaConfig) {
    
    if(!isset($phpcaptchaConfig['stringLength']) ||
        !is_numeric($phpcaptchaConfig['stringLength']) ||
        $phpcaptchaConfig['stringLength'] < 1
    ) {
    
        $phpcaptchaConfig['stringLength'] = 6;
    
    } else {
    
        $phpcaptchaConfig['stringLength'] = round($phpcaptchaConfig['stringLength'],0);
        
    }
    
    if(!isset($phpcaptchaConfig['charsToUse']) || strlen($phpcaptchaConfig['charsToUse']) < 10) {
    
        $phpcaptchaConfig['charsToUse'] = 'abcdefghkmnprstuvwxyz23456789';
    
    }
    
    if(!isset($phpcaptchaConfig['strictLowerCase']) || !is_bool($phpcaptchaConfig['strictLowerCase'])) {
    
        $phpcaptchaConfig['strictLowerCase'] = true;
    
    }
    
    if(!isset($phpcaptchaConfig['bgcolor']) ||
        !isset($phpcaptchaConfig['bgcolor']['r']) ||
        !isset($phpcaptchaConfig['bgcolor']['g']) ||
        !isset($phpcaptchaConfig['bgcolor']['b']) ||
        !is_numeric($phpcaptchaConfig['bgcolor']['r']) ||
        !is_numeric($phpcaptchaConfig['bgcolor']['g']) ||
        !is_numeric($phpcaptchaConfig['bgcolor']['b']) ||
        $phpcaptchaConfig['bgcolor']['r'] < 0 ||
        $phpcaptchaConfig['bgcolor']['r'] > 255 ||
        $phpcaptchaConfig['bgcolor']['g'] < 0 ||
        $phpcaptchaConfig['bgcolor']['g'] > 255 ||
        $phpcaptchaConfig['bgcolor']['b'] < 0 ||
        $phpcaptchaConfig['bgcolor']['b'] > 255
    ) {
    
        $phpcaptchaConfig['bgcolor'] = array('r' => 0, 'g' => 0, 'b' => 0);
    
    } else {

        $phpcaptchaConfig['bgcolor']['r'] = round($phpcaptchaConfig['bgcolor']['r'],0);
        $phpcaptchaConfig['bgcolor']['g'] = round($phpcaptchaConfig['bgcolor']['g'],0);
        $phpcaptchaConfig['bgcolor']['b'] = round($phpcaptchaConfig['bgcolor']['b'],0);
    
    }
    
    if(!isset($phpcaptchaConfig['textcolor']) ||
        !isset($phpcaptchaConfig['textcolor']['r']) ||
        !isset($phpcaptchaConfig['textcolor']['g']) ||
        !isset($phpcaptchaConfig['textcolor']['b']) ||
        !is_numeric($phpcaptchaConfig['textcolor']['r']) ||
        !is_numeric($phpcaptchaConfig['textcolor']['g']) ||
        !is_numeric($phpcaptchaConfig['textcolor']['b']) ||
        $phpcaptchaConfig['textcolor']['r'] < 0 ||
        $phpcaptchaConfig['textcolor']['r'] > 255 ||
        $phpcaptchaConfig['textcolor']['g'] < 0 ||
        $phpcaptchaConfig['textcolor']['g'] > 255 ||
        $phpcaptchaConfig['textcolor']['b'] < 0 ||
        $phpcaptchaConfig['textcolor']['b'] > 255
    ) {
    
        $phpcaptchaConfig['textcolor'] = array('r' => 255, 'g' => 255, 'b' => 255);
    
    } else {

        $phpcaptchaConfig['textcolor']['r'] = round($phpcaptchaConfig['textcolor']['r'],0);
        $phpcaptchaConfig['textcolor']['g'] = round($phpcaptchaConfig['textcolor']['g'],0);
        $phpcaptchaConfig['textcolor']['b'] = round($phpcaptchaConfig['textcolor']['b'],0);
    
    }
    
    if(!isset($phpcaptchaConfig['linecolor']) ||
        !isset($phpcaptchaConfig['linecolor']['r']) ||
        !isset($phpcaptchaConfig['linecolor']['g']) ||
        !isset($phpcaptchaConfig['linecolor']['b']) ||
        !is_numeric($phpcaptchaConfig['linecolor']['r']) ||
        !is_numeric($phpcaptchaConfig['linecolor']['g']) ||
        !is_numeric($phpcaptchaConfig['linecolor']['b']) ||
        $phpcaptchaConfig['linecolor']['r'] < 0 ||
        $phpcaptchaConfig['linecolor']['r'] > 255 ||
        $phpcaptchaConfig['linecolor']['g'] < 0 ||
        $phpcaptchaConfig['linecolor']['g'] > 255 ||
        $phpcaptchaConfig['linecolor']['b'] < 0 ||
        $phpcaptchaConfig['linecolor']['b'] > 255
    ) {
        
        $phpcaptchaConfig['linecolor'] = array('r' => 128, 'g' => 128, 'b' => 128);
        
    } else {

        $phpcaptchaConfig['linecolor']['r'] = round($phpcaptchaConfig['linecolor']['r'],0);
        $phpcaptchaConfig['linecolor']['g'] = round($phpcaptchaConfig['linecolor']['g'],0);
        $phpcaptchaConfig['linecolor']['b'] = round($phpcaptchaConfig['linecolor']['b'],0);
    
    }
    
    if(!isset($phpcaptchaConfig['font']) ||
        !is_file(dirname(__FILE__).'/../fonts/'.$phpcaptchaConfig['font'])
    ) {
    
        die('tried to access font file, but was not accessible in '.dirname(__FILE__).'/../fonts/');
    
    }

    if(!isset($phpcaptchaConfig['sessionName']) || strlen($phpcaptchaConfig['sessionName']) < 3) {
    
        die('please set a valid session name, at least 3 characters long');
    
    }
    
    if(!isset($phpcaptchaConfig['size']) ||
        !isset($phpcaptchaConfig['size']['width']) ||
        !isset($phpcaptchaConfig['size']['height']) ||
        !is_numeric($phpcaptchaConfig['size']['width']) ||
        !is_numeric($phpcaptchaConfig['size']['height']) ||
        $phpcaptchaConfig['size']['width'] < 20 ||
        $phpcaptchaConfig['size']['height'] < 5
    ) {
    
        $phpcaptchaConfig['size'] = array('width' => 200, 'height' => 50);
    
    } else {
        $phpcaptchaConfig['size']['width'] = round($phpcaptchaConfig['size']['width'],0);
        $phpcaptchaConfig['size']['height'] = round($phpcaptchaConfig['size']['height'],0);
    }
   
    if(!isset($phpcaptchaConfig['fontsize']) ||
        !is_numeric($phpcaptchaConfig['fontsize']) ||
        $phpcaptchaConfig['fontsize'] < 5) {
            $phpcaptchaConfig['fontsize'] = 25;
    } else {
        $phpcaptchaConfig['fontsize'] = round($phpcaptchaConfig['fontsize'], 0);
    }
    
    if(!isset($phpcaptchaConfig['numberOfLines']) || !is_numeric($phpcaptchaConfig['numberOfLines'])
        || $phpcaptchaConfig['numberOfLines'] < 0) {
        $phpcaptchaConfig['numberOfLines'] = 6;
    } else {
        $phpcaptchaConfig['numberOfLines'] = round($phpcaptchaConfig['numberOfLines'],0);
    }
    
    if(!isset($phpcaptchaConfig['thicknessOfLines']) || !is_numeric($phpcaptchaConfig['thicknessOfLines'])
        || $phpcaptchaConfig['thicknessOfLines'] < 0) {
        $phpcaptchaConfig['thicknessOfLines'] = 2;
    } else {
        $phpcaptchaConfig['thicknessOfLines'] = round($phpcaptchaConfig['thicknessOfLines'],0);
    }
    
    try {
    
        if(!function_exists('gd_info')) {
    
            die('Seems GD is not installed on this machine');
            
        }
        
    } catch (Exception $e) {
        
        die('Seems GD is not installed on this machine');
    
    }
}


/**
 * @param $phpcaptchaConfig
 *
 * @return string
 */
function getRandomString($phpcaptchaConfig) {
    
    $result = '';
    
    if($phpcaptchaConfig['strictLowerCase'] == true) {
        $characaters = strtolower($phpcaptchaConfig['charsToUse']);
    } else {
        $characaters = $phpcaptchaConfig['charsToUse'];
    }
    
    for($i=0;$i < $phpcaptchaConfig['stringLength']; $i++) {
        
        $selectedChar = rand(1, strlen($characaters));
        
        $result = $result . substr($characaters, $selectedChar - 1, 1);
        
    }


    return $result;
}


/**
 * @param $phpcaptchaConfig
 * @param $captchaChallenge
 */
function setSession($phpcaptchaConfig, $captchaChallenge) {
    
    $_SESSION[$phpcaptchaConfig['sessionName']] = $captchaChallenge;
    
}


/**
 * @param $phpcaptchaConfig
 * @param $captchaChallenge
 */
function renderImage($phpcaptchaConfig, $captchaChallenge) {
    
    header("Content-type: image/png");
    
    $spacedText = '';
    for($i=0; $i < strlen($captchaChallenge); $i++) {
        
        $spacedText = $spacedText . substr($captchaChallenge, $i, 1).' ';
        
    }
    $spacedText = substr($spacedText, 0, strlen($spacedText) - 1);
    
    $fontangle = "0";
    $font = dirname(__FILE__).'/../fonts/'.$phpcaptchaConfig['font'];
    
    $im = imagecreate($phpcaptchaConfig['size']['width'], $phpcaptchaConfig['size']['height']);
    
    $bgcolor = imagecolorallocate($im,
        $phpcaptchaConfig['bgcolor']['r'],
        $phpcaptchaConfig['bgcolor']['g'],
        $phpcaptchaConfig['bgcolor']['b']);
    
    imagefilledrectangle($im, 0, 0,
        $phpcaptchaConfig['size']['width'], $phpcaptchaConfig['size']['height'], $bgcolor);


    $fontcolor = imagecolorallocate($im,
        $phpcaptchaConfig['textcolor']['r'],
        $phpcaptchaConfig['textcolor']['g'],
        $phpcaptchaConfig['textcolor']['b']);
    
    $box = @imageTTFBbox($phpcaptchaConfig['fontsize'], $fontangle, $font, $spacedText);
    
    $textwidth = abs($box[4] - $box[0]);
    
    $textheight = abs($box[5] - $box[1]);
    
    $xcord = ($phpcaptchaConfig['size']['width'] / 2) - ($textwidth / 2) - 2;
    
    $ycord = ($phpcaptchaConfig['size']['height'] / 2) + ($textheight / 2);
    
    imagettftext($im, $phpcaptchaConfig['fontsize'], 0, $xcord, $ycord, $fontcolor, $font, $spacedText);
    
    if($phpcaptchaConfig['numberOfLines']>0) {
        
        $linecolor = imagecolorallocate($im,
            $phpcaptchaConfig['linecolor']['r'],
            $phpcaptchaConfig['linecolor']['g'],
            $phpcaptchaConfig['linecolor']['b']);
    
        for($i=1;$i<=$phpcaptchaConfig['numberOfLines'];$i++) {
            
            $x1 = rand(0,$phpcaptchaConfig['size']['width']);
            $y1 = rand(0,$phpcaptchaConfig['size']['height']);
    
            $x2 = rand(0,$phpcaptchaConfig['size']['width']);
            $y2 = rand(0,$phpcaptchaConfig['size']['height']);
    
            for($j=0;$j<$phpcaptchaConfig['thicknessOfLines'];$j++) {
    
                imageline($im, $x1, $y1 + $j,
                    $x2,
                    $y2 + $j,
                    $linecolor);
                
                
            }
        }
    }
    
    imagepng($im);
    
    imagedestroy($im);
    exit;
    
    
}
