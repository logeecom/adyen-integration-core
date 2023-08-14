<?php

namespace Adyen\Core\Tests\Infrastructure\ORM;

use Adyen\Core\Infrastructure\ORM\Configuration\EntityConfiguration;
use Adyen\Core\Infrastructure\ORM\Configuration\IndexMap;
use PHPUnit\Framework\TestCase;

/**
 * Class EntityConfigurationTest
 * @package Adyen\Core\Tests\Infrastructure\ORM
 */
class EntityConfigurationTest extends TestCase
{
    public function testEntityConfiguration()
    {
        $map = new IndexMap();
        $type = 'test';
        $config = new EntityConfiguration($map, $type);

        $this->assertEquals($map, $config->getIndexMap());
        $this->assertEquals($type, $config->getType());
    }
}
