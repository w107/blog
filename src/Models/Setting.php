<?php

namespace Inn20\Blog\Models;

class Setting extends Model
{

    public function __construct(array $attributes = [])
    {
        $this->setTable(get_full_table('settings'));
        parent::__construct($attributes);
    }

}