<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>Magic Header</title>
<style>
body{ margin: 0px; text-align: center; font: small/1.3 Arial, Helvetica, sans-serif; }
#pagetop{
	position: fixed;
	top: 0px;
	width: 100%;
	height: 120px;
	background: #06c;
	color: #FFF;
	padding-top: 50px;
	transition: height 0.3s linear 0s, padding 0.3s linear 0s;
	overflow: hidden;
}
#pagetop > #menu{
	position: absolute;
	bottom: 0px;
	width: 100%;
	height: 50px;
	transition: height 0.3s linear 0s;
}
#wrapper {margin-top: 200px; }
/* Begin Navigation Bar Styling */
#nav {
  width: 100%;
  float: left;
  padding: 0;
  list-style: none;
  background-color: #f2f2f2;
  border-bottom: 1px solid #ccc; 
  border-top: 1px solid #ccc; }
#nav li {
  float: left; }
#nav li a {
  display: block;
  padding: 8px 15px;
  text-decoration: none;
  font-size: 14px;
  font-weight: bold;
  color: #069;
  border-right: 1px solid #ccc; }
#nav li a:hover {
  color: #CCC;
  background-color: #fff; }
/* End navigation bar styling. */

</style>
<script type="text/javascript">
var pegetop, menu, yPos;
function yScroll(){
	pagetop = document.getElementById('pagetop');
	menu = document.getElementById('menu');
	yPos = window.pageYOffset;
	if (yPos > 100 ) {
		pagetop.style.height = "36px";
		pagetop.style.paddingTop = "8px";
		menu.style.height = "0px";
	} else {
		pagetop.style.height = "120px";
		pagetop.style.paddingTop = "50px";
		menu.style.height = "50px";
	}
}
window.addEventListener("scroll", yScroll);

</script>
</head>
<body>
	<div id="pagetop">
		Header
			<div id="menu">
				<ul id="nav">
			      <li><a href="#">About Us</a></li>
			      <li><a href="#">Our Products</a></li>
			      <li><a href="#">FAQs</a></li>
			      <li><a href="#">Contact</a></li>
			      <li><a href="#">Login</a></li>
			   </ul>
			</div>
	</div>
	<div id="wrapper">
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</div>
</body>
</html>
