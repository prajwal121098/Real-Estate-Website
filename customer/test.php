<!DOCTYPE html>


<?php
$f=$_FILES['fileToUpload'];
if(file_exists("img/ ".$f['name']))
{
  echo $f['name']. "already exist. Try another";
}
else if ($f['type']=="image/jpeg") 
{
  move_uploaded_file($f['tmp_name'],"img/".$f['name']);
}

else{
  echo "file format is not valid";
}
     
?>

<html>
<body>

<form action="test.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>



 <form method="" action="">
          <div class="md-form">
              <input type="file"  class="form-control" aria-describedby="passwordHelpBlockMD " name="file" id="file">
              <label for="add">property image</label>
            </div>
            <div class="md-form">
              <input type="t1"  class="form-control" aria-describedby="passwordHelpBlockMD " name="t1" id="t1">
              <label for="add">image name</label>
            </div>
                                    <button  type="submit" name="sub4" class="btn next-btn font-weight-bold float-right">NEXT</button>
             </form>