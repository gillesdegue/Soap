<?php

namespace App\Controllers;

use Zend\Soap\AutoDiscover;
use Zend\Soap\Server as SoapServer;
use Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeComplex;
use Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence;

class SoapServiceController
{


    public function server()
    {
        $options = [
            'uri' => 'http://mglsi.local/soap/wsdl',
            'location' => 'http ://mglsi.local/soap'
        ];
        $server = new SoapServer('http://mglsi.local/soap/wsdl', $options);
        $server->setClass('App\SoapApi\My_Soap');
        $server->handle();
    }

    public function autodiscover()
    {
        $wsdl = new AutoDiscover(new ArrayOfTypeSequence()); // It generates the WSDL 
        $wsdl->setOperationBodyStyle(array(
            'use' => 'literal',
            'namespace' => 'http://schemas.xmlsoap.org/soap/encoding/'
        ));
    //$wsdl->setBindingStyle(array(
    //    'style' => 'document'
    //));
       // $complex_type_strategy = new ArrayOfTypeComplex();
       // $complex_type_strategy->addComplexType('App\Models\Domain\User');
       // $wsdl->setComplexTypeStrategy($complex_type_strategy);
        $wsdl->setClass('App\SoapApi\My_Soap')
            ->setServiceName('MyServices')
            ->setUri('http://mglsi.local/soap');
        header('Content-type: application/xml');
    //$wsdl->handle();

        echo $wsdl->generate()->toXML();
    }
}