<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class ClienteApiController extends Controller
{
    public function __construct(Cliente $cliente, Request $request)
    {
        $this->cliente = $cliente;
        $this->request = $request;
    }

    public function GetAll() 
    {
        $data = $this->cliente->all();

        return response() -> json($data);
    }

    public function Create(Request $request)
    {
        $this -> validate($request, $this -> cliente -> rules());

        $dataForm = $request -> all();

        if ($request -> hasFile('image') && $request -> file('image') -> isValid()) {
            $extension = $request -> image -> extension();

            $name = uniqid(date('His'));

            $nameFile = "{$name}.{$extension}";

            $upload = Image::make($dataForm['image']) -> resize(177, 236) -> save(storage_path("app/public/clientes/$nameFile", 70));

            if (!$upload) {
                return response() -> json(['error' => 'Falha ao fazer upload'], 500);
            } else {
                $dataForm['image'] = $nameFile;
            }
        }

        $data = $this -> cliente -> create($dataForm);

        return response() -> json($data, 201);
    }

    public function GetById($id)
    {
        //
    }

    public function Update(Request $request, $id)
    {
        //
    }

    public function Delete($id)
    {
        //
    }
}
