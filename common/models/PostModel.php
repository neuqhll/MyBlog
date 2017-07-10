<?php

namespace common\models;


use Yii;
use common\models\base\BaseModel;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $title
 * @property string $summary
 * @property string $content
 * @property string $label_img
 * @property integer $cat_id
 * @property integer $user_id
 * @property string $user_name
 * @property integer $is_valid
 * @property integer $created_at
 * @property integer $updated_at
 */
class PostModel extends BaseModel
{
    /**
     * @inheritdoc
     */

    const IS_VALID = 1;
    const NO_VALID = 0;

    public static function tableName()
    {
        return 'posts';
    }

    public function getRelate()
    {
        return $this->hasMany(RelationPostTagsModel::className(),['post_id'=>'id']);
    }
    public function getCat()
    {
        return $this->hasOne(CatsModel::className(),['id'=>'cat_id']);
    }

    /**
     * @inheritdoc
     */

    public function getExtend()
    {
        return $this->hasOne(PostExtendsModel::className(),['post_id'=>'id']);
    }
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['cat_id', 'user_id', 'is_valid', 'created_at', 'updated_at'], 'integer'],
            [['title', 'summary', 'label_img', 'user_name'], 'string', 'max' => 255],
            [['label_img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'summary' => '摘要',
            'content' => '文章内容',
            'label_img' => '标签图',
            'cat_id' => '分类 ID',
            'user_id' => '用户 ID',
            'user_name' => '用户名',
            'is_valid' => 'Is Valid',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

}
