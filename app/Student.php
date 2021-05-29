<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
       'id','user_id','lrn','first_name','middle_name','last_name','name_extension','contact_no',
       'sex','birthdate','birthplace','citizenship','religion','no_siblings','birth_order', 'purok','municipality',
       'province'
    ];
}
