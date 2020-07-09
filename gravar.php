<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$foto = $_FILES["imagem"];
//print_r() -> Imprimi o vetor completo, com as posições e seus valores
//print_r($foto);
//1_ Verificar se o usuario escolheu um arquivo para fazer o upload
if(!empty($foto["name"])){
	//Se o flag chegar sendo 0 ate o fim do programa significa
	//que nao houve erro
	$flag = 0;
	//2_ Verificar se o arquivo é UMA IMAGEM(jpg ou jpeg)
	$arquivo = explode(".",$foto["name"]);
	$arquivo = array_reverse($arquivo);
	$extensao = strtolower($arquivo[0]);

	if($extensao != "jpg" && $extensao != "jpeg"){
		echo "Escolha uma imagem valida (jpg,jpeg)";
		$flag = 1;
	}
	//3_ Verificar se o tamanho do arquivo e superior a 100KB
	if($foto["size"] > (1024 * 100)){
		echo "Escolha uma imagem com no maximo 100KB";
		$flag = 1;
	}
	
	//4_ Gerar um nome UNICO para o arquivo
	$nomeImagem = date('YmdHis').rand(100000,999999).".".$extensao;
		if($flag == 0){
			$nome = $_POST["nome"];
			$idade = $_POST["idade"];
			include_once("fontes/connect.php");
			$sql = "INSERT INTO pessoa VALUES(NULL,
					'".$nome."',".$idade.",
					'".$nomeImagem."')";
			if(mysql_query($sql,$con)){
move_uploaded_file($foto["tmp_name"],"fotos/".$nomeImagem);
				echo "Pessoa Gravado com sucesso";
			}else{
				echo "Erro";
			}
		}
	
}else{
	echo "Escolha um arquivo para o upload";
}
?>
<br />
<a href="index.php">Voltar</a>