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

/**
 * 
 * Creates a new record object for a type by calling setter methods.
 * 
 * @package Aura.Marshal
 * 
 */
class SetterBuilder implements BuilderInterface
{
    /**
     * 
     * Creates a new record object.
     * 
     * @param string $class The record class to build.
     * 
     * @param object $initial_data The initial data for the record fields.
     * 
     * @return object
     * 
     */
    public function newInstance($class, $initial_data)
    {
        $record = new $class;
        foreach ((array) $initial_data as $field => $value) {
            $method = 'set' . $field;
            $record->$method($value);
        }
        return $record;
    }
}
