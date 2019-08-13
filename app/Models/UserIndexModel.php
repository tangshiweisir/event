<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserIndexModel extends Model
{
    //
    public $table = "user_index";

    public $timestamps = false;

    protected $pramaryKey = "user_id";
}
