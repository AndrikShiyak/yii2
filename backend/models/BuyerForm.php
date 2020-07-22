<?php

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class BuyerForm extends Model
{
    public $name;
    public $surname;
    public $second_name;
    public $email;
    public $phone;

    public function rules()
    {
        return [
            [['name', 'surname', 'second_name', 'phone', 'email'], 'string', 'message' => 'невірний тип'],
            [['name', 'surname', 'second_name', 'email', 'phone'], 'required', 'message' => 'значення обов\'язкове'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'surname' => 'Прізвище',
            'name' => 'Імя',
            'second_name' => 'По-Батькові',
            'email' => 'Електронна почта',
            'phone' => 'Номер телефону',
        ];
        
    }

    // public function upload()
    // {
    //     if ($this->validate('name', 'description')){
    //         $this->imageFile->saveAs($this->imagePath());
    //         return true;
    //     }
    //     return false;
    // }

    // public function imagePath()
    // {
    //     return '../../uploads/' .$this->imageFile->baseName. '.' .$this->imageFile->extension;
    // }
}