<?php
namespace App\Http\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

class Carro extends Model{

    protected $table = 'carro';
    protected $fillable = array ('id', 'nome', 'anoFabricacao', 'anoModelo', 'preco', 'km', 'vendido', 'opcionais', 'marca_id', 'garagem_id');
    protected $primaryKey = 'id';

    public function todosCarros(){
        return self::all();
    }
    public $timestamps = false;

    public function salvarCarro(){
        $input = Input::all();
        $carro = new Carro($input);
        $carro->save();
        return $carro;
    }

    public function getCarro($id){
        $carro = self::find($id);
        if (is_null($carro)){
            return false;
        }
        return $carro;
    }

    public function deletarCarro($id){
        $carro = self::find($id);
        if(is_null($carro)){
            return false;
        }
        return $carro->delete();
    }

    public function atualizarCarro($id){
        $carro = self::find($id);
        if(is_null($carro)){
            return false;
        }
        $input = Input::all();
        $carro->fill($input);
        $carro->save();
        return $carro;
    }
}

?>