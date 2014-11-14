<?php

namespace Happyr\DoctrineSpecification\Filter;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Happyr\DoctrineSpecification\Exception\InvalidArgumentException;

class FilterCollection implements Filter
{
    /**
     * @var Filter[]
     */
    private $children;

    /**
     * Construct it with one or more instances of Filter
     */
    function __construct()
    {
        $this->children = func_get_args();
    }


    /**
     * @param QueryBuilder $qb
     * @param string       $dqlAlias
     *
     * @return string
     */
    public function getFilter(QueryBuilder $qb, $dqlAlias)
    {
        $filters = [];

        foreach ($this->children as $child) {
            if (!$child instanceof Filter) {
                throw new InvalidArgumentException(
                    sprintf(
                        'Child passed to FilterCollection must be an instance of Happyr\DoctrineSpecification\Filter\Filter, but instance of %s found',
                        get_class($child)
                    )
                );
            }

            $filters[] = $child->getFilter($qb, $dqlAlias);
        }

        return implode(' AND ', $filters);
    }
}
