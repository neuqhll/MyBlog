<?php
namespace frontend\widgets\post;

use yii;
use common\models\PostModel;
use frontend\models\PostForm;
use yii\base\Widget;

class PostWidgets extends Widget
{
    /*
     * 文章标题
     */
    public $title = '';
    /*
     * 数量
     */
    public $limit = 6;
    /*
     * 显示更多
     */
    public $more = true;
    /*
     * 分页
     */
    public $page = true;

    public function run()
    {
//        $form = new PostForm();
        $curPage = Yii::$app->request->get('page',1);
        $cond = ['=','is_valid',PostModel::IS_VALID];
        $res = PostForm::getList($cond, $curPage, $this->limit);
        $result['title'] = $this->title;
        $result['more']=yii\helpers\Url::to(['post/index']);
        $result['body'] = $res['data']?:[];
        if($this->page){
            $pages = new yii\data\Pagination(['totalCount'=>$res['count'],'pageSize'=>$res['pageSize']]);
            $result['page']=$pages;
        }
        return $this->render('index',['data'=>$result]);
    }
}
