<!DOCTYPE html 
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>Verifica��o de envio de formul�rio</title> 

</head>

<body>

<h1>Verifica��o de envio de mensagem: </h1>

<?
	$para="contato@provedor.com.br";
	$nome=$_POST['nome'];
	$email=$_POST['email'];
	$msg="Mensagem de: ".$nome."\n".$_POST['mensagem'];
	$mailsend=mail ("$para","Formul�rio de Sugest�o","$msg","From: $email");
	
	echo "<p>Obrigado por participar, $nome !</p>";
	echo "<p>Sua mensagem foi enviada com sucesso e ser� respondida o mais breve poss�vel.</p>";
?>

<h5>
Caso n�o esteja vendo a mensagem de agradecimento em seu nome, entre em contato conosco atrav�s do endere�o: contato@provedor.com.br.
</h5>

</body>

</html>