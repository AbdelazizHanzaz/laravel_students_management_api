<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

     // attributes
  public $table = 'enrollment';

  public function student()
  {
    return $this->belongsTo(Student::class);
  }

  public function course()
  {
    return $this->belongsTo(Course::class); 
  }
}
