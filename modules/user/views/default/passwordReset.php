<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 24.7.16
 * Time: 15.51
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\user\models\PasswordResetForm */
$this->title = Yii::t('app', 'TITLE_RESET');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-reset-password">
    <p>Please choose your new password:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'BUTTON_SAVE'), ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>