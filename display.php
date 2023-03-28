<?php
$conn = new mysqli('localhost','root','','cbp');
if($conn->connect_error){
    die("Connection Failed : ". $conn->connect_error);
} 
$query = "SELECT * FROM complaints where Phone!=0";
$result = mysqli_query($conn, $query);
?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<style>
  table{
    text-align:center;margin-left:auto;margin-right:auto;
  }
  table,tr,td,th{
    border:2px solid black;
    padding: 8px;
  }
</style>
</head>
<body>
<div style="text-align:center">
<table>
  <tr>
    <th>Complaint_id</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Department</th>
    <th>Subject</th>
    <th>location</th>
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
   <td><?php echo $sn; ?> </td>
   <td><?php echo $data['Name']; ?> </td>
   <td><?php echo $data['Phone']; ?> </td>
   <td><?php echo $data['Department']; ?> </td>
   <td><?php echo $data['Subject']; ?> </td>
   <td><?php echo $data['Location']; ?> </td>
 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } ?>
  </table>
  </div>
</body>