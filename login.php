
 <?php
 $username = $_POST['username'];
 $password = $_POST['password'];
 $con = mysqli_connect('localhost','root','','record');
 $result = mysqli_query($con,"select * from log order by current_timestamp");
 //DataBase Connection
 $conn = new mysqli('localhost','root','','record');
 if($conn->connect_error){die('Connection Failed : '.$conn->conect_error);}
 else {if(isset($_POST['username']))
 {$sql = "select * from stud where username='".$username."' AND
password='".$password."' limit 1";
 $r = mysqli_query($con,$sql);
 if(mysqli_num_rows($r)==1)
 {$stmt = $conn->prepare("insert into log(username,password) values(?, ?)");
 $stmt->bind_param("si",$username,$password);
 $stmt->execute();
 $stmt->close();
 $conn->close();}}
 else{header('location:./index.html');}}
 ?>
 <?php
 $username = $_POST['username'];
 $password = $_POST['password'];
 $con = mysqli_connect('localhost','root','','record');
 $result = mysqli_query($con,"select * from log order by
current_timestamp");
 //DataBase Connection
 $conn = new mysqli('localhost','root','','record');
 if($conn->connect_error){die('Connection Failed : '.$conn->conect_error);}
 else{if(isset($_POST['username'])){
 $sql = "select * from stud where username='".$username."' AND password='".$password."' limit 1";
 $r = mysqli_query($con,$sql);}
 if(mysqli_num_rows($r)==1){echo "<h1>Logged In
Successfully....</h1>";}
 else{header('location:./index.html');}}
 ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <title>Table</title>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initialscale=1">
     <!--
=======================================================================
========================-->
     <link rel="icon" type="image/png" href="./images/icons/favicon.ico" />
     <!--
=======================================================================
========================-->
     <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
     <!--
=======================================================================
========================-->
     <link rel="stylesheet" type="text/css" href="./css/util.css">
     <link rel="stylesheet" type="text/css" href="./css/main.css">
     <!--
=======================================================================
========================-->
     <style>
     .btn {
         position: absolute;
         top: 0px;
         right: 100px;
     }

     .btn1 {
         position: absolute;
         top: 7px;
         right: 20px;
     }
     </style>
     <script type="text/javascript" src="./js/jquery.min.js"></script>
 </head>

 <body>
     <div class="container-table100">
         <div class="table100 ver6 m-b-110">
             <table data-vertable="ver6">
                 <thead>
                     <tr class="row100 head">
                         <th class="column100 column1" colspan="3">Log In Information</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr class="row100">

                         <td class="column100
column1">UserName</td>
                         <td class="column100
column2">Password</td>
                         <td class="column100
column3">Date/Time</td>
                     </tr><?php while($rows=mysqli_fetch_assoc($result)){ ?>
                     <tr align="center" class="row100">
                         <td><?php echo $rows['username'] ?></td>
                         <td><?php echo $rows['password']
?></td>
                         <td><?php echo $rows['Date/Time']
?></td>
                     </tr><?php  }?>
                 </tbody>
             </table>
         </div>
     </div>
     <div align="right" class="btn">
         <a href="./index.html"><button><img src="./img/4.png" width="20px"
                     height="20px"><br>LogOut</button></a>
     </div>

 </body>

 </html>