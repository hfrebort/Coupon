<?php
/**
 * Ajax request to show the preview of the image
 * returns the filename of the image
 */
$coupon_image_dir         = './images/';
$coupon_image_prefix      = 'GutscheinKuchlerhaus';
$coupon_image_version     = 'V2'; #other versions of the coupon image

$im = imagecreatefrompng($coupon_image_dir.$coupon_image_prefix.$coupon_image_version.$_REQUEST['use'] . '.png');

$text_color = imagecolorallocate($im, 0, 0, 0);
$font_file = './font.ttf';

if ( $_REQUEST['dedication'] != null ) {
    imagettftext($im, 12, 0, 260, 140, $text_color, $font_file, $_REQUEST['dedication']);
}

imagettftext($im, 12, 0, 220, 195, $text_color, $font_file, $_REQUEST['couponcode']);
imagettftext($im, 12, 0, 350, 195, $text_color, $font_file, $_REQUEST['couponamount'] . ',-- €');
imagettftext($im, 12, 0, 480, 195, $text_color, $font_file, $_REQUEST['orderdate']);

$filename = $coupon_image_dir.'tmp/' . date("Ymd") . rand(100, 999) . '.png';

imagepng($im, $filename);
imagedestroy($im);

echo $filename;
?>
