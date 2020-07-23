<?php

namespace Inn20\Blog\Models;

class Navigation extends Model
{

    public function __construct(array $attributes = [])
    {
        $this->setTable(get_full_table('navigations'));
        parent::__construct($attributes);
    }

}