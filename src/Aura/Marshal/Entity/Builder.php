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
namespace Aura\Marshal\Entity;

/**
 * 
 * Creates a new entity object for a type by setting individual properties.
 * 
 * @package Aura.Marshal
 * 
 */
class Builder implements BuilderInterface
{
    protected $class = 'Aura\Marshal\Entity\GenericEntity';
    
    // protected $proxy_builder;
    // 
    // public function __construct(ProxyBuilder $proxy_builder)
    // {
    //     $this->proxy_builder = $proxy_builder;
    // }
    
    /**
     * 
     * Creates a new entity object.
     * 
     * @param string $class The entity class to build.
     * 
     * @param object $initial_data The initial data for the entity fields.
     * 
     * @return GenericEntity
     * 
     */
    public function newInstance($initial_data)
    {
        // basic entity
        $class = $this->class;
        $entity = new $class;
        
        // set field values
        foreach ((array) $initial_data as $field => $value) {
            $entity->$field = $value;
        }
        
        // // set relateds
        // foreach ($type->getRelationNames() as $relation_name) {
        //     $relation = $type->getRelation($relation_name);
        //     $proxy = $this->proxy_builder($relation);
        //     $entity->$relation_name = $proxy;
        // }
        
        // done!
        return $entity;
    }
}
