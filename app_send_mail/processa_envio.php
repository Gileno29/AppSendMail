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
       $mail->SMTPDebug =2;                      // Enable verbose debug output
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
        echo "Email enviado com Sucesso!!";   
   } catch (Exception $e) {
       echo "Não foi possivel enviar a mensagem: {$mail->ErrorInfo}";
   }


?>