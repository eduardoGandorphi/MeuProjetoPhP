<!DOCTYPE html 
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>Verificação de envio de formulário</title> 

</head>

<body>

<h1>Verificação de envio de mensagem: </h1>

<?
	$para="contato@provedor.com.br";
	$nome=$_POST['nome'];
	$email=$_POST['email'];
	$msg="Mensagem de: ".$nome."\n".$_POST['mensagem'];
	$mailsend=mail ("$para","Formulário de Sugestão","$msg","From: $email");
	
	echo "<p>Obrigado por participar, $nome !</p>";
	echo "<p>Sua mensagem foi enviada com sucesso e será respondida o mais breve possível.</p>";
?>

<h5>
Caso não esteja vendo a mensagem de agradecimento em seu nome, entre em contato conosco através do endereço: contato@provedor.com.br.
</h5>

</body>

</html>