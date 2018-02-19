<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AIdata extends Model
{
    protected $table = 'aidata'; // ★
    protected $fillable = [
        'filename', 'filetype', 'explanation', 'username'
    ];
    static $filetypes = [
        'テキスト', '画像'
    ];
}
