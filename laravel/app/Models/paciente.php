<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    
    use HasFactory;
    protected $fillable = ['name','cpf','source_id','specialty_id','professional_id','birthDate'];
}
