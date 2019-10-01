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
            'Abaixo do peso',
            'Peso normal',
            'Sobrepeso',
            'Obesidade Grau I',
            'Obesidade Grau II',
            'Obesidade Grau III'
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
            echo 'Categoria 1';
            return $this->categorias[0];
        }
        elseif($calculo >= 18.5 and $calculo < 24.9){
            echo 'Categoria 2';
            return $this->categorias[1];
        }
        elseif($calculo >= 25 and $calculo <= 29.9){
            echo 'Categoria 3';
            return $this->categorias[2];
        }
        elseif($calculo >= 30 and $calculo < 34.9){
            echo 'Categoria 4';
            return $this->categorias[3];
        }
        elseif($calculo >= 35 and $calculo < 39.9){
            echo 'Categoria 5';
            return $this->categorias[4];
        }
        elseif($calculo >= 40){
            echo 'Categoria 6';
            return $this->categorias[5];
        }
    }
    public function __toString(){
        $texto = "";

        $calculo = $this->calcular_imc();
        $categoria = $this->gera_categoria($calculo);

        $texto = "<p><b>Nome:</b> ".$this->nome."</p> <p><b>Idade:</b> ".$this->idade." anos</p> <p>Seu imc é <b> ".$calculo." </b> e você está com ".$categoria."</p>";
        return $texto;

    }
}

?>