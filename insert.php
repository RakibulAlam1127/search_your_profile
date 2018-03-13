<?php
 //Our Php code will be gose here.
$errors = [];
$name = $email = $gender = $dept = $cgpa = $blood = '';
if (isset($_POST['register'])){
   if (empty($_POST['name'])){
       $errors['name'] = 'Name Field is Required';
   }else{
       $name = $_POST['name'];
   }
   if (empty($_POST['email'])){
       $errors['email'] = 'Email  Field is Required';
   }else{
       $email = $_POST['email'];
       if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
           $errors['email'] = 'Email Must be Valid';
       }
   }
   if (empty($_POST['gender'])){
       $errors['gender'] = 'Please Select Your Gender';
   }else{
       $gender= $_POST['gender'];
   }
   if (empty($_POST['dept'])){
       $errors = 'Please Select Your Department';
   }else{
       $dept = $_POST['dept'];
   }
   if (empty($_POST['cgpa'])){
       $errors['cgpa'] = 'CGPA field is Required';
   }else{
       $cgpa = $_POST['cgpa'];
   }
   if (empty($_POST['blood'])){
       $errors = 'Blood Group Field is Required';
   }else{
       $blood = $_POST['blood'];
   }
   if (empty($errors)){
       //Our database code wull be gose here.
       $connection = mysqli_connect('localhost','root','','search_in_php');
       $sql = "INSERT INTO  users(name,email,gender,department,cgpa,blood)VALUES ('$name','$email','$gender','$dept','$cgpa','$blood')";
       $stmt = mysqli_query($connection,$sql);
       if ($stmt == false){
           echo  mysqli_connect_errno();
           exit();
       }else{
          header('Location:search.php');
       }
   }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        body{
            background: #0000ff;
        }
        .container{
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container col-md-8">
            <div class="card">
                  <div class="card-header">
                        <h2 style="text-align: center">Please Sign Up</h2>
                  </div>
                <div class="card-body">
                    <?php
                      if (isset($success)){
                          ?>
                          <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php
                      }
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                         <div class="form-group">
                             <label for="name">Name</label>
                             <input type="text" name="name" class="form-control" placeholder="Name" autofocus>
                             <?php
                                if (isset($errors['name'])){
                                    ?>
                                    <div class="alert alert-danger"><?php echo $errors['name']; ?></div>
                             <?php
                                }
                             ?>
                         </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail" autofocus>
                            <?php
                            if (isset($errors['email'])){
                                ?>
                                <div class="alert alert-danger"><?php echo $errors['email']; ?></div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label><br>
                            <input type="radio" name="gender" value="Male">Male
                            <input type="radio" name="gender" value="Female">Female
                            <?php
                            if (isset($errors['gender'])){
                                ?>
                                <div class="alert alert-danger"><?php echo $errors['gender']; ?></div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="name">Select Department</label>
                            <select name="dept" class="form-control">
                                <option>Select Department</option>
                                <option value="Computer Science & Engineering">Computer Science & Engineering</option>
                                <option value="Electronics & Electrical Engineering">Electronics & Electrical Engineering</option>
                                <option value="Software Engineering">Software Engineering</option>
                                <option value="Textile Engineering">Textile Engineering</option>
                            </select>
                            <?php
                            if (isset($errors['dept'])){
                                ?>
                                <div class="alert alert-danger"><?php echo $errors['dept']; ?></div>
                                <?php
                            }
                            ?>
                        </div>
                         <div class="form-group">
                             <label for="cgpa">Cgpa</label>
                             <input type="text" name="cgpa" class="form-control" placeholder="CGPA" autofocus>
                             <?php
                             if (isset($errors['cgpa'])){
                                 ?>
                                 <div class="alert alert-danger"><?php echo $errors['cgpa']; ?></div>
                                 <?php
                             }
                             ?>
                         </div>
                          <div class="form-group">
                              <label for="blood">Blood Group</label>
                              <select name="blood" class="form-control">
                                  <option>Slect Your Blood Group</option>
                                  <option value="null">Don't Konw </option>
                                  <option value="A(+)">A(+)</option>
                                  <option value="A(-)">A(-)</option>
                                  <option value="B(+)">B(+)</option>
                                  <option value="B(-)">B(-)</option>
                                  <option value="AB(+)">AB(+)</option>
                                  <option value="AB(-)">AB(-)</option>
                                  <option value="O(+)">O(+)</option>
                                  <option value="O(-)">O(-)</option>
                              </select>
                              <?php
                              if (isset($errors['blood'])){
                                  ?>
                                  <div class="alert alert-danger"><?php echo $errors['blood']; ?></div>
                                  <?php
                              }
                              ?>
                          </div>
                        <div class="form-group">
                              <button type="submit" name="register" class="form-control btn btn-primary">Registration</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</body>
</html>