<?php

namespace app\models;
use yii\web\UploadedFile;
use Yii;
use yii\helpers\Json;
use yii\helpers\Html;
use yii\helpers\Url;
/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property string $title
 * @property string $detail
 * @property string $post_date
 * @property string $update_date
 * @property integer $view
 *
 * @property NewsCategory $cat
 */
class News extends \yii\db\ActiveRecord
{
     const UPLOAD_FOLDER='documents';
  // public $uploadFilesFolder = 'files'; //ที่เก็บไฟล์
    /**
     * @inheritdoc
     */
    public $icon;

    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'title', 'detail', 'post_date', 'update_date'], 'required'],
            [['cat_id', 'view'], 'integer'],
            [['detail'], 'string'],
            [['post_date', 'update_date','docs'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['icon'], 'file', 'extensions' => 'jpg, png'],
            [['docs'],'file','maxFiles'=>10,'skipOnEmpty'=>true],
            [['ref'], 'string', 'max' => 50],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsCategory::className(), 'targetAttribute' => ['cat_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID ข่าว',
            'cat_id' => 'หมวดหมู่',
            'title' => 'หัวข้อข่าว',
            'detail' => 'รายละเอียด',
            'post_date' => 'วันที่โพสต์',
            'update_date' => 'ปรับปรุงเมื่อ',
            'view' => 'จำนวนผู้เข้าชม',
            'icon' => 'ICON',
            'files' => 'ไฟล์',
            'ref' => 'หลายเลข referent',
            'docs' => 'ดาวน์โหลดเอกสารประกอบ',
        ];
    }

    public static function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/';
    }

    public static function getUploadUrl(){
        return Url::base(true).'/'.self::UPLOAD_FOLDER.'/';
    }

    public function listDownloadFiles($type){
     $docs_file = '';
     if(in_array($type, ['docs'])){
             $data = $type==='docs'?$this->docs:$this->covenant;
             $files = Json::decode($data);
            if(is_array($files)){
                 $docs_file ='<ul>';
                 foreach ($files as $key => $value) {
                    $docs_file .= Html::a($value,['/news/download','id'=>$this->id,'file'=>$key,'file_name'=>$value]);
                 }
                 $docs_file .='</ul>';
            }
     }

     return $docs_file;
    }

    public function initialPreview($data,$field,$type='file'){
            $initial = [];
            $files = Json::decode($data);
            if(is_array($files)){
                 foreach ($files as $key => $value) {
                    if($type=='file'){
                        $initial[] = "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
                    }elseif($type=='config'){
                        $initial[] = [
                            'caption'=> $value,
                            'width'  => '120px',
                            'url'    => Url::to(['/news/deletefile','id'=>$this->id,'fileName'=>$key,'field'=>$field]),
                            'key'    => $key
                        ];
                    }
                    else{
                        $initial[] = Html::img(self::getUploadUrl().$this->ref.'/'.$value,['class'=>'file-preview-image', 'alt'=>$model->file_name, 'title'=>$model->file_name]);
                    }
                 }
         }
        return $initial;
    }
      /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(NewsCategory::className(), ['id' => 'cat_id']);
    }
}
