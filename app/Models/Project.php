<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeUnit\FunctionUnit;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ["name","type_id", "technology","description","url","image"];

    // relations

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function getImageUri() {
        return $this->image ? asset('storage/' .$this->image) : 'https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg';
    }
}