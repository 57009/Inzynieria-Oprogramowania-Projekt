<?php
   function generateRandomString($length = 1)
   {
       //return substr(str_shuffle(str_repeat($x='12345', ceil($length/strlen($x)) )),1,$length); // Ograniczony zestaw znaków
       return substr(str_shuffle(str_repeat($x = '_-+0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
   }
   
   //Sprzwdzanie czy link jest poprawny, jeśli nie - użytkownik przeniesiony na stronę główną.
   if (filter_var($_POST['url'], FILTER_VALIDATE_URL) === FALSE) {
       header("Location: /index.php");
   }
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       // collect value of input field
       $url = $_POST['url'];
       if (empty($url)) {
           //URL is empty
           header("Location: /index.php");
       } else {
           //echo $url;
           $_POST['url'] = 0;
       }
   }
   
   $servername = "localhost";
   $username   = "";
   $password   = "";
   $dbname     = "sfmega_url";
   
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
   
   
   
   $x = 1;
   while ($x <= 5) {
       $randStr = generateRandomString($x);
       
       $sql    = 'SELECT * FROM `SkroconeLinki` WHERE `Skrocony` = ' . $randStr . ' ';
       $result = mysqli_query($conn, $sql);
       
       if (mysqli_num_rows($result) > 0) {
           //jeśli są wyniki to skip, szukanie innego losowego Stringu
       } else {
           //jeśli w bazie nie ma takiego to można dodać.
           $sql = "INSERT INTO `SkroconeLinki` (`Id`, `LicznikOdwiedzin`, `Skrocony`, `URL`) VALUES (NULL, '0', '$randStr', '$url');";
           
           if (mysqli_query($conn, $sql)) {
               //echo "Nowy wpis poprawnie dodano";
           } else {
               die("INSERT Failed");
           }
           
           break;
       }
       
       $x++;
   }
   
   mysqli_close($conn);
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
         #formurl {
         display: table;
         max-width: 400px;
         margin: 0 auto
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
         <div id="logo"><a href="http://scrme.ga" class="logo">Narzędzie do skracania URL</a></div>
      </header>
      <main>
         <section id="urlbox">
            <h1>Twój link został skrócony i wygląda następująco:</h1>
            <div id="formurl">
               <input type="text" name="url" value="http://scrme.ga/<?php
                  echo "s" . $randStr;
                  ?>" id="myInput">
               <div id="buttonInput">
                  <input onclick="myFunction()" type="submit" value="kopiuj do schowka">
               </div>
            </div>
            <script>
               function myFunction() {
                 var copyText = document.getElementById("myInput");
                 copyText.select();
                 copyText.setSelectionRange(0, 99999)
                 document.execCommand("copy");
                 alert("Copied the text to clipboard: " + copyText.value);
               }
            </script>
         </section>
         <div id="opis">
            <h2>Projekt Inżynieria Oprogramowania</h2>
            <p>Celem projektu jest zaprojektowanie i napisanie strony internetowej na której zostanie zaimplementowane narzędzie do skracania linków. Na stronie linki które posiadają kilkadziesiąt lub kilkaset znaków mogą zostać skrócone do nazwy domeny i kilku dodatkowych znaków będących unikalnym identyfikatorem, po którego wpisaniu w okno przeglądarki, natychmiast zostaniemy przeniesieni na stronę docelową. Każde “przejście” przez skrócony link zostanie odnotowane przez licznik, zostanie również zapisana data ostatniego przekierowania. </p>
         </div>
      </main>
      <footer>
         <ul>
            <li><a href="http://scrme.ga/">Strona Główna</a></li>
            <li><a href="omnie">O projekcie</a></li>
            <li><a href="licznik">Licznik</a></li>
         </ul>
      </footer>
   </body>
</html>