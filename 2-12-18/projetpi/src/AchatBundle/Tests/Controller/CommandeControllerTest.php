<?php

namespace AchatBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CommandeControllerTest extends WebTestCase
{
    public function testValidercmd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/validerCmd');
    }

    public function testAnnulercmd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/annulerCmd');
    }

    public function testGetcmd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getCmd');
    }

    public function testSearchcmd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/searchCmd');
    }

}
