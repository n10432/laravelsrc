<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'projectname', 'userid', 'datatype', 'description', 'privacy'
    ];
    static $datatypes = [
        'テキスト', '画像'
    ];
    static $privacies = [
        'public', 'private'
    ];

}
