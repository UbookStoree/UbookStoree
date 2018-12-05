<?php

namespace AchatBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminCmommandeControllerTest extends WebTestCase
{
    public function testGetallcmd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getAllCmd');
    }

    public function testSearchcmd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/SearchCmd');
    }

    public function testValiderlivraison()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ValiderLivraison');
    }

    public function testSearchcmdadmin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/SearchCmdAdmin');
    }

}
