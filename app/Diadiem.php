<?php

namespace App;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class DiaDiem extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'diadiem';
    
    protected $fillable = [
        'ten','diachi','dientich','tinh','huyen','xa',
    ];

}

