<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipTipoDoc extends Model
{
   protected $table = 'tip_tipo_doc';//a que tabla le pertenece el modelo
   protected $primaryKey = 'tip_id';

    protected $fillable =[
        'tip_nombre',
        'tip_prefijo',
    ];

    use HasFactory;
}
