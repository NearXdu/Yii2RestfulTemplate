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
            [['id', 'title', 'content'], 'required'],
            [['id', 'category_id', 'status', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 512],
            [['id'], 'unique'],
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
}
