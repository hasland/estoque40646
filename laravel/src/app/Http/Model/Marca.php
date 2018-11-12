<?php
namespace App\Http\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

class marca extends Model{

    protected $table = 'marca';
    protected $fillable = array ('id', 'nome');
    protected $primaryKey = 'id';

    public function todasMarcas(){
        return self::all();
    }
    public $timestamps = false;

    public function salvarMarca(){
        $input = Input::all();
        $marca = new Marca($input);
        $marca->save();
        return $marca;
    }

    public function getMarca($id){
        $marca = self::find($id);
        if (is_null($marca)){
            return false;
        }
        return $marca;
    }

    public function deletarMarca($id){
        $marca = self::find($id);
        if(is_null($marca)){
            return false;
        }
        return $marca->delete();
    }

    public function atualizarMarca($id){
        $marca = self::find($id);
        if(is_null($marca)){
            return false;
        }
        $input = Input::all();
        $marca->fill($input);
        $marca->save();
        return $marca;
    }
}

?>