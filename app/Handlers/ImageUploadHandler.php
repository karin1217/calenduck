<?php
/**
 * Created by Calenduck TEAM.
 * User: karin
 * Created at: 2018 - 04 - 28
 * Time: 20 : 11 : 39
 */

namespace App\Handlers;

/**
class ImageUploadHandler
{
    // 只允许以下后缀名的图片文件上传
    protected $allowed_ext = ["png", "jpg", "gif", 'jpeg'];

    public function save($file, $folder, $file_prefix)
    {
        // 构建存储的文件夹规则，值如：uploads/images/avatars/201709/21/
        // 文件夹切割能让查找效率更高。
        $folder_name = "uploads/images/$folder/" . date("Ym/d", time());

        // 文件具体存储的物理路径，`public_path()` 获取的是 `public` 文件夹的物理路径。
        // 值如：/home/vagrant/Code/larabbs/public/uploads/images/avatars/201709/21/
        $upload_path = public_path() . '/' . $folder_name;

        // 获取文件的后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID
        // 值如：1_1493521050_7BVc9v9ujP.png
        $filename = $file_prefix . '_' . time() . '_' . str_random(10) . '.' . $extension;

        // 如果上传的不是图片将终止操作
        if ( ! in_array($extension, $this->allowed_ext)) {
            return false;
        }

        // 将图片移动到我们的目标存储路径中
        $file->move($upload_path, $filename);

        return [
            'path' => config('app.url') . "/$folder_name/$filename"
        ];
    }
}
  */

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Exception;

/**
 * Simple Ajax Uploader
 * Version 2.5.5
 * https://github.com/LPology/Simple-Ajax-Uploader
 *
 * Copyright 2012-2016 LPology, LLC
 * Released under the MIT license
 *
 * View the documentation for an example of how to use this class.
 */

class ImageUploadHandler {
    private $fileName;                    // Filename of the uploaded file
    private $fileSize;                    // Size of uploaded file in bytes
    private $fileExtension;               // File extension of uploaded file
    private $fileNameWithoutExt;
    private $mimeType;
    private $savedFile;                   // Path to newly uploaded file (after upload completed)
    private $errorMsg;                    // Error message if handleUpload() returns false (use getErrorMsg() to retrieve)
    private $isXhr;
    public $uploadDir;                    // File upload directory (include trailing slash)
    public $allowedExtensions;            // Array of permitted file extensions
    public $sizeLimit = 10485760;         // Max file upload size in bytes (default 10MB)
    public $newFileName;                  // Optionally save uploaded files with a new name by setting this
    public $corsInputName = 'XHR_CORS_TARGETORIGIN';
    public $uploadName = 'uploadfile';
    public $minImgWidth = 199;
    public $minImgHeight = 199;

    /**
     * @var ImageUploadHandler reference to imageUpload instance
     */
    private static $instance;

    /**
     * 通过延迟加载（用到时才加载）获取实例
     *
     * @return self
     */
    public static function getInstance($uploadName = null, $originalFileName = null, $imgWidth = null, $imgHeight = null)
    {
        if (null === static::$instance) {
            static::$instance = new static($uploadName, $originalFileName, $imgWidth, $imgHeight);
        }

        return static::$instance;
    }

    function __construct($uploadName = null, $originalFileName = null, $imgWidth = null, $imgHeight = null) {

        $errFlag = false;

        if ($uploadName !== null) {
            $this->uploadName = $uploadName;
        }

        if (isset($_FILES[$this->uploadName])) {
            $this->isXhr = false;

            if ($_FILES[$this->uploadName]['error'] === UPLOAD_ERR_OK) {
                $this->fileName = $_FILES[$this->uploadName]['name'];
                $this->fileSize = $_FILES[$this->uploadName]['size'];



                //dd($_FILES);



            } else {
                $this->setErrorMsg($this->errorCodeToMsg($_FILES[$this->uploadName]['error']));
            }

            

        } elseif (isset($_SERVER['HTTP_X_FILE_NAME']) || isset($_GET[$this->uploadName])) {
            $this->isXhr = true;

            $this->fileName = isset($_SERVER['HTTP_X_FILE_NAME']) ?
                $_SERVER['HTTP_X_FILE_NAME'] : $_GET[$this->uploadName];

            if (isset($_SERVER['CONTENT_LENGTH'])) {
                $this->fileSize = (int)$_SERVER['CONTENT_LENGTH'];

            } else {
                throw new Exception('Content length is empty.');
            }
        }

        if ($this->fileName) {

            if( ! $originalFileName ) {
                $this->fileName = $this->sanitizeFilename($this->fileName);
            } else {
                $this->fileName = $originalFileName;

            }



            $pathinfo = pathinfo($this->fileName);



            if (isset($pathinfo['extension']) &&
                isset($pathinfo['filename']))
            {
                $this->fileExtension = strtolower($pathinfo['extension']);
                $this->fileNameWithoutExt = $pathinfo['filename'];
                $this->uploadDir = $pathinfo['dirname'];
                $this->fileName = $this->fileNameWithoutExt.'_'. $imgWidth . 'x' . $imgHeight . '.' .$this->fileExtension;
            }

        }

        if ( ! $originalFileName) {
            $this->setNewFileName();
        }

    }

    private function sanitizeFilename($name) {
        $name = trim($this->basename(stripslashes($name)), ".\x00..\x20");

        // Use timestamp for empty filenames
        if (!$name) {
            $name = str_replace('.', '-', microtime(true));
        }

        return $name;
    }

    private function basename($filepath, $suffix = null) {
        $splited = preg_split('/\//', rtrim($filepath, '/ '));
        return substr(basename('X'.$splited[count($splited)-1], $suffix), 1);
    }

    public function getFileName() {
        return $this->fileName;
    }

    public function setNewFileName( $filePrefix = null ) {
        // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID
        // 值如：1_1493521050_7BVc9v9ujP.png
        $noPrefixName = time() . '_' . str_random(10) . '.' . $this->fileExtension;

        $this->newFileName = $filePrefix ? $filePrefix . '_' . $noPrefixName : $noPrefixName;
    }

    public function getFileSize() {
        return $this->fileSize;
    }

    public function getExtension() {
        return $this->fileExtension;
    }

    public function getErrorMsg() {
        return $this->errorMsg;
    }

    public function getSavedFile() {
        return $this->savedFile;
    }

    private function errorCodeToMsg($code) {
        switch($code) {
            case UPLOAD_ERR_INI_SIZE:
                $message = 'File size exceeds limit.';
                break;
            case UPLOAD_ERR_PARTIAL:
                $message = 'The uploaded file was only partially uploaded.';
                break;
            case UPLOAD_ERR_NO_FILE:
                $message = 'No file was uploaded.';
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $message = 'Missing a temporary folder.';
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $message = 'Failed to write file to disk.';
                break;
            case UPLOAD_ERR_EXTENSION:
                $message = 'File upload stopped by extension.';
                break;
            default:
                $message = 'Unknown upload error.';
                break;
        }
        return $message;
    }

    private function checkExtension($ext, $allowedExtensions) {
        if (!is_array($allowedExtensions))
            return false;

        if (!in_array(strtolower($ext), array_map('strtolower', $allowedExtensions)))
            return false;

        return true;
    }

    private function setErrorMsg($msg) {
        if (empty($this->errorMsg))
            $this->errorMsg = $msg;
    }

    private function fixDir($dir) {
        if (empty($dir))
            return $dir;

        $slash = DIRECTORY_SEPARATOR;
        $dir = str_replace('/', $slash, $dir);
        $dir = str_replace('\\', $slash, $dir);
        return substr($dir, -1) == $slash ? $dir : $dir . $slash;
    }

    // escapeJS and jsMatcher are adapted from the Escaper component of
    // Zend Framework, Copyright (c) 2005-2013, Zend Technologies USA, Inc.
    // https://github.com/zendframework/zf2/tree/master/library/Zend/Escaper
    private function escapeJS($string) {
        return preg_replace_callback('/[^a-z0-9,\._]/iSu', $this->jsMatcher, $string);
    }

    private function jsMatcher($matches) {
        $chr = $matches[0];

        if (strlen($chr) == 1)
            return sprintf('\\x%02X', ord($chr));

        if (function_exists('iconv'))
            $chr = iconv('UTF-16BE', 'UTF-8', $chr);

        elseif (function_exists('mb_convert_encoding'))
            $chr = mb_convert_encoding($chr, 'UTF-8', 'UTF-16BE');

        return sprintf('\\u%04s', strtoupper(bin2hex($chr)));
    }

    public function corsResponse($data) {
        if (isset($_REQUEST[$this->corsInputName])) {
            $targetOrigin = $this->escapeJS($_REQUEST[$this->corsInputName]);
            $targetOrigin = htmlspecialchars($targetOrigin, ENT_QUOTES, 'UTF-8');
            return "<script>window.parent.postMessage('$data','$targetOrigin');</script>";
        }
        return $data;
    }

    public function getMimeType($path) {
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $fileContents = file_get_contents($path);
        $mime = $finfo->buffer($fileContents);
        $fileContents = null;
        return $mime;
    }

    public function isWebImage($path) {
        $pathinfo = pathinfo($path);

        if (isset($pathinfo['extension'])) {
            if (!in_array(strtolower($pathinfo['extension']), array('gif', 'png', 'jpg', 'jpeg')))
                return false;
        }

        $type = exif_imagetype($path);

        if (!$type)
            return false;

        return ($type == IMAGETYPE_GIF || $type == IMAGETYPE_JPEG || $type == IMAGETYPE_PNG);
    }

    private function saveXhr($path) {
        if (false !== file_put_contents($path, fopen('php://input', 'r')))
            return true;
        return false;
    }

    private function saveForm($path) {
        if (move_uploaded_file($_FILES[$this->uploadName]['tmp_name'], $path))
            return true;
        return false;
    }

    private function save($path) {
        if (true === $this->isXhr)
            return $this->saveXhr($path);
        return $this->saveForm($path);
    }

    public function handleUpload($uploadDir = null, $allowedExtensions = null) {

        $this->mimeType = $_FILES[$this->uploadName]['type'];

        if( ! substr_count($this->mimeType,'image/') )
        {
            $this->setErrorMsg('Invalid file type');
            return false;
        }

        list($width,$height)=getimagesize($_FILES[$this->uploadName]['tmp_name']);
        //dd($width);

        if($width < $this->minImgWidth || $height < $this->minImgHeight)
        {
//                    dd($width);

            $this->setErrorMsg('图片的清晰度不够，宽和高需要 200px 以上。');
            //dd($this->getErrorMsg());
            return false;
        }

        if (!$this->fileName) {
            $this->setErrorMsg('Incorrect upload name or no file uploaded');
            return false;
        }

        if ($this->fileSize == 0) {
            $this->setErrorMsg('File is empty');
            return false;
        }

        if ($this->fileSize > $this->sizeLimit) {
            $this->setErrorMsg('File size exceeds limit');
            return false;
        }

        //dd($uploadDir);


        if($this->uploadDir == '.') {
            //if (!empty($uploadDir))
                // 文件具体存储的物理路径，`public_path()` 获取的是 `public` 文件夹的物理路径。
                // 值如：/home/vagrant/Code/larabbs/public/uploads/images/avatars/201709/21/
                $this->uploadDir = public_path() . '/' . $uploadDir;
        } else {
            $uploadDir = $this->uploadDir;
            $this->uploadDir = public_path() . '/' . $this->uploadDir;
        }

        $this->uploadDir = $this->fixDir($this->uploadDir);
        //dd($this->uploadDir);

        if (!file_exists($this->uploadDir)) {
            // 如果上传的目标文件夹不存在，则创建文件夹，如果创建失败，则抛出异常。
            if(!mkdir($this->uploadDir, 0777, true) ) {
                $this->setErrorMsg('Upload directory does not exist');
                return false;
            }
        } else if (!is_writable($this->uploadDir)) {
            $this->setErrorMsg('Upload directory exists, but is not writable');
            return false;
        }





        if (is_array($allowedExtensions))
            $this->allowedExtensions = $allowedExtensions;

        if (!empty($this->allowedExtensions)) {
            if (!$this->checkExtension($this->fileExtension, $this->allowedExtensions)) {
                $this->setErrorMsg('Invalid file type');
                return false;
            }
        }

        $this->savedFile = $this->uploadDir . $this->fileName;

        if (!empty($this->newFileName)) {
            $this->fileName = $this->newFileName;
            $this->savedFile = $this->uploadDir . $this->fileName;

            $this->fileNameWithoutExt = null;
            $this->fileExtension = null;

            $pathinfo = pathinfo($this->fileName);

            if (isset($pathinfo['filename']))
                $this->fileNameWithoutExt = $pathinfo['filename'];

            if (isset($pathinfo['extension']))
                $this->fileExtension = strtolower($pathinfo['extension']);
        }

        if (!$this->save($this->savedFile)) {
            $this->setErrorMsg('File could not be saved');
            return false;
        }

        //return //$_SERVER['SERVER_NAME'] . DIRECTORY_SEPARATOR . $uploadDir . DIRECTORY_SEPARATOR . $this->fileName;

        return [
            'mimeType' => $this->mimeType,
            'image' => $uploadDir . DIRECTORY_SEPARATOR . $this->fileName
        ];
    }

}