<?php

namespace inquid\pagaris;

use inquid\pagaris\models\Charge;
use inquid\pagaris\models\Payment;
use inquid\pagaris\models\Recipient;
use inquid\pagaris\models\Transfer;
use inquid\pagaris\HttpClientV3;

/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 12/2/18
 * Time: 1:49 AM
 */
class Pagaris extends HttpClientV3
{
    /**
     * @return array|Charge[]|Error
     */
    public function getCharges()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', 'charges'), Charge::className(), 'charges', true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @return array|Charge[]|Error
     */
    public function getChargesDetails($id)
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "charges/{$id}"), Charge::className(), 'charges', false);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @return array|Transfers[]|Error
     */
    public function getRecipients()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', 'recipients'), Recipient::className(), 'recipients', true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @return array|Charge|Error
     */
    public function getTransfers()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', 'transfers'), Recipient::className(), 'transfers', true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @return array|Charge|Error
     */
    public function getTransferDetails($id)
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "transfers/{$id}"), Transfer::className(), 'transfers', false);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @param $id
     * @return array|Error|object|\yii\base\Model
     */
    public function getPaymentDetails($id)
    {
        try {
            return $this->modelResponse($this->sendRequest('get', "payments/{$id}"), Payment::className(), 'payments', false);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @param Charge $charge
     */
    public function createCharge($charge)
    {
        try {
            return $this->modelResponse($this->sendRequest('post', "charges", $charge), Charge::className(), 'charges', true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @param Recipient $recipment
     */
    public function createRecipment($recipment)
    {
        try {
            return $this->modelResponse($this->sendRequest('post', "recipients", $recipment), Recipient::className(), 'recipients', true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }

    /**
     * @param Transfer $transfer
     * @param string|null $recipmentId
     * @return array|Error|object|\yii\base\Model
     */
    public function createTransfer($transfer, $recipmentId = null)
    {
        try {
            return $this->modelResponse($this->sendRequest('post', "transfers", $transfer), Transfer::className(), 'transfers', false);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }


}