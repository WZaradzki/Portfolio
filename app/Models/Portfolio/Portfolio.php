<?php

namespace App\Models\Portfolio;

use App\Models\Portfolio\PortfolioImage;
use App\Models\Portfolio\PortfolioSection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }

    public function sections()
    {
        return $this->hasMany(PortfolioSection::class);
    }

    public function links()
    {
        return $this->hasMany(PortfolioLink::class);
    }
}
