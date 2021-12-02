<?php

namespace app\controllers;

use app\models\Resep;
use app\Router;

class ResepController
{
    public function index(Router $router)
    {
        $search = $_GET['search'] ?? '';
        $resep = $router->db->getResep($search);
        // echo '<pre>';
        // var_dump($resep);
        // echo '</pre>';
        $router->renderView('resep/index', [
            'resep' => $resep,
            'search' => $search
        ]);
    }

    public function create(Router $router)
    {
        $errors = [];
        $resepData = [
            'title' => '',
            'image' => '',
            'description' => '',
            'ingredients' => '',
            'step' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resepData['title'] = $_POST['title'];
            $resepData['description'] = $_POST['description'];
            $resepData['ingredients'] = $_POST['ingredients'];
            $resepData['step'] = $_POST['step'];
            $resepData['imageFile'] = $_FILES['imageFile'] ?? null;

            $resep = new Resep();
            $resep->load($resepData);
            $errors = $resep->save();
            if (empty($errors)) {
                header('Location: /resep');
                exit;
            }
        }

        $router->renderView('resep/create', [
            'resep' => $resepData,
            'errors' => $errors
        ]);
    }

    public function update()
    {
        echo "Update Page";
    }

    public function delete()
    {
        echo "Delete Page";
    }

    public function baca(Router $router)
    {
        $router->renderView('resep/baca');
    }

}