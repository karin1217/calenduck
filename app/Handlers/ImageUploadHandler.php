<?php
/**
 * Created by Calenduck TEAM.
 * User: karin
 * Created at: 2018 - 04 - 28
 * Time: 20 : 11 : 39
 */

namespace App\Handlers;

use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class ImageUploadHandler
{
    private static $instance;
    // 只允许以下后缀名的图片文件上传
    protected $allowed_ext = ["png", "jpg", "gif", 'jpeg'];

    public static function getInstance()
    {

        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function __construct()
    {

    }

    public function save($image, $folder, $prefix)
    {
        $imgManager = new ImageManager(array('driver' => 'imagick'));
        //dd($imgManager);

        // create Image from file
        $img = $imgManager->make($image);
        $imgThumb = $imgManager->make($image);

        if( $imgThumb->width() > $imgThumb->height() ) {
            // resize the image to a width of 300 and constrain aspect ratio (auto height)
            $imgThumb->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        } elseif( $imgThumb->width() < $imgThumb->height() ) {
            // resize the image to a width of 300 and constrain aspect ratio (auto height)
            $imgThumb->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
        }


        // 构建存储的文件夹规则，值如：uploads/images/avatars/201709/21/
        // 文件夹切割能让查找效率更高。
        $folder_name = $folder .'/'. date("Ym/d", time());

        // 文件具体存储的物理路径，`public_path()` 获取的是 `public` 文件夹的物理路径。
        // 值如：/home/vagrant/Code/larabbs/public/images/avatars/201709/21/
        $upload_path = public_path('images') . '/' . $folder_name;

        if (!file_exists($upload_path)) {
            // 如果上传的目标文件夹不存在，则创建文件夹，如果创建失败，则抛出异常。
            if(!mkdir($upload_path, 0777, true) ) {
                //$this->setErrorMsg('Upload directory does not exist');
                return false;
            }
        }

        // 获取文件的后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
        $extension = substr(strstr( $img->mime(), '/'),1);
        //$extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        // 如果上传的不是图片将终止操作
        if ( ! in_array($extension, $this->allowed_ext)) {
            return false;
        }

        // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID
        // 值如：1_1493521050_7BVc9v9ujP.png
        $filename = $prefix . '_' . time() . '_' . str_random(10) . '.' . $extension;

        // 将图片存到目标存储路径中
        try{
            $img->save($upload_path .'/'. $filename);
            $imgThumb->save($upload_path .'/'. $filename.'400x400.'.$extension);
            return [
                'url'   =>  config('app.url') . "/images/$folder_name/$filename",
                'path'  =>  "/images/$folder_name/$filename",
            ];

        }catch (\Exception $e){
            return false;
            //return $e->getMessage();
        }

    }
}