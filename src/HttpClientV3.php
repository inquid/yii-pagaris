<?php

namespace inquid\pagaris;

use inquid\pagaris\models\Error;
use yii\base\Component;
use yii\base\Model;
use yii\helpers\Json;
use yii\httpclient\Client;

/**
 * Class HttpClient
 * @package inquid\facturacom
 */
class HttpClientV3 extends Component
{
    public $API_VERSION = 'api/v1';
    const URL_PAGARIS = 'https://pagaris.com';

    private $_options = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
    ];

    public $token;

    public $isSandbox = false;

    public function init()
    {

    }

    /**
     * @param string $method
     * @param string $path
     * @param null|array $data
     * @return \yii\httpclient\Response
     */
    protected function sendRequest($method, $path, $data = null)
    {
        $client = new Client(['baseUrl' => self::URL_PAGARIS . '/' . $path]);
        $request = $client->createRequest();

        if ($data) {
            $request->setData($data);
        }
        $request->setHeaders($this->getHeaders());
        $request->setMethod($method);
        $request->setOptions($this->_options);
        return $request->send();
    }

    /**
     * @param string $method
     * @param string $path
     * @param null|array $data
     * @return \yii\httpclient\Response
     */
    protected function sendRequestPlainJson($method, $path, $data = null)
    {
        $client = new Client(['baseUrl' => self::URL_PAGARIS . '/' . $path]);
        $request = $client->createRequest();
        $request->setFormat(Client::FORMAT_JSON);
        if ($data) {
            $request->setContent($data);
        }
        $request->setHeaders($this->getHeaders());
        $request->setMethod($method);
        $request->setOptions($this->_options);
        return $request->send();
    }

    /**
     * @param \yii\httpclient\Response $response
     * @param string $className
     * @param bool $isList
     * @return array|object|Model|Error
     */
    protected function modelResponse($response, $className, $isList = false)
    {
        return Json::encode($response);
    }

    /**
     * @param \yii\httpclient\Response $response
     * @return boolean|Error
     */
    protected function booleanResponse($response)
    {
        return Json::encode($response);
    }

    /**
     * @return array headers with auth
     */
    private function getHeaders()
    {
        return [
            "Authorization: Bearer {$this->token}",
            'Content-Type: application/json'
        ];
    }
}