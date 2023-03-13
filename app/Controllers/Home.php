<?php

namespace App\Controllers;
use App\Models\IndicadoresModel;

class Home extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        // Retrieve data from the database
        $model = new IndicadoresModel();
        $data['indicators'] = $model->findAll();


        // Load the view
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
