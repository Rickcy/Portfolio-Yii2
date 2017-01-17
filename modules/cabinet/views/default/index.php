

<?
/**@var $user app\models\User**/
use app\models\User;

$user = User::findIdentity(\Yii::$app->user->id);
?>




    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div>

    
    <? if ($user->checkRole(['ROLE_USER'])):?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$model?></h1>
        </div>
    </div>
    <?endif;?>

	<!--/.main-->