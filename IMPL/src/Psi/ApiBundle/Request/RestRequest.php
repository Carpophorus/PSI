<?php
namespace Psi\ApiBundle\Request;

class RestRequest extends AbstractRequest
{

    /**
     * Server endpoint
     * @var string 
     */
    protected $_server;

    /**
     * Url template for endpoint
     * @var string 
     */
    protected $_url;

    /**
     * Authentication needed for making calls towards endpoint
     * @var AuthenticationInterface 
     */
    protected $_authenthication;

    public function __construct(AuthenticationInterface $authenthication, $params, $url)
    {
        $this->_authenthication = $authenthication;
        $this->_params = $params;
        $this->_url = $url;
    }

    /**
     * Processes url template by matching params with tokens. 
     * Returns a valid rest url.
     * @return string
     */
    protected function getUrl()
    {
        $params = $this->getParams();
        $url = $this->_url;
        foreach ($params as $key => $value) {
            $url = str_replace('{' . $key . '}', $value, $url);
        }
        return $this->_server . $url . "?api_key=" . $this->_authenthication->getApiKey();
    }

    protected function constructResponse($responseData, $responseInfo)
    {
        $this->_response = new RestResponse($responseData, $responseInfo);
    }

    /**
     * Constructs and sends a REST request towards endpoint
     */
    public function sendRequest()
    {
        if (!function_exists('curl_init')) {
            throw new Exception("CURL is not installed.");
        }

        $url = $this->getUrl();
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPGET, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $responseData = json_decode(curl_exec($curl), true);
        $responseInfo = curl_getinfo($curl);
        curl_close($curl);

        $this->constructResponse($responseData, $responseInfo);
    }
}
