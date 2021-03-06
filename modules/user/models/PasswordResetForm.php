<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 24.7.16
 * Time: 15.12
 */

namespace app\modules\user\models;
use yii\base\Model;
use yii\base\InvalidParamException;
use app\modules\user\models\User;
use Yii;


class PasswordResetForm extends Model
{
    public $password;
    /**
     * @var \app\modules\user\models\User
     */
    private $_user;
    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidParamException(Yii::t('app', 'ERROR_BLANK_TOKEN'));
        }
        $this->_user = User::findByPasswordResetToken($token);
        if (!$this->_user) {
            throw new InvalidParamException(Yii::t('app', 'ERROR_WRONG_TOKEN'));
        }
        parent::__construct($config);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
    /**
     * Resets password.
     *
     * @return boolean if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();
        return $user->save(false);
    }

    public function attributeLabels()
    {
        return [
            'password' => Yii::t('app', 'USER_PASSWORD')
        ];
    }

}