<?php

namespace Happyr\DoctrineSpecification\Filter;

class BitwiseOr extends Comparison
{
    public function __construct($field, $value, $dqlAlias = null)
    {
        parent::__construct(self::BIT_OR, $field, $value, $dqlAlias);
    }
}
