<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinossauro extends Model
{
    use HasFactory;

    protected $table = 'tb_dinossauro';
    protected $primaryKey = 'cd_dinossauro';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'cd_familia_dinossauro',
        'cd_tipo_dinossauro',
        'no_dinossauro',
        'tm_dinossauro',
        'dt_inclusao'
    ];

    public function familia()
    {
        return $this->belongsTo(FamiliaDinossauro::class, 'cd_familia_dinossauro');
    }

    public function tipo()
    {
        return $this->belongsTo(TipoDinossauro::class, 'cd_tipo_dinossauro');
    }
}
