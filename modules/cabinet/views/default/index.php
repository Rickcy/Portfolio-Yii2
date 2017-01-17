

<?
/**@var $user app\models\User**/
use app\models\User;

$user = User::findIdentity(\Yii::$app->user->id);
?>




	<!--/.main-->