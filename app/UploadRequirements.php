<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadRequirements extends Model
{
    protected $table = 'upload_requirements';

    protected $fillable = [
        
        'student_id',
        'name',
        'description',
        'attachment',
    ];
}
