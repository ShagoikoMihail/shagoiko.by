<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 24.7.16
 * Time: 15.48
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\modules\user\models\LoginForm */

$this->title = Yii::t('app', 'CONTACT_LOGIN');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-login">
    <p><?=Yii::t('app', 'TEXT_LOGIN') ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'username') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
            <div style="color:#999;margin:1em 0">
                <?= Html::a(Yii::t('app', 'BUTTON_RESET'), ['password-reset-request']) ?>.
            </div>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'BUTTON_LOGIN'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>