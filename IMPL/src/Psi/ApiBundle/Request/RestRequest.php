<?php
namespace Psi\ApiBundle\Request;

use Psi\ApiBundle\Event\ApiRequestEvent;

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
        $query = $this->_server . $url . "?api_key=" . $this->_authenthication->getApiKey();
        foreach ($this->getQueryParams() as $name => $value) {
            $query = $query . "&$name=" . urlencode($value);
        }
        return $query;
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

        $dispatcher = $this->getEventDispatcher();
        if ($dispatcher) {
            $dispatcher->dispatch( ApiRequestEvent::NAME . '_send_before', new ApiRequestEvent($this));
        }

        $url = $this->getUrl();
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPGET, true);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);

        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        $responseData = json_decode($body, true);
        $responseInfo = curl_getinfo($curl);
        curl_close($curl);
        $this->constructResponse($responseData, $responseInfo, $header);

        $this->_response->setHeader($header);

        if ($dispatcher) {
            $dispatcher->dispatch( ApiRequestEvent::NAME . '_send_after', new ApiRequestEvent($this));
        }

        return $this;
    }
}
