<?php
/**
 * This is the template for generating the model class of a specified table.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\model\Generator */
/* @var $tableName string full table name */
/* @var $className string class name */
/* @var $tableSchema yii\db\TableSchema */
/* @var $labels string[] list of attribute labels (name => label) */
/* @var $rules string[] list of validation rules */
/* @var $relations array list of relations (name => relation declaration) */

echo "<?php\n";
?>

namespace <?= $generator->ns ?>;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * @author Gii Advanced 
 * @version 0.0.1
 *
 * @link http://www.yiiframework.com/doc-2.0/guide-structure-models.html Documentation	.
 * @link http://www.yiiframework.com/doc-2.0/yii-base-model.html   Documentation	.
 *
 * This is the model class for table "<?= $generator->generateTableName($tableName) ?>".
 *
<?php foreach ($tableSchema->columns as $column): ?>
 * @property <?= "{$column->phpType} \${$column->name} " ?> 
<?php endforeach; ?><?php if (!empty($relations)): ?>
 *
<?php foreach ($relations as $name => $relation): ?>
 * @property <?= $relation[1] . ($relation[2] ? '[]' : '') . ' $' . lcfirst($name) . "\n" ?>
<?php endforeach; ?>
<?php endif; ?>
 *
 * @package <?= $generator->ns ?>
 
 */
class <?= $className ?> extends <?= '\\' . ltrim($generator->baseClass, '\\') . "\n" ?>
{
    /**
	 * @since 0.0.1
	 * @return string the name of table of this model.
	 */
    public static function tableName()
    {
        return '<?= $generator->generateTableName($tableName) ?>';
    }
<?php if ($generator->db !== 'db'): ?>

    /**
	 * @since 0.0.1
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('<?= $generator->db ?>');
    }
<?php endif; ?>

    /**
     * @since 0.0.1
	 * @return array The rules
     */
    public function rules()
    {
        return [<?= "\n            " . implode(",\n            ", $rules) . "\n        " ?>];
    }

    /**
     * @since 0.0.1
	 * @return array The labels of the property model (from ER model)
     */
    public function attributeLabels()
    {
        return [
<?php foreach ($labels as $name => $label): ?>
            <?= "'$name' => " . $generator->generateString($label) . ",\n" ?>
<?php endforeach; ?>
        ];
    }
<?php foreach ($relations as $name => $relation): ?>
	
    /**
	 * @since 0.0.1
     * @return \yii\db\ActiveQuery by query model relation
     */
    public function get<?= $name ?>()
    {
        <?= $relation[0] . "\n" ?>
    }
	
	/**
	 * @since 0.0.1
     * @return Array (key=>value) (1º and 2º declarede propertys in the relation model) by all registers by relation. It is usege from prepare data from forms, webservices e outhers who implemented read/write in the MVC model
     */
    public function getAllDataList<?= $name ?>()
    {
    		$relModel = <?= $relation[1] ?>::find()->asArray()->all()
		if ( empty( $relModel ) ) {
			$arrTemp= array('', '');
		}else{	
			foreach($relModel[0] as $key => $value){  $arrTemp[] = $key; }	
		}
		return  ArrayHelper::map($relModel, $arrTemp[0], $arrTemp[1]);
	}
	
<?php endforeach; ?>

<?php
//var_dump($relations);
?>
	/**
	 * @since 0.0.1
     * @return boolean Load data and save model and related relation models (hasOne (1:1) and hasMany (n:n) with viatable()) ( equivalente $this->load() && this->save() on controller)
     */
	public function loadAndSave( $arrData )
	{
		if ($this->load($arrData)){
			if ($this->save()){ 
		<?php foreach ($relations as $name => $relation): 
		if ( strpos($relation[0], '->viaTable(') !== false ){
		?>
		// clear and saving if exists data from relation n:n 
				$this->unlinkAll('<?= lcfirst($name) ?>', true);
				
				if (!empty($arrData['<?= $className ?>']['<?= lcfirst($name)?>'])){	
					$relData = LogisticaTransferenciasProduto::findAll($arrData['<?= $className ?>']['<?= lcfirst($name) ?>']);
					foreach($relData as $relDataModel){
						$this->link('<?= lcfirst($name) ?>', $relDataModel);
					}	
				}
		<?php 
		}
		endforeach; ?>
		return true;
			}
		}
		return false; 
	}
	
}
