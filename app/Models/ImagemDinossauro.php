<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemDinossauro extends Model
{
    use HasFactory;

    protected $table = 'tb_imagem_dinossauro';
    protected $primaryKey = 'cd_imagem_dinossauro';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'cd_dinossauro',
        'no_imagem_dinossauro',
        'dt_inclusao'
    ];
}
