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

    public function update()
    {
        //
    }

    public function delete()
    {
        //
    }

    public function testdb()
    {
        $db = \Config\Database::connect();
        if ($db->connect()) {
            echo 'Database connection successful!';
        } else {
            echo 'Database connection failed!';
        }
    }

}