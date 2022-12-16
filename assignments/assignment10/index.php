
<?php

require_once('pages/routes.php');

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Final Project</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<style>
	        ul {
                list-style-type: none;
                    margin: 10px;
                    padding: 0;
                    overflow: hidden;
                }

            li {
                float: left;
                }

            li a {
                display: block;
                padding: 10px;
                background-color: #ffffff;
                }
        </style>
	</head>

	<body class="container">
		<?php
			
			echo $nav;

			echo $result[0]; 

			echo $result[1]; 
		?>
	</body>
</html>