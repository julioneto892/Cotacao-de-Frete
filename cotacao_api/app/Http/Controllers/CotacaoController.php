<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidarCotacaoRequest;
use App\Http\Requests\ValidarFreteRequest;
use App\Models\CotacaoFrete;
use App\Models\Transportadora;
use Exception;
use Illuminate\Http\Request;
class CotacaoController extends Controller
{
    /**
     * Função responsável por cadastrar uma nova cotação
     *
     * @param ValidarCotacaoRequest $request
     * @return void
     */
    public function newCotacaoFrete(ValidarCotacaoRequest $request) {
        try {
            $dados = $request->all();
            // verificando se existe algum registro com o mesmo uf e transportadora_id informados
            $verifica = CotacaoFrete::where(['uf' => $dados['uf'], 'transportadora_id' => $dados['transportadora_id']])->exists();
            if ($verifica) {
                return response()->json([
                    'message' => 'Validação dos campos',
                    'errors' => [
                        'uf' => ['Esse UF junto com a Transportadora já foram inseridos.'],
                        'transportadora_id' =>  ['Essa Transportadora junto com o UF já foram inseridos.']
                    ]
                ], 422);
            }
            CotacaoFrete::create($dados);
            return response()->json(['message' => 'Criado com sucesso']);
        } catch (Exception $e) {
            return response()->json([
                'message'   => 'Houve uma falha ao cadastrar a cotação. Tente novamente.'
            ], 500);
        }
    }

    /**
     * Função responsável por calcular o valor dos impostos
     *
     * @param Request $request
     * @return void
     */
    public function calcularImposto(ValidarFreteRequest $request) {
        $dados = $request->all();
        // lista dos cotações junto com a transportadora vinculada
        $cotacoes = CotacaoFrete::join('transportadora', 'cotacao_frete.transportadora_id', '=', 'transportadora.id')
                                ->where(['cotacao_frete.uf' => $dados['uf']])
                                ->get(['cotacao_frete.*', 'transportadora.nome as nomeTransportadora']);
        if (count($cotacoes) == 0) {
            return response()->json([
                'message' => 'Validação dos campos',
                'errors' => [
                    'uf' => ['Cotação não cadastrada o UF.']
                ]
            ], 500);
        }
        $arrayCotacao = array();
        // realizando o calculo da cotação
        foreach ($cotacoes as $cotacao) {
            $calculo = ($dados['valor_pedido'] / 100 * $cotacao->percentual_cotacao) + $cotacao->valor_extra;
            $cotacao->valor_cotacao = number_format($calculo,2);
            $arrayNovo = [
                'rank' => null,
                'transportadora' => $cotacao->nomeTransportadora,
                'valor_cotacao' => $cotacao->valor_cotacao
            ];
            array_push($arrayCotacao, $arrayNovo);
        }
        // ordenando o array da cotação de acordo com o valor_cotacao
        $retorno = CotacaoFrete::ordenarCotacao($arrayCotacao, 'valor_cotacao', SORT_ASC);
        return response()->json($retorno);
    }

    /**
     * Função responsável por listar os impostos cadastrado
     *
     * @return void
     */
    public function listarImpostos() {
        $cotacao = CotacaoFrete::join('transportadora', 'cotacao_frete.transportadora_id', '=', 'transportadora.id')
                                ->orderBy('cotacao_frete.id', 'desc')
                                ->get(['cotacao_frete.*', 'transportadora.nome as nomeTransportadora']);
        return response()->json($cotacao);
    }
    /**
     * Função resposável por listar as transportadoras cadastradas
     *
     * @return void
     */
    public function listaTransportadoras() {
        $transportadordas = Transportadora::all();
        return response()->json($transportadordas);
    }


}
