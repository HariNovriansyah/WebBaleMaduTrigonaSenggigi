<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();

        // Set ID saat model sedang dibuat
        static::creating(function ($model) {
            $model->id = 'b-' . now()->format('dmyHis');
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
