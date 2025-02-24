<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lullabot\Mpx\Tests\Fixtures;

/**
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class ParentDummy
{
    /**
     * Short description.
     *
     * Long description.
     */
    public $foo;

    /**
     * @var float
     */
    public $foo2;

    /**
     * @var callable
     */
    public $foo3;

    /**
     * @var void
     */
    public $foo4;

    /**
     * @var mixed
     */
    public $foo5;

    /**
     * @var \SplFileInfo[]|resource
     */
    public $files;

    public function isC(): ?bool
    {
    }

    /**
     * @return bool
     */
    public function canD()
    {
    }

    /**
     * @param resource $e
     */
    public function addE($e)
    {
    }

    public function removeF(\DateTime $f)
    {
    }
}
