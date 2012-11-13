<?php
namespace Aura\Marshal;
use Aura\Marshal\Collection\GenericCollection;
use Aura\Marshal\Type\GenericType;
use Aura\Marshal\Entity\Builder as EntityBuilder;
use Aura\Marshal\Collection\Builder as CollectionBuilder;
use Aura\Marshal\Proxy\Builder as ProxyBuilder;

/**
 * Test class for Collection.
 * Generated by PHPUnit on 2011-11-26 at 16:38:42.
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    protected $type;
    
    protected $collection;
    
    protected $empty_collection;
    
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $ids = [1, 2, 3, 5, 7, 11, 13];
        $names = ['foo', 'bar', 'baz', 'dib', 'zim', 'gir', 'irk'];
        $data = [];
        foreach ($names as $key => $name) {
            $data[] = (object) [
                'id' => $ids[$key],
                'name' => $name
            ];
        }
        
        $this->collection = new GenericCollection($data);
        $this->empty_collection = new GenericCollection([]);
    }
    
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testGetFieldValues()
    {
        $expect = [1, 2, 3, 5, 7, 11, 13];
        $actual = $this->collection->getFieldValues('id');
        $this->assertSame($expect, $actual);
    }

    public function testIsEmpty()
    {
        $this->assertTrue($this->empty_collection->isEmpty());
        $this->assertFalse($this->collection->isEmpty());
    }
    
    public function testObjectsInCollectionAreInIdentityMap()
    {
        $type = new GenericType;
        $type->setIdentityField('id');
        $type->setEntityBuilder(new EntityBuilder);
        $type->setCollectionBuilder(new CollectionBuilder);
        
        $ids = [1, 2, 3, 5, 7, 11, 13];
        $names = ['foo', 'bar', 'baz', 'dib', 'zim', 'gir', 'irk'];
        $data = [];
        foreach ($names as $key => $name) {
            $data[] = [
                'id' => $ids[$key],
                'name' => $name
            ];
        }
        
        $type->load($data);
        
        // get a collection of all the IDs from the type *before* creating
        // any entity objects.
        $collection = $type->getCollection($ids);
        
        // get a entity by ID from the type and change it.
        // note that getEntity() is by identity value, not offset.
        $expect = $type->getEntity(1);
        $expect->name = 'changed';
        
        // now get what should be the same entity from the collection.
        // it should be changed as well.
        // note that collection is by offset, not identity value.
        $actual = $collection[0];
        $this->assertSame($expect->name, $actual->name);
    }
}
