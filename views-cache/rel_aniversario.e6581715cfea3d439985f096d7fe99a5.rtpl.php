<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="container">
  <center><h2>Aniversariantes do Dia</h2></center><br />
	<form name="cad_pac" method="POST" class="form-horizontal" autocomplete="off" 	action="cadastrando.php">
		<div class="form-group">
		<center>
			<label class="control-label col-sm-2" for="data_anivers" >Data:</label>
			</center>
			<div class="col-sm-2">
			
				<input type="date" class="form-control" id="data_anivers" name="nome_pac" maxlength="10" >
			</div>
			
			<div class="form-group">
				<button id="pesquisar" type="submit" onclick="" class="btn btn-default">Pesquisar</button>
			</div>

		</div>
		
		<hr>
  </form>
  <table class="table">
    <thead>
      <tr>
        <th>Código</th>
        <th>Nome:</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
 </div>

