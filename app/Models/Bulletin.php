<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bulletin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['author'];

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
