<?php
/**
 * @author Thorsten 'stepo' Hallwas
 */
namespace IdGenerator;

/**
 * Interface for member number generators.
 */
interface GeneratorInterface 
{
    /**
     * Returns a generated id.
     * @return string
     */
    public function generateId();

}