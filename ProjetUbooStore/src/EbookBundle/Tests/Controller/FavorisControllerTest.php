<?php

namespace EbookBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FavorisControllerTest extends WebTestCase
{
    public function testReadfav()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/readFav');
    }

    public function testCreatfav()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/creatFav');
    }

    public function testUpdatefav()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/UpdateFav');
    }

    public function testDeletefav()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteFav');
    }

}
