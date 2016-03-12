<?php
/**
 * @author Thorsten 'stepo' Hallwas
 */
namespace IdGenerator;

/**
 * Generates a string (number) on a definable base and length.
 */
class BaseXGenerator implements GeneratorInterface
{
    /**
     * @var array
     */
    protected $digits = array(
        0, 1, 2, 3, 4, 5, 6, 7, 8, 9, // 10
        'a', 'b', 'c', 'd', 'e', 'f', // 16
        'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', // 36
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', // 62
    );

    /**
     * @var int
     */
    protected $base;

    /**
     * @var int
     */
    protected $length;

    /**
     * Constructs a Generator on the base x.
     * @param integer $base
     * @param integer $length
     */
    public function __construct($base, $length)
    {
        $this->verifyBase($base);
        $this->verifyLength($length);
    }

    /**
     * Returns a number.
     * @return string
     */
    public function generateId()
    {
        $memberId = '';

        for ($i = 0; $i < $this->length; $i++) {
            $memberId .= $this->digits[rand(0, $this->base - 1)];
        }

        return $memberId;
    }

    /**
     * @param integer $base
     */
    public function verifyBase($base)
    {
        $base = (int) $base;
        if ($base < 1) {
            $base = 1;
        } else if ($base > 62) {
            $base = 62;
        }
        $this->base = $base;
    }

    /**
     * @param integer $length
     */
    public function verifyLength($length)
    {
        $length = (int) $length;
        if ($length < 1) {
            $length = 1;
        }
        $this->length = $length;
    }

}