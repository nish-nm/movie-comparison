<?php
	if(isset($_POST["search"])){
		require_once("simple_html_dom.php");
		
		$q = $_POST["movie1"];
		$q = str_replace(" ","+",$q);
		
		$url = "https://www.imdb.com/find?&q=".$q."&s=all";
		
		$html = file_get_html($url);
		
		if($html){	
			$link = $html -> find("div[class=findSection]")[0];
			if($link){
				$link = $html -> find("table[class=findList]")[0];
				$link = $link -> find("tr[class=findResult]")[0];
				$link = $link -> find("td[class=result_text]")[0];
				$link = $link -> find("a")[0];
				$link = $link -> href;
			}else{
				echo "Movie not found";
			}
		}
		else{ 
			echo "Invalid Movie name"; 
		}
		
		
		$url = "https://www.imdb.com".$link;
		
		$html = file_get_html($url);
		
		if($html){	
		
			$section = $html -> find("div[id=content-2-wide]")[0];
			
			if($section){
			
				$main_section = $section -> find("div[id=main_top]")[0];
				$main_section = $main_section -> find("div[id=title-overview-widget]")[0];
				
				$vital = $main_section -> find("div[class=vital]")[0];
				$title_block = $vital -> find("div[class=title_block]")[0];
				
				@$movie_rating = $title_block -> find("div[class=ratingValue]")[0] -> plaintext;
				
				if(!$movie_rating){
					$movie_rating = "Not yet rated";
				}
				
				$title_bar = $title_block -> find("div[class=title_wrapper]")[0];
				
				$title = $title_bar -> find("h1")[0] -> plaintext;
				
				$title_bar_subtext = $title_bar -> find("div[class=subtext]")[0];
				
				$genre = $title_bar_subtext -> find("a");
				
				$release_date = $genre[count($genre)-1] -> plaintext;
				
				$movie_poster = $main_section -> find("div[class=poster]")[0];
				$movie_poster = $movie_poster -> find("img")[0] -> src;
				
				
				$bottom_section = $section -> find("div[id=main_bottom]")[0];
				
				/*$reviews = $bottom_section -> find("div[id=titleUserReviewsTeaser]")[0];
				$reviews = $reviews -> find("span[itemprop=review]")[0];
				$reviews = $reviews -> find("p[itemprop=reviewBody]")[0];*/
				
				$title_details = $bottom_section -> find("div[id=titleDetails]")[0];
				$bottom_section = $bottom_section -> find("div[id=titleStoryLine]")[0];
				
				$movie_story = $bottom_section -> find("div[class=inline canwrap]")[0];
				$movie_story = $bottom_section -> find("p")[0];
				$movie_story = $movie_story -> find("span")[0];
				
				@$runtime = $title_details -> find("time")[0];
				
				if(!$runtime){
					$runtime = "Not yet declared";
				}
			}else{
				echo "Movie not found";
			}
		}
		else{ 
			echo "Invalid Movie name"; 
		}
		
		
		$q2 = $_POST["movie2"];
		$q2 = str_replace(" ","+",$q2);
		
		$url2 = "https://www.imdb.com/find?&q=".$q2."&s=all";
		
		$html2 = file_get_html($url2);
		
		if($html2){
			$link2 = $html2 -> find("div[class=findSection]")[0];
			if($link2){
				$link2 = $html2 -> find("table[class=findList]")[0];
				$link2 = $link2 -> find("tr[class=findResult]")[0];
				$link2 = $link2 -> find("td[class=result_text]")[0];
				$link2 = $link2 -> find("a")[0];
				$link2 = $link2 -> href;
			}else{
				echo "Movie not found";
			}
		}
		else{
			echo "Invalid Movie name"; 
		}
		
		
		$url2 = "https://www.imdb.com".$link2;
		
		$html2 = file_get_html($url2);
		
		if($html){
			$section2 = $html2 -> find("div[id=content-2-wide]")[0];
			
			$main_section2 = $section2 -> find("div[id=main_top]")[0];
			$main_section2 = $main_section2 -> find("div[id=title-overview-widget]")[0];
			
			$vital2 = $main_section2 -> find("div[class=vital]")[0];
			$title_block2 = $vital2 -> find("div[class=title_block]")[0];
			
			$movie_rating2 = $title_block2 -> find("div[class=ratingValue]")[0] -> plaintext;
			
			if(!$movie_rating2){
				$movie_rating2 = "Not yet rated";
			}
			
			$title_bar2 = $title_block2 -> find("div[class=title_wrapper]")[0];
			$title2 = $title_bar2 -> find("h1")[0] -> plaintext;
			
			$title_bar_subtext2 = $title_bar2 -> find("div[class=subtext]")[0];
				
			$genre2 = $title_bar_subtext2 -> find("a");
				
			@$release_date2 = $genre2[count($genre2)-1] -> plaintext;
			
			$movie_poster2 = $main_section2 -> find("div[class=poster]")[0];
			$movie_poster2 = $movie_poster2 -> find("img")[0] -> src;
			
			
			$bottom_section2 = $section2 -> find("div[id=main_bottom]")[0];
			
			/*$reviews2 = $bottom_section2 -> find("div[id=titleUserReviewsTeaser]")[0];
			$reviews2 = $reviews2 -> find("span[itemprop=review]")[0];
			$reviews2 = $reviews2 -> find("p[itemprop=reviewBody]")[0];*/
			
			$title_details2 = $bottom_section2 -> find("div[id=titleDetails]")[0];
			$bottom_section2 = $bottom_section2 -> find("div[id=titleStoryLine]")[0];
			
			$movie_story2 = $bottom_section2 -> find("div[class=inline canwrap]")[0];
			$movie_story2 = $bottom_section2 -> find("p")[0];
			$movie_story2 = $movie_story2 -> find("span")[0];
			
			$runtime2 = $title_details2 -> find("time")[0];
			
			if(!$runtime2){
				$runtime2 = "Not yet declared";
			}
		}
		else{
			echo "Invalid Movie name"; 
		}
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<?php if(isset($_POST["search"])){ ?>
			<title>Compare <?php echo $title ?> V/S <?php echo $title2 ?> </title>
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
				<input type="text" name="movie1" placeholder="Enter Movie Name" style="width:200px; height:30px; border-radius:5px; font-size:18px;">
				<input type="text" name="movie2" placeholder="Enter Movie Name" style="width:200px; height:30px; border-radius:5px; font-size:18px;">
				<input type="submit" style="width:100px; height:30px; border-radius:5px; background-color:rgb(224, 227, 229);" name="search">
			</form>
		</center>
		<?php if(isset($_POST["search"])){ ?>
			<center>
				<h1> <?php echo $title ?> V/S <?php echo $title2 ?> </h1>
				<img src=<?php echo $movie_poster ?> height="268" width="182" style="">
				<img src=<?php echo $movie_poster2 ?> height="268" width="182" style="">
			</center>
			<table border="1px" cellspacing="0px" bordercolor="black">
				<tr>
					<th></th>
					<th><h2><?php echo $title ?></h2></th>
					<th><h2><?php echo $title2 ?></h2></th>
				</tr>
				<tr>
					<td>
						<span style="color:red; font-weight:bold; font-size:25px;">Release Date<span>
					</td>
					<td>
						<span style="text-align:center; font-weight:bold;">
							<center>
								<?php echo $release_date ?>
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
					<td><span style="color:red; font-weight:bold; font-size:25px;">Rating<span></td>
					<td><strong><center><?php echo $movie_rating ?></center></strong></td>
					<td><strong><center><?php echo $movie_rating2 ?></center></strong></td>
				</tr>
				<tr>
					<td><span style="color:red; font-weight:bold; font-size:25px;">Genres</span></td>
					<td>
						<center>
							<span style="font-weight:bold;">
								<?php
									for($i=0; $i<count($genre)-1; $i++){
										echo ($genre[$i] -> plaintext)." | ";
									}
								?>
							</span>
						</center>
					</td>
					<td>
						<center>
							<span style="font-weight:bold;">
								<?php
									for($i=0; $i<count($genre2)-1; $i++){
										echo ($genre2[$i] -> plaintext)." | ";
									}
								?>
							</span>
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
								<?php echo $runtime; ?>
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
					<td><span style="color:red; font-weight:bold; font-size:25px;">Storyline</td>
					<td>
						<p style="float:right"><?php echo $movie_story ?></p>
					</td>
					<td>
						<p style="float:right"><?php echo $movie_story2 ?></p>
					</td>
				</tr>
				<!--<tr>
					<td><span style="color:red; font-weight:bold; font-size:25px;">Reviews</td>
					<td>
						<p></p>
					</td>
					<td>
						<p></p>
					</td>
				</tr>-->
			</table>
		<?php } ?>
	</body>
</html>