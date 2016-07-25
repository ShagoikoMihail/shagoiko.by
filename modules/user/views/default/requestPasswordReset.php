<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 24.7.16
 * Time: 15.52
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\user\models\PasswordResetRequestForm */
$this->title = Yii::t('app', 'TITLE_RESET');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-request-password-reset">
    <p><?php echo Yii::t('app', 'TEXT_RESET') ?></p>


    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
            <?= $form->field($model, 'email') ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'BUTTON_SEND'), ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>