<?php
//Our Php code will be gose here.
$connection = mysqli_connect('localhost','root','','search_in_php');



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Search value</title>
    <style>
         body{
             background: #00ffff;
         }
        input[type=text]{

            height: 40px;
            width: 500px;
            border-radius: 5px;
            border: 1px solid #00008b;

        }
        button{
            height: 40px;
            width: 100px;
            border-radius: 6px;
            background: #0000ff;
            cursor: pointer;
            color: #ffffff;
        }
        button:hover{
            background: #008000;
        }
        .form-group{
            margin-left: 280px;
            margin-top: 30px;
        }
        .alert{
            margin-left: 280px;
            height: 50px;
            background: #ff9e99;
            color: #ffffff;
            border-radius: 5px;
            width: 500px;
            text-align: center;
        }
        .result{
            margin-left: 280px;
        }
    </style>
</head>
<body>
      <div class="container">
               <div class="card">
                   <div class="card-header">
                          <h1 style="text-align: center" class="text-muted">Search Anything</h1>
                   </div>
                   <div class="card-body">

                       <?php



                       ?>
                       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                             <div class="form-group">
                                 <input type="text" name="search-item" placeholder="Search Your Profile">
                                 <button type="submit" name="search">Search</button>
                             </div>
                       </form>

<!--                       Our next Code will be gose here-->
                           <?php
                           if (isset($_POST['search'])){

                               $search = $_POST['search-item'];
                               $sql = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%'";

                               $result = mysqli_query($connection,$sql);

                               $queryResult = mysqli_num_rows($result);
                               echo "<div class='result'> Threre are $queryResult Result Are Found
                                       </div>";
                                echo '<hr>';

                               if ($queryResult > 0){

                                   while ($row = mysqli_fetch_assoc($result)){
                                       echo "<a href='result.php?name=".$row['name']."'><div class='result'>
                                             <h5>".$row['name']."</h5>
                                        </div> </a>";
                                   }
                               }else{
                                   echo 'Search Not Found!!!';
                               }
                           }


                           ?>

                   </div>
               </div>
      </div>
</body>
</html>