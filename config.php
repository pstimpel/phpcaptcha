<?php

$phpcaptchaConfig = array(
    
    'stringLength' => 6, //how many characters to use
    
    'charsToUse' => 'abcdefghkmnprstuvwxyz23456789', //which characters to use, avoid o and 0 as example
    
    'strictLowerCase' => true, //use lower case only
    
    'bgcolor' => array('r' => 0, 'g' => 0, 'b' => 0), //background color of image; values or r, g or b can be
    //from 0 to 255 each
    
    'textcolor' => array('r' => 255, 'g' => 255, 'b' => 255), //text color of image; values or r, g or b can be
    //from 0 to 255 each
    
    'font' => 'Lato-Regular.ttf', //reference to used font in subfolder 'fonts'
    
    'sessionName' => 'phpcaptcha', //where to store the current captcha data
    
    'size' => array('width' => 200, 'height' => 50), //dimensions of returned graphics
    
    'fontsize' => 25, // size of font
    
    'numberOfLines' => 6, //numbers of lines to draw for adding some confusion to the image

    'thicknessOfLines' => 2, //thickness of lines to draw for adding some confusion to the image, in px

    'linecolor' => array('r' => 128, 'g' => 128, 'b' => 128) //text color of lines across image; values or r, g or b
                                                            // can be from 0 to 255 each

);
