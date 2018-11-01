<?php

namespace Lullabot\Mpx\Tests\Unit\Service\Player;

use Lullabot\Mpx\DataService\Access\Account;
use Lullabot\Mpx\DataService\Media\Media;
use Lullabot\Mpx\DataService\Player\Player;
use Lullabot\Mpx\Service\Player\Url;
use PHPUnit\Framework\TestCase;

/**
 * Tests generating player URLs for embedding.
 *
 * @coversDefaultClass \Lullabot\Mpx\Service\Player\Url
 */
class UrlTest extends TestCase
{
    /**
     * Tests generating a URI object.
     *
     * @covers ::__construct
     * @covers ::toUri
     * @covers ::setPlayAll
     * @covers ::setAutoplay
     * @covers ::__toString
     */
    public function testToUri()
    {
        $account = new Account();
        $account->setPid('account-pid');

        $player = new Player();
        $player->setPid('player-pid');

        $media = new Media();
        $media->setPid('media-pid');
        $player_url = new Url($account, $player, $media);

        $this->assertEquals('https://player.theplatform.com/p/account-pid/player-pid/select/media/media-pid', (string) $player_url->toUri());

        $player_url->setAutoplay(true);
        $player_url->setPlayAll(true);
        $this->assertEquals('https://player.theplatform.com/p/account-pid/player-pid/select/media/media-pid?autoPlay=true&playAll=true', (string) $player_url);

        $player_url->setAutoplay(false);
        $player_url->setPlayAll(false);
        $this->assertEquals('https://player.theplatform.com/p/account-pid/player-pid/select/media/media-pid?autoPlay=false&playAll=false', (string) $player_url);
    }
}
