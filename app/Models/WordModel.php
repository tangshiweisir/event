<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WordModel extends Model
{
    //
    public $table = "word";
    public $timestamps = false;
    public $pramaryKey = "w_id";
}
