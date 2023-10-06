<?php 
require "database_connect.php";
$source = $_POST['src'];
$destination = $_POST['dstn'];
$trainNo = $_POST['tno'];
$query="SELECT * FROM train_details WHERE trainNumber='$trainNo' and destination= '$destination'";
$data= mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
if($total>0){
    echo  '<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head><body><div class="table-responsive"><table class="table  table-light table-bordered table hover">
    <thead class="table-dark">
      <tr>
        <th scope="col">Train No.</th>
        <th scope="col">source</th>
        <th scope="col">Destination</th>
        <th scope="col">Distance</th>
        <th scope="col">Seat Availiability</th>
      </tr>
    </thead>
    <tbody>';
      while($rows = mysqli_fetch_assoc($data)){
            
    echo ' <tr>
        <td> '.$rows["trainNumber"].'</td>
        <td> '.$rows["source"].'</td>
        <td> '.$rows["destination"].'</td>
        <td> '.$rows["distance"].'</td>
        <td> ';
        if($rows["seatStatus"]==1){
          echo 'Available'; }
          else{
            echo 'Not Available';
          } 
          echo '</td>
        </tr>';
  }
            
   echo  '</tbody>
  </table>
  </div></body></html>';   
}
else{
    echo "NO RECORDS FOUND";
}
mysqli_close($conn);
?>