<?php

namespace App\Models;

use App\Models\Step;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;

    //Fillable Property
    protected $fillable = [
        'title',
        'description'
    ];

    public function steps(){
        return $this->hasMany(Step::class);
    }
}
