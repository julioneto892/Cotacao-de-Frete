<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportadora extends Model
{
    protected $table = 'transportadora';

    protected $fillable = [
       'nome'
    ];

    public function cotacoesFrete() {
        return $this->hasMany(CotacaoFrete::class);
    }
}
