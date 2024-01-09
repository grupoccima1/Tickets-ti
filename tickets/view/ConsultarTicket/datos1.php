<?php 
$conexion=mysqli_connect('localhost','bbbme11_ti','Gccima22.','bbbme11_ti1');
$subcategoria=$_POST['subcategoria'];

	$sql="SELECT *
		from cat 
		where categoria='$subcategoria'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label class='form-label'>Subcategoria</label> 
			<select class='form-select form-select' id='subcat' name='subcat' required>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[2].'>'.utf8_encode($ver[2]).'</option>';
	}

	echo  $cadena."</select>";
	

?>	