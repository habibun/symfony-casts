<?php

require __DIR__.'/vendor/autoload.php';

use DiDemo\FriendHarvester;

/* START BUILDING CONTAINER */

$container = new Pimple();

require __DIR__.'/app/config.php';
require __DIR__.'/app/services.php';

/* END CONTAINER BUILDING */

/** @var FriendHarvester $friendHarvester */
$friendHarvester = $container['friend_harvester'];
$friendHarvester->emailFriends();
