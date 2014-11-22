<?php

namespace Happyr\DoctrineSpecification\Filter;

class BitwiseOr extends Comparison
{
    public function __construct($field, $value, $dqlAlias = null)
    {
        parent::__construct(self::BWO, $field, $value, $dqlAlias);
    }
}
