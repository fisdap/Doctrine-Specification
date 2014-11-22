<?php

namespace Happyr\DoctrineSpecification\Filter;

class BitwiseAnd extends Comparison
{
    public function __construct($field, $value, $dqlAlias = null)
    {
        parent::__construct(self::BIT_AND, $field, $value, $dqlAlias);
    }
}
