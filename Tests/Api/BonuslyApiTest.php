<?php

namespace Tests\Chaplean\Bundle\BonuslyClientBundle\Api;

use Chaplean\Bundle\BonuslyClientBundle\Api\BonuslyApi;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * BonuslyApiTest.php.
 *
 * @author    Hugo - Chaplean <hugo@chaplean.coop>
 * @copyright 2014 - 2017 Chaplean (http://www.chaplean.coop)
 * @since     1.0.0
 */
class BonuslyApiTest extends TestCase
{
    /**
     * @var BonuslyApi
     */
    private $api;

    /**
     * @var array
     */
    private $routes;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->api = new BonuslyApi(new Client(), new EventDispatcher(), 'http://test.com');

        $reflector = new \ReflectionClass(BonuslyApi::class);
        $property = $reflector->getProperty('routes');
        $property->setAccessible(true);
        $this->routes = $property->getValue($this->api);
    }

    /**
     * @covers \Chaplean\Bundle\BonuslyClientBundle\Api\BonuslyApi::__construct()
     *
     * @return void
     */
    public function testConstruct()
    {
        $api = new BonuslyApi(new Client(), new EventDispatcher(), 'http://test.com');
        $this->assertInstanceOf(BonuslyApi::class, $api);
    }

    /**
     * @covers \Chaplean\Bundle\BonuslyClientBundle\Api\BonuslyApi::buildApi()
     *
     * @return void
     */
    public function testGetRoutes()
    {
        $methods = ['users', 'companies', 'leaderboards', 'bonuses'];

        $this->assertArrayHasKey('get', $this->routes);
        $this->assertCount(4, $this->routes['get']);
        foreach ($methods as $method) {
            $this->assertArrayHasKey($method, $this->routes['get']);
        }
    }

    /**
     * @covers \Chaplean\Bundle\BonuslyClientBundle\Api\BonuslyApi::buildApi()
     *
     * @return void
     */
    public function testDeleteRoutes()
    {
        $methods = ['users'];

        $this->assertArrayHasKey('delete', $this->routes);
        $this->assertCount(1, $this->routes['delete']);
        foreach ($methods as $method) {
            $this->assertArrayHasKey($method, $this->routes['delete']);
        }
    }

    /**
     * @covers \Chaplean\Bundle\BonuslyClientBundle\Api\BonuslyApi::buildApi()
     *
     * @return void
     */
    public function testPostRoutes()
    {
        $methods = ['users', 'bonuses'];

        $this->assertArrayHasKey('post', $this->routes);
        $this->assertCount(2, $this->routes['post']);
        foreach ($methods as $method) {
            $this->assertArrayHasKey($method, $this->routes['post']);
        }
    }

    /**
     * @covers \Chaplean\Bundle\BonuslyClientBundle\Api\BonuslyApi::buildApi()
     *
     * @return void
     */
    public function testPutRoutes()
    {
        $methods = ['users', 'companies'];

        $this->assertArrayHasKey('put', $this->routes);
        $this->assertCount(2, $this->routes['put']);
        foreach ($methods as $method) {
            $this->assertArrayHasKey($method, $this->routes['put']);
        }
    }
}
