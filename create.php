<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap.css">
</head>

<body>
  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" style=" width: 100px; margin: auto;">
    <div class="mb-3">
      <label> Title</label>
      <input type="text" class="form-control" name="Title">
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Content </label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Content">
    </div>
    <div class="form-group">
        <label for="date">date</label>
        <input type="date" class="form-control" id="date" name="date" aria-describedby="" placeholder="Enter date" required>
      </div>

    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</body>

</html>
<?php
require("dbconnection.php");
//print_r($_FILES);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $Title = $_POST['Title'];
  $Content = $_POST['Content'];
  $date = ($_POST['date']);

  $errors = [];}

if (empty($Title)) {
  $errors['Title'] =
    'please enter your title';
}
if (empty($Content)) {
  $errors['Content'] =
    'please enter your content';
}
if (count($errors) > 0) {
  foreach ($errors as $key => $value) {
    echo '*' . $key . ':' . $value . '<br>';
  }
} else {
  $sql="insert into nti_blog (Title,Content,date) values ('$Title','$Content','$date')";
  $data=mysqli_query($con,$sql);
  if($data){
      echo "raw inserted";
  }
  else{
     echo 'error:'. mysqli_error($con);
  }
}

?>
<!-- # TASK .
Build a Blog CRUD system with following data  
Title   =  [required , string]
Content =  [required,length >50 ch]
date [required, date] 
Image   =  [required, file]. -->


