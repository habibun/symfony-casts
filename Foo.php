<?php

namespace Acme\Tools;

use DateTime;

class Foo
{
    public function doAwesomeThings()
    {
        echo "Hi Foo!\n";

        $dt = new DateTime();
        echo $dt->getTimestamp()."\n";
    }
}
