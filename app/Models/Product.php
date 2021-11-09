<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeProduct;
use App\Models\ProductAttachment;
use App\User;

Class Product extends Model
{
    protected $table = 'tb_product';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'type_product_id',
        'name',
        'size',
        'detail',
        'fabric_type',
        'amount',
        'price',
        'created_by',
        'created_at',
        'updated_at'
    ];

    public function getTypeProduct() {
        return $this->belongsTo(TypeProduct::class, 'type_product_id', 'id');
    }

    public function getSize() {
        if ($this->size == 1) {
            return 'S';
        }else if ($this->size == 2) {
            return 'M';
        }else if ($this->size == 3) {
            return 'L';
        }else {
            return 'XL';
        }
    }

    public function getProductAttachment() {
        return $this->hasMany(ProductAttachment::class, 'product_id', 'id');
    }

    public function getUser() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}