<?php

    function resizeAndCrop($source_image,$destination,$tn_w,$tn_h,$quality = 99){
        if($tn_h == null && $tn_w == null){
            die('No dimension given');
        }
        
        // The getimagesize functions provides an "imagetype" string contstant, which can be passed to the image_type_to_mime_type function for the corresponding mime type
        $info = getimagesize($source_image);
        $imgtype = image_type_to_mime_type($info[2]);
        $source = getSource($source_image, $imgtype);
        
        // Now, we can determine the dimensions of the provided image, and calculate the width/height ratio
        $src_w = imagesx($source);
        $src_h = imagesy($source);
        
        if($src_h > $tn_h || $src_w > $tn_w){
            $src_ratio = $src_w/$src_h;
            // Now we can use the power of math to determine whether the image needs to be cropped to fit the new dimensions, and if so then whether it should be cropped vertically or horizontally. We're just going to crop from the center to keep this simple.
            if ($tn_h == null || $tn_w/$tn_h > $src_ratio) {
                $new_h = $tn_w/$src_ratio;
                $new_w = $tn_w;
            } else if($tn_w == null || $tn_w/$tn_h <= $src_ratio) {
                $new_w = $tn_h*$src_ratio;
                $new_h = $tn_h;
            } else {
                die('Case not handled');
            }
            $final = resizeAndCropTrt($source,$tn_w,$tn_h,$new_w,$new_h,$src_w,$src_h);
        }else{
            $final = $source;
        }
        getImage($final,$destination,$quality,$imgtype);
    }
    
    function getSource($source_image, $imgtype){
        // Then the mime type can be used to call the correct function to generate an image resource from the provided image
        switch ($imgtype) {
            case 'image/jpeg':
                return imagecreatefromjpeg($source_image);
            case 'image/gif':
                return imagecreatefromgif($source_image);
            case 'image/png':
                return imagecreatefrompng($source_image);
            default:
                die('Invalid image type.');
        }
    }
    
    function resizeAndCropTrt($source,$tn_w,$tn_h,$new_w,$new_h,$src_w,$src_h){
        $x_mid = $new_w/2;
        $y_mid = $new_h/2;
        // Now actually apply the crop and resize!
        $newpic = imagecreatetruecolor(floor($new_w), floor($new_h));
        imagealphablending($newpic, false);
        imagesavealpha($newpic,true);
        imagecopyresampled($newpic, $source, 0, 0, 0, 0, $new_w, $new_h, $src_w, $src_h);
        if($tn_h != null && $tn_w != null){
           $final = imagecreatetruecolor($tn_w, $tn_h);
           imagealphablending($final, false);
           imagesavealpha($final,true);
           imagecopyresampled($final, $newpic, 0, 0, ($x_mid-($tn_w/2)), ($y_mid-($tn_h/2)), $tn_w, $tn_h, $tn_w, $tn_h);   
        }else{
            $final = $newpic;
        }
        return $final;
    }
    
    function getImage($final,$destination,$quality,$imgtype){
        switch ($imgtype) {
            case 'image/jpeg':
                return imagejpeg($final,$destination,$quality);
            case 'image/gif':
                return imagegif($final,$destination,$quality);
            case 'image/png':
                if($quality>90) $quality = 90;
                return imagepng($final,$destination,$quality/10);
            default:
                die('Invalid image type.');
        }
    }

