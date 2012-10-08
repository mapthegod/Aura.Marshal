<?php
/**
 * 
 * This file is part of the Aura project for PHP.
 * 
 * @package Aura.Marshal
 * 
 * @license http://opensource.org/licenses/bsd-license.php BSD
 * 
 */
namespace Aura\Marshal\Record;

use Aura\Marshal\Data;
use Aura\Marshal\Type\GenericType;

/**
 * 
 * Represents a single record.
 * 
 * @package Aura.Marshal
 * 
 */
class GenericRecord extends Data
{
    /**
     * 
     * Gets the value of a field by name.
     * 
     * @param string $field The requested field name.
     * 
     * @return mixed The field value.
     * 
     */
    public function __get($field)
    {
        return $this->offsetGet($field);
    }

    /**
     * 
     * Sets a the value of a field by name.
     * 
     * @param string $field The requested field name.
     * 
     * @param mixed $value The value to set the field to.
     * 
     * @return void
     * 
     */
    public function __set($field, $value)
    {
        return $this->offsetSet($field, $value);
    }

    /**
     * 
     * Does a certain field exist in the record?
     * 
     * @param string $field The requested field name.
     * 
     * @return bool
     * 
     */
    public function __isset($field)
    {
        return $this->offsetExists($field);
    }

    /**
     * 
     * Unsets a field in the record.
     * 
     * @param string $field The requested field name.
     * 
     * @return void
     * 
     */
    public function __unset($field)
    {
        $this->offsetUnset($field);
    }
}
