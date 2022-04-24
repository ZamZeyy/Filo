<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;
    
    protected $table = 'claims';

    protected $primaryKey = 'id'; 

    public $timestamps = true;

    protected $fillable = ['item_id','reason','image_path','user_id'];
}
