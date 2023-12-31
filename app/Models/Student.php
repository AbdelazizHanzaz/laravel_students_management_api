<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'phone', 'address', 'dob', 'year', 'status'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
