<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    public $table = 'course';
    public $primaryKey = 'c_id';
    public $timestamps = false;
}
