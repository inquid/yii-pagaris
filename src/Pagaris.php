<?php

namespace inquid\pagaris;

use inquid\pagaris\models\Charge;

/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 12/2/18
 * Time: 1:49 AM
 */
class Pagaris extends HttpClientV3
{
    /**
     * @return array|Charge|Error
     */
    public function getCharges()
    {
        try {
            return $this->modelResponse($this->sendRequest('get', 'charges'), Charge::className(), true);
        } catch (\Exception $exception) {
            return new Error(500, $exception->getMessage());
        }
    }
}