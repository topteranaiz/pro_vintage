<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class TypeProduct extends Model
{
    protected $table = 'tb_type_product';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'created_at',
        'created_by'
    ];
}