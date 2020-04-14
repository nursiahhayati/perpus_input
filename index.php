<html>
<head>
    <title>DATA BUKU PERPUSTAKAAN</title>
</head>
<link rel="stylesheet" href="style.css">
<div class="header">
<font face="calibri" size="2" color="black"><center><h1>Data Buku Perpustakaan</h1></center>
</div>
<div class="body">

<?php
	require('CPerpus.php');
	$objectPerpus=new mahasiswa(); 
 
    if (isset($_GET['menu'])) {
        switch($_GET['menu']){
            case 'detail' : $objectPerpus->detail($_GET['id_buku']);break;
            case 'hapus'  : $objectPerpus->hapus($_GET['id_buku']);break;
            case 'update' : $objectPerpus->update($_GET['id_buku']);break;
    } 
} 
    else if (isset($_GET['target'])) {   
		if($_GET['target']=='input'){
			include './navbar.php';$objectPerpus->inputmahasiswa();
		}
    } 
    else if(isset($_GET['id_buku'])) {
		$objectPerpus->detail();
	} else {
		$objectPerpus->cetaklist();include './navbar.php';
	}
?>
</body>
</html>