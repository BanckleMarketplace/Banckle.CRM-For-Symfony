<?php

namespace Banckle\Bundle\CRMBundle\Service;

use Banckle\CRM\Product;
use Banckle\CRM\APIClient;
use Banckle\CRM\AuthApi;

class BanckleCRMWrapper
{
    private $apiKey = '';
    private $banckleAccountUri = '';
    private $banckleCRMUri = '';
	
    public function __construct($apiKey ,$banckleAccountUri, $banckleCRMUri)
    {
        $this->apiKey = $apiKey;
        $this->banckleAccountUri = $banckleAccountUri;
        $this->banckleCRMUri = $banckleCRMUri;
    }
	
    /*
    * Generate new authentication token.
    *
    * @return string Returns the token.
    */
    public function getToken($email, $password)
    {
        if ($email == '') {
            throw new \InvalidArgumentException('Email not specified');
    	}
        
        if ($password == '') {
            throw new \InvalidArgumentException('Password not specified');
    	}
        
        $apiClient = new APIClient($this->apiKey, $this->banckleAccountUri);
        $body = array('userEmail' => $email, 'password' => $password);
        $auth = new AuthApi($apiClient);
        $result = $auth->getToken($body);
        $token = $result->authorization->token;
        return $token;
    }
	
    /*
    * Create an instance of the class.
    *
    * @param string $apiName Name of the class.
    * @param string $token Token.
    *
    * @return object
    * @throws Exception
    */
    public function createInstance($apiName, $token)
    {	
        if ($apiName == '') {
            throw new \InvalidArgumentException('API Name not specified');
    	}
		
        if ($token == '') {
            throw new \InvalidArgumentException('Token not specified');
    	}
		
        Product::$token = $token; 
        $apiClient = new APIClient($this->apiKey, $this->banckleCRMUri);
        $classPath = "Banckle\CRM\\$apiName"; 
        return new $classPath($apiClient);
    }
	
}