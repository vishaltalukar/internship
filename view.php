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

		$query =" select * from transfer";

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
			      <th scope="col">From</th>
			      <th scope="col">To</th>
			      <th scope="col">Amount</th>
			      <th scope="col">Time</th>
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
			      <td class="table-success"><?php echo $row['from_user']; ?> </td>
			      <td class="table-success"><?php echo $row['to_user']; ?> </td>
			      <td class="table-success"><?php echo $row['amt']; ?> </td>
			      <td class="table-success"><?php echo $row['at']; ?> </td>
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