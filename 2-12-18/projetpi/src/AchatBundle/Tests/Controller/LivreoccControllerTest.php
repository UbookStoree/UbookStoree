<?php

namespace AchatBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LivreoccControllerTest extends WebTestCase
{
    public function testReadallocc()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/readallocc');
    }

}
