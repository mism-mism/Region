<?php
/**
 * 検証用RESTクライアント(Get Only)
 *
 */

class Client
{
    /** @var array */
    protected $http_request_option = array();

    protected $scheme;
    protected $host;
    protected $port;
    protected $key;
    protected $secret;

    /**
     * Constructor
     *
     * @param string $resource
     * @param array $params
     */
    public function __construct()
    {
        //API Config
        $webapiConfig = array(
            "scheme" => "http",
            "host"   => "nextcore.homes.co.jp",
            "port"   => "80",
            "key"    => "NTUwYWVmY2FjZWU1NTdlYmNkZjU3MGUz",
            "secret" => "NGM1MTRmMzYzM2I2NjExNTllYTJkNjJmMTUyYzk4ODQ2MmZjMmQwMmVjNzU1MTBmNmE3ZGI4MGU2YWQ0ZTcxNw"
        );

        //PEAR::HTTP_Request オプション設定
        $this->http_request_option = array(
            "timeout" => "10", // 接続タイムアウト秒数指定
            "readTimeout" => array(10, 0) // ソケット読み書きタイムアウト秒数
        );

        $this->scheme = $webapiConfig["scheme"];
        $this->host = $webapiConfig["host"];
        $this->port = $webapiConfig["port"];
        $this->key = $webapiConfig["key"];
        $this->secret = $webapiConfig["secret"];
    }

    /**
     * Fetch resource using GET method
     *
     * @param string $path Resource path
     * @param array $params Query parameters
     * @return array
     */
    public function get($path, $params = array())
    {
        $signedParams = $this->getSignedParams(HTTP_REQUEST_METHOD_GET, $path, $params);
        $uri = $this->getUri($path);
        $http = new HTTP_Request($uri, $this->http_request_option);
        $http->setMethod(HTTP_REQUEST_METHOD_GET);

        foreach ($signedParams as $key => $value) {
            $http->addQueryString($key, $value);
        }
        return $this->getResponse($http);
    }


    /**
     * Get full URL of API
     *
     * @param string $path Resource path
     * @return string
     */
    protected function getUri($path)
    {
        return sprintf('%s://%s:%s%s', $this->scheme, $this->host, $this->port, $path);
    }

    /**
     * Returns signed parameters
     *
     * @param string $method
     * @param string $path
     * @param array $params
     * @return array
     */
    protected function getSignedParams($method, $path, array $params)
    {
        $params['timestamp'] = time();
        $params['api_key'] = $this->key;
        $params['api_sig'] = $this->sign($method, $path, $params);
        return $params;
    }

    /**
     * Creates signiture of a request
     *
     * @param string $method
     * @param string $path
     * @param array $params
     * @return string
     */
    protected function sign($method, $path, $params)
    {
        // parameter keys should be alphabetical order
        ksort($params);

        // PHP_QUERY_RFC3986 means ' ' should be encoded as '%20' not '+'
        $encodeRFC3986 = function($str) {
            return strtr($str, array('+' => '%20'));
        };
        $query = $encodeRFC3986(http_build_query($params, null, '&'));

        $method = strtoupper($method);
        $host = $this->host;
        $secret = $this->secret;

        $unsigned = implode("\n", array($method, $host, $path, $query));
        $hmac_digest = hash_hmac('sha256', $unsigned, $secret);

        // URL safe base64 encoding
        $signature = str_replace(array('+', '/', '='), array('-', '_', ''), base64_encode($hmac_digest));

        return $signature;
    }

    /**
     * Execute request and returns response
     *
     * @param PEAR::HTTP_Request $http
     * @return array
     */
    protected function getResponse($http)
    {
        $httpResponse = $http->sendRequest(); 

        if (PEAR::isError($httpResponse)){
            echo $httpResponse->getMessage();
        } else {
            $response_code = $http->getResponseCode();
            $response = json_decode($http->getResponseBody(), true);
            $response['result'] = (array) $response['result'];
            $response['metadata'] = (array) $response['metadata'];
        }
        return $response;
    }
}

