<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Model\Carro;
use Illuminate\Support\Facades\Input;

class CarroController extends BaseController {
    private $carro = null;

    public function __construct(Carro $carro){
        $this->carro = $carro;
    }

    public function todosCarros(){
        return response()->json($this->carro->todasCarros(), 200)
            ->header("Content-Type","application/json");
    }

    public function salvarCarro(){
        return response()->json($this->carro->salvarCarro(), 201)
            ->header("Content-Type", "application/json");
    }

    public function atualizarCarro($id){
        $carro = $this->carro->atualizarCarro($id);
        if(!$carro){
            return response()->json(['response', 'Carro não encontrado.'], 400)
                ->header("Content-Type", "application/json");
        }
        return response()->json($carro, 200)
            ->header("Content-Type","application/json");
    }

    public function getCarro($id){
        $carro = $this->carro->getCarro($id);
        if(!$carro){
            return response()->json(['response', 'Carro não encontrado.'], 400)
                ->header("Content-Type", "application/json");
        }
        return response()->json($carro, 200)
            ->header("Content-Type","application/json");
    }

    public function deletarCarro($id){
        $carro = $this->carro->deletarCarro($id);
        if(!$carro){
            return response()->json(['response','Carro não encontrado.'], 400)
                ->header("Content-Type","application/json");
        }
        return response()->json($carro, 200)
            ->header("Content-Type","application/json");
    }
}

?>