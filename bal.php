<?php


include 'header.php';
include 'boot.php';
include 'regdb.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>View Trancations</title>
</head>
<body>

<?php

		$query =" select * from info";

		$q = mysqli_query($conn,$query);
		$count=0;

?>

<div class="mx-auto" >
	<div class="w-100 p-5" >
		<div class="table-responsive">
			<table class="table table-striped">
			
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col">Balance</th>
			    </tr>
			  </thead>
				<?php 
				if ($q) {
					# code...
					foreach ($q as $row) {
						# code...
					?>

			  <tbody>
			    <tr>
			      <td class="table-success"><?php echo $count++; ?></th>
			      <td class="table-success"><?php echo $row['name']; ?> </td>
			      <td class="table-success"><?php echo $row['bal']; ?> </td>
			      </td>
			</tr>
		<?php }}?>
		</tbody>
	</table>
</div>
</div>
</div>




			      	</body>
</html>