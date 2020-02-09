<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // collect value of input field
    $url = $_GET['url'];
//echo $url;


$servername = "localhost";
$username = "";
$password = "";
$dbname = "sfmega_url";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = 'SELECT * FROM `SkroconeLinki` WHERE `Skrocony` = '.$url.' ';

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	 while($row = mysqli_fetch_assoc($result)) {
		 
		 
		$sql = 'UPDATE `SkroconeLinki` SET `LicznikOdwiedzin` = `LicznikOdwiedzin` + "1", `LastUse` = NOW() WHERE `Skrocony` = '.$url.' ';
		if (mysqli_query($conn, $sql)) {
		}
		 
        $CompleteURL = $row["URL"];
		header("Location: $CompleteURL");
    }

} 

}
?>



<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Narzędzie do skracania linków</title>
<meta name="description" content="ShortURL is a url shortener to reduce a long link. Use our tool to shorten links and then share them, in addition you can monitor traffic statistics.">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
body {
	margin: 0;
	background: #f9f9f9;
	font: 14px arial, tahoma
	margin-bottom: 200px
}
</style>

<link rel="shortcut icon" href="ico.png">
<meta property="og:title" content="ScrMe.ga - Narzędzie do skracania linków">
<meta property="og:url" content="http://scrme.ga/">
<meta property="og:type" content="website">
<meta property="og:image" content="ico.png">

</head>
<body>

<header>  
  <div id="logo"><a href="http://scrme.ga/" class="logo">Narzędzie do skracania URL</a></div>
</header>




<main>
  <section id="urlbox">
    <h1>Skracanie długich linków i adresów URL</h1>
    <form action="result.php" method="post">
      <div id="formurl">
      <input type="text" autocomplete="on" name="url" placeholder="Wklej długi link i skróć go" pattern="http.?://.*" size="30" required>
        <div id="buttonInput">
          <input type="submit" value="skróć link">
        </div>
      </div>
    </form>    
 </section>
	

	  
  <div id="opis">

    <h2>Projekt Inżynieria Oprogramowania</h2>
    
	<p>Celem projektu jest zaprojektowanie i napisanie strony internetowej na której zostanie zaimplementowane narzędzie do skracania linków. Na stronie linki które posiadają kilkadziesiąt lub kilkaset znaków mogą zostać skrócone do nazwy domeny i kilku dodatkowych znaków będących unikalnym identyfikatorem, po którego wpisaniu w okno przeglądarki, natychmiast zostaniemy przeniesieni na stronę docelową. Każde “przejście” przez skrócony link zostanie odnotowane przez licznik, zostanie również zapisana data ostatniego przekierowania. 
</p>
	
  </div>
	

	
</main>
	
<footer>


  <ul>
    <li><a href="http://scrme.ga/">Strona Główna</a></li>

    <li><a href="omnie.php">O projekcie</a></li>

    <li><a href="licznik.php">Licznik</a></li>
  </ul>

</footer>
	
	
</body>
</html>