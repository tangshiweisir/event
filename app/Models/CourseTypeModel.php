<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTypeModel extends Model
{
    //
    public $table = 'course_type';
    public $primaryKey = 'course_id';
    public $timestamps = false;
}
