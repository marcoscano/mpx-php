<?php

namespace Lullabot\Mpx\Tests\Functional\DataService\Account;

use Lullabot\Mpx\DataService\ByFields;
use Lullabot\Mpx\DataService\DataObjectFactory;
use Lullabot\Mpx\DataService\DataServiceManager;
use Lullabot\Mpx\DataService\Range;
use Lullabot\Mpx\Tests\Functional\FunctionalTestBase;
use Psr\Http\Message\UriInterface;

/**
 * Tests loading Account objects.
 */
class AccountQueryTest extends FunctionalTestBase
{
    /**
     * Test loading two Account objects.
     */
    public function testQueryAccount()
    {
        $manager = DataServiceManager::basicDiscovery();
        $dof = new DataObjectFactory($manager->getDataService('Access Data Service', 'Account', '1.0'), $this->authenticatedClient);
        $filter = new ByFields();
        $range = new Range();
        $range->setStartIndex(1)
            ->setEndIndex(2);
        $filter->setRange($range);
        $results = $dof->select($filter);

        foreach ($results as $index => $result) {
            $this->assertInstanceOf(UriInterface::class, $result->getId());

            // Loading the object by itself.
            $reload = $dof->load($result->getId());
            $this->assertEquals($result, $reload->wait());
            if ($index + 1 > 2) {
                break;
            }
        }
    }
}
