<?php
use Yii\Bootstrap4\Carousel;
use app\models\Article;

/** @var yii\web\View $this */

$this->title = 'Мир цветов';
?>
<div class="site-index">
 <div class="flex-row flex-wrap d-flex align-items-center">
    <img src="../../web/assets/upload/logo.jpg" alt="logo" class="rounded-lg"/>
        <div class="display-4 m-auto sweet_font">Мир цветов - мир любви</div>
 </div>
    <div >

        <h1 class="display-4 text-success float-none text-center">Наши новинки</h1>
    </div>
</div>
<?php $articles=Article::find()->orderBy(['date'=>SORT_DESC])->limit(5)->all();
$items=[];

foreach ($articles as $article){
    $items[]="<div class='bg-dark m-2 d-flex flex-column justify-content-center'>
    <h1 class='text-primary text-center m-2'>{$article->name}</h1>
    <img class='m-5' src='../../web/assets/upload/{$article->photo}' alt='photo'/></div>
    ";}

echo yii\bootstrap4\Carousel::widget(['items'=>$items]);

?>



