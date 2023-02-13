<?php

namespace App\Controller;

use Doctrine\DBAL\Connection;

class Issue27901Controller
{
    public function test(Connection $connection)
    {
        $qb = $connection->createQueryBuilder();
        $connection->executeUpdate($qb);
    }
}