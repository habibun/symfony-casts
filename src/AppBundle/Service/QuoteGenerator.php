<?php

namespace AppBundle\Service;

use Psr\Log\LoggerInterface;

class QuoteGenerator
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function getRandomQuote()
    {
        $quotes = array(
            'If my answers frighten you then you should cease asking scary questions. (Pulp Fiction)',
            'Now that we know who you are, I know who I am. (Unbreakable)',
            'Enough is enough! I have had it with these m*****f*****g snakes on this m*****f*****g plane! (Snakes on a Plane)',
            'Say "what" again. SAY "WHAT" AGAIN! I dare you, I double dare you (Pulp Fiction)',
        );

        $key = array_rand($quotes);
        $quote = $quotes[$key];
        $this->logger->info('Selected quote: '.$quote);

        return $quote;
    }
}
