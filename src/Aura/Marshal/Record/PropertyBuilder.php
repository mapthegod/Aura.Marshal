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
 * Creates a new record object for a type by setting individual properties.
 * 
 * @package Aura.Marshal
 * 
 */
class PropertyBuilder implements BuilderInterface
{
    /**
     * 
     * Creates a new record object.
     * 
     * @param string $class The record class to build.
     * 
     * @param object $initial_data The initial data for the record fields.
     * 
     * @return GenericRecord
     * 
     */
    public function newInstance($class, $initial_data)
    {
        $record = new $class;
        foreach ((array) $initial_data as $field => $value) {
            $record->$field = $value;
        }
        return $record;
    }
}
