<html>
   <head>
      <style>
       img{width:20px;height:20px;}
       table td, table th {
    border: 1px solid Gainsboro;
}

body{
   width: 600px;
}
      </style>
</head>
<body>
<form action="" method="POST" >
<?php
$dbname = 'demo';
$conn=mysqli_connect('localhost','root','',$dbname);
if(! $conn ) {
    die('Could not connect: ' . mysqli_error($conn));
 }

 //echo 'Connected successfully';


 $name = $email = $gender = $mail_status="";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (isset($_POST["submitKey"])) {
        $name = ($_POST['name']);
        $mail = ($_POST['email']);
        $gender = $_POST['gender'];
        $agree = $_POST['mail_status'];
        $sql= "INSERT INTO demo (name,email,gender,mail_status) 
        VALUES ( '$name', '$email', '$gender', '$mail_status' )";
         mysqli_query( $conn,$sql);
    
   //echo "<br>Data inserted to table successfully\n";
   mysqli_close($conn);   }

}

   $dbname = 'demo';
$conn=mysqli_connect('localhost','root','',$dbname);
if(! $conn ) {
    die('Could not connect: ' . mysqli_error($conn));
 }

 //echo 'Connected successfully';
 $sql="select * from demo";
 //
 $result=mysqli_query($conn,$sql);
 if(! $result ) {
    die('Could not insert to table: ' . mysqli_error($conn));
 }?>


<h2>Users Details.<a href="step.php"><input type="button" name="add new user"value="add new user"style="margin-left: 200px;background-color:green;color:white;border-radius:4px;height:30px;"></a></h2><hr>

 <table style="border:2px solid Gainsboro;font-size:15px;width:500px;">
 <thead>
     <tr>
                     <th>#</th>
                    <th>name</th>
                    <th>email</th>
                    <th>gender</th>
                    <th>mail_status</th>
                    <th>action</th>
     </tr>
 </thead>
<tbody>

<?php
if(mysqli_num_rows($result)>0){
while ($row=mysqli_fetch_assoc($result)) {
?>   

<td><?php echo $row['id']?></td>
    <td><?=$row['name']?></td>
    <td><?=$row['email']?></td>
    <td><?=$row['gender']?></td>
    <td><?=$row['mail_status']?></td>
   <td><a href="view.php?id=<?=$row['id']?>"><image src="pngtree-vector-view-icon-png-image_854944.jpg" href="#view"></a>
    |<a href="edit.php?id=<?=$row['id']?>"><img src="edi.jfif" href="#edit"></a>
    |<a href="delete.php?id=<?=$row['id']?>"><img src="blue-delete-button-png-29.png" href="#delete"></a></td> 
</tr> 
<?php
}}
else{
   echo"0 results";
}
?>
</tbody>
</table>
</form>
</body>
</html>
<?php
 //echo "<br>Data inserted to table successfully\n";
 mysqli_close($conn);

?>