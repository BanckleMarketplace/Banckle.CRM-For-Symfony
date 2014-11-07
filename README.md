#Banckle.CRM for Symfony

This bundle allows you to work with Banckle.CRM SDK in your Symfony applications quickly and easily. 


Installation
----------------------------------

Add the following lines to your composer.json file:

<pre>
// composer.json
{
    // ...
    require: {
        // ..
        "banckle/crm-sdk-php": "dev-master",
        "banckle/crm-bundle": "dev-master"

    }
}
</pre>


Now, you can install the new dependencies by running Composer's update command from the directory where your composer.json file is located.

<pre>
    composer update
</pre>


Update your AppKernel.php file, and register the new bundle:

<pre>
// app/AppKernel.php
public function registerBundles()
{
    // ...
     new Banckle\Bundle\CRMBundle\BanckleCRMBundle(),
    // ...
);
}
</pre>

Configuration
----------------------------------

Add this to your config.yml:

<pre>
banckle_crm:
    #(Required) Your Account apiKey from apps.banckle.com
    apiKey: "XXXXXXXXXXXXX"
    banckleAccountUri: "https://apps.banckle.com/api/v2"
    banckleCRMUri: "https://crm.banckle.com/api/v1.0"
</pre>

Usage
----------------------------------

The Bundle is called as a standard service. 

<pre>
To access service:
$bancklecrm = $this->get('bancklecrm.api');

To generate token:
$bancklecrm = $this->get('bancklecrm.api');
$token = $bancklecrm->getToken($email, $password);

To get all contacts:
$contacts = $bancklecrm->createInstance('ContactsApi', $token);
$result = $contacts->getContacts();
</pre>
