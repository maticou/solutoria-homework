<?php namespace App\Models;

use CodeIgniter\Model;

class IndicadoresModel extends Model
{
    protected $table = 'indicadores';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombreIndicador', 'codigoIndicador', 'unidadMedidaIndicador', 'valorIndicador', 'fechaIndicador', 'tiempoIndicador', 'origenIndicador'];
}
