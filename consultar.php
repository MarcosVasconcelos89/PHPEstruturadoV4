<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form action="consultar.php" method="post">
Nome...: <input type="text" name="nome" />
<br />
<input type="submit" value="Consultar" />
</form>
<hr />
<?php
if(!empty($_POST["nome"])){
	$nome = $_POST["nome"]."%";
	include_once("fontes/connect.php");
	$sql = "SELECT * FROM pessoa 
			WHERE nome LIKE '".$nome."'";
	$rs = mysql_query($sql,$con);
	if(mysql_num_rows($rs) > 0){
	?>
   	<table width='100%'>
    	<tr>
        	<th>Nome</th>
        	<th>Idade</th>
        	<th>Foto</th>
        </tr>
    <?php
	$i = 0;
    while($row = mysql_fetch_array($rs)){
	$i++;
	if($i%2 == 0){
		$cor = "#0000FF";
	}else{
		$cor = "#00FFFF";
	}
	?>
    <tr style="background-color:<?php echo $cor; ?>">
    	<td><?php echo $row["nome"]; ?></td>
        <td><?php echo $row["idade"]; ?></td>
        <td>
        <img src="fotos/<?php echo $row["foto"]; ?>" width="150" />
        </td>
    </tr>
    <?php
	}
	?>
    </table>
    <?php
	}else{
		echo "Nenhuma pessoa encontrada";
	}
}
?>