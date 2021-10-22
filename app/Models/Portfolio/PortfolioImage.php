<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    use HasFactory;


    public function portfolio()
    {
        return $this->belongsTo('App\Portfolio', 'portfolio_id', 'id');
    }
}
