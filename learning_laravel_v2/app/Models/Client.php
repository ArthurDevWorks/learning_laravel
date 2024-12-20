<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory,SoftDeletes,HasUuids;

    //Array com colunas com permissao para manipular
    protected $fillable = [
        'user_id', 
        'document',
        'birthdate'
    ];
    protected $casts = [
        'birthdate' => 'datetime'
    ];
    public function uniqueIds()
    {
        return ['uuid'];
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function signatures(){
        return $this->hasMany(Signature::class);
    }
}