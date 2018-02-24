<?php
declare(strict_types=1);

namespace Tests\Unit;

use App\ArrayValueObject;
use Camel\CaseTransformer;
use Camel\Format\CamelCase;
use Camel\Format\SnakeCase;
use Tests\TestCase;

class ArrayValueObjectTest extends TestCase
{
    public function testCallThrowsErrorWhenNotGetter()
    {
        $caseTransformer = new CaseTransformer(new CamelCase(), new SnakeCase());
        $valueObject = new ArrayValueObject([], $caseTransformer);

        $this->expectException(\Error::class);
        $this->expectExceptionMessage(
            'Call to undefined method App\ArrayValueObject::setFoo()'
        );

        $valueObject->setFoo('bar');
    }

    public function testSimpleArray()
    {
        $value = ['foo', 'bar', 'baz'];

        $caseTransformer = new CaseTransformer(new CamelCase(), new SnakeCase());
        $valueObject = new ArrayValueObject($value, $caseTransformer);

        $this->assertSame($value, $valueObject->getValue());
        $this->assertNull($valueObject->getFoo());
    }

    public function testSimpleHash()
    {
        $value = ['foo' => 1, 'bar' => 2, 'baz' => 3];

        $caseTransformer = new CaseTransformer(new CamelCase(), new SnakeCase());
        $valueObject = new ArrayValueObject($value, $caseTransformer);

        $this->assertSame($value, $valueObject->getValue());
        $this->assertSame(1, $valueObject->getFoo());
    }

    public function testRecursiveHash()
    {
        $value = [
            'foo' => [
                'bar' => [
                    'baz' => 'qux',
                ],
            ],
        ];

        $caseTransformer = new CaseTransformer(new CamelCase(), new SnakeCase());
        $valueObject = new ArrayValueObject($value, $caseTransformer);

        $this->assertSame($value, $valueObject->getValue());
        $this->assertSame('qux', $valueObject->getFoo()->getBar()->getBaz());
    }
}
