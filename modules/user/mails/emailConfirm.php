<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 24.7.16
 * Time: 15.07
 */

/* @var $this yii\web\View */
/* @var $user app\modules\user\models\User */

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['user/default/email-confirm', 'token' => $user->email_confirm_token]);
?>

<?= Yii::t('app', 'HELLO {username}', ['username' => $user->username]); ?>

<?= Yii::t('app', 'FOLLOW_TO_CONFIRM_EMAIL') ?>

<?= $confirmLink ?>

<?= Yii::t('app', 'IGNORE_IF_DO_NOT_REGISTER') ?>