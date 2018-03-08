<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raw extends Model
{
    protected $table = 'raws';
    protected $fillable = [
        'rawname', 'filepath', 'userid', 'projectname', 'description'
    ];
}
