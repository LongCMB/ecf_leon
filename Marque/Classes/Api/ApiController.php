<?php

namespace App\API;

use Classes\Models\BrandManager;

class ApiController
{
    public function getBrands()
    {
        $manager = new BrandManager();
        $brands = $manager->findAll();
        $data = [];
        foreach ($brands as $item) {
            $brand['id'] = $item->id;
            $brand['marque'] = $item->marque;
            $brand['date_modif'] = $item->date_modif;

            $data[] = $brand;
        }

        $this->render($data);
    }

    protected function render(array $data)
    {

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $output = json_encode($data);

        $error = json_last_error();

        if ($error == JSON_ERROR_NONE) {
            echo $output;
        };
    }
}
