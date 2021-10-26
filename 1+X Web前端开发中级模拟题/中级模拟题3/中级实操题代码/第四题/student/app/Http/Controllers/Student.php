<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected  $table = 'student';

    public $timestamps = false;

    public function getDateFormat(){
        return time();
    }

    public function asDateTime($value)
    {
        return $value;
    }
}
