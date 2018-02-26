<?php

use Atlas\Orm\Mapper\AbstractMapper;

class AuthorMapper extends AbstractMapper
{
    protected function setRelated()
    {
        $this->oneToMany('books', BookMapper::CLASS);
    }
}