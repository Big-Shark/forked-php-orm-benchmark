<?php

use Atlas\Orm\Mapper\AbstractMapper;

class BookMapper extends AbstractMapper
{
    protected function setRelated()
    {
        $this->manyToOne('author', AuthorMapper::CLASS);
    }
}