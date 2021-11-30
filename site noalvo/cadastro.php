<?php 

//1 – Definimos Para quem vai ser enviado o email
$para = "seuemail@algumacoisa.com.br";
//2 - resgatar o nome digitado no formulário e  grava na variavel $nome
$nome = $_POST ["nome"]; 
$perfil = $_POST ["perfil"]; 
$endereco = $_POST ["endereco"]; 
$bairro = $_POST ["bairro"]; 
$telefone = $_POST ["telefone"]; 
$email = $_POST ["email"]; 
$servico = $_POST ["servico"]; 
$clm = $_POST ["clm"]; 
$descricao = $_POST ["descricao"]; 
$data = date('d/m/Y'); 
$ip = $_SERVER["REMOTE_ADDR"]; 
// 3 - resgatar o assunto digitado no formulário e  grava na variavel
 //4 – Agora definimos a  mensagem que vai ser enviado no e-mail
$msg = "Estes são os dados de seu formulário. Eles foram enviados por:<br>";

if($ip != is_null()) $msg .= "Ip:  $ip <br>";
if($data != is_null()) $msg .= "Data: $data";
if($nome != is_null()) $msg .= "Nome: $nome <br>";
if($telefone != is_null()) $msg .= "Telefone: $telefone <br>";
if($email != is_null()) $msg .= "Email: $email <br>";
if($endereco != is_null()) $msg .= "endereco: $endereco<br>";
if($bairro != is_null()) $msg .= "Bairro: $bairro<br>";
if($perfil != is_null()) $msg .= "Perfil: $perfil <br>";
if($servico != is_null()) $msg .= "Serviço: $servico <br>";
if($clm != is_null()) $msg .= "CLM: $clm <br>";
if($descricao != is_null()) $msg .= "descrição: $descricao <br>";

//5 – agora inserimos as codificações corretas e  tudo mais.
$headers =  "Content-Type:text/html; charset=UTF-8\n";
$headers .= "From:  site NOALVO TELECOM <site@noalvotelecom.com.br>\n";
//Vai ser //mostrado que  o email partiu deste email e seguido do nome
$headers .= "X-Sender:  <contato@noalvotelecom.com.br>\n";
//email do servidor //que enviou
$headers .= "X-Mailer: PHP  v".phpversion()."\n";
$headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
$headers .= "Return-Path:  <$email>\n";
//caso a msg //seja respondida vai para  este email.
$headers .= "MIME-Version: 1.0\n";

$envio = mail($para, $assunto, $msg, $headers);  //função que faz o envio do email.

//PREENCHA OS DADOS DE CONEXÃO A SEGUIR: 
$senhabd= ''; 
$userbd = 'root'; 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO ! 
$nome = $_POST ["nome"]; //atribuição do campo "nome" vindo do formulário para variavel 
$perfil = $_POST ["perfil"]; //atribuição do campo "email" vindo do formulário para variavel 
$endereco = $_POST ["endereco"]; //atribuição do campo "ddd" vindo do formulário para variavel 
$bairro = $_POST ["bairro"]; //atribuição do campo "telefone" vindo do formulário para variavel 
$telefone = $_POST ["telefone"]; //atribuição do campo "endereco" vindo do formulário para variavel 
$email = $_POST ["email"]; //atribuição do campo "cidade" vindo do formulário para variavel 
$servico = $_POST ["servico"]; //atribuição do campo "estado" vindo do formulário para variavel 
$clm = $_POST ["clm"]; //atribuição do campo "bairro" vindo do formulário para variavel 
$descricao = $_POST ["descricao"]; //atribuição do campo "pais" vindo do formulário para variavel 
$data = date('d/m/Y'); //atribuição do campo "login" vindo do formulário para variavel 
$ip = $_SERVER["REMOTE_ADDR"]; //atribuição do campo "senha" vindo do formulário para variavel 


//Gravando no banco de dados !

//conectando com o localhost - mysql 
$conexao = mysqli_connect($host, $userbd);
//$conexao = mysql_connect("127.0.0.1","root",""); 
	if (!$conexao) 
	print ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysqli_error()); 
//conectando com a tabela do banco de dados 
$banco = mysqli_select_db($conexao,$bd); 
	if (!$banco) die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysqli_error()); 
$query = "INSERT INTO `orcamentos` ( id,`nome` , `perfil` , `endereco` , `bairro` , `telefone` , `email` , `servico` , `clm` , `descricao` , `data` , `ip` ) VALUES ('','$nome', '$perfil', '$endereco', '$bairro', '$telefone', '$email', '$servico', '$clm', '$descricao', '$data', '$ip')";
mysqli_query($conexao,$query); 
echo "Seu cadastro foi realizado com sucesso!<br>Logo recebera seu orçamento."; 
?>
