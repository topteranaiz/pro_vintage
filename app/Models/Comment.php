<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\User;

Class Comment extends Model
{
    protected $table = 'tb_comment';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'user_id',
        'comment',
        'created_at',
    ];

    public function getUser() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}