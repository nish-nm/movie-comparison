<?php

	if(!empty($_POST["movie1"]) && !empty($_POST["movie2"]) && isset($_POST["search"])){
		
		$search_query1 = htmlspecialchars($_POST["movie1"]);
		$search_query1 = str_replace(" ","+",$search_query1);
		
		$search_query2 = htmlspecialchars($_POST["movie2"]);
		$search_query2 = str_replace(" ","+",$search_query2);
		
		if(isset($_POST["year1"])){
			$url1 = "http://www.omdbapi.com/?t=$search_query1&apikey=42ad3ff6&plot=full&y=$_POST[year1]";
		}
	
		$url1 = "http://www.omdbapi.com/?t=$search_query1&apikey=42ad3ff6&plot=full";
		@$out1 = file_get_contents($url1);
		
		if($out1 == null || $out1 == false){
			$error = "$search_query1 not found";
		}
		
		else{
			$exploded_string1 = explode("\",\"",$out1);
			
			for($i=0; $i<count($exploded_string1); $i++){
				
				if(strpos($exploded_string1[$i],"Title")){
					$title1 = explode("\":\"",$exploded_string1[$i])[1];
					continue;
				}
			
				if((string)strpos($exploded_string1[$i],"Year") == '0'){
					$release_year1 = explode("\":\"",$exploded_string1[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string1[$i],"Released") == '0'){
					$release_date1 = explode("\":\"",$exploded_string1[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string1[$i],"Runtime") == '0'){
					$runtime1 = explode("\":\"",$exploded_string1[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string1[$i],"Genre") == '0'){
					$genre1 = explode("\":\"",$exploded_string1[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string1[$i],"Director") == '0'){
					$director1 = explode("\":\"",$exploded_string1[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string1[$i],"Writer") == '0'){
					$writer1 = explode("\":\"",$exploded_string1[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string1[$i],"Actors") == '0'){
					$actor1 = explode("\":\"",$exploded_string1[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string1[$i],"Plot") == '0'){
					$plot1 = explode("\":\"",$exploded_string1[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string1[$i],"Language") == '0'){
					$language1 = explode("\":\"",$exploded_string1[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string1[$i],"Country") == '0'){
					$country1 = explode("\":\"",$exploded_string1[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string1[$i],"Poster") == '0'){
					$poster1 = explode("\":\"",$exploded_string1[$i])[1];
					continue;
				}
				
				if(strpos($exploded_string1[$i],"Internet Movie Database") != false){
					$imdb_rating1 = explode("\":\"",$exploded_string1[$i+1])[1];
					$imdb_rating1 = explode("\"},{\"",$imdb_rating1)[0];
				}
				
				if(strpos($exploded_string1[$i],"Rotten Tomatoes") != false){
					$rt_rating1 = explode("\":\"",$exploded_string1[$i+1])[1];
					$rt_rating1 = explode("\"}],\"",$rt_rating1)[0];
					if(strpos($rt_rating1,"Rotten Tomatoes\":\"N/A")){
						$rt_rating1 = "N/A";
					}
				}
				
				if(strpos($exploded_string1[$i],"Metacritic") != false){
					echo $meta_rating1_1 = explode("\":\"",$exploded_string1[$i+1])[1];
					$meta_rating1 = explode("\"",$meta_rating1_1)[0];
					if(strpos($meta_rating1_1,"Metacritic\":\"N/A")){
						$meta_rating1 = "N/A";
					}
				}
				
				if(strpos($exploded_string1[$i],"Metascore") != false){
					$metascore_rating1 = explode("\":\"",$exploded_string1[$i])[2];
					if(strpos($exploded_string1[$i],"Metascore\":\"N/A")){
						$metascore_rating1 = "N/A";
					}
				}
				
				if(strpos($exploded_string1[$i],"Metacritic") == false){
					$meta_rating1 = "N/A";
				}
				
				if((string)strpos($exploded_string1[$i],"imdbID") == '0'){
					$imdb_link1 = explode("\":\"",$exploded_string1[$i])[1];
					$imdb_link1 = "https://imdb.com/title/".$imdb_link1;
					continue;
				}
				
				if((string)strpos($exploded_string1[$i],"Type") == '0'){
					$type1 = explode("\":\"",$exploded_string1[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string1[$i],"Production") == '0'){
					$production1 = explode("\":\"",$exploded_string1[$i])[1];
				}
			}
		}
		
		if(isset($_POST["year2"])){
			$url2 = "http://www.omdbapi.com/?t=$search_query2&apikey=42ad3ff6&plot=full&y=$_POST[year2]";
		}
	
		$url2 = "http://www.omdbapi.com/?t=$search_query2&apikey=42ad3ff6&plot=full";
		@$out2 = file_get_contents($url2);
		
		if($out2 == null || $out2 == false){
			$error = "$search_query2 not found";
			echo $error;
		}
		
		else{
			$exploded_string2 = explode("\",\"",$out2);
			
			for($i=0; $i<count($exploded_string2); $i++){
				
				if(strpos($exploded_string2[$i],"Title")){
					$title2 = explode("\":\"",$exploded_string2[$i])[1];
					continue;
				}
			
				if((string)strpos($exploded_string2[$i],"Year") == '0'){
					$release_year2 = explode("\":\"",$exploded_string2[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string2[$i],"Released") == '0'){
					$release_date2 = explode("\":\"",$exploded_string2[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string2[$i],"Runtime") == '0'){
					$runtime2 = explode("\":\"",$exploded_string2[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string2[$i],"Genre") == '0'){
					$genre2 = explode("\":\"",$exploded_string2[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string2[$i],"Director") == '0'){
					$director2 = explode("\":\"",$exploded_string2[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string2[$i],"Writer") == '0'){
					$writer2 = explode("\":\"",$exploded_string2[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string2[$i],"Actors") == '0'){
					$actor2 = explode("\":\"",$exploded_string2[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string2[$i],"Plot") == '0'){
					$plot2 = explode("\":\"",$exploded_string2[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string2[$i],"Language") == '0'){
					$language2 = explode("\":\"",$exploded_string2[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string2[$i],"Country") == '0'){
					$country2 = explode("\":\"",$exploded_string2[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string2[$i],"Poster") == '0'){
					$poster2 = explode("\":\"",$exploded_string2[$i])[1];
					continue;
				}
				
				if(strpos($exploded_string2[$i],"Internet Movie Database") != false){
					$imdb_rating2 = explode("\":\"",$exploded_string2[$i+1])[1];
					$imdb_rating2 = explode("\"},{\"",$imdb_rating2)[0];
				}
				
				if(strpos($exploded_string2[$i],"Rotten Tomatoes") != false){
					$rt_rating2 = explode("\":\"",$exploded_string2[$i+1])[1];
					$rt_rating2 = explode("\"",$rt_rating2)[0];
					if(strpos($rt_rating2,"Rotten Tomatoes\":\"N/A")){
						$rt_rating2 = "N/A";
					}
				}
				
				if(strpos($exploded_string2[$i],"Metacritic") != false){
					$meta_rating2_1 = explode("\":\"",$exploded_string2[$i+1])[1];
					$meta_rating2 = explode("\"",$meta_rating2_1)[0];
					if(strpos($meta_rating2_1,"Metacritic\":\"N/A")){
						$meta_rating2 = "N/A";
					}
				}
				
				if(strpos($exploded_string2[$i],"Metascore") != false){
					$metascore_rating2 = explode("\":\"",$exploded_string2[$i])[2];
					if(strpos($exploded_string2[$i],"Metascore\":\"N/A")){
						$metascore_rating2 = "N/A";
					}
				}
				
				if((string)strpos($exploded_string2[$i],"imdbID") == '0'){
					$imdb_link2 = explode("\":\"",$exploded_string2[$i])[1];
					$imdb_link2 = "https://imdb.com/title/".$imdb_link2;
					continue;
				}
				
				if((string)strpos($exploded_string2[$i],"Type") == '0'){
					$type2 = explode("\":\"",$exploded_string2[$i])[1];
					continue;
				}
				
				if((string)strpos($exploded_string2[$i],"Production") == '0'){
					$production2 = explode("\":\"",$exploded_string2[$i])[1];
				}
			}
		}
	}
	
	else if(empty($search_query1) && empty($search_query2) && isset($_POST["search"])){
		$error = "Please enter the name of Movies";		
	}
	
	else if(empty($search_query1) && isset($_POST["search"])){
		$error = "Please enter a movie name in field 1";
	}
	
	else if(empty($search_query2) && isset($_POST["search"])){
		$error = "Please enter a movie name in field 2";
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<?php if(isset($_POST["search"]) && $out1 != null && $out1 != false){ ?>
			<title>Compare <?php echo $title1 ?> V/S <?php echo $title2 ?> </title>
		<?php }else{?>
			<title>Compare Movies </title>
		<?php }?>
		<meta charset="UTF-8">
		<meta name="description" content="Compare Movies">
		<meta name="keywords" content="movies,comparison">
		<meta name="author" content="Ganofins">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<meta name="google-site-verification" content="eQWtghi6JLcFDA5j2w9Xycw0C3XjGN5DXBeeOdGl2aw" />
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-75254835-8"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-75254835-8');
		</script>
	</head>
	<body>
		<center>
			<form action="" method="post">
				<div>
					<input type="text" name="movie1" placeholder="Enter the name of Movie">
					<input type="number" name="year1" placeholder="Movie released on">
				</div>
				<div>
					<input type="text" name="movie2" placeholder="Enter the name of Movie">
					<input type="number" name="year2" placeholder="Movie released on">
				</div>
				<input type="submit" value="Compare" name="search">
			</form>
		</center>
		<?php if(isset($_POST["search"]) && $out1 != null && $out1 != false){ ?>
			<div class="result">
				<center>
					<h1> <?php echo $title1 ?> V/S <?php echo $title2 ?> </h1>
					<img src=<?php echo $poster1 ?> height="268" width="182" style="">
					<img src=<?php echo $poster2 ?> height="268" width="182" style="">
				</center>
				<table border="1px" cellspacing="0px" bordercolor="black">
					<tr>
						<th></th>
						<th><h2><?php echo $title1 ?></h2></th>
						<th><h2><?php echo $title2 ?></h2></th>
					</tr>
					<tr>
						<td>
							<span style="color:red; font-weight:bold; font-size:25px;">Release Date<span>
						</td>
						<td>
							<span style="text-align:center; font-weight:bold;">
								<center>
									<?php echo $release_date1 ?>
								</center>
							</span>
						</td>
						<td>
							<span style="text-align:center; font-weight:bold;">
								<center>
									<?php echo $release_date2 ?>
								</center>
							</span>
						</td>
					</tr>
					<tr>
						<td><span style="color:red; font-weight:bold; font-size:25px;">IMDb Rating<span></td>
						<td><strong><center><?php echo $imdb_rating1; ?></center></strong></td>
						<td><strong><center><?php echo $imdb_rating2; ?></center></strong></td>
					</tr>
					<tr>
						<td><span style="color:red; font-weight:bold; font-size:25px;">Rotten Tomatoes Rating<span></td>
						<td><strong><center><?php echo $rt_rating1; ?></center></strong></td>
						<td><strong><center><?php echo $rt_rating2; ?></center></strong></td>
					</tr>
					<tr>
						<td><span style="color:red; font-weight:bold; font-size:25px;">Metascore Rating<span></td>
						<td><strong><center><?php echo $metascore_rating1; ?></center></strong></td>
						<td><strong><center><?php echo $metascore_rating2; ?></center></strong></td>
					</tr>
					<tr>
						<td><span style="color:red; font-weight:bold; font-size:25px;">Metacritic Rating<span></td>
						<td><strong><center><?php echo $meta_rating1; ?></center></strong></td>
						<td><strong><center><?php echo $meta_rating2; ?></center></strong></td>
					</tr>
					<tr>
						<td><span style="color:red; font-weight:bold; font-size:25px;">Genres</span></td>
						<td>
							<center>
								<span style="font-weight:bold;"><?php echo $genre1; ?></span>
							</center>
						</td>
						<td>
							<center>
								<span style="font-weight:bold;"><?php echo $genre2; ?></span>
							</center>
						</td>
					</tr>
					<tr>
						<td>
							<span style="color:red; font-weight:bold; font-size:25px;">Runtime
						</td>
						<td>
							<center>
								<span style="font-weight:bold;">
									<?php echo $runtime1; ?>
								</span>
							</center>
						</td>
						<td>
							<center>
								<span style="font-weight:bold;">
									<?php echo $runtime2; ?>
								</span>
							</center>
						</td>
					</tr>
					<tr>
						<td><span style="color:red; font-weight:bold; font-size:25px;">Cast</td>
						<td>
							<center>
								<span style="font-weight:bold;">
									<?php echo $actor1; ?>
								</span>
							</center>
						</td>
						<td>
							<center>
								<span style="font-weight:bold;">
									<?php echo $actor2; ?>
								</span>
							</center>
						</td>
					</tr>
					<tr>
						<td><span style="color:red; font-weight:bold; font-size:25px;">Written by</td>
						<td>
							<center>
								<span style="font-weight:bold;">
									<?php echo $writer1; ?>
								</span>
							</center>
						</td>
						<td>
							<center>
								<span style="font-weight:bold;">
									<?php echo $writer2; ?>
								</span>
							</center>
						</td>
					</tr>
					<tr>
						<td><span style="color:red; font-weight:bold; font-size:25px;">Directed by</td>
						<td>
							<center>
								<span style="font-weight:bold;">
									<?php echo $director1; ?>
								</span>
							</center>
						</td>
						<td>
							<center>
								<span style="font-weight:bold;">
									<?php echo $director2; ?>
								</span>
							</center>
						</td>
					</tr>
					<tr>
						<td><span style="color:red; font-weight:bold; font-size:25px;">Produced by</td>
						<td>
							<center>
								<span style="font-weight:bold;">
									<?php echo $production1; ?>
								</span>
							</center>
						</td>
						<td>
							<center>
								<span style="font-weight:bold;">
									<?php echo $production2; ?>
								</span>
							</center>
						</td>
					</tr>
					<tr>
						<td><span style="color:red; font-weight:bold; font-size:25px;">Storyline</td>
						<td>
							<p style="float:right"><?php echo $plot1 ?></p>
						</td>
						<td>
							<p style="float:right"><?php echo $plot2 ?></p>
						</td>
					</tr>
				</table>
			</div>
		<?php }else{?>
			<div class="error">
				<span class="error-text"><?php echo $error; ?></span>
			</div>
		<?php } ?>
	</body>
</html>
