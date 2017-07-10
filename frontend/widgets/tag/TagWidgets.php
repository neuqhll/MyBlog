<?php
namespace frontend\widgets\tag;

use common\models\TagsModel;
use yii;
use yii\bootstrap\Widget;

class TagWidgets extends Widget
{
    public $title = '';
    public $limit = 20;

    public function run()
    {
        $res = TagsModel::find()
            ->orderBy(['post_num'=>SORT_DESC])
            ->limit($this->limit)
            ->all();

        $result['title'] = $this->title?:'标签云';
        $result['body']=$res?:[];

        return $this->render('index',['data'=>$result]);
    }
}