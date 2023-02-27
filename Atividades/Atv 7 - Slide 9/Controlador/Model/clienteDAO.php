<?php
class clienteDAO{
    public function incluir($cliente){
        //codigo para conetar e incluir no banco
        return 1; //incluido com sucesso
    }   

    public function pesquisar($cliente){
        //codigo para conectar e pesquisar no banco
        $cliente->setNome("Luiz");
        $cliente->setCpf("656585688");
        $cliente->setEmail("email@gmail.com");
        return true;
    }
}



  
  

