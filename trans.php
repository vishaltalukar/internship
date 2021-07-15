<?php


include 'header.php';
include 'boot.php';
include 'regdb.php';

$query =" select * from info WHERE id > 1 ";

		$q = mysqli_query($conn,$query);

if(isset($_POST['submit'])){
    $id =$_POST['to_user'];
     $amt =$_POST['amt'];
     $demo_bal=$_POST['demo'];
     $name=$_POST['name'];
     $u="select * from info where id='$id'";
     
     $pre_bal = mysqli_query($conn,$u);
     
     while ($row = $pre_bal->fetch_assoc()) {
    	$bal = $row['bal'];
    	$name1=$row['name'];
		}
	if ($amt < $demo_bal)	{


	date_default_timezone_set("Asia/Kolkata");
	$t= date("Y-m-d h:i:s a");
	$insertq="insert into transfer (from_user,to_user,amt,at) values ('$name','$name1','$amt','$t')";
	$up="update info set bal=bal+'$amt' where id ='$id'";
	$up1="update info set bal=bal-'$amt' where id =1";
	$iquery2 = mysqli_query($conn,$insertq);
	$iquery1 = mysqli_query($conn,$up1);
	$iquery = mysqli_query($conn,$up);

	if ($iquery && $iquery1 && $iquery2) {
                # code...
                ?>
                <script type="text/javascript">
                  alert("DONE");
                  window.location.href='view.php';
                </script>
                <?php
              }
              else {
                ?>
                <script type="text/javascript"> 
                  alert("Connection not usesuccesfull")

                </script>
                <?php
              }
		}

		else{
			?>
                <script type="text/javascript"> 
                  alert("Debit should be less than Balance")

                </script>
                <?php
		}


              

              
 }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Demo Banking System</title>
  <style>
    #img { 
  background: url('https://images.unsplash.com/photo-1623118175847-6abf2040c89a') no-repeat center center fixed; 
  opacity : 0.9;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}


  </style>
</head>

<body id="img">

	<i class="bi bi-twitter">
	<div class="mx-auto" >
	  <div class="w-100 p-5" >
			<form class="modal-content" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

		<div class="container">
		<div class="row">
		<div class="col">
			<br>
			<label for="psw"><b>From </b></label>
		  <select class="custom-select" id="inputGroupSelect01" name="from_user" required disabled >
		  	<?php $quer =" select * from info where id=1";
					$qq = mysqli_query($conn,$quer);
				if ($qq) {
					# code...
					foreach ($qq as $row) {
						# code...
						?>
	                      <!-- options -->
              
              <option > <?php echo $row['name'] ?></option>
          <?php } }?>
	                    </select>
	                    <br>
	       <br>
	       <?php if ($qq) {
					# code...
					foreach ($qq as $row) {
						# code...
						?>
						<label for="psw"><b>Available Balance  </b></label>
						<input type="text" placeholder="<?php  echo $row['bal'] ?>" disabled >
						<input type="hidden" name="demo" not required  value="<?php echo $row['bal'] ?>" >
						<input type="hidden" name="name" not required  value="<?php echo $row['name'] ?>" >
				<?php } }?>
				<br>
				<br>
			<label for="psw"><b>Amount </b></label>
      <input type="text" placeholder="Enter Amount to be Debited" name="amt" required>

    </div>
    <div class="col">
    	<br>
    	<label for="psw"><b>To </b></label>
      <select class="custom-select" id="inputGroupSelect01" name="to_user" required >
      	<option value="">Select</option>
		
			<?php 
				if ($q) {
					# code...
					foreach ($q as $row) {
						# code...
						?>
	                      <!-- options -->
              
              <option value="<?php echo $row['id'] ?>" > <?php echo $row['name'] ?></option>
          <?php } }?>
	       </select>
	       
    </div>

	</div>
	</div>
	<br>
	<div class="container">
	  <div class="row justify-content-md-center">

		<div class="col-md-auto">
			<br>
		      <button style="width:auto;" type="submit" name="submit">Submit
		      </button>
		      <br>
		      <br>
		    </div>
		</div>
		</div>






</form>

</div>
</div>

</i>

</body>
</html>
