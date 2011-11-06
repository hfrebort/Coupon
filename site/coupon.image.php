<?php

class CouponImage {

    public static function createImage($coupon) {
        $coupon_image_dir         = JPATH_COMPONENT_SITE.DS.'images/';
        $coupon_image_prefix      = 'GutscheinKuchlerhausHQ';
        $coupon_image_version     = 'V2'; #other versions of the coupon image

        $im = imagecreatefrompng($coupon_image_dir.$coupon_image_prefix.$coupon_image_version.$coupon->use . '.png');

        $text_color = imagecolorallocate($im, 0, 0, 0);
        $font_file = JPATH_COMPONENT_SITE.DS.'font.ttf';

        if ( $coupon->dedication != null ) {
            imagettftext($im, 20, 0, 540, 300, $text_color, $font_file, $coupon->dedication);
        }

        imagettftext($im, 20, 0, 455, 410, $text_color, $font_file, $coupon->couponcode);
        imagettftext($im, 20, 0, 715, 410, $text_color, $font_file, $coupon->couponamount . ',-- €');
        imagettftext($im, 20, 0, 985, 410, $text_color, $font_file, $coupon->orderdate);

        $filename = $coupon_image_dir.'tmp/' . $coupon->couponcode . '.png';

        imagepng($im, $filename);
        imagedestroy($im);

        return $filename;
    }
}
?>