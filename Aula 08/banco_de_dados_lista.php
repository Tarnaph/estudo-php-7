<h6>Lista do banco de dados</h6>
<style></style>
<div class="mdl-grid">
	<div class="mdl-cell mdl-cell--12-col">
		<table class="mdl-shadow--8dp" border="1">
			<tr>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Idade</th>
				<th>Sexo</th>
				<th>Estado Civil</th>
				<th>Humanas</th>
				<th>Exatas</th>
				<th>Biológicas</th>
				<th>Hash da senha</th>
				<th>Ações</th>
			</tr>
			<?php
				try
				{	
					$connection = new PDO("mysql::host=localhost;dbname=cursophp","root","root");
					$connection->exec("set names utf8");
				}
				catch(PDOException $e)
				{
					echo "Falha:" .$e->getMessage();
					exit();
				}
				//Excluindo no banco
				if(isset($_REQUEST["excluir"]) && $_REQUEST["excluir"] == true)
				{
					$stmt = $connection->prepare("DELETE FROM usuarios WHERE id = ?");
					$stmt->bindParam(1, $_REQUEST["id"]);
					$stmt->execute();

					// Se tiver erro mostrar o erro
					if($stmt->errorCode() != "00000")
					{
						echo "Erro código " .$stmt->errorCode() .": ";
						echo implode(", ", $stmt->errorInfo());
					}
					else
					{
						echo "Sucesso usuário removido com sucesso <br>";
					}
				}
				// parei 1:07
				//rs = Resulte sets, Prepare
				$rs = $connection->prepare("SELECT * FROM usuarios");

				if($rs->execute())
				{
					while($registro = $rs->fetch(PDO::FETCH_OBJ))
					{
						echo "<tr>";
						echo "<td>" .$registro->nome ."</td>";
						echo "<td>" .$registro->email ."</td>";
						echo "<td>" .$registro->idade ."</td>";
						echo "<td>" .$registro->sexo ."</td>";
						echo "<td>" .$registro->estado_civil ."</td>";
						echo "<td>" .$registro->humanas ."</td>";
						echo "<td>" .$registro->exatas ."</td>";
						echo "<td>" .$registro->biologicas ."</td>";
						echo "<td>" .$registro->senha ."</td>";
						echo "<td>";
						echo "<a href='?excluir=true&id=" .$registro->id ."'>(Excluir)</a>";//excluindo no banco
						echo "<a href='?id=" .$registro->id ."'>(Alterar)</a>";//excluindo no banco
						echo "<a href='?id=" .$registro->id ."'>(Alterar senha)</a>";//Alterar senha
						echo "</td>";
						echo "</tr>";
					}
				}
				else
				{
					echo "Falha na selecão de usuários. <br>";
				}
			?>
		</table>
	</div>
</div>