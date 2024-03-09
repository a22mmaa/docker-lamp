<?php

class Notas extends Notas implements CalculosCentroEstudios {

    

    public function numeroDeAprobados() {
        $notas = parent::getNotas();
    }

    public function numeroDeSuspensos() {

    }

    public function notaMedia(){

    }
    public function toString()
    {
        $listaDeNotas = "";
        foreach ($this->get_notas() as $nota) {
            $listaDeNotas .= "[$nota]";
        }
        return $listaDeNotas;
    
}
}