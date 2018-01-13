<?php
   /**
    * Gerenciador Clínico Odontológico
    * Copyright (C) 2006 - 2009
    * Autores: Ivis Silva Andrade - Engenharia e Design(ivis@expandweb.com)
    *          Pedro Henrique Braga Moreira - Engenharia e Programação(ikkinet@gmail.com)
    *
    * Este arquivo é parte do programa Gerenciador Clínico Odontológico
    *
    * Gerenciador Clínico Odontológico é um software livre; você pode
    * redistribuí-lo e/ou modificá-lo dentro dos termos da Licença
    * Pública Geral GNU como publicada pela Fundação do Software Livre
    * (FSF); na versão 2 da Licença invariavelmente.
    *
    * Este programa é distribuído na esperança que possa ser útil,
    * mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÂO
    * a qualquer MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a
    * Licença Pública Geral GNU para maiores detalhes.
    *
    * Você recebeu uma cópia da Licença Pública Geral GNU,
    * que está localizada na raíz do programa no arquivo COPYING ou COPYING.TXT
    * junto com este programa. Se não, visite o endereço para maiores informações:
    * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html (Inglês)
    * http://www.magnux.org/doc/GPL-pt_BR.txt (Português - Brasil)
    *
    * Em caso de dúvidas quanto ao software ou quanto à licença, visite o
    * endereço eletrônico ou envie-nos um e-mail:
    *
    * http://www.smileodonto.com.br/gco
    * smile@smileodonto.com.br
    *
    * Ou envie sua carta para o endereço:
    *
    * Smile Odontolóogia
    * Rua Laudemira Maria de Jesus, 51 - Lourdes
    * Arcos - MG - CEP 35588-000
    *
    *
    */
	include "../lib/config.inc.php";
	include "../lib/func.inc.php";
	include "../lib/classes.inc.php";
	require_once '../lang/'.$idioma.'.php';
	header("Content-type: text/html; charset=UTF-8", true);
	if(!checklog()) {
        echo '<script>Ajax("wallpapers/index", "conteudo", "");</script>';
        die();
	}
	if($_GET[confirm_del] == "delete") {
		mysql_query("DELETE FROM `estoque_dent` WHERE `codigo` = '".$_GET[codigo]."'") or die(mysql_error());
	}
	if(isset($_POST[Salvar])) {		
		$senha = mysql_fetch_array(mysql_query("SELECT * FROM `dentistas` WHERE `codigo` = '".$_SESSION[codigo]."'"));
		$obrigatorios[1] = 'descricao';
		$obrigatorios[] = 'quantidade';
		$i = $j = 0;
		foreach($_POST as $post => $valor) {
			$i++;
			if(array_search($post, $obrigatorios) && $valor == "") {
			    $j++;
				$r[$j] = '<font color="#FF0000">';
			}
		}
		if($j == 0) {
			$caixa = new TEstoque('dentista');
			$caixa->SetDados('descricao', $_POST[descricao]);
			$caixa->SetDados('quantidade', $_POST[quantidade]);
			$caixa->SetDados('codigo_dentista', $_SESSION[codigo]);
			$caixa->SalvarNovo();
			$caixa->Salvar();
		}
	}
?>
<div class="conteudo" id="conteudo_central">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="conteudo">
    <tr>
      <td width="60%">&nbsp;&nbsp;&nbsp;<img src="estoque_dent/img/estoque.png" alt="<?php echo $LANG['stock']['professional_stock_control']?>"> <span class="h3"><?php echo $LANG['stock']['professional_stock_control']?></span></td>
      <td width="38%" valign="bottom">
      	<table width="100%" border="0">
      	  <tr>
      	    <td>
      	      <?php echo $LANG['stock']['search_by_description']?>:
      	    </td>
      	    <td>
      	      <br>
      	      <input name="procurar" id="procurar" type="text" class="forms" size="20" maxlength="40" onkeyup="javascript:Ajax('estoque_dent/pesquisa', 'pesquisa', 'pesquisa='%2Bthis.value)">
      	    </td>
      	  </tr>
      	</table>
	  </td>
      <td width="2%" valign="bottom">&nbsp;</td>
    </tr>
  </table><br />
<?php
	if(verifica_nivel('estoque', 'I')) {
?>
  <form id="form2" name="form2" method="POST" action="estoque_dent/extrato_ajax.php" onsubmit="formSender(this, 'conteudo'); this.reset(); return false;">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="conteudo">
    <tr>
      <td width="4%">
      </td>
      <td width="60%"><?php echo $LANG['stock']['description']?> <br />
        <input type="text" size="80" name="descricao" id="descricao" class="forms">
      </td>
      <td width="19%"><?php echo $LANG['stock']['quantity']?> <br />
        <input type="text" size="20" name="quantidade" id="quantidade" class="forms"">
      </td>
      <td width="14%" align="right"> <br />
        <input type="submit" name="Salvar" id="Salvar" value="<?php echo $LANG['stock']['save']?>" class="forms"> &nbsp;&nbsp;
      </td>
      <td width="3%">
      </td>
    </tr>
  </table>
  </form>
<?php
    }
?>
<div class="conteudo" id="table dados"><br>
  <table width="750" border="0" align="center" cellpadding="0" cellspacing="0" class="tabela_titulo">
    <tr>
      <td bgcolor="#009BE6" colspan="5">&nbsp;</td>
    </tr>
    <tr>
      <td width="75%" height="23" align="left"><?php echo $LANG['stock']['description']?></td>
      <td width="15%" align="center"><?php echo $LANG['stock']['qunatity']?></td>
      <td width="10%" align="center"><?php echo $LANG['stock']['delete']?></td>
    </tr>
  </table>
  <div id="pesquisa"></div>
  <script>
  document.getElementById('procurar').focus();
  Ajax('estoque_dent/pesquisa', 'pesquisa', 'pesquisa=');
  </script>
</div>
