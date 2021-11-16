<?php 
//PREENCHA OS DADOS DE CONEXÃO A SEGUIR: 
$host= 'localhost'; 
$bd= 'orcamento'; 
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