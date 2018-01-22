<?php if(!class_exists('Rain\Tpl')){exit;}?>


<div class="container">
  <center><h2>Relatório de Todos os Pacientes</h2></center><br />
	<form name="cad_pac" method="POST" class="form-horizontal" autocomplete="off" 	action="cadastrando.php">
		<div class="form-group">
		<center>
			<div class="form-group">
				<button id="pesquisar" type="submit" onclick="" class="btn btn-default">Gerar Relatório</button>
			</div>
			</center>

		</div>
		
		<hr>

		<table class="table">
			<thead>
				<tr>
					<th scope="col" style="width:50%;">Código:</th>
					<th scope="col">Nome:</th>
				</tr>
			</thead>
			<tbody>
				<?php $counter1=-1;  if( isset($pacientes) && ( is_array($pacientes) || $pacientes instanceof Traversable ) && sizeof($pacientes) ) foreach( $pacientes as $key1 => $value1 ){ $counter1++; ?>
				<tr>
					<td scope="row"><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td scope="row"><?php echo htmlspecialchars( $value1["nome_pac"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</form>
 </div>



