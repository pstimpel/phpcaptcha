# PHP Captcha

Since Google and others are abusing Captchas to be tracking utilities, it was time to write a server based Captcha. Since the data are processed on your webserver only, this Captcha is GDPR safe. PHP Captcha does not forward any data away from your server. You do not need to mention it in your privacy policy. But of course I would like it very much, if you could add a reference to this project.

## License

PHP Captcha is available under the terms of GPLv3. See [License](LICENSE) for more information.

## Requirements

PHP Captcha is using GD to generate images. PHP5 and PHP7 are supported.

## How to install

1. Download the latest release here: https://github.com/pstimpel/phpcaptcha/releases
2. Unpack the content of the zip into a folder on your webserver, let's say to `modules` in your webroot
3. Use your webbrowser and browse to `<Your webserver>/modules/phpcaptcha-<version>/index.php`
4. If 3. works fine, you could configure PHP Captcha by editing `<Your webroot>/modules/phpcaptcha-<version>/config.php`

## Configuration options

**_Do not attempt a change of your configuration until you finished step 3 of the installation with success! _**

**stringLength**: How many characters to use for the captcha, default is 6
    
**charsToUse** Which characters to choose from, default is `abcdefghkmnprstuvwxyz23456789`, it might be a good idea to skip characters like I and 1 for avoiding confusion

**strictLowerCase**: Limit captcha to lower case, default is `true`, if there are no upper case characters in your `charsToUse`, this option is useless 

**bgcolor.r**: Red value of background color, default is 0, valid from 0 to 255 

**bgcolor.g**: Green value of background color, default is 0, valid from 0 to 255 

**bgcolor.b**: Blue value of background color, default is 0, valid from 0 to 255 

**textcolor.r**: Red value of text color, default is 255, valid from 0 to 255 

**textcolor.g**: Green value of text color, default is 255, valid from 0 to 255 

**textcolor.b**: Blue value of text color, default is 255, valid from 0 to 255 

**font**: Name of TTF font to use, default is 'Lato-Regular.ttf', but you can use any TTF font you like.

*Font **Lato** is GPL, OFL and Public Domain by Łukasz Dziedzic, can be found at <a href="https://www.1001freefonts.com/lato.font" target="_blank">https://www.1001freefonts.com/lato.font</a>*
    
**sessionName**: The name of the session var PHP Captcha is using to store the text from the captcha, default is `phpcaptcha`, which is accessible in `$_SESSION['phpcaptcha']`
    
**size.width**: The width of the generated image, default is 200

**size.height**: The height of the generated image, default is 50

**fontsize**: The font size to be used, default is 25

**numberOfLines**: The number of lines to draw across the image for creating some small confusion to OCR, default is 6

**thicknessOfLines**: The thickness per line, default is 2

**linecolor.r**: Red value of line color, default is 128, valid from 0 to 255 

**linecolor.g**: Green value of line color, default is 128, valid from 0 to 255 

**linecolor.b**: Blue value of line color, default is 128, valid from 0 to 255 


## How to use it?

There is a [Demo](demo/) available, if you unzipped the package at your webserver. Just navigate to the demo subfolder using your webbrowser. If GD is missing, PHP Captcha will detect it and throw an error. If you misconfigured PHP Captcha, it will try to run on defaults, or throw an error depending on the type of your failure.

If it was installed and configured well, just reference `<Your webserver>/modules/phpcaptcha/index.php` as image in your html form.

Example: 

    <img src="https://yourserver/modules/phpcaptcha-<version>/index.php" />

You will have to add a textfield to your form as well, so the user can type in what he/she/it sees on the captcha image. Let's do it like this:

    <input type="text" name="captchatext" value="">

Now, make a check where you evaluate the form data. A simple

    if($_POST['captchatext'] == $_SESSION['phpcaptcha']) {
        //Captcha solution OK
    } else {
        //Captcha solution wrong
    }


will do. Of course you should run checks like `isset()` on both variables before...

**However, you are ready to go, congrats!**
