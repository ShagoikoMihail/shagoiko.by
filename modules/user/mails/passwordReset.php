<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 24.7.16
 * Time: 15.53
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user app\modules\user\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['user/default/password-reset', 'token' => $user->password_reset_token]);
?>

<?= Yii::t('app', 'HELLO {username}', ['username' => $user->username]); ?>
    Пройдите по ссылке, чтобы сменить пароль:

<?= Html::a(Html::encode($resetLink), $resetLink) ?>


