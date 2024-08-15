<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocDocumento extends Model
{
    protected $table= 'doc_documento';
    protected $primaryKey = 'doc_id';

    protected $fillable=[
        'doc_nombre',
        'doc_codigo',
        'doc_contenido',
        'doc_id_tipo',
        'doc_id_proceso'
    ];

    public $timestamps = false;
    use HasFactory;
}
