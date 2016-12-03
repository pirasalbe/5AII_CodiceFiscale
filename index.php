	<html>

	<head>
            <title>
                Calcolo Codice Fiscale
            </title>
            <script>
            
                //obtain CF
                function getCF() {
                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("codiceFiscaleCalcolato").innerHTML = this.responseText;
                    }
                  };
                  xhttp.open("POST", "back.php", true);
                  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                  xhttp.send("Cognome=" + document.getElementsByName("Cognome")[0].value + "&Nome=" + document.getElementsByName("Nome")[0].value + "&Sesso=" + document.getElementsByName("Sesso")[0].value + "&Anno=" + document.getElementsByName("Anno")[0].value + "&Mese=" + document.getElementsByName("Mese")[0].value + "&Giorno=" + document.getElementsByName("Giorno")[0].value + "&Comune=" + document.getElementsByName("Comune")[0].value);
                }
                  

                var use = 0;
                //load xml                  
                function loadDoc() {
                    if(use==0){
                        use++;
                      var xhttp = new XMLHttpRequest();
                      xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                          document.getElementById("Comune").innerHTML = this.responseText;
                        }
                      };
                      xhttp.open("GET", "readCSV.php", true);
                      xhttp.send();
                    }
                }
            </script>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	</head>

	<body onclick="loadDoc()">
            <div class="table-responsive"> 
				
				<div class="container">
					<div class="row">
						<div class="jumbotron text-center"><h1>Calcolo Codice Fiscale</h1></div>
					</div>
					
					<div class="row">
						<div class="col-sm-2" align="center"><button class="btn btn-default" align="center" onclick="getCF()">Codice Fiscale</button></div>
						<div class="col-sm-10" align="center"><h4 id="codiceFiscaleCalcolato"></h4></div>
					</div>
					
					<br>
					
					<div class="row">
						<div class="col-sm-2" align="center">Cognome</div>
						<div class="col-sm-10" align="center"><input class="form-control" type="text" name="Cognome" placeholder="Rossi"></div>
					</div>
					
					<br>
					
					<div class="row">
						<div class="col-sm-2" align="center">Nome</div>
						<div class="col-sm-4" align="center"><input class="form-control" type="text" name="Nome" placeholder="Mario"></div>
						<div class="col-sm-2" align="center">Sesso</div>
						<div class="col-sm-4" align="center"><select class="form-control" name="Sesso" size="1">
								<option value="01">Maschio</option>
								<option value="02">Femmina</option>
							</select></div>
					</div>
					
					<br>
					
					<div class="row">
						<div class="col-sm-2" align="center">Comune di nascita</div>
						<div class="col-sm-10" align="center">
							<select class="form-control" id="Comune" name="Comune" size="1">
							 //ajax(?)
							</select>
						</div>
					</div>
					
					<br>
					
					<div class="row">
						<div class="col-sm-2" align="center">Data</div>
						<div class="col-sm-3" align="center"><select class="form-control" name="Giorno" size="1">
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
						<div class="col-sm-3" align="center"><select class="form-control" name="Mese" size="1">
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
					
					<br>
					
					<div class="row">
						<div class="col-sm-12"><h2>Non utilizzare caratteri accentati</h2></p></div>
					</div>
				</div>	
			
            </div>
	</body>
</html>