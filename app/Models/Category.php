<?php

namespace App\Models;
// namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'description'];
    
    protected $dates = ['deleted_at'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }  
}
