<?php

namespace App\Controllers;

use App\Models\CadernoModel;
use App\Models\EmendasModel;

class Ajax extends BaseController
{
    public function index()
    {   
        session();
        $this->cadernoModel = new CadernoModel();
        $this->emendasModel = new EmendasModel();

        $cod_usu = $_SESSION['cod_usu'];
        $user_nivel = $_SESSION['user_nivel'];
        $nr_paragrafo = $this->request->getPost('nr_paragrafo');

        if($user_nivel == 1) {
            $paragrafo = $this->cadernoModel->where('nr_paragrafo', $nr_paragrafo)
                                            ->select('congresso_caderno.paragrafo, congresso_caderno.titulo, congresso_caderno.img_01,congresso_caderno.img_02, congresso_caderno.img_03')
                                            ->find();
            $emenda = $this->cadernoModel->where('nr_paragrafo', $nr_paragrafo)
                                            ->join('congresso_emendas', 'congresso_caderno.nr_paragrafo = congresso_emendas.nrparagrafo', 'left')
                                            ->join('congresso_user', 'congresso_emendas.cod_usu = congresso_user.id', 'left')
                                            ->join('nucleo', 'congresso_user.nucleo = nucleo.codigo', 'left')
                                            ->join('congresso_combo', 'congresso_emendas.tipo = congresso_combo.cod_com')
                                            ->select('congresso_emendas.emendas, congresso_emendas.tipo, congresso_emendas.pala_inicio, congresso_emendas.texto_sub')
                                            ->select('congresso_user.nome')
                                            ->select('nucleo.nucleo')
                                            ->select('congresso_combo.descri')
                                            ->find(); 
            $conteudo = [$paragrafo, $emenda];
            if(isset($conteudo)){
                echo json_encode($conteudo);
            }else {
                echo json_encode('Falha ao realizar a busca...');
            }
        }elseif($user_nivel == 3) {
            $paragrafo = $this->cadernoModel->where('nr_paragrafo', $nr_paragrafo)
                                            ->select('congresso_caderno.paragrafo, congresso_caderno.titulo, congresso_caderno.img_01,congresso_caderno.img_02, congresso_caderno.img_03')
                                            ->find();
            $emenda = $this->cadernoModel->where('nr_paragrafo', $nr_paragrafo)
                                            ->where('congresso_emendas.cod_usu', $cod_usu)
                                            ->join('congresso_emendas', 'congresso_caderno.nr_paragrafo = congresso_emendas.nrparagrafo', 'left')
                                            ->join('congresso_user', 'congresso_emendas.cod_usu = congresso_user.id', 'left')
                                            ->join('nucleo', 'congresso_user.nucleo = nucleo.codigo', 'left')
                                            ->join('congresso_combo', 'congresso_emendas.tipo = congresso_combo.cod_com')
                                            ->select('congresso_emendas.emendas, congresso_emendas.tipo, congresso_emendas.pala_inicio, congresso_emendas.texto_sub')
                                            ->select('congresso_user.nome')
                                            ->select('nucleo.nucleo')
                                            ->select('congresso_combo.descri')
                                            ->find();
            $conteudo = [$paragrafo, $emenda];
            if(isset($conteudo)){
                echo json_encode($conteudo);
            }else {
                echo json_encode('Falha ao realizar a busca...');
            }
        }

    }
}
