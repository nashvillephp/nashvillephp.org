<?php
declare(strict_types=1);

namespace App;

use Camel\CaseTransformerInterface;

/**
 * A value object created from a hash of properties
 *
 * This value object provides recursive access to child and grandchild
 * properties of the hash, through getter method accessors.
 *
 * For example:
 *
 * ``` php
 * $hash = [
 *     'foo' => [
 *         'bar' => [
 *             'baz' => 'qux',
 *         ],
 *     ],
 * ];
 *
 * $caseTransformer = new CaseTransformer(new CamelCase(), new SnakeCase());
 * $valueObject = new ArrayValueObject($hash, $caseTransformer);
 *
 * echo $valueObject->getFoo()->getBar()->getBaz(); // writes "qux"
 * ```
 *
 */
class ArrayValueObject
{
    /**
     * The hash of values for which this VO is an accessor
     *
     * @var array
     */
    private $value = [];

    /**
     * A transformer to convert hash property names to method names
     *
     * @var CaseTransformerInterface
     */
    private $caseTransformer;

    /**
     * Constructs a value object from an array
     *
     * @param array $value The hash of values for this value object
     * @param CaseTransformerInterface A transformer to convert hash property
     *     names to method names
     */
    public function __construct(
        array $value,
        CaseTransformerInterface $caseTransformer
    ) {
        $this->value = $value;
        $this->caseTransformer = $caseTransformer;
    }

    /**
     * For `get*()`, looks up the value from the hash and returns it
     *
     * If the value is itself another hash, then another ArrayValueObject is
     * returned representing that hash, using the same case transformer.
     *
     * @param string $method The name of the invoked method
     * @param array $args An array of arguments for the invoked method
     * @return mixed
     */
    public function __call(string $method, array $args)
    {
        if (strpos($method, 'get') !== 0) {
            throw new \Error('Call to undefined method ' . __CLASS__ . '::' . $method . '()');
        }

        $transformedName = $this->caseTransformer->transform(substr($method, 3));
        $nextValue = $this->value[$transformedName] ?? null;

        if ($this->isAssociativeArray($nextValue)) {
            $nextValue = new static($nextValue, $this->caseTransformer);
        }

        return $nextValue;
    }

    /**
     * Returns the original value used to create this value object
     *
     * @return array
     */
    public function getValue(): array
    {
        return $this->value;
    }

    /**
     * Returns true if $value is an associative array
     *
     * @param array $value The array to check
     * @return bool
     */
    private function isAssociativeArray($value): bool
    {
        return (is_array($value) && count(array_filter(array_keys($value), 'is_string')) > 0);
    }
}
