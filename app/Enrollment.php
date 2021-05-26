<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $table = 'enrollment';

    protected $fillable = [
       'student_id','SY','status','pending','writtenOrOnlineExamRating','oralExamOrInterviewRating',
        'payment_proof_filename','modality_id','payment_id','class_section'
    ];
}
