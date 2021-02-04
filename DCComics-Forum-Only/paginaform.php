<html>	
	<head>
		<meta name="author" value="João Ameixa"/>
		<meta name ="date" value="Janeiro de 2021"/>
		<meta name ="contact" value="joaomfameixa@gmail.com"/>
		<meta charset="utf-8"/>
		<title>Pagina Inicial</title>
		<link rel="shortcut icon" href="dclogo.png" type="image/x-png"/>
	</head>
	<body>
		<div class="content2">

		<form action=paginaform.php method="POST">
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <a class="navbar-brand">Formulário</a>
				</div>
			  </div>
			</nav>
			
			<h1 align=center>Formulário</h1>

			<div class="box" align=center>

			<table align=center height=200 width=445>
			
				<tr>
					<td>
						Digite o seu Nome:
					</td>
					<td colspan=3>
						<input type=text name=nome></input>
					</td>
				</tr>
				<tr>
					<td>
						Digite o seu Username:
					</td>
					<td colspan=3>
						<input type=text name=username></input>
					</td>
				</tr>
				<tr>
					<td>
						Digite o seu E-Mail:
					</td>
					<td colspan=3>
						<input type=text name=email></input>
					</td>
				</tr>
				<tr>
					<td>
						Digite a sua palavra passe:
					</td>
					<td colspan=3>
						<input type=password name=pass1></input>
					</td>
				</tr>
				<tr>
					<td>
						Confirme a sua palavra passe:
					</td>
					<td colspan=3>
						<input type=password name=pass2></input>
					</td>
				</tr>
				<tr>
					<td>Data de Nascimento</td>
					<td>
						<select name=dia>
						<option value=''>Dia</option>
						<option value=1>1</option>
						<option value=2>2</option>
						<option value=3>3</option>
						<option value=4>4</option>
						<option value=5>5</option>
						<option value=6>6</option>
						<option value=7>7</option>
						<option value=8>8</option>
						<option value=9>9</option>
						<option value=10>10</option>
						<option value=11>11</option>
						<option value=12>12</option>
						<option value=13>13</option>
						<option value=14>14</option>
						<option value=15>15</option>
						<option value=16>16</option>
						<option value=17>17</option>
						<option value=18>18</option>
						<option value=19>19</option>
						<option value=20>20</option>
						<option value=21>21</option>
						<option value=22>22</option>
						<option value=23>23</option>
						<option value=24>24</option>
						<option value=25>25</option>
						<option value=26>26</option>
						<option value=27>27</option>
						<option value=28>28</option>
						<option value=29>29</option>
						<option value=30>30</option>
						<option value=31>31</option>
						</select>
					</td>

					<td>
						<select name=mes>
						<option value=''>Mês</option>
						<option value=1>Janeiro</option>
						<option value=2>Fevereiro</option>
						<option value=3>Março</option>
						<option value=4>Abril</option>
						<option value=5>Maio</option>
						<option value=6>Junho</option>
						<option value=7>Julho</option>
						<option value=8>Agosto</option>
						<option value=9>Setembro</option>
						<option value=10>Outubro</option>
						<option value=11>Novembro</option>
						<option value=12>Dezembro</option>
						</select>
					</td>

					<td>
						<select name=ano>
							<option value=''>Ano</option>
							<option value=2017>2017</option>
							<option value=2016>2016</option>
							<option value=2015>2015</option>
							<option value=2014>2014</option>
							<option value=2013>2013</option>
							<option value=2012>2012</option>
							<option value=2011>2011</option>
							<option value=2010>2010</option>
							<option value=2009>2009</option>
							<option value=2008>2008</option>
							<option value=2007>2007</option>
							<option value=2006>2006</option>
							<option value=2005>2005</option>
							<option value=2004>2004</option>
							<option value=2003>2003</option>
							<option value=2002>2002</option>
							<option value=2001>2001</option>
							<option value=2000>2000</option>
							<option value=1999>1999</option>
							<option value=1998>1998</option>
							<option value=1997>1997</option>
							<option value=1996>1996</option>
							<option value=1995>1995</option>
							<option value=1994>1994</option>
							<option value=1993>1993</option>
							<option value=1992>1992</option>
							<option value=1991>1991</option>
							<option value=1990>1990</option>
							<option value=1989>1989</option>
							<option value=1988>1988</option>
							<option value=1987>1987</option>
							<option value=1986>1986</option>
							<option value=1985>1985</option>
							<option value=1984>1984</option>
							<option value=1983>1983</option>
							<option value=1982>1982</option>
							<option value=1981>1981</option>
							<option value=1980>1980</option>
							<option value=1979>1979</option>
							<option value=1978>1978</option>
							<option value=1977>1977</option>
							<option value=1976>1976</option>
							<option value=1975>1975</option>
							<option value=1974>1974</option>
							<option value=1973>1973</option>
							<option value=1972>1972</option>
							<option value=1971>1971</option>
							<option value=1970>1970</option>
							<option value=1969>1969</option>
							<option value=1968>1968</option>
							<option value=1967>1967</option>
							<option value=1966>1966</option>
							<option value=1965>1965</option>
							<option value=1964>1964</option>
							<option value=1963>1963</option>
							<option value=1962>1962</option>
							<option value=1961>1961</option>
							<option value=1960>1960</option>
							<option value=1959>1959</option>
							<option value=1958>1958</option>
							<option value=1957>1957</option>
							<option value=1956>1956</option>
							<option value=1955>1955</option>
							<option value=1954>1954</option>
							<option value=1953>1953</option>
							<option value=1952>1952</option>
							<option value=1951>1951</option>
							<option value=1950>1950</option>
						</select>
					</td>
				<tr>
					<td>
						Sexo
					</td>
					<td colspan=2>
						<input type=radio name=gender value="masculino" checked="">Masculino</input>
						<input type=radio name=gender value="feminino">Feminino</input>
					</td>
				</tr>
			</table>
						
			</div>

			<p align=center>
				<input type=SUBMIT value='continuar' size=width:20px;height:15/>
			</p>
		</form>
		
		<?php error_reporting (0);

$nome = $email = $password = $dia = $mes = $ano = $sexo = "";
$erros=0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$sexo = $_POST['gender'];
 
	$errors = array();
	//Validações

	if (empty($_POST["nome"])) {
		$errors[] = "O nome é necessário";
		$erros=$erros+1;
	} else {
		$nome = $_POST["nome"];
	}

	if (empty($_POST["username"])) {
		$errors[] = "O username é necessário";
		$erros=$erros+1;
	} else {
		$username = $_POST["username"];
	}
	
	if (empty($_POST["email"])) {
		$errors[] = "O email é necessário";
		$erros=$erros+1;
	} elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$errors[] = "O email ".$_POST['email']." é invalido";
		$erros=$erros+1;
	} else {
		$email = $_POST["email"];
	}

	if (!empty($_POST["pass1"]) && !empty($_POST["pass2"]) && $_POST["pass1"] === $_POST["pass2"]) {
		$password = $_POST["pass1"];
	} else {
		$errors[] = "As passwords não são iguais ou não foram inseridas";
		$erros=$erros+1;
	}

	if (empty($_POST["dia"]) || empty($_POST["mes"]) || empty($_POST["ano"])) {
		$errors[] = "A data não foi selecionada correctamente";
		$erros=$erros+1;
	} else {
		$dia = $_POST["dia"];
		$mes = $_POST["mes"];
		$ano = $_POST["ano"];
	}
	//Início da verificação se utilizador já registado
	if($erros>0){
			echo"<h4 align=center>Erro ao registar o utilizador!</h4><br><br><br>";
		}
		else{
	If ($num_registos==0){
		$sql_insert_user="Insert into gamerland.utilizador (nome, username, email, password, data_nascimento, sexo) values('$nome','$username','$email','$pass1','".$ano."-".$mes."-".$dia."','$sexo')";
		
		$resultado_insere_user=mysql_query($sql_insere_user,$liga);
		echo"<h4 align=center>Utilizador registado com sucesso! </h4><br><br><br>";
		}	
	}
}
?>
					
			<?php
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			?>
			<div class="boxB">
			<?php
					if (count($errors) > 0) {
						echo "Foram encontrados erros:<br/>";
						foreach($errors as $item) {
							echo $item."<br/>";
						}
					} //else {
						//file_put_contents('registos.txt', $nome.'<>'.$username.'<>'.$email.'<>'.$password.'<>'.$sexo.'<>'.$dia.'/'.$mes.'/'.$ano.PHP_EOL, FILE_APPEND);
					//}
					echo "<br>Nome: $nome <br>";
					echo "Username: $username <br>";
					echo "E-Mail: $email <br>";
					echo "Password: $password <br>";
					echo "Data de Nascimento: $dia - $mes - $ano <br>";
					echo "Sexo: $sexo";
			?>
			</div>

			<?php
				}
				$sql="Select * from site.utilizador";
			?>
			<br>
			</div>
	</body>
</html>