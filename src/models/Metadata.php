<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 12/2/18
 * Time: 1:21 AM
 */

namespace inquid\pagaris\models;


use yii\base\Model;

/**
 * Class Metadata
 * @property string $customer_id
 * @property string $customerId
 * @property string $additionalInfo
 * @property string $additional_info
 * @package inquid\pagaris\models
 */
class Metadata extends Model
{
    public $customer_id;
    public $additional_info;

    public function rules()
    {
        return [
            [['customer_id', 'additional_info'], 'required'],
            [['customer_id', 'additional_info'], 'string'],
        ];
    }

    /**
     * @param string $customer_id
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;
    }

    /**
     * @param string $additional_info
     */
    public function setAdditionalInfo($additional_info)
    {
        $this->additional_info = $additional_info;
    }
}