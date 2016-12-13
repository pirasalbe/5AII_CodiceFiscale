<?php

    $codiceFiscale;

	$property['yy'] = $_REQUEST['Anno'];
	$property['mm'] = $_REQUEST['Mese'];
	$property['dd'] = $_REQUEST['Giorno'];
	
	
	$property['cogn'] = $_SESSION["cognome"];
	$property['nam'] = $_SESSION["nome"];
	$property['mf'] = $_SESSION["sesso"];
	$property['cm'] = $_SESSION["comune"];
	
	session_destroy();
    $_SESSION = array();
		
	$codiceFiscale = new CodiceFiscale($property);
	
	class CodiceFiscale
	{
		var $cogn, $nam, $yy, $mm, $dd, $mf, $cm;
		public $codice;
		
	    function __construct($property)
		{
			$this->cogn=$property['cogn'];
			$this->nam=$property['nam'];
			$this->yy=$property['yy'];
			$this->mm=$property['mm'];
			$this->dd=$property['dd'];
			$this->mf=$property['mf'];
			$this->cm=$property['cm'];
			
			$this->codice = $this->codiceFiscale($this->cogn, $this->nam, $this->yy, $this->mm, $this->dd, $this->mf, $this->cm);
		}
		
		//Funzioni codice fiscale
		function codiceFiscale($cogn, $nam, $yy, $mm, $dd, $mf, $cm)
		{
			//Calcolo dei singoli parametri
			$cfCognome=$this->firma(strtolower($cogn), 3);
			$cfNome=$this->firma(strtolower($nam), 4);
			$cfAnno=$this->anno(strtolower($yy));
			$cfMese=$this->mese(strtolower($mm));
			$cfGiorno=$this->giorno(strtolower($dd), strtolower($mf));
			$cfComune=$this->comune(strtolower($cm));
			
			//Calcolo del codice di controllo
			$controln=$cfCognome . $cfNome . $cfAnno . $cfMese . $cfGiorno . $cfComune;
			$control=strtolower($controln);
			
			//Formazione stringa Codice Fiscale
			$codice=$controln . $this->controllo($control);
			
			//Ultimazione della stringa
			return strtoupper($codice);
		}
		
		//verifica vocali
		function vocale($voc)
		{
			if (($voc=="a")||($voc=="e")||($voc=="i")||($voc=="o")||($voc=="u"))
				return true;
			return false;
		}
		
		function firma($cogn, $dato)
		{
			//Declaration
			$length=strlen($cogn);
			$i=0;
			$k=0;
			$cgm="";
			
			//Calculation
			while (($i<$dato)&&($i<$length))
			{
				if ($k<$length)
				{
					if (!$this->vocale($cogn[$k])&&($cogn[$k]!=" "))
					{
						$cgm=$cgm . $cogn[$k];
						$i++;
					}
				}
				else
					if ($k>$length)
					{
						$k=0;
						while (($i<$dato)&&($i<$length))
						{
							if ($this->vocale($cogn[$k])&&($cogn[$k]!=" "))
							{
								$cgm=$cgm . $cogn[$k];
								$i++;
							}
						$k++;
						}
					}
				$k++;
			}
			
			//First name too little
			if (strlen($cgm)<$dato)
			{
				while (strlen($cgm)<$dato)
				{
					$cgm=$cgm . "X";
				}
			}
			if ($dato==4)
			{
				//Scelta caratteri da stringa di 4 lettere
				$nm=$cgm;
				$nme;
				if ((!$this->vocale($nm[3])==true)&&($nm[3]!="X"))
				{
					$nme=$nm[0] . $nm[2] . $nm[3];
				}
				else 
				{
					$nme=$nm[0] . $nm[1] . $nm[2];
				}
				return $nme;
			}
			else
				return $cgm;
		}
		
		//formato anno a 4 caratteri: yyyy
		function anno($yy)
		{
			$year=$yy;
			if (strlen($yy)==4)
				$year=substr($yy, 2, 2);
			return $year;
		}
		
		//formato mese a 2 caratteri: mm
		function mese($mm)
		{
			$char;
			switch($mm)
			{
				case 1:
				   $char = "A";
				   break;
				case 2:
				   $char = "B";
				   break;
				case 3:
				   $char = "C";
				   break;
				case 4:
				   $char = "D";
				   break;
				case 5:
				   $char = "E";
				   break;
				case 6:
				   $char = "H";
				   break;
				case 7:
				   $char = "L";
				   break;
				case 8:
				   $char = "M";
				   break;
				case 9:
				   $char = "P";
				   break;
				case 10:
				   $char = "R";
				   break;
				case 11:
				   $char = "S";
				   break;
				case 12:
				   $char = "T";
				   break;
			}
			
			return $char;
		}
		
		//formato giorno a 2 caratteri: dd
		//sesso maschio=01
		//sesso femmina=02
		function giorno($dd, $mf)
		{
			if ($mf==02)
				$dd+=40;
			
			return $dd;
		}
		
		//Utilizzando select opportunamente costruito
		function comune($cm)
		{
			return $cm;
		}
		
		function controllo($control)
		{
			//Declaration
			$pari="";
			$dispari="";
			$np=0;
			$nd=0;
			$i=0;
			$k=0;
			$divisione;
			$diviso;
			
			//Definizione dei caratteri pari e dispari
			$pari=$control[1] . $control[3] . $control[5] . $control[7] . $control[9] . $control[11] . $control[13];
			$dispari=$control[0] . $control[2] . $control[4] . $control[6] . $control[8] . $control[10] . $control[12] . $control[14];
			
			//Assegnazione valori e somma dei caratteri in posizione pari
			while ($i<strlen($pari))
			{
				switch(strtoupper($pari[$k]))
				{
					case '0':
						$np+=0;
						break;
					case '1':
						$np+=1;
						break;
					case '2':
						$np+=2;
						break;
					case '3':
						$np+=3;
						break;
					case '4':
						$np+=4;
						break;
					case '5':
						$np+=5;
						break;
					case '6':
						$np+=6;
						break;
					case '7':
						$np+=7;
						break;
					case '8':
						$np+=8;
						break;
					case '9':
						$np+=9;
						break;
					case 'A':
						$np+=0;
						break;
					case 'B':
						$np+=1;
						break;
					case 'C':
						$np+=2;
						break;
					case 'D':
						$np+=3;
						break;
					case 'E':
						$np+=4;
						break;
					case 'F':
						$np+=5;
						break;
					case 'G':
						$np+=6;
						break;
					case 'H':
						$np+=7;
						break;
					case 'I':
						$np+=8;
						break;
					case 'J':
						$np+=9;
						break;
					case 'K':
						$np+=10;
						break;
					case 'L':
						$np+=11;
						break;
					case 'M':
						$np+=12;
						break;
					case 'N':
						$np+=13;
						break;
					case 'O':
						$np+=14;
						break;
					case 'P':
						$np+=15;
						break;
					case 'Q':
						$np+=16;
						break;
					case 'R':
						$np+=17;
						break;
					case 'S':
						$np+=18;
						break;
					case 'T':
						$np+=19;
						break;
					case 'U':
						$np+=20;
						break;
					case 'V':
						$np+=21;
						break;
					case 'W':
						$np+=22;
						break;
					case 'X':
						$np+=23;
						break;
					case 'Y':
						$np+=24;
						break;
					case 'Z':
						$np+=25;
						break;
				}
				$i++;
				$k++;
			}
			$i=0;
			$k=0;
			
			//Assegnazione valori e somma dei caratteri in posizione dispari
			while ($i<strlen($dispari))
			{
				switch(strtoupper($dispari[$k]))
				{
					case '0':
						$nd+=1;
						break;
					case '1':
						$nd+=0;
						break;
					case '2':
						$nd+=5;
						break;
					case '3':
						$nd+=7;
						break;
					case '4':
						$nd+=9;
						break;
					case '5':
						$nd+=13;
						break;
					case '6':
						$nd+=15;
						break;
					case '7':
						$nd+=17;
						break;
					case '8':
						$nd+=19;
						break;
					case '9':
						$nd+=21;
						break;
					case 'A':
						$nd+=1;
						break;
					case 'B':
						$nd+=0;
						break;
					case 'C':
						$nd+=5;
						break;
					case 'D':
						$nd+=7;
						break;
					case 'E':
						$nd+=9;
						break;
					case 'F':
						$nd+=13;
						break;
					case 'G':
						$nd+=15;
						break;
					case 'H':
						$nd+=17;
						break;
					case 'I':
						$nd+=19;
						break;
					case 'J':
						$nd+=21;
						break;
					case 'K':
						$nd+=2;
						break;
					case 'L':
						$nd+=4;
						break;
					case 'M':
						$nd+=18;
						break;
					case 'N':
						$nd+=20;
						break;
					case 'O':
						$nd+=11;
						break;
					case 'P':
						$nd+=3;
						break;
					case 'Q':
						$nd+=6;
						break;
					case 'R':
						$nd+=8;
						break;
					case 'S':
						$nd+=12;
						break;
					case 'T':
						$nd+=14;
						break;
					case 'U':
						$nd+=16;
						break;
					case 'V':
						$nd+=10;
						break;
					case 'W':
						$nd+=22;
						break;
					case 'X':
						$nd+=25;
						break;
					case 'Y':
						$nd+=24;
						break;
					case 'Z':
						$nd+=23;
						break;
				}						
				$i++;
				$k++;
			}
			
			//Calcolo del resto
			$diviso=($np+$nd)%26;
			
			//Assegnazione del carattere in base al resto
			switch($diviso)
			{
				case 0:
					return 'A';
					break;
				case 1:
					return 'B';
					break;
				case 2:
					return 'C';
					break;
				case 3:
					return 'D';
					break;
				case 4:
					return 'E';
					break;
				case 5:
					return 'F';
					break;
				case 6:
					return 'G';
					break;
				case 7:
					return 'H';
					break;
				case 8:
					return 'I';
					break;
				case 9:
					return 'J';
					break;
				case 10:
					return 'K';
					break;
				case 11:
					return 'L';
					break;
				case 12:
					return 'M';
					break;
				case 13:
					return 'N';
					break;
				case 14:
					return 'O';
					break;
				case 15:
					return 'P';
					break;
				case 16:
					return 'Q';
					break;
				case 17:
					return 'R';
					break;
				case 18:
					return 'S';
					break;
				case 19:
					return 'T';
					break;
				case 20:
					return 'U';
					break;
				case 21:
					return 'V';
					break;
				case 22:
					return 'W';
					break;
				case 23:
					return 'X';
					break;
				case 24:
					return 'Y';
					break;
				case 25:
					return 'Z';
					break;
			}
		}
	}

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
			
				<form action="index.php" method="post">
    				<div class="container">
    				    <div class="row">
    						<div class="jumbotron text-center"><h1>Calcolo Codice Fiscale</h1></p></div>
    					</div>
    					
    					<br>
    					
    					<div class="row">
    						<div class="col-sm-2" align="center"><input class="btn btn-default" align="center" type="submit" name="submitCF" value="Restart"></div>
    						<div class="col-sm-10" align="center"><h4><?php echo $codiceFiscale->codice; ?></h4></div>
    					</div>
    				</div>				
				</form>
            </div>
	</body>
</html>