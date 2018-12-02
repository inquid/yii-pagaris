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
 * Class Instructions
 * @property string $name
 * @property string $clabe
 * @property string $institution
 * @property string $numerical_reference
 * @property string $concept
 *
 * @package inquid\pagaris\models
 */
class Instructions extends Model
{
    public $name;
    public $clabe;
    public $institution;
    public $numerical_reference;
    public $concept;

    public function rules()
    {
        return [
            [['name', 'clabe', 'institution', 'numerical_reference', 'concept'], 'required'],
            [['name', 'clabe', 'institution', 'numerical_reference', 'concept'], 'string'],
        ];
    }

}