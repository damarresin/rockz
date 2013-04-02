<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="x"/>
<input type="submit" value="upload"/>
</form>
<?php 
if (!empty($_FILES['x']['name'])){
$filename = $_FILES['x']['name'];

$move = move_uploaded_file($_FILES['x']['tmp_name'], '../../files/' . $filename . '');
echo "alamat filenya : <a href='../../files/$filename'>files/$filename</a><br/>";
}
?>