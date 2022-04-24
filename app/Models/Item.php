<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    protected $table = 'items';

    protected $primaryKey = 'id'; 

    public $timestamps = true;

    protected $fillable = ['name','category','place', 'datefound','description', 'image_path','user_id'];
}