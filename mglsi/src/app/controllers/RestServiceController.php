<?php

namespace App\Controllers;

use App\RestApi\SimpleRest;
use App\Models\Dao\ArticleModel;
use Spatie\ArrayToXml\ArrayToXml;

class RestServiceController extends SimpleRest
{

    public function allArticle()
    {
        $article = new ArticleModel();
        $data = $article->restAll();
        if (empty($data)) {
            $statusCode = 404;
            $data = array('error' => 'No articles found!');
        } else {
            $statusCode = 200;
        }
        if (isset($_GET['encode'])) {
            if ($_GET['encode'] == 'json') {

                $this->setHttpHeaders("application/json", $statusCode);
                $response = $this->encodeJson($data);
                var_dump($response);
            }
            if ($_GET['encode'] == 'xml') {

                $this->setHttpHeaders("application/xml", $statusCode);
                $response = $this->encodeXml($data);
                var_dump($response);
            }
        } else {

            $this->setHttpHeaders("application/json", $statusCode);
            $response = $this->encodeJson($data);
            var_dump($response);
        }
    }

    public function getArticleByID()
    {
        $article = new ArticleModel();

        if (isset($_GET['id'])) {

            $data = $article->getByCategoryId($_GET['id']);
            if (empty($data)) {
                $statusCode = 404;
                $data = array('error' => 'No articles found!');
            } else {
                $statusCode = 200;
            }
            $this->setHttpHeaders("application/json", $statusCode);
            $response = $this->encodeJson($data);
            var_dump($response);
        } else {
            return null;
        }
    }

    public function getArticleByCategory()
    {
        $article = new ArticleModel();

        $data = $article->getByCategory();
        if (empty($data)) {
            $statusCode = 404;
            $data = array('error' => 'No articles found!');
        } else {
            $statusCode = 200;
        }
        $this->setHttpHeaders("application/json", $statusCode);
        $response = $this->encodeJson($data);
        var_dump($response);
    }

    public function encodeHtml($responseData)
    {

        $htmlResponse = "<table border='1'>";
        foreach ($responseData as $key => $value) {
            $htmlResponse .= "<tr><td>" . $key . "</td><td>" . $value . "</td></tr>";
        }
        $htmlResponse .= "</table>";
        return $htmlResponse;
    }

    public function encodeJson($responseData)
    {
        $jsonResponse = json_encode($responseData, JSON_PRETTY_PRINT);
        return $jsonResponse;
    }

    public function encodeXml($responseData)
    {
        return $result = ArrayToXml::convert($responseData);
		// creating object of SimpleXMLElement
       // foreach ($responseData as $resp)
         //   foreach ($res as $key => $value) {
          //  $xml->addChild($key, $value);
       // }
        //return $xml->asXML();
    }
}