<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDinossauro extends Model
{
    use HasFactory;

    protected $table = 'tb_tipo_dinossauro';
    protected $primaryKey = 'cd_tipo_dinossauro';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'no_tipo_dinossauro',
        'dt_inclusao'
    ];

    public function dinossauro()
    {
        return $this->hasOne(Dinossauro::class, 'cd_tipo_dinossauro');
    }
}
