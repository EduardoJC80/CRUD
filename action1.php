<?php
	session_start();
	include 'conexao1.php';

	$update=false;
	$id="";
	$name="";
	$email="";
	$phone="";
	$dia="";
	$porcentagem="";
	$ug1="";
	$ug2="";
	$rs="";
	
	if(isset($_POST['add'])){
		$name=$_POST['ativac'];
		$email=$_POST['ativag'];
		$phone=$_POST['agente'];
		$dia=$_POST['dia'];
		$porcentagem=$_POST['porc_dia'];
		$ug1=$_POST['ug1'];
		$ug2=$_POST['ug2'];
		$rs=$_POST['rs'];
		
		$query="INSERT INTO grafico (AtivaC,AtivaG,Agente,Dia,porc_dia,ug1,ug2,rs)VALUES(?,?,?,?,?,?,?,?)";
		$stmt=$conexao->prepare($query);
		$stmt->bind_param("ssssssss",$name,$email,$phone,$dia,$porcentagem,$ug1,$ug2,$rs);
		$stmt->execute();

		header('location:geracao.php');
		$_SESSION['response']="Dados inseridos com sucesso!";
		$_SESSION['res_type']="success";
	}
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];


		$query="DELETE FROM grafico WHERE id=?";
		$stmt=$conexao->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header('location:geracao.php');
		$_SESSION['response']="Excluído com sucesso!";
		$_SESSION['res_type']="danger";
	}
	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM grafico WHERE id=? order by dia";
		$stmt=$conexao->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$id=$row['id'];
		$name=$row['AtivaG'];
		$email=$row['AtivaC'];
		$phone=$row['Agente'];
		$dia=$row['Dia'];
		$porcentagem=$_POST['porc_dia'];
		$ug1=$_POST['ug1'];
		$ug2=$_POST['ug2'];
		$rs=$_POST['rs'];
		
		$update=true;
	}
										//$id = id
										//$nome = geração
		//Significado das variaveis		//$email = Consumo
										//$phone = agente (nome da usina)
										//$dia = data
	
	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$name=$_POST['ativag'];
		$email=$_POST['ativac'];
		$phone=$_POST['agente'];
		$dia=$_POST['dia'];
		$porcentagem=$_POST['porc_dia'];
		$ug1=$_POST['ug1'];
		$ug2=$_POST['ug2'];
		$rs=$_POST['rs'];
		
		$query="UPDATE grafico SET AtivaC=? ,AtivaG=?,Agente=?,Dia=?,porc_dia=?,ug1=?,ug2=?,rs=? WHERE id=?";
		$stmt=$conexao->prepare($query);
		$stmt->bind_param("ssssi",$email,$name,$phone,$dia,$id);
		$stmt->execute();

		$_SESSION['response']="Atualizado com sucesso!";
		$_SESSION['res_type']="primary";
		header('location:Geracao.php');
	}

	if(isset($_GET['details'])){
		$id=$_GET['details'];
		$query="SELECT * FROM grafico WHERE id=?";
		$stmt=$conexao->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vid=$row['id'];
		$vname=$row['AtivaC'];
		$vemail=$row['AtivaG'];
		$vphone=$row['Agente'];
		$vphoto=$row['Dia'];
	}
?>