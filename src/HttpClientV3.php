<?php

namespace inquid\pagaris;

use inquid\pagaris\Error;
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
        $client = new Client(['baseUrl' => self::URL_PAGARIS . '/' . $this->API_VERSION . '/' . $path]);
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
        $client = new Client(['baseUrl' => self::URL_PAGARIS . '/' . $this->API_VERSION . '/' . $path]);
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
     * @param string
     * @param bool $isList
     * @return array|object|Model|Error
     */
    protected function modelResponse($response, $className, $classNamePlural, $isList = false)
    {
        \Yii::info(json_encode($response));
        if ($response && ($headers = $response->getHeaders())) {
            if ($headers->get('http-code') == 200 || $headers->get('http-code') == 201) {
                $content = Json::decode($response->getContent());
                $models = [];
                if ($isList) {
                    $reflection = new \ReflectionClass($className);
                    foreach ($content[$classNamePlural] as $key => $item) {
                        $models[$key] = $reflection;
                        $models[$key]->attributes = $item;
                    }
                }
                return $models;
            } else {
                return new Error($headers->get('http-code'));
            }
        }
        return new Error(500);
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