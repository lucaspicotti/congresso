<?php

namespace App\Controllers;

use App\Models\EventosModel;
use App\Models\CadernoModel;
use App\Models\EmendasModel;

class Relatorio extends BaseController
{
    public function __construct()
    {
        $this->eventosModel = new EventosModel();
        $this->cadernoModel = new CadernoModel();
        $this->emendasModel = new EmendasModel();

    }

    public function relatorioEmenda()
    {   $title = "Relatório";
        $dados = $this->eventosModel->select('id, evento')->find();

        echo view('layout/header', ['title' => $title]);
        echo view('relatorio/relatorioEmendas', ['dados'  => $dados]);
        echo view('layout/footer');
    }

    public function relatorioCaderno()
    {   $title = "Relatório";
        $dados = $this->eventosModel->select('id, evento')->find();

        echo view('layout/header', ['title' => $title]);
        echo view('relatorio/relatorioCaderno', ['dados'  => $dados]);
        echo view('layout/footer');
    }

    public function emendasResultado()
    {
        $title = "Relatório";
        $evento = $this->request->getPost('evento');
        $paragrafo_inicial = $this->request->getPost('paragrafo_inicial');
        $paragrafo_final = $this->request->getPost('paragrafo_final');
        $tese_guia = $this->request->getPost('tese_guia');


        if($tese_guia == 0) {
            $dados = $this->emendasModel->where('congresso_emendas.cod_eve', $evento)
                                        ->where('congresso_emendas.nrparagrafo >=',  $paragrafo_inicial)
                                        ->where('congresso_emendas.nrparagrafo <=', $paragrafo_final)
                                        ->join('congresso_user as U', 'congresso_emendas.cod_usu = U.id', 'left')
                                        ->join('nucleo as N', 'U.nucleo = N.codigo', 'left')
                                        ->join('congresso_combo as C', 'congresso_emendas.tipo = C.cod_com and C.grupo = 4', 'left')
                                        ->join('congresso_eventos as EV', 'congresso_emendas.cod_eve = EV.id', 'left')
                                        ->join('congresso_caderno as CA', 'congresso_emendas.nrparagrafo = CA.nr_paragrafo and congresso_emendas.cod_eve = CA.evento', 'left')
                                        ->select('U.nome, U.username')
                                        ->select('N.nucleo')
                                        ->select('C.descri')
                                        ->select('EV.evento')
                                        ->select('congresso_emendas.pala_inicio, congresso_emendas.texto_sub, congresso_emendas.emendas, congresso_emendas.nrparagrafo')
                                        ->orderBy('congresso_emendas.nrparagrafo', 'ASC')->find();

            echo view('layout/header', ['title' => $title]);
            echo view('relatorio/emendasResultado', ['dados'  => $dados]);
            echo view('layout/footer');
        } elseif($tese_guia == 1) {
            $dados = $this->emendasModel->where('congresso_emendas.cod_eve', $evento)
                                        ->where('congresso_emendas.nrparagrafo >=',  $paragrafo_inicial)
                                        ->where('congresso_emendas.nrparagrafo <=', $paragrafo_final)
                                        ->join('congresso_user as U', 'congresso_emendas.cod_usu = U.id', 'left')
                                        ->join('nucleo as N', 'U.nucleo = N.codigo', 'left')
                                        ->join('congresso_combo as C', 'congresso_emendas.tipo = C.cod_com and C.grupo = 4', 'left')
                                        ->join('congresso_eventos as EV', 'congresso_emendas.cod_eve = EV.id', 'left')
                                        ->join('congresso_caderno as CA', 'congresso_emendas.nrparagrafo = CA.nr_paragrafo and congresso_emendas.cod_eve = CA.evento', 'left')
                                        ->select('U.nome, U.username')
                                        ->select('N.nucleo')
                                        ->select('C.descri')
                                        ->select('EV.evento')
                                        ->select('congresso_emendas.pala_inicio, congresso_emendas.texto_sub, congresso_emendas.emendas, congresso_emendas.nrparagrafo')
                                        ->select('CA.paragrafo')
                                        ->orderBy('congresso_emendas.nrparagrafo', 'ASC')->find();

            echo view('layout/header', ['title' => $title]);
            echo view('relatorio/emendasResultado', ['dados'  => $dados]);
            echo view('layout/footer');
        }
    }

    public function cadernoResultado() 
    {
        $title = "Relatório";
        $evento = $this->request->getPost('evento');
        $paragrafo_inicial = $this->request->getPost('paragrafo_inicial');
        $paragrafo_final = $this->request->getPost('paragrafo_final');

        if($paragrafo_inicial == "") {
            $nr_paragrafo = $this->cadernoModel->first();
            $paragrafo_inicial = $nr_paragrafo['Id'];
        }
        
        if($paragrafo_final == "") {
            $paragrafo_final = count($this->cadernoModel->find());
        }

        $dados = $this->cadernoModel->where('evento', $evento)
                                    ->where('nr_paragrafo >=', $paragrafo_inicial)
                                    ->where('nr_paragrafo <=', $paragrafo_final)
                                    ->select('paragrafo')->find();

        echo view('layout/header', ['title' => $title]);
        echo view('relatorio/cadernoResultado', ['dados'  => $dados]);
        echo view('layout/footer');
    }
}