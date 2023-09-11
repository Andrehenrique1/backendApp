<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'avaliacao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'id_cliente',
        'id_autonomo',
        'avaliacao',
        'comentario',
    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'id_usuario');
    }
}
