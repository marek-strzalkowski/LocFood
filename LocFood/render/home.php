<?php

echo'<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />		
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="theme-color" content="#000000" />
		<meta
		  name="description"
		  content="Web site created using create-react-app"
		/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<title>LocFood</title>
					
	</head>
	<body>
	
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
           
            <div class="container-fluid">
            
			
			<svg style="width:40px; height:40px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="hamburger" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-hamburger fa-w-16 fa-fw fa-2x"><path fill="white" d="M464 256H48a48 48 0 0 0 0 96h416a48 48 0 0 0 0-96zm16 128H32a16 16 0 0 0-16 16v16a64 64 0 0 0 64 64h352a64 64 0 0 0 64-64v-16a16 16 0 0 0-16-16zM58.64 224h394.72c34.57 0 54.62-43.9 34.82-75.88C448 83.2 359.55 32.1 256 32c-103.54.1-192 51.2-232.18 116.11C4 180.09 24.07 224 58.64 224zM384 112a16 16 0 1 1-16 16 16 16 0 0 1 16-16zM256 80a16 16 0 1 1-16 16 16 16 0 0 1 16-16zm-128 32a16 16 0 1 1-16 16 16 16 0 0 1 16-16z" class=""></path></svg>
			<a class="navbar-brand py-1 px-3" href="index.php" style="font-size:1.5rem"><b>LocFood</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>               
                </ul>                
            </div>
            </div>
            
        </nav>
	
		<div class="container">		  
		
			<h1 class="mb-4 text-secondary" style="font-weight:bold">LocFood</h1>
				
				<form action="" method="get" class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search local food..." aria-label="Search" name="search" value="'.$_GET['search'].'">
					<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
				</form>';
				
				if(empty($_GET['search'])){				
					echo'<h2 class="mt-4 mb-0 text-primary">Search for food locally</h2>
					<p class="text-secondary"><small>Type address, city or place you are around</small></p>';
				}
				elseif(!empty($places)){
					echo'<h2 class="mt-4 mb-0 text-primary">'.$array['results'][0]['formatted_address'].'</h2>
					<div class="row">';
					foreach ($places['results'] as $key => $item) {
						preg_match('/"([^"]+)"/',$item['photos'][0]['html_attributions'][0],$link);
						echo'<div class="col">
							<a href="'.$link[1].'" class="text-dark" target="_blank">
							<div class="card mt-4 mb-4" style="width: 18rem;">
								<img class="card-img-top" src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference='.$item['photos'][0]['photo_reference'].'&sensor=false&key='.$google_key.'">
								<div class="card-body">
									<h5 class="card-title">'.$item['name'].'</h5>
									<p class="card-text">'.$item['vicinity'].'</p>
									<button class="btn btn-sm btn-primary">Rate: '.$item['rating'].'</button>
								</div>
							</div>
							</a>
						</div>';		
					}
					echo'</div>';
				}
				else{
					echo'<h2 class="mt-4 mb-0 text-primary">Search for food locally</h2>
					<h4 class="text-danger my-2">No results found</h4>
					<p class="text-secondary"><small>Type address, city or place you are around</small></p>';
				}
				
		echo'</div>
	
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	</body>
</html>';

?>