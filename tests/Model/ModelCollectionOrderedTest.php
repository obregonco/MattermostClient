<?php

declare(strict_types=1);

namespace Pnz\MattermostClient\Tests\Model;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Pnz\MattermostClient\Model\ModelCollectionOrdered;

/**
 * @internal
 */
#[CoversClass(ModelCollectionOrdered::class)]
final class ModelCollectionOrderedTest extends TestCase
{
    public function testCreateModelCollectionOrdered(): void
    {
        $elements = [
            'el-0' => ['element0'],
            'el-1' => ['element1'],
            'el-2' => ['element2'],
        ];
        $order = [
            'el-2',
            'el-0',
            'el-1',
        ];

        $models = MockModelCollectionOrdered::createFromArray([
            'items' => $elements,
            'order' => $order,
        ]);

        $this->assertCount(3, $models);
        $this->assertSame($order, $models->getOrder());

        $this->assertSame('el-2', $models->key());
        $this->assertSame($elements['el-2'], $models->current()->data);
        $models->next();
        $this->assertTrue($models->valid());

        $this->assertSame('el-0', $models->key());
        $this->assertSame($elements['el-0'], $models->current()->data);
        $models->next();
        $this->assertTrue($models->valid());

        $this->assertSame('el-1', $models->key());
        $this->assertSame($elements['el-1'], $models->current()->data);
        $models->next();
        $this->assertFalse($models->valid());

        $models->rewind();
        $this->assertSame('el-2', $models->key());
        $this->assertTrue($models->valid());
    }
}
