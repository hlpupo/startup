<?php

namespace Restaurant\RstaurantBundle\Tests\Controller;

use Doctrine\ORM\Cache;
use Guzzle\Service\Client;
//use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Liip\FunctionalTestBundle\Test\WebTestCase as WebTestCase;
class ProvinceControllerTest extends WebTestCase {

  private $client;

  public function testIndex() {
    //$route = $this->getUrl('province');

    //$crawler = $this->client->request('GET', $route, array('ACCEPT' => 'application/json'));
    /*$this->client->request(
        'GET',
        '/app_dev.php/api/province',
        array(), /* request params */
        /*array(), /* files */
        /*array('HTTP_ACCEPT' => 'application/json')
    );*/
    ///var_dump($this->client->getResponse()->getStatusCode());
    //$this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    //$this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);

    //$client   = static::createClient();
    //$crawler  = $client->request('GET', '/api/province');
    //$client->request('GET', '/api/province', array(), array());

    //$response = $client->getResponse();
    //var_dump($response->getStatusCode());
    //$this->assertJsonResponse($response, 200);
    //$this->assertJsonResponse(200, 200);
  }

 /* public function testPostProvinceAction(){
    $this->client->request(
        'POST',
        '/api/provinces',
        array("province" => array("name" => 'testProvince')),
        array()
    );
    $response = $this->client->getResponse();
    $this->assertJsonResponse($response, 201);
  }*/
  public function testDeleteProvinceAction(){
    $this->client->request('POST', '/api/provinces/finds', array(), array());

    $response = $this->client->getResponse();
    //$data =  json_decode($response->getContent());
    //$content = $response->getContent();
    //$decoded = json_decode($content, true);
    var_dump($response->getStatusCode());
    /*$this->client->request(
        'DELETE',
        '/api/province',
        array("province" => array("name" => 'testProvince')),
        array()
    );
    $response = $this->client->getResponse();
    $this->assertJsonResponse($response, 201);*/
  }

  protected function assertJsonResponse($response, $statusCode = 200)
  {
    $this->assertEquals(
        $statusCode,
        $response->getStatusCode(),
        $response->getContent()

    );
    $this->assertTrue(
        $response->headers->contains('Content-Type', 'application/json'),
        $response->headers
    );
  }

  public function setUp() {

    $this->client = static::createClient();
    /* $this->client = new Client('http://startup.localhost.com/app_dev.php', array(
         'request.options' => array(
             'exceptions' => false,
         )
     ));*/
  }

  static public $expected = array(array('name' => 'TestProvince'));
}
