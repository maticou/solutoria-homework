<?php namespace App\Models;

use CodeIgniter\Model;

class IndicadoresModel extends Model
{
    protected $table = 'indicadores';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombreIndicador', 'codigoIndicador', 'unidadMedidaIndicador', 'valorIndicador', 'fechaIndicador', 'tiempoIndicador', 'origenIndicador'];

    protected $validationRules = [
        'nombreIndicador' => 'required|max_length[37]',
        'codigoIndicador' => 'required|max_length[14]',
        'unidadMedidaIndicador' => 'required|max_length[10]',
        'valorIndicador' => 'required|numeric',
        'fechaIndicador' => 'required|valid_date',
        'tiempoIndicador' => 'max_length[30]',
        'origenIndicador' => 'required|max_length[13]'
    ];
}
