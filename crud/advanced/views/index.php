<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString("List " . Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">

    <h1><?= "<?= " ?>Html::encode($this->title) ?></h1>


    <p class="panel-buttons">
        <?= "<?= " ?>Html::a(<?= $generator->generateString('{icon} List All',  ['icon' => '<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>']) ?>, ['index'], ['class' => 'btn btn-default']) ?>
		<?= "<?= " ?>Html::a(<?= $generator->generateString('{icon} Create', 	['icon' => '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>']) ?>, ['create'], ['class' => 'btn btn-default']) ?>
		<?php if(!empty($generator->searchModelClass)): ?>
			<?= "<?= " ?>Html::a(<?= $generator->generateString('{icon} Search', 	['icon' => '<span class="glyphicon glyphicon-filter" aria-hidden="true"></span>']) ?>, 'javascript:void($(".panel-search").toggle());', ['class' => 'btn btn-default']) ?>
		<?php endif; ?>
		<?= "<?= " ?>Html::a(<?= $generator->generateString('{icon} Print', 	['icon' => '<span class="glyphicon glyphicon-print" aria-hidden="true"></span>']) ?>, 'javascript:void(window.print());', ['class' => 'btn btn-default']) ?>
    </p>

<?php if(!empty($generator->searchModelClass)): ?>
<?= "    <?php " . ($generator->indexWidgetType === 'grid' ? "" : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
<?php endif; ?>


<?php if ($generator->indexWidgetType === 'grid'): ?>
    <?= "<?= " ?>GridView::widget([
        'dataProvider' => $dataProvider,
        <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n        'columns' => [\n" : "'columns' => [\n"; ?>
            ['class' => 'yii\grid\SerialColumn'],

<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (++$count < 6) {
            echo "            '" . $name . "',\n";
        } else {
            echo "            // '" . $name . "',\n";
        }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if (++$count < 6) {
            echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        } else {
            echo "            // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        }
    }
}
?>

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php else: ?>
    <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
        },
    ]) ?>
<?php endif; ?>

</div>
