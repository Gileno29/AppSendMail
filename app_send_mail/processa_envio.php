<?php
    class Mensagem{
        
        private $para = null;
        private $assunto=null;
        private $mensagem=null;
        public function __get($atributo){
            return $this->$atributo;
            
        }

        public function __set($atributo,$valor){
            $this->$atributo=$valor;

        }

        public function mensagemValida(){
            if(empty($this->para)|| empty($this->mensagem)|| empty($this->assunto)){
                return false;
            }
                return true;
        }
    }

    $mensagem= new Mensagem();
    $mensagem->__set('para',$_POST['para']);
    $mensagem->__set('assunto',$_POST['assunto']);
    $mensagem->__set('mensagem',$_POST['mensagem']);


    //print_r($mensagem);
   if($mensagem->mensagemValida()){
       echo'Dados completamente preenchidos';
   }else{
       echo 'Dados não preenchidos por completo';
   }
?>