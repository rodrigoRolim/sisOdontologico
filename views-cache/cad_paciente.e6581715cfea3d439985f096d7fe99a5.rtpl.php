<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div class="container">
  <center><h2>Cadastro de Paciente</h2></center><br />
  
  <form name="cad_pac" method="post" class="form-horizontal" autocomplete="off" action="/cadastro/paciente">
    
	<div class="form-group">
      <label class="control-label col-sm-2" for="name" >Nome:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="name" placeholder="Nome" name="name" maxlength="75" style="text-transform:uppercase" required>
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="phone1">Telefone 01:</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="telef1" placeholder="(DD)XXXXX-XXXX" name="phone1" maxlength="15" style="text-transform:uppercase">
      </div>
	  
	  <label class="control-label col-sm-2" for="phone2">Telefone 02:</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="phone2" placeholder="(DD)XXXXX-XXXX" name="phone2" maxlength="15" style="text-transform:uppercase">
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="datanasc">Data de Nascimento:</label>
      <div class="col-sm-2">
        <input type="date" class="form-control" id="datanasc" placeholder="dd/mm/aaaa" name="datanasc">
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
	  
	  <label class="control-label col-sm-1" for="numcasa">Nº:</label>
      <div class="col-sm-1">
        <input type="text" class="form-control" id="numcasa" placeholder="Nº" name="numcasa" maxlength="15" style="text-transform:uppercase">
      </div>
    </div>

	<div class="form-group">
      <label class="control-label col-sm-2" for="observacao">Observações:</label>
      <div class="col-sm-5">
		<textarea class="form-control" rows="5" class="form-control" id="observacao" placeholder="Digite aqui a(s) observação(ões)" name="observacao" maxlength="1000" style="text-transform:uppercase"></textarea>
      </div>
    </div>
	
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button id="envia" type="submit" class="btn btn-default">Cadastrar</button>

      </div>
    </div>
  </form>  
</div>

</body>

<script>
	function funcao1(){
		alert("Paciente Cadastrado com Sucesso!");
	}

</script>


