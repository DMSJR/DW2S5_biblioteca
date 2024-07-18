<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Book extends Model
{
    use HasFactory;
    protected $casts = [
        'items' => 'array',
        'date' => 'datetime'
    ];
    protected $dates = ['date'];

    protected $guarded = [];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
}
