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
namespace Aura\Marshal\Relation;

use Aura\Marshal\Exception;
use Aura\Marshal\Manager;
use Aura\Marshal\Type\GenericType;

/**
 * 
 * Represents a relationship definition between two types.
 * 
 * @package Aura.Marshal
 * 
 */
abstract class AbstractRelation
{
    /**
     * 
     * The type manager object.
     * 
     * @var Manager
     * 
     */
    protected $manager;

    /**
     * 
     * The foreign type object.
     * 
     * @var GenericType
     * 
     */
    protected $foreign_type;

    /**
     * 
     * The field in the native entity to match against.
     * 
     * @var string
     * 
     */
    protected $native_field;

    /**
     * 
     * The field in the foreign entity to match against.
     * 
     * @var string
     * 
     */
    protected $foreign_field;

    /**
     * 
     * Constructor.
     * 
     * @param string $native_type The name of the native type.
     * 
     * @param string $foreign_type The name of the foreign type.
     * 
     * @param array $info An array of relationship definition information.
     * 
     * @param Manager $manager The type manager.
     * 
     */
    public function __construct($native_type, $foreign_type, $info, Manager $manager)
    {
        if (! $info['native_field']) {
            throw new Exception("No 'native_field' specified for relation '$foreign_type' in type '$native_type'.");
        }

        if (! $info['foreign_field']) {
            throw new Exception("No 'foreign_field' specified for relation '$foreign_type' in type '$native_type'.");
        }

        $this->manager = $manager;
        $this->foreign_type  = $this->manager->__get($foreign_type);
        $this->native_field  = $info['native_field'];
        $this->foreign_field = $info['foreign_field'];
    }
    
    abstract public function getForEntity($entity);
}
