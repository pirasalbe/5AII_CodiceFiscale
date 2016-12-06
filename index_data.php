<?php
	$sesso = $_REQUEST['Sesso'];
	$comune = $_REQUEST['Comune'];

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
			
				<form action="index_codice.php" method="post">
				
    				<div class="container">
    					<div class="row">
    						<div class="jumbotron text-center"><h1>Calcolo Codice Fiscale</h1></p></div>
    					</div>
    					
    					<br>
    					
    					<div class="row">
    						<div class="col-sm-2" align="center"><input class="btn btn-default" align="center" type="submit" name="submitCF" value="Codice Fiscale"></div>
    						<div class="col-sm-2" align="center">Data</div>
						<div class="col-sm-2" align="center"><select class="form-control" name="Giorno" size="1">
								<option value="01">01</option>
								<option value="02">02</option>
								<option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								<option value="08">08</option>
								<option value="09">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select></div>
						<div class="col-sm-2" align="center"><select class="form-control" name="Mese" size="1">
								<option value="01">Gennaio</option>
								<option value="02">Febbraio</option>
								<option value="03">Marzo</option>
								<option value="04">Aprile</option>
								<option value="05">Maggio</option>
								<option value="06">Giugno</option>
								<option value="07">Luglio</option>
								<option value="08">Agosto</option>
								<option value="09">Settembre</option>
								<option value="10">Ottobre</option>
								<option value="11">Novembre</option>
								<option value="12">Dicembre</option>
							</select></div>
						<div class="col-sm-4" align="center"><input class="form-control" type="text" name="Anno" value="1990"></div>
    					</div>
    				</div>				
				</form>
            </div>
	</body>
</html>