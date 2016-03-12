<?php
/**
 * @author Thorsten 'stepo' Hallwas
 */

namespace IdGenerator\Decorator;

use IdGenerator\GeneratorInterface;

/**
 * Adds a separator after x characters.
 */
class Separator implements GeneratorInterface
{

    /**
     * @var GeneratorInterface
     */
    protected $decoratedGenerator;

    /**
     * @var string
     */
    protected $charactersBeforeSeparator;

    /**
     * @var string
     */
    protected $separator;

    /**
     * @param GeneratorInterface $decoratedGenerator
     */
    public function __construct(GeneratorInterface $decoratedGenerator, $charactersBeforeSeparator, $separator)
    {
        $this->decoratedGenerator = $decoratedGenerator;
        $this->charactersBeforeSeparator = $charactersBeforeSeparator;
        $this->separator = $separator;
    }

    /**
     * Splits the generated id every configured character with a separator.
     * @return string
     */
    public function generateId()
    {
        $memberId = $this->decoratedGenerator->generateId();
        $parts = str_split($memberId, $this->charactersBeforeSeparator);

        return implode($this->separator, $parts);
    }

}