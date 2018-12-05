<?php

namespace AchatBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PanierControllerTest extends WebTestCase
{
    public function testAddocc()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addocc');
    }

    public function testDeleteocc()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteocc');
    }

    public function testEditocc()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/editocc');
    }

    public function testGetpanier()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getpanier');
    }

}
