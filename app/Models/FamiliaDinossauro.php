<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamiliaDinossauro extends Model
{
    use HasFactory;

    protected $table = 'tb_familia_dinossauro';
    protected $primaryKey = 'cd_familia_dinossauro';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'no_familia_dinossauro',
        'dt_inclusao'
    ];

    public function dinossauro()
    {
        return $this->hasOne(Dinossauro::class, 'cd_familia_dinossauro');
    }
}
