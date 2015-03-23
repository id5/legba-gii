<?php
/**
 * This is the template for generating a module class file.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\module\Generator */

$className = $generator->moduleClass;
$pos = strrpos($className, '\\');
$ns = ltrim(substr($className, 0, $pos), '\\');
$className = substr($className, $pos + 1);

echo "<?php\n";
?>

namespace <?= $ns ?>;

/**
 * @author Legba Gii Advanced 
 * @version 0.0.1
 *
 * @link http://www.yiiframework.com/doc/guide/1.1/pt/basics.module Documentation	.
 * @link http://www.yiiframework.com/doc-2.0/yii-base-module.html   Documentation	.
 *
 * @property string $controllerNamespace
 *
 * @package <?= $ns ?>
 
 */
class <?= $className ?> extends \yii\base\Module
{
    public $controllerNamespace = '<?= $generator->getControllerNamespace() ?>';
	
	/**
	 * @since 0.0.1 
	 * @return void
	 */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
