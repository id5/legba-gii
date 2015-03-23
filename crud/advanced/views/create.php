<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Create {modelClass}', ['modelClass' => Inflector::camel2words(StringHelper::basename($generator->modelClass))]) ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-create">

    <h1><?= "<?= " ?>Html::encode($this->title) ?></h1>

	<p class="panel-buttons">
        <?= "<?= " ?>Html::a(<?= $generator->generateString('{icon} List All',  ['icon' => '<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>']) ?>, ['index'], ['class' => 'btn btn-default']) ?>
		<?= "<?= " ?>Html::a(<?= $generator->generateString('{icon} Print', 	['icon' => '<span class="glyphicon glyphicon-print" aria-hidden="true"></span>']) ?>, 'javascript:void(window.print());', ['class' => 'btn btn-default']) ?>
    </p>
	<div class="grid-view">
    <?= "<?= " ?>$this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
