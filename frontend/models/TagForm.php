<?php
namespace frontend\models;

use common\models\TagsModel;
use yii\base\Model;

class TagForm extends Model
{
    public $id;
    public $tags;
    public function rules()
    {
        return [
          ['tags','required'],
            ['tags','each','rule'=>['string']],
        ];
    }

    public function saveTags()
    {
        $ids = [];
        if(!empty($this->tags)){
            foreach($this->tags as $tag){
                $ids[]= $this->_savaTag($tag);
            }
        }
        return $ids;
    }

    private function _savaTag($tag)
    {
        $model = new TagsModel();
        $res = $model->find()->where(['tag_name' => $tag])->one();
        if(!$res){
            $model->tag_name = $tag;
            $model->post_num = 1;
            if(!$model->save()){
                throw new \Exception('sava error!');
            }
            return $model->id;
        }else{
            $res->updateCounters(['post_num'=>1]);
        }
        return $res->id;
    }
}