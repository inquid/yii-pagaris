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
 * Class Charge
 * @property string $id
 * @property string $amount
 * @property string $description
 * @property Metadata $metadata
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $updatedAt
 * @property string $createdAt
 * @property Instructions $instructions
 * @package inquid\pagaris\models
 */
class Charge extends Model
{
    public $id;
    public $amount;
    public $description;
    public $metadata;
    public $status;
    public $created_at;
    public $updated_at;
    public $instructions;


    public function rules()
    {
        return [
            [['amount', 'description', 'metadata'], 'required'],
            [['amount', 'description', 'metadata', 'id', 'metadata', 'status', 'created_at', 'updated_at', 'instructions'], 'string'],
        ];
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param Metadata $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @param Instructions $instructions
     */
    public function setInstructions($instructions)
    {
        $this->instructions = $instructions;
    }

}