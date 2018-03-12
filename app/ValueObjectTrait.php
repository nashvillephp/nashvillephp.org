<?php
declare(strict_types=1);

namespace App;

use Camel\CaseTransformerInterface;

/**
 * Provides value object functionality
 */
trait ValueObjectTrait
{
    /**
     * A transformer for converting method names
     *
     * @var CaseTransformerInterface
     */
    private $caseTransformer;

    /**
     * Proxy method calls to an ArrayValueObject for looking up data
     *
     * @param string $method The name of the invoked method
     * @param array $args An array of arguments for the invoked method
     * @return mixed
     */
    public function __call(string $method, array $args)
    {
        $valueObject = new ArrayValueObject(
            $this->getData(),
            $this->getCaseTransformer()
        );

        return $valueObject->{$method}(...$args);
    }

    /**
     * Sets the case transformer for converting method names
     *
     * @param CaseTransformerInterface $caseTransformer
     * @return void
     */
    public function setCaseTransformer(CaseTransformerInterface $caseTransformer): void
    {
        $this->caseTransformer = $caseTransformer;
    }

    /**
     * Returns the case transformer for converting method names
     *
     * @return CaseTransformerInterface
     */
    public function getCaseTransformer(): CaseTransformerInterface
    {
        return $this->caseTransformer;
    }

    /**
     * Returns the raw array of data for the value object
     *
     * @return array
     */
    public abstract function getData(): array;
}
