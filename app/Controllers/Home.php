<?php

namespace App\Controllers;
use App\Models\IndicadoresModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Pager\Pager;
use CodeIgniter\Pager\SimplePager;

class Home extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $model = new IndicadoresModel();
        $data['indicators'] = $model->paginate(10); // display 10 records per page

        // Get the pager object
        $pager = $model->pager;

        // Pass the pager object to the view
        $data['pager'] = $pager;

        return view('indicadores', $data);
    }

    public function create()
    {
        //
    }

    public function update($id)
    {
        $model = new IndicadoresModel();
        $data = [
            'nombreIndicador' => $this->request->getPost('nombreIndicador'),
            'codigoIndicador' => $this->request->getPost('codigoIndicador'),
            'unidadMedidaIndicador' => $this->request->getPost('unidadMedidaIndicador'),
            'valorIndicador' => $this->request->getPost('valorIndicador'),
            'fechaIndicador' => $this->request->getPost('fechaIndicador'),
            'tiempoIndicador' => $this->request->getPost('tiempoIndicador'),
            'origenIndicador' => $this->request->getPost('origenIndicador'),
        ];
        $model->update($id, $data);
    }
    


    public function eliminarAjax($id)
    {
        $model = new IndicadoresModel();
        $model->delete($id);
    }

}
