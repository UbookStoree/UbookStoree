<?php

namespace booksBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LivreOccasionControllerTest extends WebTestCase
{
    public function testCreatel()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/createl');
    }

}
