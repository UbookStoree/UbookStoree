<?php

namespace EbookBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EbookControllerTest extends WebTestCase
{
    public function testReadbook()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/readbook');
    }

    public function testCreatbook()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/creatbook');
    }

    public function testUpdatebook()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updatebook');
    }

    public function testDeletebook()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deletebook');
    }

}
