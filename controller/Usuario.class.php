<?php

class Usuario{
    private $nome;
    private $idade;
    private $altura;
    private $peso;
    private $categorias;

    public function __construct($nome, $idade, $altura, $peso){
        $this->nome = $nome;
        $this->idade = $idade;
        $this->altura = $altura;
        $this->peso = $peso;

        $this->categorias = [
            '<span class="w3-pale-blue w3-padding sublinhado">Abaixo do peso</span>',
            '<span class="w3-blue-gray w3-padding sublinhado">Peso normal</span>',
            '<span class="w3-amber w3-padding sublinhado">Sobrepeso</span>',
            '<span class="w3-orange w3-padding sublinhado">Obesidade Grau I</span>',
            '<span class="w3-deep-orange w3-padding sublinhado">Obesidade Grau II</span>',
            '<span class="w3-red w3-padding sublinhado">Obesidade Grau III</span>'
        ];
    }

    public function calcular_imc(){
        return round($this->peso/(pow($this->altura, 2)), 2);
    }
    function __set($prop, $val) {
		$this->$prop = $val;
	}

	function __get($prop) {
		return $this->$prop;
	}

    public function gera_categoria($calculo){
        if($calculo < 18.5){
            
            return $this->categorias[0];
        }
        elseif($calculo >= 18.5 and $calculo < 24.9){
            
            return $this->categorias[1];
        }
        elseif($calculo >= 25 and $calculo <= 29.9){
            
            return $this->categorias[2];
        }
        elseif($calculo >= 30 and $calculo < 34.9){
            
            return $this->categorias[3];
        }
        elseif($calculo >= 35 and $calculo < 39.9){
            
            return $this->categorias[4];
        }
        elseif($calculo >= 40){
            
            return $this->categorias[5];
        }
    }
    public function __toString(){
        $texto = "";

        $calculo = $this->calcular_imc();
        $categoria = $this->gera_categoria($calculo);

        $texto = "<div class='w3-card w3-margin'><h3 class='w3-blue w3-padding w3-center'>Usuário</h3><div class='w3-padding'><p><b>Nome:</b> ".$this->nome."</p> <p><b>Idade:</b> ".$this->idade." anos</p> <p>Seu imc é <b> ".$calculo." </b> e você está com ".$categoria."</p></div></div>";
        return $texto;

    }
}

?>