<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString("View " . Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">

    <h1><?= "<?= " ?>Html::encode($this->title) ?></h1>

     <p class="panel-buttons">
        <?= "<?= " ?>Html::a(<?= $generator->generateString('{icon} List All',  ['icon' => '<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>']) ?>, ['index'], ['class' => 'btn btn-default']) ?>
		<?= "<?= " ?>Html::a(<?= $generator->generateString('{icon} Update',  ['icon' => '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>']) ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-default']) ?>
        <?= "<?= " ?>Html::a(<?= $generator->generateString('{icon} Delete',  ['icon' => '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>']) ?>, ['delete', <?= $urlParams ?>], [
            'class' => 'btn btn-default',
            'data' => [
                'confirm' => <?= $generator->generateString('Are you sure you want to delete this item?') ?>,
                'method' => 'post',
            ],
        ]) ?>
		<?= "<?= " ?>Html::a(<?= $generator->generateString('{icon} Print', 	['icon' => '<span class="glyphicon glyphicon-print" aria-hidden="true"></span>']) ?>, 'javascript:void(window.print());', ['class' => 'btn btn-default']) ?>
    </p>
    <div class="grid-view">
    <?= "<?= " ?>DetailView::widget([
        'model' => $model,
        'attributes' => [
<?php
function is_fkey($attribute, $schema){
	foreach($schema->foreignKeys as $key => $value){
		foreach($value as $k => $v){
			if ( strtolower($attribute) == strtolower($k) ){
				return true;
			}
		}
	}
	return false;
}

if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
		if (is_fkey($name, $tableSchema) ){
			echo "            'teste',\n";
		}else{
			echo "            '" . $name . "',\n";
		}	
    }
} else {
    foreach ($generator->getTableSchema()->columns as $column) {
		if (is_fkey($column->name, $generator->getTableSchema()) ){
			echo "            '".lcfirst(Inflector::id2camel(str_replace('_id','',strtolower($column->name)), '_')).".id',\n";
		}else{
			$format = $generator->generateColumnFormat($column);
			echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
		}
	}
}
?>
	
			/*
			***************************************************************************************************
			* * Legba Yii Advanced SAMPLE USAGE (Hey! Change remind <<nameOfYourPorpertyRelations>>)
			* [NOTE] if you need show n:n (n:m special) based em Yii2 hasMany()->viaTable() use this sample code:
			***************************************************************************************************
			*	[
			*		'format' => 'html',
			*		'label' => 'Your Label',
			*		'value' => Html::ul( ArrayHelper::map($model->nameOfYourPorpertyRelations, 'id', 'name') )
			*	],
			*/

        ],
    ]) ?>

    </div>

</div>
