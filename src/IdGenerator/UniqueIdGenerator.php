<?php
/**
 * @author Thorsten 'stepo' Hallwas
 */
namespace IdGenerator;

/**
 * A number generator based on uniqueid generating a 13 characters long string.
 */
class UniqueIdGenerator implements GeneratorInterface
{
    /**
     * @var bool
     */
    protected $moreEntropy;

    /**
     * @param bool $moreEntropy
     */
    public function __construct($moreEntropy = true)
    {
        $this->moreEntropy = $moreEntropy;
    }

    /**
     * Returns a 13 or 23 digit long id.
     * @return string
     */
    public function generateId()
    {
        return uniqid('', $this->moreEntropy);
    }

}