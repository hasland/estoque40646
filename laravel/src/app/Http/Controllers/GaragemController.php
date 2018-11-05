<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Model\Garagem;
use Illuminate\Support\Facades\Input;

class GaragemController extends BaseController {
    private $garagem = null;

    public function __construct(Garagem $garagem){
        $this->garagem = $garagem;
    }

    public function todasGaragens(){
        return response()->json($this->garagem->todasGaragens(), 200)
            ->header("Content-Type","application/json");
    }

    public function salvarGaragem(){
        return response()->json($this->garagem->salvarGaragem(), 201)
            ->header("Content-Type", "application/json");
    }

    public function atualizarGaragem($id){
        $garagem = $this->garagem->atualizarGaragem($id);
        if(!$garagem){
            return response()->json(['response', 'Garagem não encontrada.'], 400)
                ->header("Content-Type", "application/json");
        }
        return response()->json($garagem, 200)
            ->header("Content-Type","application/json");
    }

    public function getGaragem($id){
        $garagem = $this->garagem-getGaragem($id);
        if(!$garagem){
            return response()->json(['response', 'Garagem não encontrada.'], 400)
                ->header("Content-Type", "application/json");
        }
        return response()->json($garagem, 200)
            ->header("Content-Type","application/json");
    }

    public function deletarGaragem($id){
        $garagem = $this->garagem->deletarGaragem($id);
        if(!$garagem){
            return response()->json(['response','Garagem não encontrada.'], 400)
                ->header("Content-Type","application/json");
        }
        return response()->json($garagem, 200)
            ->header("Content-Type","application/json");
    }
}

?>