<?php
    $cognome = $_REQUEST['Cognome'];
	$nome = $_REQUEST['Nome'];
	
	setcookie("cognome", $cognome, time() + 86400, "/"); 
	setcookie("nome", $nome, time() + 86400, "/"); 
?>

<html>
	<head>
            <title>
                Calcolo Codice Fiscale
            </title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>

	<body>
            <div class="table-responsive"> <!-- class="img-responsive img-rounded" style="background-image: url(http://www.codicefiscaleonline.com/img/cf.png); background-repeat:no-repeat; background-position: left" -->
			
				<form action="index_data.php" method="post">
				
    				<div class="container">
    					<div class="row">
    						<div class="jumbotron text-center"><h1>Calcolo Codice Fiscale</h1></p></div>
    					</div>
    					
    					<br>
    					
    					<div class="row">
    						<div class="col-sm-2" align="center"><input class="btn btn-default" align="center" type="submit" name="submitCF" value="Next"></div>
    						<div class="col-sm-2" align="center">Sesso</div>
    						<div class="col-sm-3" align="center"><select class="form-control" name="Sesso" size="1">
    								<option value="01">Maschio</option>
    								<option value="02">Femmina</option>
    							</select></div>
    						<div class="col-sm-2" align="center">Comune di nascita</div>
    						<div class="col-sm-3" align="center">
    							<select class="form-control" name="Comune" size="1">
    								<?php
    									$myfile = fopen("comuni.csv", "r") or die ("unable to open file!");
    									while(!feof($myfile))
    									{
    										$linea = fgets($myfile);
    										if(!feof($myfile))
    										{
    											$array = explode(",", $linea);
    											$com = trim($array[1]);
    											echo "<option value=" . $array[0] . ">". $com . "</option>";
    										}
    									}
    								?>
    							</select>
    						</div>
    					</div>
    				</div>				
				</form>
            </div>
	</body>
</html>