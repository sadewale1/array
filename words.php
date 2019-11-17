<!DOCTYPE html>
<!-- Sikiru Adewale
CSCI 5060
Assignment 4 
-->
<html>
<head>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>Sikiru Adewale's Word-O-Meter</title>
	<link rel="stylesheet" type="text/css" href="site.css">
</head>
<body>
	<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sikiru Adewale's Word-O-Meter</title>
    <link rel="stylesheet" type="text/css" href="site.css">
</head>

<body>
    <div class="header">
        <div id="containter"><img src="image/img.png">
            <ul>
                <li>
                    <a href="numbers.php">Basic Statistics |</a>
					<a href="words.php">Series of Words</a>
                </li>
            </ul>
        </div>
	</div>

	<section>
		<div class="content">
			<div class="result">
				<?php
					$msg = false;

					if (isset($_POST['words']) && !empty($_POST['words'])) {

						$words = $_POST['words'];

						$wrd_s = preg_split("/[\s,]+/", $words, -1, PREG_SPLIT_NO_EMPTY);
						$uni = array_unique($wrd_s);
						$map = array_map('strlen', $wrd_s);
						echo '<table>';
							
							echo '<thead>
								<tr>
									<th>The total number of characters of all the words and whitespace that was originally entered</th>
									<td>'.strlen($words).'</td>
								</tr>
								<tr>
									<th>The total number of characters of all the words not counting the whitespace</th>
									<td>'.strlen(str_replace(' ', '', $words)).'</td>
								</tr>
								<tr>
									<th>The total number of words that were entered</th>
									<td>'.count($wrd_s).'</td>
								</tr>
								<tr>
									<th>The total number of unique words that were entered</th>
									<td>'.count($uni).'</td>
								</tr>
								<tr>
									<th>The length of the shortest word</th>
									<td>'.min($map).'</td>
								</tr>
								<tr>
									<th>The length of the shortest word</th>
									<td>'.max($map).'</td>
								</tr>
								<tr>
									<th>The average length of all the words</th>
									<td>'.(array_sum($map)/count($map)).'</td>
								</tr>
							</thead>
						</table><br><br>';
						sort($wrd_s);
						$vowels = array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U');
						echo '<table>';
							
							echo '<thead>
								<tr>
									<th>The word</th>';
									for ($i=0; $i < count($wrd_s); $i++) { 
										echo '<td>'.$wrd_s[$i].'</td>';
									}
									
								echo '</tr>
								<tr>
									<th>Number of characters in the word</th>';
									for ($i=0; $i < count($wrd_s); $i++) { 
										echo '<td>'.strlen($wrd_s[$i]).'</td>';
									}
									
								echo '</tr>
								<tr>
									<th>Number of vowels in the word</th>';
									for ($i=0; $i < count($wrd_s); $i++) { 
										$n = 0;
										$wns = preg_split("//", $wrd_s[$i], -1, PREG_SPLIT_NO_EMPTY);
										for ($j=0; $j < count($wns); $j++) { 
											if (in_array($wns[$j], $vowels)) {
												$n++;
											}
										}										
										echo '<td>'.$n.'</td>';
									}
									
								echo '</tr>
								<tr>
									<th>The word printed in reverse</th>';
									for ($i=0; $i < count($wrd_s); $i++) { 
										echo '<td>'.strrev($wrd_s[$i]).'</td>';
									}									
								echo '</tr>
							</thead>
						</table>';
					}
				?>
			</div>
			<br>
			<form action="words.php" method="POST">
				<div class="form-group">
					<label for="words">Enter words here:</label>
					<textarea name="words" class="form-control" id="words" required="required"><?php echo $words; ?></textarea>
				</div>

				<div id="buttonDiv">
				<input type="submit" value="submit">
				<input type="reset" value="reset">
			</div>
			</form>

		</div>
	</section>




	<footer>
		<div>
			<ul>
				<li>
					<a href="index.html">Home page</a>
				</li>
			</ul>
		</div>
		<br>
	</footer>
</body>
</html>