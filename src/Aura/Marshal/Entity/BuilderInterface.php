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

use Aura\Marshal\Type\GenericType;

/**
 * 
 * An inteface for EntityBuilder objects.
 * 
 * @package Aura.Marshal
 * 
 */
interface BuilderInterface
{
    /**
     * 
     * Creates a new entity object.
     * 
     * @param GenericType $type The type for this entity.
     * 
     * @param mixed $initial_data Data to load into the entity.
     * 
     */
    public function newInstance($initial_data);
}
