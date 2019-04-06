<?php

namespace Projeto;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    
    protected $fillable = ['name', 'avatar']; //colunas que podem ser atualizadas

    public function getRouteKeyName()
    {
        return 'slug';
    }


}
