<!DOCTYPE html>
<!-- Sikiru Adewale
CSCI 5060
Assignment 4
-->
<?php
		
$numbers = filter_input(INPUT_POST, "numbers", FILTER_VALIDATE_INT);
if ($numbers === false || empty($numbers)) {
	$numbers = 0;
}
		
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Sikiru Adewale's Stat-O-Meter</title>
	<link rel="stylesheet" type="text/css" href="site.css"> 
</head>

<body>
<div class="header">
		<div id = "containter"><img src="image/img.png">
</div>
	<div class="content">
	<h1>Sikiru Adewale's Stat-O-Meter</h1>
</div>
</div>

<br>
<br>
<br>
<br>


<section>
	<?php
					

					$msg = false;
					if (isset($_POST['numbers'])){

						$numbers = $_POST['numbers'];

						$num = preg_split("/[\s,]+/", $numbers);
					
						foreach ($num as $key => $val) {
							if (!filter_var($val, FILTER_VALIDATE_INT)){
							
								echo '<p class="err-msg">"'.$val.'" is incorrect input</p>';
								$msg = true;
								
							}
						}
						if (!$msg) {
							echo '<table>';
								$mid_index = floor(count($num) / 2);
								$median = $num[$mid_index];
								if (count($num) % 2 == 0) {
									$median = ($median + $num[$mid_index - 1]) / 2;
							
								}

								$num_of_elt = count($num);

								$variance = 0;

								$average = array_sum($num)/$num_of_elt;

								foreach($num as $x) {
									$variance += pow(($x - $average), 2)/ $num_of_elt;
								}

								$sd = (float)sqrt($variance);


						# First table for the labels and values
						
								echo '<th>Labels</th>
										<td>Values</d>
									<tr>
										<th>The number of values the user entered, N</th>
										<td>'.$num_of_elt.'</td>
									</tr>
									<tr>
										<th>The sum of the values the user entered</th>
										<td>'.array_sum($num).'</td>
									</tr>
									<tr>
										<th>The largest value the user entered</th>
										<td>'.max($num).'</td>
									</tr>
									<tr>
										<th>The smallest value the user entered</th>
										<td>'.min($num).'</td>
									</tr>
									<tr>
										<th>The mean of values the user entered</th>
										<td>'.$average.'</td>
									</tr>
									<tr>
										<th>The standard deviation of the values the user entered</th>
										<td>'.$sd.'</td>
									</tr>
								</thead>
							</table><br><br>';
							
							
							# 2nd table for sorting the data
							
							sort($num, SORT_NUMERIC);
							echo '<table>';

								echo '<thead>
									<tr>
										<th>The number, x</th>';
										for ($x=0; $x < count($num); $x++) {
											echo '<td>'.$num[$x].'</td>';
										}

									echo '</tr>
									<tr>
										<th>Absolute difference from average, |x − µ|</th>';
										for ($x=0; $x < count($num); $x++) {
											echo '<td>'.abs($num[$x] - $average).'</td>';
										}

									echo '</tr>
									<tr>
										<th>The square, x<sup>2</sup></th>';
										for ($x=0; $x < count($num); $x++) {
											echo '<td>'.pow($num[$x], 2).'</td>';
										}

									echo '</tr>
									<tr>
										<th>The square root, √x</th>';
										for ($x=0; $x < count($num); $x++) {
											echo '<td>'.sqrt($num[$x]).'</td>';
										}

									echo '</tr>
									<tr>
										<th>The log of base-10, log<sub>10</sub> <sup>x</sup></th>';
										for ($x=0; $x < count($num); $x++) {
											echo '<td>'.log($num[$x], 10).'</td>';
										}

									echo '</tr>
								</thead>
							</table>';

						}
					}
				?>

			<br>
			<form action="numbers.php" method="POST">
			
					<label for="numbers">Enter numbers here:</label>
					<textarea name="numbers" class="form-control" id="numbers" required><?php echo $numbers; ?></textarea>
	

				<div id="buttonDiv">
				<input type="submit" value="submit">
				<input type="reset" value="reset">
			</div>
			</form>

		</div>
</section>
<br>
<br>	
			
	<a href="index.html">Go back to home page</a>
	

</body>
</html>
