 
 <div class="mui-container container_total">
 	<div class='container_background'>  
 		
 		<img class='background_image'src='<?php echo $config['images']['base_url'] . $config['images']['backdrop_sizes'][3] . $movie->backdrop_path?>'/>
 		</div>
	 	<div class='wrapper_wrapper'>
		 	<div class='mui--pull-right wrapper_overlay'>
	 			<div class='background_overlay'></div>
				<div class='text_overlay'>
			 		<div class="mui--text-subhead "><?= $movie->release_date ?></div>
			 		<div class="mui--text-title title "><b><?= $title ?></b></div>
			 		<div class="mui--text-subhead "><b><?= $movie->vote_average ?></b>/10</div>
		 		</div>
		 	</div>
	 	</div>
 	</div>
 	
 	<div class='mui-container writing'>
 		
 		
 		
 		<div class="mui--container-fluid container_poster">  
 			<img class='poster_image'src='<?php echo $config['images']['base_url'] . $config['images']['poster_sizes'][2] . $movie->poster_path?>' />
 		</div>
 		<div class='mui-container-fluid important_info'>
 		
		
			
		 	<div class=' '> <b>Duration</b> :<?= $movie->runtime?> minutes</div>
		 	<div class=' '> <b>Genre(s)</b> : 
		 		<?php 
		 			$i = 1;
		 			foreach($movie->genres as $_genre):

		 				if($i == count($movie->genres)):
		 					echo $_genre->name;
		 				else:
		 					echo $_genre->name . ', ';
		 				endif;

		 				$i++;

		 			endforeach;
		 			?>
		 	</div>
		</div>
 		  
	
		<div class="mui--z2 container_synopsis">
			<div class="mui--text-subhead  subtitle"><strong>About the movie</strong></div>
			<div class="mui-divider"></div>
			<div class="mui--text-body1 synopsis"><?= $movie->overview ?></div>
			<div class="mui--text-subhead  subtitle"><strong>Movie Details</strong></div>
			<div class="mui-divider"></div>
			<div class="mui--text-body1 synopsis">
				<?php if($movie->revenue != 0) echo '<b>Revenue</b> : ' . $movie->revenue; ?>
				<br>
				<b>Production companies</b> : 
				<?php 
		 			$i = 1;
		 			foreach($movie->production_companies as $_company):

		 				if($i == count($movie->production_companies)):
		 					echo $_company->name . '.';
		 				else:
		 					echo $_company->name . ', ';
		 				endif;

		 				$i++;

		 			endforeach;
		 			?>
			</div>

			

		</div>
	</div>


 </div>