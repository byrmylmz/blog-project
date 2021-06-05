<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title','full_text','category_id','user_id','published_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    /**
     * |anonymous global scope
     * |https://laravel.com/docs/8.x/eloquent#anonymous-global-scopes
     */

   
        protected static function booted()
        {   
            if(auth()->check() && !auth()->user()->is_admin && !auth()->user()->is_publisher ){
                static::addGlobalScope('user', function (Builder $builder) {
                    $builder->where('user_id', auth()->id());
                });
            } 
        }
   



}
