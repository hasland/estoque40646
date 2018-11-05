<?php
namespace App\Http\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

class Garagem extends Model{

    protected $table = 'garagem';
    protected $fillable = array ('id', 'nome');
    protected $primaryKey = 'id';

    public function todasGaragens(){
        return self::all();
    }
    public $timestamps = false;

    public function salvarGaragem(){
        $input = Input::all();
        $garagem = new Garagem($input);
        $garagem->save();
        return $garagem;
    }

    public function getGaragem($id){
        $garagem = self::find($id);
        if (is_null($garagem)){
            return false;
        }
        return $produto;
    }

    public function deletarGaragem($id){
        $garagem = self::find($id);
        if(is_null($garagem)){
            return false;
        }
        return $garagem->delete();
    }

    public function atualizarGaragem($id){
        $garagem = self::find($id);
        if(is_null($garagem)){
            return false;
        }
        $input = Input::all();
        $garagem->fill($input);
        $garagem->save();
        return $garagem;
    }
}

?>