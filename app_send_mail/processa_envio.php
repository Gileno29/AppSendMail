<?php
    require "./bibliotecas/PHPMailer/Exception.php";
    require "./bibliotecas/PHPMailer/OAuth.php";
    require "./bibliotecas/PHPMailer/PHPMailer.php";
    require "./bibliotecas/PHPMailer/POP3.php";
    require "./bibliotecas/PHPMailer/SMTP.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

//classe de definição da mensagem 
    class Mensagem{
        
        private $para = null;
        private $assunto=null;
        private $mensagem=null;
        public $status= array('codigo_status'=>null, 'descricao_status'=>'');
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
   if(!$mensagem->mensagemValida()){
       echo'Mensagem não é válida';
       die();//mata a execução do exclipt
   }
   $mail = new PHPMailer(true);

    try {
 //Server settings
       $mail->SMTPDebug =false;                      // Enable verbose debug output
       $mail->isSMTP();                                            // Send using SMTP
       $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
       $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
       $mail->Username   = 'gileno.cordeiroc@gmail.com';                     // SMTP username
       $mail->Password   = 'stardust5d';                               // SMTP password
       $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
       $mail->Port       = 587;                                    // TCP port to connect to
   
       //Recipients
       $mail->setFrom('gileno.cordeiroc@gmail.com', 'Web Completo');
       $mail->addAddress($mensagem->__get('para'));                 // Name is optional
       $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      /// $mail->addBCC('bcc@example.com');
   
       // Attachments
       //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
   
       // Content
       $mail->isHTML(true);                                  // Set email format to HTML
       $mail->Subject = $mensagem->__get('assunto');
       $mail->Body    = $mensagem->__get('mensagem');
       $mail->AltBody = 'Oi eu sou o conteudo do email';
   
        $mail->send();
        $mensagem->status['codigo_status']=1;
        $mensagem->status['descricao_status']="Email enviado com Sucesso!!"; 

   } catch (Exception $e) {
    $mensagem->status['codigo_status']=2;
    $mensagem->status['descricao_status']="não foi possivel enviar sua mensagem por favor tente mais tarde!!" ."{$mail->ErrorInfo}";
   }
?>
<html>
    <head>
		<meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>

   <body>
    <div class='container'>
            <div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>
            <div class="row">
                <div class="col-md-12">
                    <? if($mensagem->status['codigo_status']=='1'){?>
                        <div class='container'>
                            <h1 class='display-4 text-success'>Sucesso</h1>
                            <p><?=$mensagem->status['descricao_status']?>Naõ foi possivel enviar a mensagem</p>
                            <a href='index.php' class='btn btn-success btn-lg mt-5 text-white'>Voltar</a>
                        </div>

                    <? }?>

                    <? if($mensagem->status['codigo_status']=='2'){?>
                        <div class='container'>
                            <h1 class='display-4 text-danger'>Opps</h1>
                            <p><?=$mensagem->status['descricao_status']?>Não foi possivel enviar a Mensagem</p>
                            <a href='index.php' class='btn btn-danger btn-lg mt-5 text-white'>Voltar</a>
                        </div>

                    <? }?>
                </div>
            </div>
    </div>
    
   </body>
</html>