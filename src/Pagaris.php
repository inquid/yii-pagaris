<?php

namespace inquid\pagaris;

use inquid\pagaris\models\Charge;
use inquid\pagaris\models\Recipient;

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
}