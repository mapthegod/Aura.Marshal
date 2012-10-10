Overall
-------

- Create EntityTrait and CollectionTrait, and make the Entity and Collection
  classes use them. Then users don't have to extend the Entity and Collection;
  they can apply the trait to their own domain objects.

GenericType
-----------

- Add methods ...

    - deleteEntity() capability; note that this only marks it for deletion,
      and does not actually do anyting in a data store. Should this also
      cascade through subordinate relationships?
    
    - removeEntity() to remove from the IdentityMap without marking for
      deletion.
    
    - getDeletedEntities() to get a collection of entities that were deleted
      using deleteEntity()


GenericCollection
-----------------

- Add methods ...

    - deleteEntity() to remove from the collection and mark for deletion.
      Should this cascade through subordinate relationships?

    - removeEntity() to remove from the collection without marking for
      deletion (and without removing from the IdentityMap).


GenericEntity
-------------

- Add methods ...

    - getIdentityValue() to return the identity value for the entity
    
    - getIdentityField() to return the identity field for the entity
    
    