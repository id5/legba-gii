<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form form-create">

    <?= "<?php " ?>$form = ActiveForm::begin(); ?>

<?php 
function is_fkey2($attribute, $schema){
	foreach($schema->foreignKeys as $key => $value){
		foreach($value as $k => $v){
			if ( strtolower($attribute) == strtolower($k) ){
				return true;
			}
		}
	}
	return false;
}

foreach ($generator->getColumnNames() as $attribute) {
    

	
	if (in_array($attribute, $safeAttributes)) {
		
		
		if ( is_fkey2($attribute, $generator->getTableSchema()) ){ 
			
			
			
			
	echo "    <?php\n";
	?>
	$relData[''] = '';
	$relData[Yii::t('app', 'Select')] = $model->getAllDataList<?php echo Inflector::id2camel(str_replace('_id','',strtolower($attribute)), '_')?>();
	echo $form->field($model, '<?=$attribute?>')->dropDownList($relData); 
	<?php
	echo "?>\n\n";
		
		}else{
			
			echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
		
		}
		
    }
} 
?>
	<?php echo "<?php\n"; ?>
	/*
	***************************************************************************************************
	* * Legba Yii Advanced SAMPLE USAGE (Hey! Change remind <<nameOfYourPorpertyRelations>>)
	* [NOTE] if you need show n:n (n:m special) based em Yii2 hasMany()->viaTable() use this sample code:
	***************************************************************************************************
	* $relModel = $model->getAllDataListNameOfYourPorpertyRelations();
	* echo $form->field($model, 'nameOfYourPorpertyRelations')->checkboxList($relModel) 
	*/
	<?php echo "?>\n"; ?>	
    <div class="form-group">
        <?= "<?= " ?>Html::submitButton($model->isNewRecord ? <?= $generator->generateString('Create') ?> : <?= $generator->generateString('Update') ?>, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
