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
        $model = new IndicadoresModel();
        $data['indicators'] = $model->orderBy('id', 'DESC')->where('codigoIndicador', 'UF')->paginate(10);

        // Get the pager object
        $pager = $model->pager;

        // Pass the pager object to the view
        $data['pager'] = $pager;

        return view('indicadores', $data);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {

            // Get the POST data
            $data = $this->request->getPost();

            // Convert text fields to uppercase
            $data['nombreIndicador'] = strtoupper($data['nombreIndicador']);
            $data['codigoIndicador'] = strtoupper($data['codigoIndicador']);

            $model = new IndicadoresModel();

            // validate the data
            if (!$model->validate($data)) {
                return $this->response->setJSON(['success' => false, 'message' => $model->errors()]);
            }
            $model->save($data);
            return $this->response->setJSON(['success' => true, 'message' => 'Data saved successfully.']);
        } else {            
            return view('create');
        }
    }


    public function update($id)
    {
        $model = new IndicadoresModel();

        $data = [
            'nombreIndicador' => strtoupper($this->request->getPost('nombreIndicador')),
            'codigoIndicador' => strtoupper($this->request->getPost('codigoIndicador')),
            'unidadMedidaIndicador' => $this->request->getPost('unidadMedidaIndicador'),
            'valorIndicador' => $this->request->getPost('valorIndicador'),
            'fechaIndicador' => $this->request->getPost('fechaIndicador'),
            'tiempoIndicador' => $this->request->getPost('tiempoIndicador'),
            'origenIndicador' => $this->request->getPost('origenIndicador'),
        ];

        $model->update($id, $data);
    }
    

    public function delete($id)
    {
        $model = new IndicadoresModel();
        $model->delete($id);
    }

    public function graph($start_date, $end_date)
    {
        $model = new IndicadoresModel();

        // Get data for graph
        $data = $model->select('fechaIndicador, valorIndicador')
                    ->where('fechaIndicador >=', $start_date)
                    ->where('fechaIndicador <=', $end_date)
                    ->where('codigoIndicador', 'UF')
                    ->orderBy('fechaIndicador', 'asc')
                    ->findAll();

        // Transform data
        $labels = array();
        $values = array();

        foreach ($data as $row) {
            $labels[] = $row['fechaIndicador'];
            $values[] = $row['valorIndicador'];
        }

        $graphData = array(
            'labels' => $labels,
            'datasets' => array(
                array(
                    'label' => 'UF',
                    'data' => $values,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1
                )
            )
        );
        return $this->response->setJSON($graphData);
    }
}
