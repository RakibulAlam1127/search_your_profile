<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>profile</title>
</head>
<body>
      <div class="container">
              <div class="card">
                  <?php
                  $connection = mysqli_connect('localhost','root','','search_in_php');
                  $profile = $_GET['name'];
                   $sql = "select * from users WHERE name = '$profile'";
                   $stmt = mysqli_query($connection,$sql);
                   $result = mysqli_num_rows($stmt);
                  ?>
                   <div class="card-header">
                        <h1 style="text-align: center"><?php echo $profile; ?> Profile </h1>
                   </div>
                  <div class="card-body">
                      <?php
                          if ($result > 0){
                              while ($row = mysqli_fetch_assoc($stmt)){
                                  echo 'Name : '.$row['name'].'<br>';
                                  echo 'E-mail Address : '.$row['email'].'<br>';
                                  echo 'Gender : '.$row['gender'].'<br>';
                                  echo 'Department : '.$row['department'].'<br>';
                                  echo 'CGPA : '.$row['cgpa'].'<br>';
                                  echo 'Blood Group : '.$row['blood'].'<br>';
                                  echo 'Create at : '.$row['create_at'];

                              }
                          }
                      ?>
                  </div>
              </div>
      </div>
</body>
</html>