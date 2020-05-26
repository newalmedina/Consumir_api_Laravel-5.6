<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        // Send a request to https://foo.com/api/test
        $usuarios = $this->get("usuario");
        return $usuarios;
    }
    public function show($id)
    {
        // Send a request to https://foo.com/api/test
        $usuarios = $this->get("usuario/" . $id);
        return $usuarios;
    }
    public function add()
    {

        // Send a request to https://foo.com/api/test
        $newUsuario = $this->client->request('POST', "usuario", [
            'json' =>
            [
                "nombre" => "sa",
                "apellidos" => "flsaores"
            ]
        ]);

        return "usuario Agregado";
    }
    public function edit($id)
    {

        // Send a request to https://foo.com/api/test
        $editUsuario = $this->client->request('PUT', "usuario/" . $id, [
            'json' =>
            [
                "nombre" => "morena",
                "apellidos" => "morena"
            ]
        ]);

        return $editUsuario;
    }

    public function delete($id)
    {

        // Send a request to https://foo.com/api/test
        $deleteUsuario = $this->client->request('delete', "usuario/" . $id);

        return "usuario eliminado";
    }

    protected function get($url)
    {
        $peticion = $this->client->request('GET', $url);
        $respuesta = (string) $peticion->getBody();
        $respuesta = json_decode($respuesta, true);
        return $respuesta;
    }
}
