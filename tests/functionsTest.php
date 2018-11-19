<?php
session_start();
use PHPUnit\Framework\TestCase;

require_once (__DIR__ . '/../config.php');
require_once (__DIR__ . '/../php/functions.php');

class functionsTest extends TestCase
{

    public function resetPresets() {
        global $phpcaptchaConfig;
    
        //do this to reenable the presets for the next checks...
        $phpcaptchaConfig = array(
            'stringLength' => 6,
            'charsToUse' => 'abcdefghkmnprstuvwxyz23456789',
            'strictLowerCase' => true,
            'bgcolor' => array('r' => 0, 'g' => 0, 'b' => 0),
            'textcolor' => array('r' => 255, 'g' => 255, 'b' => 255),
            'font' => 'Lato-Regular.ttf',
            'sessionName' => 'phpcaptcha',
            'size' => array('width' => 200, 'height' => 50),
            'fontsize' => 25,
            'numberOfLines' => 6,
            'thicknessOfLines' => 2,
            'linecolor' => array('r' => 128, 'g' => 128, 'b' => 128)
        );
    
        
    }
    
    public function test_ConfigDone()
    {
        global $phpcaptchaConfig;
    
        $this->resetPresets();
        
        $this->assertEquals(6, $phpcaptchaConfig['stringLength']);
    
        $this->assertEquals('abcdefghkmnprstuvwxyz23456789', $phpcaptchaConfig['charsToUse']);
    
        $this->assertEquals(true, $phpcaptchaConfig['strictLowerCase']);
    
        $this->assertEquals(array('r' => 0, 'g' => 0, 'b' => 0), $phpcaptchaConfig['bgcolor']);

        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 255), $phpcaptchaConfig['textcolor']);

        $this->assertEquals('Lato-Regular.ttf', $phpcaptchaConfig['font']);
    
        $this->assertEquals('phpcaptcha', $phpcaptchaConfig['sessionName']);
    
        $this->assertEquals(array('width' => 200, 'height' => 50), $phpcaptchaConfig['size']);
    
        $this->assertEquals(25, $phpcaptchaConfig['fontsize']);

        $this->assertEquals(6, $phpcaptchaConfig['numberOfLines']);
    
        $this->assertEquals(2, $phpcaptchaConfig['thicknessOfLines']);
    
        $this->assertEquals(array('r' => 128, 'g' => 128, 'b' => 128), $phpcaptchaConfig['linecolor']);
    
    }
    
    public function test_checkConfig() {
        global $phpcaptchaConfig;
    
        $this->resetPresets();
    
        $phpcaptchaConfig['stringLength']="a";
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(6, $phpcaptchaConfig['stringLength']);
    
        $phpcaptchaConfig['stringLength']="";
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(6, $phpcaptchaConfig['stringLength']);
    
        $phpcaptchaConfig['stringLength']=0;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(6, $phpcaptchaConfig['stringLength']);
    
        $phpcaptchaConfig['stringLength']=-1;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(6, $phpcaptchaConfig['stringLength']);
    
        $phpcaptchaConfig['stringLength']=2.356;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(2, $phpcaptchaConfig['stringLength']);
    
        $phpcaptchaConfig['stringLength']=5;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(5, $phpcaptchaConfig['stringLength']);
    
        $phpcaptchaConfig['charsToUse']='';
        checkConfig($phpcaptchaConfig);
        $this->assertEquals('abcdefghkmnprstuvwxyz23456789', $phpcaptchaConfig['charsToUse']);
    
        $phpcaptchaConfig['charsToUse']=7898;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals('abcdefghkmnprstuvwxyz23456789', $phpcaptchaConfig['charsToUse']);
    
        $phpcaptchaConfig['charsToUse']='abcdefhgijklmo';
        checkConfig($phpcaptchaConfig);
        $this->assertEquals('abcdefhgijklmo', $phpcaptchaConfig['charsToUse']);
    
        
        $phpcaptchaConfig['strictLowerCase']=7;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(true, $phpcaptchaConfig['strictLowerCase']);
    
        $phpcaptchaConfig['strictLowerCase']=false;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(false, $phpcaptchaConfig['strictLowerCase']);
    
        
        $phpcaptchaConfig['bgcolor']=1;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 0, 'g' => 0, 'b' => 0), $phpcaptchaConfig['bgcolor']);
    
        $phpcaptchaConfig['bgcolor']="abc";
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 0, 'g' => 0, 'b' => 0), $phpcaptchaConfig['bgcolor']);
    

        $phpcaptchaConfig['bgcolor']=array('r' => -1, 'g' => -1, 'b' => -1);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 0, 'g' => 0, 'b' => 0), $phpcaptchaConfig['bgcolor']);
    
        $phpcaptchaConfig['bgcolor']=array('r' => -1, 'g' => 255, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 0, 'g' => 0, 'b' => 0), $phpcaptchaConfig['bgcolor']);
    
        $phpcaptchaConfig['bgcolor']=array('r' => 255, 'g' => -1, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 0, 'g' => 0, 'b' => 0), $phpcaptchaConfig['bgcolor']);
    
        $phpcaptchaConfig['bgcolor']=array('r' => 255, 'g' => 255, 'b' => -1);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 0, 'g' => 0, 'b' => 0), $phpcaptchaConfig['bgcolor']);
    

        $phpcaptchaConfig['bgcolor']=array('r' => 256, 'g' => 256, 'b' => 256);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 0, 'g' => 0, 'b' => 0), $phpcaptchaConfig['bgcolor']);
    
        $phpcaptchaConfig['bgcolor']=array('r' => 256, 'g' => 255, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 0, 'g' => 0, 'b' => 0), $phpcaptchaConfig['bgcolor']);
    
        $phpcaptchaConfig['bgcolor']=array('r' => 255, 'g' => 256, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 0, 'g' => 0, 'b' => 0), $phpcaptchaConfig['bgcolor']);
    
        $phpcaptchaConfig['bgcolor']=array('r' => 255, 'g' => 255, 'b' => 256);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 0, 'g' => 0, 'b' => 0), $phpcaptchaConfig['bgcolor']);
    
    
        $phpcaptchaConfig['bgcolor']=array('r' => "a", 'g' => "a", 'b' => "a");
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 0, 'g' => 0, 'b' => 0), $phpcaptchaConfig['bgcolor']);
    
        $phpcaptchaConfig['bgcolor']=array('r' => "a", 'g' => 255, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 0, 'g' => 0, 'b' => 0), $phpcaptchaConfig['bgcolor']);
    
        $phpcaptchaConfig['bgcolor']=array('r' => 255, 'g' => "a", 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 0, 'g' => 0, 'b' => 0), $phpcaptchaConfig['bgcolor']);
    
        $phpcaptchaConfig['bgcolor']=array('r' => 255, 'g' => 255, 'b' => "a");
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 0, 'g' => 0, 'b' => 0), $phpcaptchaConfig['bgcolor']);
    
    
        $phpcaptchaConfig['bgcolor']=array('r' => "1.7", 'g' => "1.7", 'b' => "1.7");
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 2, 'g' => 2, 'b' => 2), $phpcaptchaConfig['bgcolor']);
    
        $phpcaptchaConfig['bgcolor']=array('r' => 1.7, 'g' => 255, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 2, 'g' => 255, 'b' => 255), $phpcaptchaConfig['bgcolor']);
    
        $phpcaptchaConfig['bgcolor']=array('r' => 255, 'g' => 1.7, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 2, 'b' => 255), $phpcaptchaConfig['bgcolor']);
    
        $phpcaptchaConfig['bgcolor']=array('r' => 255, 'g' => 255, 'b' => 1.7);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 2), $phpcaptchaConfig['bgcolor']);
    
    
    
    
        $phpcaptchaConfig['bgcolor']=array('r' => "1", 'g' => "2", 'b' => "3");
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 1, 'g' => 2, 'b' => 3), $phpcaptchaConfig['bgcolor']);
    
    
    
        $phpcaptchaConfig['textcolor']=1;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 255), $phpcaptchaConfig['textcolor']);
    
        $phpcaptchaConfig['textcolor']="abc";
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 255), $phpcaptchaConfig['textcolor']);
    
    
        $phpcaptchaConfig['textcolor']=array('r' => -1, 'g' => -1, 'b' => -1);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 255), $phpcaptchaConfig['textcolor']);
    
        $phpcaptchaConfig['textcolor']=array('r' => -1, 'g' => 255, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 255), $phpcaptchaConfig['textcolor']);
    
        $phpcaptchaConfig['textcolor']=array('r' => 255, 'g' => -1, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 255), $phpcaptchaConfig['textcolor']);
    
        $phpcaptchaConfig['textcolor']=array('r' => 255, 'g' => 255, 'b' => -1);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 255), $phpcaptchaConfig['textcolor']);
    
    
        $phpcaptchaConfig['textcolor']=array('r' => 256, 'g' => 256, 'b' => 256);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 255), $phpcaptchaConfig['textcolor']);
    
        $phpcaptchaConfig['textcolor']=array('r' => 256, 'g' => 255, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 255), $phpcaptchaConfig['textcolor']);
    
        $phpcaptchaConfig['textcolor']=array('r' => 255, 'g' => 256, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 255), $phpcaptchaConfig['textcolor']);
    
        $phpcaptchaConfig['textcolor']=array('r' => 255, 'g' => 255, 'b' => 256);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 255), $phpcaptchaConfig['textcolor']);
    
    
        $phpcaptchaConfig['textcolor']=array('r' => "a", 'g' => "a", 'b' => "a");
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 255), $phpcaptchaConfig['textcolor']);
    
        $phpcaptchaConfig['textcolor']=array('r' => "a", 'g' => 255, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 255), $phpcaptchaConfig['textcolor']);
    
        $phpcaptchaConfig['textcolor']=array('r' => 255, 'g' => "a", 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 255), $phpcaptchaConfig['textcolor']);
    
        $phpcaptchaConfig['textcolor']=array('r' => 255, 'g' => 255, 'b' => "a");
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 255), $phpcaptchaConfig['textcolor']);
    
    
        $phpcaptchaConfig['textcolor']=array('r' => "1.7", 'g' => "1.7", 'b' => "1.7");
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 2, 'g' => 2, 'b' => 2), $phpcaptchaConfig['textcolor']);
    
        $phpcaptchaConfig['textcolor']=array('r' => 1.7, 'g' => 255, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 2, 'g' => 255, 'b' => 255), $phpcaptchaConfig['textcolor']);
    
        $phpcaptchaConfig['textcolor']=array('r' => 255, 'g' => 1.7, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 2, 'b' => 255), $phpcaptchaConfig['textcolor']);
    
        $phpcaptchaConfig['textcolor']=array('r' => 255, 'g' => 255, 'b' => 1.7);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 2), $phpcaptchaConfig['textcolor']);
    
    
    
    
        $phpcaptchaConfig['textcolor']=array('r' => "1", 'g' => "2", 'b' => "3");
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 1, 'g' => 2, 'b' => 3), $phpcaptchaConfig['textcolor']);
    
        $phpcaptchaConfig['textcolor']=array('r' => "1", 'g' => "2", 'b' => "3");
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 1, 'g' => 2, 'b' => 3), $phpcaptchaConfig['textcolor']);
    
        
        //do not test font negative, since asstering an error would call "die()"
        checkConfig($phpcaptchaConfig);
        $this->assertEquals('Lato-Regular.ttf', $phpcaptchaConfig['font']);
    
        
        //do not test sessionname negative, since asstering an error would call "die()"
        checkConfig($phpcaptchaConfig);
        $this->assertEquals('phpcaptcha', $phpcaptchaConfig['sessionName']);
    
    
        $phpcaptchaConfig['size']='';
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('width' => 200, 'height' => 50), $phpcaptchaConfig['size']);
    
        $phpcaptchaConfig['size']='abc';
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('width' => 200, 'height' => 50), $phpcaptchaConfig['size']);
    
        $phpcaptchaConfig['size']=1.9;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('width' => 200, 'height' => 50), $phpcaptchaConfig['size']);

        
        $phpcaptchaConfig['size']=array('width' => '', 'height' => '');
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('width' => 200, 'height' => 50), $phpcaptchaConfig['size']);
    
    
        $phpcaptchaConfig['size']=array('width' => 1.9, 'height' => 7);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('width' => 200, 'height' => 50), $phpcaptchaConfig['size']);
    
        $phpcaptchaConfig['size']=array('width' => 7, 'height' => 1.9);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('width' => 200, 'height' => 50), $phpcaptchaConfig['size']);
    
        $phpcaptchaConfig['size']=array('width' => 7, 'height' => 'a');
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('width' => 200, 'height' => 50), $phpcaptchaConfig['size']);
    
        $phpcaptchaConfig['size']=array('width' => 'a', 'height' => 7);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('width' => 200, 'height' => 50), $phpcaptchaConfig['size']);
    
    
        $phpcaptchaConfig['size']=array('width' => 1.9, 'height' => 50);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('width' => 200, 'height' => 50), $phpcaptchaConfig['size']);
    
        $phpcaptchaConfig['size']=array('width' => 200, 'height' => 1.9);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('width' => 200, 'height' => 50), $phpcaptchaConfig['size']);
    
        $phpcaptchaConfig['size']=array('width' => 200, 'height' => 'a');
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('width' => 200, 'height' => 50), $phpcaptchaConfig['size']);
    
        $phpcaptchaConfig['size']=array('width' => 'a', 'height' => 50);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('width' => 200, 'height' => 50), $phpcaptchaConfig['size']);
    
    
        $phpcaptchaConfig['size']=array('width' => 101.9, 'height' => 50);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('width' => 102, 'height' => 50), $phpcaptchaConfig['size']);
    
        $phpcaptchaConfig['size']=array('width' => 200, 'height' => 100.9);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('width' => 200, 'height' => 101), $phpcaptchaConfig['size']);
        

        $phpcaptchaConfig['size']=array('width' => 500, 'height' => 100);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('width' => 500, 'height' => 100), $phpcaptchaConfig['size']);
    
        $phpcaptchaConfig['fontsize']='';
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(25, $phpcaptchaConfig['fontsize']);
    
        $phpcaptchaConfig['fontsize']=1;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(25, $phpcaptchaConfig['fontsize']);
    
        $phpcaptchaConfig['fontsize']=-1;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(25, $phpcaptchaConfig['fontsize']);
    
        $phpcaptchaConfig['fontsize']=25.8;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(26, $phpcaptchaConfig['fontsize']);
    
        $phpcaptchaConfig['fontsize']=27;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(27, $phpcaptchaConfig['fontsize']);
    
    
        $phpcaptchaConfig['numberOfLines']='';
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(6, $phpcaptchaConfig['numberOfLines']);
    
        $phpcaptchaConfig['numberOfLines']=1;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(1, $phpcaptchaConfig['numberOfLines']);
    
        $phpcaptchaConfig['numberOfLines']=-1;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(6, $phpcaptchaConfig['numberOfLines']);
    
        $phpcaptchaConfig['numberOfLines']=25.8;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(26, $phpcaptchaConfig['numberOfLines']);
    
        $phpcaptchaConfig['numberOfLines']=27;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(27, $phpcaptchaConfig['numberOfLines']);
    
    
        $phpcaptchaConfig['thicknessOfLines']='';
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(2, $phpcaptchaConfig['thicknessOfLines']);
    
        $phpcaptchaConfig['thicknessOfLines']=1;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(1, $phpcaptchaConfig['thicknessOfLines']);
    
        $phpcaptchaConfig['thicknessOfLines']=-1;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(2, $phpcaptchaConfig['thicknessOfLines']);
    
        $phpcaptchaConfig['thicknessOfLines']=25.8;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(26, $phpcaptchaConfig['thicknessOfLines']);
    
        $phpcaptchaConfig['thicknessOfLines']=27;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(27, $phpcaptchaConfig['thicknessOfLines']);
    
    
    
        $phpcaptchaConfig['linecolor']=1;
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 128, 'g' => 128, 'b' => 128), $phpcaptchaConfig['linecolor']);
    
        $phpcaptchaConfig['linecolor']="abc";
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 128, 'g' => 128, 'b' => 128), $phpcaptchaConfig['linecolor']);
    
    
        $phpcaptchaConfig['linecolor']=array('r' => -1, 'g' => -1, 'b' => -1);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 128, 'g' => 128, 'b' => 128), $phpcaptchaConfig['linecolor']);
    
        $phpcaptchaConfig['linecolor']=array('r' => -1, 'g' => 255, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 128, 'g' => 128, 'b' => 128), $phpcaptchaConfig['linecolor']);
    
        $phpcaptchaConfig['linecolor']=array('r' => 255, 'g' => -1, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 128, 'g' => 128, 'b' => 128), $phpcaptchaConfig['linecolor']);
    
        $phpcaptchaConfig['linecolor']=array('r' => 255, 'g' => 255, 'b' => -1);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 128, 'g' => 128, 'b' => 128), $phpcaptchaConfig['linecolor']);
    
    
        $phpcaptchaConfig['linecolor']=array('r' => 256, 'g' => 256, 'b' => 256);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 128, 'g' => 128, 'b' => 128), $phpcaptchaConfig['linecolor']);
    
        $phpcaptchaConfig['linecolor']=array('r' => 256, 'g' => 255, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 128, 'g' => 128, 'b' => 128), $phpcaptchaConfig['linecolor']);
    
        $phpcaptchaConfig['linecolor']=array('r' => 255, 'g' => 256, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 128, 'g' => 128, 'b' => 128), $phpcaptchaConfig['linecolor']);
    
        $phpcaptchaConfig['linecolor']=array('r' => 255, 'g' => 255, 'b' => 256);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 128, 'g' => 128, 'b' => 128), $phpcaptchaConfig['linecolor']);
    
    
        $phpcaptchaConfig['linecolor']=array('r' => "a", 'g' => "a", 'b' => "a");
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 128, 'g' => 128, 'b' => 128), $phpcaptchaConfig['linecolor']);
    
        $phpcaptchaConfig['linecolor']=array('r' => "a", 'g' => 255, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 128, 'g' => 128, 'b' => 128), $phpcaptchaConfig['linecolor']);
    
        $phpcaptchaConfig['linecolor']=array('r' => 255, 'g' => "a", 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 128, 'g' => 128, 'b' => 128), $phpcaptchaConfig['linecolor']);
    
        $phpcaptchaConfig['linecolor']=array('r' => 255, 'g' => 255, 'b' => "a");
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 128, 'g' => 128, 'b' => 128), $phpcaptchaConfig['linecolor']);
    
    
        $phpcaptchaConfig['linecolor']=array('r' => "1.7", 'g' => "1.7", 'b' => "1.7");
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 2, 'g' => 2, 'b' => 2), $phpcaptchaConfig['linecolor']);
    
        $phpcaptchaConfig['linecolor']=array('r' => 1.7, 'g' => 255, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 2, 'g' => 255, 'b' => 255), $phpcaptchaConfig['linecolor']);
    
        $phpcaptchaConfig['linecolor']=array('r' => 255, 'g' => 1.7, 'b' => 255);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 2, 'b' => 255), $phpcaptchaConfig['linecolor']);
    
        $phpcaptchaConfig['linecolor']=array('r' => 255, 'g' => 255, 'b' => 1.7);
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 255, 'g' => 255, 'b' => 2), $phpcaptchaConfig['linecolor']);


        $phpcaptchaConfig['linecolor']=array('r' => "1", 'g' => "2", 'b' => "3");
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 1, 'g' => 2, 'b' => 3), $phpcaptchaConfig['linecolor']);
    
        $phpcaptchaConfig['linecolor']=array('r' => "1", 'g' => "2", 'b' => "3");
        checkConfig($phpcaptchaConfig);
        $this->assertEquals(array('r' => 1, 'g' => 2, 'b' => 3), $phpcaptchaConfig['linecolor']);
    
    }

    public function test_getRandomString() {
        global $phpcaptchaConfig;
    
        $this->resetPresets();
    
        $string = getRandomString($phpcaptchaConfig);
        $this->assertEquals(6, strlen($string));

        $phpcaptchaConfig['stringLength'] = 12;
        $string = getRandomString($phpcaptchaConfig);
        $this->assertEquals(12, strlen($string));
    
        $this->resetPresets();
    
        $string = getRandomString($phpcaptchaConfig);
        $this->assertEquals(6, strlen($string));
    
    
    }
    
    function test_setSession() {
        
        global $phpcaptchaConfig;
        
        $this->resetPresets();
        
        setSession($phpcaptchaConfig, "someBasicString");
        $sessionvalue = $_SESSION[$phpcaptchaConfig['sessionName']];
        $this->assertEquals("someBasicString", $sessionvalue);
        
        
    }
}