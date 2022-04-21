<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CotacaoFrete extends Model
{
    protected $table = 'cotacao_frete';

    protected $fillable = [
       'transportadora_id',
       'uf',
       'percentual_cotacao',
       'valor_extra'
    ];

    public function transportadora() {
        return $this->belongsTo(Transportadora::class);
    }

    /**
     * Função resposável por ordenar um array de acordo com a coluna informada
     *
     * @param [type] $array
     * @param [type] $on
     * @param [type] $order
     * @return void
     */
    public static function ordenarCotacao($array, $on, $order=SORT_ASC) {
        $new_array = array();
        $sortable_array = array();
        $posicao = 0;

        if (count($array) > 0) {
            /**
             * percorrendo o array informado
             * salvando em um segundo array o valor da coluna informada
             */
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }
            /**
             * setando a posição do rank de acordo com o tiop da ordenação
             * ordenando os valores de acordo com tipo da ordenação informada
             */
            switch ($order) {
                case SORT_ASC:
                    $posicao = 1;
                    asort($sortable_array);
                break;
                case SORT_DESC:
                    $posicao = count($array);
                    arsort($sortable_array);
                break;
            }
            /**
             * percorrendo os valores já ordenados
             * verificando só as três melhores cotações
             * setando a possição no ranking
             * salvando o array ordenado em um novo array de retorno
             */
            $tres_melhores = 1;
            foreach ($sortable_array as $k => $v) {
                if ($tres_melhores <= 3) {
                    $array[$k]['rank'] = $order == SORT_ASC ? $posicao++ : $posicao--;
                    $new_array[$k] = $array[$k];
                }
                $tres_melhores++;
            }
        }

        return array_values($new_array);
    }
}
