<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div class="container">
  <center><h2>Relatório de Paciente</h2></center><br />
  
  <form name="cad_pac" method="POST" class="form-horizontal" autocomplete="off" action="cadastrando.php">
    
	<div class="form-group">
		<center>
			<label class="control-label col-sm-2" for="pesq_nome" >Pesquisa por Nome:</label>
			</center>
			<div class="col-sm-5">
			
				<input type="text" class="form-control" id="pesq_nome" name="pesq_nome" maxlength="750" placeholder="Digite o nome para pesquisar" style="text-transform:uppercase">
			</div>
			
			<div class="form-group">
				<button id="pesquisar" type="submit" onclick="" class="btn btn-default">Pesquisar</button>
			</div>
	</div>
	
	<hr>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="nome_pac" >Nome:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="nome_pac" placeholder="Nome" name="nome_pac" maxlength="75" style="text-transform:uppercase" >
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="telef1">Telefone 01:</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="telef1" placeholder="(DD)XXXXX-XXXX" name="telef1" maxlength="15" style="text-transform:uppercase">
      </div>
	  
	  <label class="control-label col-sm-2" for="telef2">Telefone 02:</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="telef2" placeholder="(DD)XXXXX-XXXX" name="telef2" maxlength="15" style="text-transform:uppercase">
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="data_nasc">Data de Nascimento:</label>
      <div class="col-sm-2">
        <input type="date" class="form-control" id="data_nasc" placeholder="dd/mm/aaaa" name="data_nasc">
      </div>
	  
	  <label class="control-label col-sm-2" for="cpf">CPF:</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="cpf" placeholder="CPF" name="cpf" maxlength="15" style="text-transform:uppercase">
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="cidade">Cidade:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="cidade" placeholder="Cidade" name="cidade" maxlength="75" style="text-transform:uppercase">
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="bairro">Bairro:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="bairro" placeholder="Bairro" name="bairro" maxlength="75" style="text-transform:uppercase">
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="endereco">Endereço:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="endereco" placeholder="Endereço" name="endereco" maxlength="75" style="text-transform:uppercase">
      </div>
	  
	  <label class="control-label col-sm-1" for="num_casa">Nº:</label>
      <div class="col-sm-1">
        <input type="text" class="form-control" id="num_casa" placeholder="Nº" name="num_casa" maxlength="15" style="text-transform:uppercase">
      </div>
    </div>

	<div class="form-group">
      <label class="control-label col-sm-2" for="observacao">Observações:</label>
      <div class="col-sm-5">
		<textarea class="form-control" rows="3" class="form-control" id="observacao" placeholder="Digite aqui a(s) observação(ões)" name="observacao" maxlength="1000" style="text-transform:uppercase"></textarea>
      </div>
    </div>
	
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button id="envia" type="submit" onclick="funcao1(); apagaForm()" class="btn btn-default">Cadastrar</button>

      </div>
    </div>
  </form>  
</div>


