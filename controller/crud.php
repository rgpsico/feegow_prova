<?php
include('../api/Config.inc.php');

$Check = new Check;
$data['name']                 =  $_POST['name'];
$data['cpf']                  =  $_POST['cpf'];
$data['specialty_id']         =  $_POST['specialty_id'];
$data['professional_id']      =  $_POST['professional_id'];
$data['source_id']            =  $_POST['source_id'];
$data['date_time']            =  date("Y-m-d"); 

// transfomando data padrão brasileiro para Padrão americano
$data['birthDate']   =    $Check->DATE_SIMPLE($_POST['birthDate']); 
// Todos os campos são obrigatorios
if(empty($data['name']) || empty($data['cpf'])  || empty($data['source_id'])  || empty($data['birthDate']))
{
echo 0;
exit;
}

//
$Create = new Create;
$Create->ExeCreate('paciente',$data);
if($Create){
  echo "Agendado com Sucesso!";
}else{
  echo "Erro ao cadastrar";
}


 $POST = new CurlPost('https://api.feegow.com/v1/api/patient/create',$data);