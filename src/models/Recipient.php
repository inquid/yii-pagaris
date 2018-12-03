<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 12/2/18
 * Time: 1:14 AM
 */

namespace inquid\pagaris\models;

use yii\base\Model;

/**
 * Class Recipient
 * @property  string $id
 * @property  string $legal_name
 * @property  string $alias
 * @property  string $account_type
 * @property  string $account_number
 * @property  string $mobile_phone
 * @property  string $institution
 * @property  string $created_at
 * @property  string $updated_at
 * @package inquid\pagaris\models
 */
class Recipient extends Model
{
    public $id;
    public $legal_name;
    public $alias;
    public $account_type;
    public $account_number;
    public $email;
    public $mobile_phone;
    public $institution;
    public $created_at;
    public $updated_at;

    public function rules()
    {
        return [
            [['legal_name', 'alias', 'account_type', 'account_number', 'institution'], 'required'],
            [['legal_name', 'alias', 'account_type', 'account_number', 'institution', 'email', 'mobile_phone', 'institution', 'created_at', 'updated_at'], 'string'],
        ];
    }
}