<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<h2>Cadastro de Cliente</h2>
<hr />
<form method="post" action="gravar.php" enctype="multipart/form-data">
Nome...: <input type="text" name="nome" />
<br /><br />
Idade...: <input type="text" name="idade" />
<br /><br />
Foto...: <input name="imagem" type="file" />
<br /><br />
<input type="submit" value="Gravar Pessoa" />
</form>
<br />
<a href="consultar.php">Listar Pessoas</a>