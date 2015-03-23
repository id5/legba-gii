<?php
/**
 * This is the template for generating a controller class within a module.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\module\Generator */

echo "<?php\n";
?>

namespace <?= $generator->getControllerNamespace() ?>;

use yii\web\Controller;

/**
 * @author Legba Gii Advanced 
 * @version 0.0.1
 *
 * @link http://www.yiiframework.com/doc-2.0/yii-base-controller.html Documentation.
 * @link http://www.yiiframework.com/doc-2.0/guide-structure-controllers.html  Documentation.
 *
 * @package <?= $generator->getControllerNamespace() ?>
 
 */
class DefaultController extends Controller
{
    /**
	 * Action from render view/default/index
	 * @since 0.0.1 
	 * @return string The rendering result.	 
	 */
	public function actionIndex()
    {
        return $this->render('index');
    }
}
