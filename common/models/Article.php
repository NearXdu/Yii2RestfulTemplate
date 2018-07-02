<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id ID
 * @property string $title 标题
 * @property string $content 内容
 * @property int $category_id 分类
 * @property int $status 状态
 * @property int $created_by 创建人
 * @property int $created_at 创建时间
 * @property int $updated_at 最后修改时间
 *
 * @property Adminuser $createdBy
 */
class Article extends \yii\db\ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 10;

    private static $cateStrArray=[
        1=>'前端',
        2=>'后台',
        3=>'游戏',
        4=>'运维',
    ];

    /**
     * @return array
     */
    public static function allCategory(){
        return self::$cateStrArray;
    }

    /**
     * @param $categroy_id
     * @return mixed
     */
    public function getCateStr(){
        return self::$cateStrArray[$this->category_id];
    }

    /**
     * @return array
     */
    public static function allStatus()
    {
        return [
            self::STATUS_DRAFT => '草稿',
            self::STATUS_PUBLISHED => '已发布',
        ];
    }
    public function getStatusStr()
    {
        return $this->status==self::STATUS_PUBLISHED?'已发布':'草稿';
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['category_id', 'status', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 512],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Adminuser::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'category_id' => '分类',
            'status' => '状态',
            'created_by' => '创建人',
            'created_at' => '创建时间',
            'updated_at' => '最后修改时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Adminuser::className(), ['id' => 'created_by']);
    }


    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            if($insert)
            {
                $this->created_at = time();
                $this->updated_at = time();
                $this->created_by = Yii::$app->user->identity->id;
            }
            else
            {
                $this->updated_at = time();
            }

            return true;

        }
        else
        {
            return false;
        }
    }

}
