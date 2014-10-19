# Upgrade from 0.2 to 0.3

It has been many changes since 0.2 and we refactored quite a lot. These are the biggest changes.

## Changed interfaces

The old `Specification` interface has been split up to two parts. We got a `Filter` with will modify the `SELECT` clause of
the SQL query. We also got the `QueryModifier` interface the modifies the query (Limit, Order, Join etc). I a normal scenario you will not be creating objects implementing the Filter or QueryModifier directly. 

The new `Specification` interface extends `Filter` and `QueryModifier`. 

You have to update your specifications to comply with the new `Specification`. The easiest way of doing this is to extend `BaseSpecification`. You got 3 ways of using the `BaseSpecification`. 

1. Return a Filter instance by overriding `BaseSpecification::getFilterInstance()`
1. Return a QueryBuilder instance by overriding `BaseSpecification::getQueryModifierInstance()`
1. Set a Specification to `BaseSpecification::$spec` in the constructor.


## BaseSpecification

There are two new methods `getFilter` and `modify`. You don't need to override these. You may use BaseSpecfication as normal. 

The `supports` function has been removed.

## EntitySpecificationRepository

The `match` method has changed to take a second optional parameter of a `ResultModifier`. You may modify the result by changing
the hydration mode or to add a cache. We decided that it would not be a part of a `Specification`.
