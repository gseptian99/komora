<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class pertanyaanPost extends Model
{
    use HasFactory, Sluggable;

    //protected $fillable = ['title', 'slug', 'excerpt', 'body'];
    protected $guarded = ['id'];
    protected $with = ['author'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%' . $search . '%')
                  -> orWhere('body', 'like', '%' . $search . '%');
        });
    }

    // public function category(){
    //     return $this->belongsTo(Category::class);
    // }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
