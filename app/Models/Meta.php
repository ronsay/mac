<?php
namespace App\Models;

use PaginateRoute;

class Meta {
    private $appName;
    private $email;
    private $title;
    private $description;
    private $robots;
    private $tags;
    private $url;
    private $twitter;
    private $og;
    
    const DEFAULTIMG = 'img/meta.png';
    
    public function __construct($title, $description, $robots, $tags, $url, $images, $ogType) {
        $this->appName = 'MAC Onsay'; 
        $this->email = 'maconsay@gmail.com'; 
        $this->title = ($title != null) ? $title : '';
        $this->description = ($description != null) ? $description : '';
        $this->robots = ($robots != null) ? $robots : false;
        $this->tags = ($tags != null) ? $tags : array();
        $this->url = self::manageUrl($url);
        $this->twitter = self::setTwitter($images);
        $this->og = self::setOg($ogType, $images, ($title != null) ? $title : '');
    }
    
    private static function setTwitter($images) {
        return array(
            "card" => 'summary_large_image',
            "image" => ($images != null && isset($images[0]))? url('/').'/'.$images[0]['image'] : url('/').self::DEFAULTIMG
        );
    }
    
    private static function setOg($type, $images, $defTitle) {
        $arrayImages = array();
        
        if($images != null){
            foreach ($images as $image) {
                if($image != null){
                    $arrayImages = self::fillArrayImages($arrayImages, $image);
                }
            }
        }else{
            $arrayImages = self::fillArrayImages($arrayImages, self::DEFAULTIMG, $defTitle);
        }
        
        return array(
            "type" => ($type != null) ? $type : 'website',
            "images" => $arrayImages
        );
    }
    
    private static function fillArrayImages($arrayImages, $image){
        $imgRes['url'] = url('/').'/'.$image['image'];
        $imgRes['type'] = self::getImageType($image['image']);
        $imgRes['title'] = $image['title'];
        array_push($arrayImages, $imgRes);
        return $arrayImages;
    }
    
    private static function getImageType($image){
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        switch($ext){
            case "jpg" : 
                return "image/jpeg";
            case "jpeg" : 
                return "image/jpeg";
            case "png" : 
                return "image/png";
            default : 
                return "image";
        }
    }
    
    private static function manageUrl($url){
        return url('/').'/'.(($url != null) ? $url : '');
    }
    
    public function getAppName() {
        return $this->appName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getRobots() {
        return $this->robots;
    }

    public function getTags() {
        return $this->tags;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getTwitter() {
        return $this->twitter;
    }

    public function getOg() {
        return $this->og;
    }
}
