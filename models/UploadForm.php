<?php
namespace app\models;
use yii\web\UploadedFile;
use app\models\Article;
class UploadForm extends Article
{
    /**
     * @var UploadedFile
     */
    public $photo;

    public function rules()
    {
        return [
            [['photo'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'message'=>'Допускаются только файлы png и jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->photo->saveAs('../web/assets/upload' . $this->photo->baseName . '.' . $this->photo->extension);
            return true;
        } else {
            return false;
        }
    }
}

