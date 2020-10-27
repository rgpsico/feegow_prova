<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\paciente;
class medicoController extends Controller{

   public function curl_list($url){  
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: kvstore.p.rapidapi.com',
            'x-access-token:eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38 ',
            'Content-Type:application/json'
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
         }
    


public function list(){
    $url = 'https://api.feegow.com/v1/api/specialties/list';
    $this->curl_list($url);
  
    }
  
   // https://rogerneves.com.br/teste/medico/api/curl.php?action=professional%2Flist%3Fespecialidade_id%3D258
    public function profissional_list($id){
       $url = 'https://api.feegow.com/v1/api/professional/list?especialidade_id='.$id;        
        $this->curl_list($url);
      
    }

    public function como_conheceu(){
        $url = 'https://api.feegow.com/v1/api/patient/list-sources';        
        $this->curl_list($url);
      
    }

public function create(Request $request){ 
 
   paciente::create([
       'name'=>$request->name,
       'cpf'=>$request->cpf,
       'source_id'=>$request->source_id,
       'specialty_id'=>$request->specialty_id,
       'professional_id'=>$request->professional_id,
       'birthDate'=>$request->birthDate
   ]);
   


}
     
}



?>