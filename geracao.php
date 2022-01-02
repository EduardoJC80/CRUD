<?php
  include 'action1.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CRUD App</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
</head>

<style>
	
p{
	color:#17a2b8;
	font-size: 24px
}


</style>

<body><br>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <h3 class="text-center text-dark mt-2"> Adicionar Consumo e Geração das Usinas </h3>
        <hr>
        <?php if (isset($_SESSION['response'])) { ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <b><?= $_SESSION['response']; ?></b>
        </div>
        <?php } unset($_SESSION['response']); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <h3 class="text-center text-info">Adicionar Dados</h3>
        <form action="action1.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $id; ?>">
          <div class="form-group">
            <input type="text" name="ativag" value="<?= $name; ?>" class="form-control" placeholder=" Insira o Valor da Geração " required>
          </div>
          <div class="form-group">
            <input type="text" name="ativac" value="<?= $email; ?>" class="form-control" placeholder=" Insira o Valor do Consumo " required>
          </div>
		  
		   <div class="form-group">
            <input type="text" name="por_dia" value="<?= $porcentagem; ?>" class="form-control" placeholder=" Insira o Valor da % do dia " required>
          </div>
		  
		  <div class="form-group">
			  <input type="text" name="ug1" value="<?= $ug1; ?>" class="form-control" placeholder=" Insira o Valor da Geração da Ug1 " required>
          </div>
		  
		   <div class="form-group">
			   <input type="text" name="ug2" value="<?= $ug2; ?>" class="form-control" placeholder=" Insira o Valor da Geração da Ug2 " required>
          </div>
		  
		   <div class="form-group">
			   <input type="text" name="rs" value="<?= $rs; ?>" class="form-control" placeholder=" Insira o Valor do financeiro Aprox. Da Becker " required>
          </div>
		  
		  <div class="form-group">
    <select class="form-control" id="exampleFormControlSelect1" name="agente" placeholder=" Valor " required >
	<optgroup label=" Agente ">
	  <option> CARNEIRO </option>
	   <option> BECKER </option>
	    <option> ITALO </option>
		 <option> PONTE </option>
		  <option> SDP </option>
    </select>
  </div>	
		   <div class="form-group">
			   <input type="date" name="dia" value="<?= $dia; ?>" class="form-control">
          </div>
          <div class="form-group">
            <?php if ($update == true) { ?>
            <input type="submit" name="update" class="btn btn-success btn-block" value=" Atualizar Dados ">
            <?php } else { ?>
            <input type="submit" name="add" class="btn btn-primary btn-block" value=" Adicionar Dados ">
            <?php } ?>
          </div>
        </form>
      </div>
	 
		<div class="agente">
		<center> <p> <b> Como deve ser preencido as informações: </b> </p> </center>
		 <table class="table table-bordered">
    <tr>
        <td><center>% do Dia</center></td>
        <td><center>Agente</center></td>
		<td><center>Geração e Gerado</center></td>
    </tr>
   
    <tr>
        <td><center>   					
					<?php
						include 'conexao1.php';
						
						$sql = " SELECT AtivaG,Dia FROM grafico where Agente = 'SDP' and Dia = CURRENT_DATE()-1";
						
						$consulta = mysqli_query($conexao, $sql);
						
						while ($dados = mysqli_fetch_array($consulta)){ 
							$date = $dados['AtivaG'];
							$dia = ($date*100)/54000;'<br>';
							echo number_format("$dia",2,",",",");
							
						}
					?> </center></td>
        <td><center> SDP </center></td>
         <td><center>Ponto inves de virugula</center></td>
       
    
    </tr>

 <tr>
        <td><center>   					
					<?php
						include 'conexao1.php';
						
						$sql = " SELECT AtivaG,Dia FROM grafico where Agente = 'CARNEIRO' and Dia = CURRENT_DATE()-1";
						
						$consulta = mysqli_query($conexao, $sql);
						
						while ($dados = mysqli_fetch_array($consulta)){ 
							$date = $dados['AtivaG'];
							$dia = ($date*100)/(35520/1000); '<br>';
							echo number_format("$dia",2,",",",");
							
						}
					?> </center></td>
        <td><center> CARNEIRO </center></td>
         <td><center>Ponto inves de virugula</center></td>
       
    
    </tr>
   
    <tr>
        <td><center>   					
					<?php
						include 'conexao1.php';
						
						$sql = " SELECT AtivaG,Dia FROM grafico where Agente = 'PONTE' and Dia = CURRENT_DATE()-1";
						
						$consulta = mysqli_query($conexao, $sql);
						
						while ($dados = mysqli_fetch_array($consulta)){ 
							$date = $dados['AtivaG'];
								$dia = ($date*100)/32880;'<br>';
							echo number_format("$dia",2,",",",");
							
							
						}
					?> </center></td>
        <td><center> PONTE </center></td>
         <td><center>Ponto inves de virugula</center></td>
    </tr>

   
    <tr>
        <td><center>   					
					<?php
						include 'conexao1.php';
						
						$sql = " SELECT AtivaG,Dia FROM grafico where Agente = 'BECKER' and Dia = CURRENT_DATE()-1";
						
						$consulta = mysqli_query($conexao, $sql);
						
						while ($dados = mysqli_fetch_array($consulta)){ 
							$date = $dados['AtivaG'];
								$dia = ($date*100)/38400;'<br>';
							echo number_format("$dia",2,",",",");
							
						}
					?> </center></td>
        <td><center> BECKER </center></td>
         <td><center>Ponto inves de virugula</center></td>
    </tr>

   
    <tr>
        <td><center>   					
					<?php
						include 'conexao1.php';
						
						$sql = " SELECT AtivaG,Dia FROM grafico where Agente = 'ITALO' and Dia = CURRENT_DATE()-1";
						
						$consulta = mysqli_query($conexao, $sql);
						
						while ($dados = mysqli_fetch_array($consulta)){ 
							$date = $dados['AtivaG'];
								$dia = ($date*100)/38400;'<br>';
							echo number_format("$dia",2,",",",");
							
						}
					?> </center></td>
        <td><center> ITALO </center></td>
         <td><center>Ponto inves de virugula</center></td>
    </tr>

<tr>
	<td colspan = 3><center>   					
					
	Primeiramente insira os valores de consumo e geração, % do dia 0.00<br>
	Depois que inserir (consumo e geração) clicar em editar e inserir a % do dia que aparecera.<br>
	OBS: Cuide o agente (usina).
    
    </tr>

</table>
		<br>
      <div class="col-md-12">
        <?php
          $query = 'SELECT * FROM grafico where agente = "SDP" or agente = "ITALO" or agente = "PONTE" or agente = "CARNEIRO" or agente = "BECKER" and YEAR(Dia) = YEAR(now()) AND MONTH(Dia) =  MONTH(now()) order by Dia ';
          $stmt = $conexao->prepare($query);
          $stmt->execute();
          $result = $stmt->get_result();
        ?>
        <h3 class="text-center text-info"> Consumo e Geração </h3>
        <table class="table table-hover" id="data-table">
		
          <thead>
            <tr>
			
              <th><center>ID</center></th>
			  <th><center>Geração</center></th>
              <th><center>Consumo</center></th>
              <th><center>Agente</center></th>
              <th><center>Dia</center></th>
              <th><center>Ação</center></th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td><?= $row['id']; ?></td>
			  <td><?= $row['AtivaG']; ?></td>
             <td><?= $row['AtivaC']; ?></td>
              <td><?= $row['Agente']; ?></td>
              <td><?= $row['Dia']; ?></td>
			  <td><?= $row['porc_dia']; ?></td>
              <td>
                <a href="details1.php?details=<?= $row['id']; ?>" class="badge badge-primary p-2">Detalhes</a> |
                <a href="action1.php?delete=<?= $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Deseja Deletar o Registro de Numero: <?= $row["id"]; ?>');">Deletar</a> |
                <a href="geracao.php?edit=<?= $row['id']; ?>" class="badge badge-success p-2">Edtar</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div><br><br><br><br><br><br>
    </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#data-table').DataTable({
      paging: true
    });
  });
  </script>
 

 
</body>

</html>