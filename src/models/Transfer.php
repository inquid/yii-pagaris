<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 12/2/18
 * Time: 2:17 PM
 */

namespace inquid\pagaris\models;


use yii\base\Model;

/**
 * Class Transfer
 * @property string $alias
 * @property Payment[] $payments
 * @package inquid\pagaris\models
 */
class Transfer extends Model
{
    public $alias;
    public $payment;
    public $created_at;
    public $updated_at;
    public $payments_count;
    public $payments_total;
    public $total;
    public $status;

    public $funding = [];

    public $payments = [];

    public $sandbox;
}