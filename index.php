<?php

require('_classes/database.php');
require('assets/head.php');

?>


<style>
/* Google Fonts */
@import url(https://fonts.googleapis.com/css?family=Open+Sans);

/* set global font to Open Sans */
body {
  font-family: 'Open Sans', 'sans-serif';
  background-image: url(http://benague.ca/files/pw_pattern.png);
}

/* header */
h1 {
  color: #55acee;
  text-align: center;
}

/* header/copyright link */
.link {
  text-decoration: none;
  color: #55acee;
  border-bottom: 2px dotted #55acee;
  transition: .3s;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -o-transition: .3s;
  cursor: url(http://cur.cursors-4u.net/symbols/sym-1/sym46.cur), auto;
}

.link:hover {
  color: #2ecc71;
  border-bottom: 2px dotted #2ecc71;
}

/* button div */
#buttons {
  padding-top: 50px;
  text-align: center;
}

/* start da css for da buttons */
.btn {
  border-radius: 5px;
  padding: 15px 40px;
  font-size: 22px;
  text-decoration: none;
  margin: 20px;
  color: #fff;
  position: relative;
  display: inline-block;
}

.btn:active {
  transform: translate(0px, 5px);
  -webkit-transform: translate(0px, 5px);
  box-shadow: 0px 1px 0px 0px;
}

.blue {
  background-color: #55acee;
  box-shadow: 0px 5px 0px 0px #3C93D5;
}

.blue:hover {
  background-color: #6FC6FF;
}

.green {
  background-color: #2ecc71;
  box-shadow: 0px 5px 0px 0px #15B358;
}

.green:hover {
  background-color: #48E68B;
}

.red {
  background-color: #e74c3c;
  box-shadow: 0px 5px 0px 0px #CE3323;
}

.red:hover {
  background-color: #FF6656;
}

.purple {
  background-color: #9b59b6;
  box-shadow: 0px 5px 0px 0px #82409D;
}

.purple:hover {
  background-color: #B573D0;
}

.orange {
  background-color: #e67e22;
  box-shadow: 0px 5px 0px 0px #CD6509;
}

.orange:hover {
  background-color: #FF983C;
}

.yellow {
  background-color: #f1c40f;
  box-shadow: 0px 5px 0px 0px #D8AB00;
}


.yellow:hover {
  background-color: #FFDE29;
}

.grey {
  background-color: grey;
  box-shadow: 0px 5px 0px 0px grey;
}

/* copyright stuffs.. */
p {
  text-align: center;
  color: #55acee;
  padding-top: 20px;
}

</style>

<?php

$db = Database::connect();

if($db)
{
    echo "connection etablished";
}
else
{
    echo "connection error";
}


?>



<!-- header -->
<h1>Requests</h1>

<!-- start the realm of the buttons -->
<div id="buttons">
  <a href="request_1.php" class="btn blue">Request 1</a>
  <a href="request_2.php" class="btn green">Request 2</a>
  <a href="request_3.php" class="btn red">Request 3</a>
  <a href="request_4.php" class="btn purple">Request 4</a>
  <a href="request_5.php" class="btn orange">Request 5</a>
  <a href="request_6.php" class="btn yellow">Request 6</a>
  <a href="request_7.php" class="btn blue">Request 7</a>
  <a href="request_8.php" class="btn green">Request 8</a>
  <a href="request_9.php" class="btn red">Request 9</a>
  <a href="request_10.php" class="btn purple">Request 10</a>
</div>

<!-- Copyright stuffs -->
<p>Copyright&copy 2019, NICOLAS Florent & XIMENES Clément <a href="http://www.benngagne.ca" target="_blank" class="link"></a></p>