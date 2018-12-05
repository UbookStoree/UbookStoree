<?php

namespace booksBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OffreControllerTest extends WebTestCase
{
    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/create');
    }

    public function testValidate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/validate');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/delete');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/edit');
    }

    public function testDisplay()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/display');
    }

}
