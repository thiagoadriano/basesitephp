<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 /**
  * @param $input
  * @return string
     */
 function getInput($input){
  return strip_tags(trim($_POST[$input]));
 }

 /**
  * @param $array
  * @return bool
  */
 function isValid($array){
   if(is_array($array)){
    $total = count($array);
    for($i = 0; $i < $total; $i++){
     if($array[$i] == ''){
      return false;
     }
    }
   return true;
  }

 }

 /**
  * @param $umarray
  * @return mixed
  */
 function acento_para_html($umarray){
  $comacento = array('Á','á','Â','â','À','à','Ã','ã','É','é','Ê','ê','È','è','Ó','ó','Ô','ô','Ò','ò','Õ','õ','Í','í','Î','î','Ì','ì','Ú','ú','Û','û','Ù','ù','Ç','ç',);
  $acentohtml   = array('&Aacute;','&aacute;','&Acirc;','&acirc;','&Agrave;','&agrave;','&Atilde;','&atilde;','&Eacute;','&eacute;','&Ecirc;','&ecirc;','&Egrave;','&egrave;','&Oacute;','&oacute;','&Ocirc;','&ocirc;','&Ograve;','&ograve;','&Otilde;','&otilde;','&Iacute;','&iacute;','&Icirc;','&icirc;','&Igrave;','&igrave;','&Uacute;','&uacute;','&Ucirc;','&ucirc;','&Ugrave;','&ugrave;','&Ccedil;','&ccedil;');
  $umarray  = str_replace($comacento, $acentohtml, $umarray);
  return $umarray;
 }

 $nome     = acento_para_html(getInput('nome'));
 $email    = getInput('email');
 $telefone = getInput('telefone');
 $conheceu = acento_para_html(getInput('conheceu'));
 $mensagem = acento_para_html(nl2br(getInput('mensagem')));


 $quemEnvia   = array('NOme', 'email');

 $assEmail    = $nome.", Recebemos o seu contato";
 $urlLogo = "";

 if(isValid( array($nome, $email, $telefone, $conheceu, $mensagem) )){

  require 'lib/PHPMailer/class.phpmailer.php';
  require 'inc/_msg-email.inc';

  $mail = new PHPMailer();
  $mail->IsMail();
  $mail->Charset   = 'ISO 8859-1';

  $mail->SetFrom($quemEnvia[1], $quemEnvia[0]);
  $mail->AddCC($quemEnvia[1], $quemEnvia[0]);
  $mail->AddAddress($email, $nome);
  $mail->Subject = $assEmail;
  $mail->MsgHTML($conteudo);

  //echo $conteudo;
  //die();

  if( $mail->Send() ){
   header('Location: contato-ok');
  }else{
   //echo $mail->ErrorInfo;
   header('Location: contato-erro');
  }
 }
}