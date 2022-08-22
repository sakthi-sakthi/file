<?php 
include "db.php";
$sql = "SELECT * FROM forms";
$result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>View</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>  
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>  
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"> </script>
 

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-9">
					<h2 class="heading-section" style="font-size: 50px; font-family: arieal; font-weight: bolder;">Database Values</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-40">
					<div class="table-wrap">


				<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              				<th>ID</th>
							<th>NAME</th>
        					<th>BIRTHDATE</th>
       					 	<th>GENDER</th>
        					<th>DEGREE</th>
        					<th>IMAGES</th>

            </tr>
        </thead>
        <tbody>
        	<?php

							while ($row = $result->fetch_assoc())
							{?>	
            <tr>
                	<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                 	<td><?php echo $row['gender']; ?></td>
                	<td><?php echo $row['email']; ?></td>
                 	<td><?php echo $row['phone']; ?></td>
                 	<td><?php echo $row['sub']; ?></td>
                 	<td><a href="/colorlib-regform-4/next.php?id=<?php echo $row["id"];?>" class="btn btn-primary">Update</a></td>
       						<td><a href="view.php?id=<?php echo $row['id']; ?>"><input type="submit" class="btn btn-primary" value="Delete"></a></td>
                 	</tr>
          <?php  } ?>      
        </tbody>
    </table>
<script>
	 
</script>
					</div>
				</div>
			</div>
		</div>
	</section>
<script type="text/javascript">
	$(document).ready(function () {
    $('#example').DataTable();
});
</script>
	</body>
</html>

