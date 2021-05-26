<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $table = 'enrollment';

    protected $fillable = [
       'student_id','status','pending','writtenOrOnlineExamRating','oralExamOrInterviewRating',
       'date_enrolled','payment_proof_filename','modality_id','payment_id','class_section'
    ];
}
