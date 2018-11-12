<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Model\Marca;
use Illuminate\Support\Facades\Input;

class MarcaController extends BaseController {
    private $marca = null;

    public function __construct(Marca $marca){
        $this->marca = $marca;
    }

    public function todasMarcas(){
        return response()->json($this->marca->todasMarcas(), 200)
            ->header("Content-Type","application/json");
    }

    public function salvarMarca(){
        return response()->json($this->marca->salvarMarca(), 201)
            ->header("Content-Type", "application/json");
    }

    public function atualizarMarca($id){
        $marca = $this->marca->atualizarMarca($id);
        if(!$marca){
            return response()->json(['response', 'Marca não encontrada.'], 400)
                ->header("Content-Type", "application/json");
        }
        return response()->json($marca, 200)
            ->header("Content-Type","application/json");
    }

    public function getMarca($id){
        $marca = $this->marca->getMarca($id);
        if(!$marca){
            return response()->json(['response', 'Marca não encontrada.'], 400)
                ->header("Content-Type", "application/json");
        }
        return response()->json($marca, 200)
            ->header("Content-Type","application/json");
    }

    public function deletarMarca($id){
        $marca = $this->marca->deletarMarca($id);
        if(!$marca){
            return response()->json(['response','Marca não encontrada.'], 400)
                ->header("Content-Type","application/json");
        }
        return response()->json($marca, 200)
            ->header("Content-Type","application/json");
    }
}

?>