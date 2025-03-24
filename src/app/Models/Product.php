<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function seasons()
    {
        return $this->hasMany(Season::class, 'product_id');
    }
    
    public function scopeNameSearch($query, $name_input)
    {
        if (!empty($name_input)) {
            $query->where('name', 'like', '%' . $name_input . '%');
        }
    }
}