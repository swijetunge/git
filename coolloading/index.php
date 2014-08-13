<!--

# Awesome CSS3 Loading style
# Permission to use it on free and non-commercial website is granted, 
# where as for commercial use, the below copyright notice should be 
# retained.

	Copyright (c) 2014 Techglimpse.com
		All Rights Reserved	

  _______        _           _ _                          
 |__   __|      | |         | (_)                         
    | | ___  ___| |__   __ _| |_ _ __ ___  _ __  ___  ___ 
    | |/ _ \/ __| '_ \ / _` | | | '_ ` _ \| '_ \/ __|/ _ \
    | |  __/ (__| | | | (_| | | | | | | | | |_) \__ \  __/
    |_|\___|\___|_| |_|\__, |_|_|_| |_| |_| .__/|___/\___|
                        __/ |             | |             
                       |___/              |_|            
		
-->
<html>
	<head>
		<title>Cool new CSS3 loading styles - No Javascript!</title>
		<style>
			.loading {
			  width: 50px;
			  height: 50px;
			  background-color: #fff;
			  margin:0 auto;
			  top: 85px;
			  position:relative;
			  -webkit-animation: rotateplane 1.2s infinite ease-in-out;
			  animation: rotateplane 1.2s infinite  ease-in-out;
			}
			
			@-webkit-keyframes rotateplane {
			  0% { -webkit-transform: perspective(120px) }
			  50% { -webkit-transform: perspective(120px) rotateY(180deg) }
			  100% { -webkit-transform: perspective(120px) rotateY(180deg)  rotateX(180deg) }
			}
			
			@keyframes rotateplane {
			  0% { 
			    transform: perspective(120px) rotateX(0deg) rotateY(0deg);
			  } 50% { 
			    transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
			  } 100% { 
			    transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
			  }
			}
			.loading1 {
			 width: 50px;
			  height: 50px;
			  margin: 100px auto;
			  background-color: #fff;
			  border-radius: 100%;  
			  -webkit-animation: scaleout 1.0s infinite ease-in-out;
			  animation: scaleout 1.0s infinite ease-in-out;
			}
			
			@-webkit-keyframes scaleout {
			  0% { -webkit-transform: scale(0.0) }
			  100% {
			    -webkit-transform: scale(1.0);
			    opacity: 0;
			  }
			}
			
			@keyframes scaleout {
			  0% { 
			    transform: scale(0.0);
			  } 100% {
			    transform: scale(1.0);
			    opacity: 0;
			  }
			}
			.loading2 {
			  margin: 0 auto;
			  margin-top: 73px;
			  width: 100px; 
			  height: 100px;
			  border-radius: 50%;
			  background: 
			  linear-gradient(36deg, #333 42.34%, transparent 42.34%) 0 0;
			  background-repeat: no-repeat;
			  background-size: 50% 50%;
			
			  -webkit-animation: spin 2.0s infinite linear;
			  animation: spin 2.0s infinite linear;
			}
			@-webkit-keyframes spin {
			0% {
			        -webkit-transform: rotate(0deg);
			    }
			    100% {
			        -webkit-transform: rotate(360deg);
			    };
			}
			@keyframes spin {
			0% {
			        transform: rotate(0deg);
			    }
			100% {
			        transform: rotate(360deg);
			    };
			}
			.loading3 {
			width: 100px;
			height: 100px;
			margin: 100px auto;
			/*background: #333; */
			}
			.triangle1, .triangle2, .triangle3 {
			  border-width: 0 20px 30px 20px;
			  border-style: solid;
			  border-color: transparent;
			  border-bottom-color: #333;
			  height: 0; width: 0;
			  position: absolute;
			  margin:auto 30px;
			  -webkit-animation: fadecolor 2s 1s infinite linear;
			  animation: fadecolor 2s 1s infinite linear;
			}
			.triangle2, .triangle3 {
			  content: '';
			  position: absolute;
			  margin: 29px 49px;
			  animation-delay: 1.2s;
			  -webkit-animation-delay: 1.2s;
			}
			
			.triangle3 {
			  content: '';
			  margin: 29px 10px;
			  position: absolute;
			  animation-delay: 1.5s;
			  -webkit-animation-delay: 1.5s;
			}
			@keyframes fadecolor {
			    0% {border-bottom-color: #fff;}
			    100%{border-bottom-color: #333;}
			}
			@-webkit-keyframes fadecolor {
			    0% {border-bottom-color: #fff;}
			    100%{border-bottom-color: #333;}
			}
			.loading4 {
			width: 100px;
			height: 100px;
			margin: 100px auto;
			}
			.bar {
			    background-color:#333; border:1px solid #333; float:left;
			    margin-right:8px; margin-top:16px; width:12px; height:50px;
			    
			    /* Set the animation properties */
			    animation : loadingbar 1s infinite linear;
			    -webkit-animation : loadingbar 1s infinite linear;
			}
			 
			/* Delay both the second and third bar at the start */
			.loading4 .bar:nth-child(2) { animation-delay: 0.1s; }
			.loading4 .bar:nth-child(3) { animation-delay: 0.2s; }
			.loading4 .bar:nth-child(4) { animation-delay: 0.3s; }
			 
			.loading4 .bar:nth-child(2) { -webkit-animation-delay: 0.1s; }
			.loading4 .bar:nth-child(3) { -webkit-animation-delay: 0.2s; }
			.loading4 .bar:nth-child(4) { -webkit-animation-delay: 0.3s; }
			/* The actual animation */
			@keyframes loadingbar {
			     0% { }
			    10% { margin-top:5px; height:22px; border-color:#fff; background-color:#fff; }
			    20% { margin-top:0px; height:32px; border-color:#fff; background-color:#fff; }
			    30% { margin-top:1px; height:30px; border-color:#fff; background-color:#fff; }
			    40% { margin-top:3px; height:26px; }
			    50% { margin-top:5px; height:22px; }
			    60% { margin-top:6px; height:18px; }
			    70% { }
			    /* Missing frames will cause the extra delay */
			    100% { }
			}
			@-webkit-keyframes loadingbar {
			     0% { }
			    10% { margin-top:5px; height:32px; border-color:#fff; background-color:#fff; }
			    20% { margin-top:0px; height:32px; border-color:#fff; background-color:#fff; }
			    30% { margin-top:10px; height:30px; border-color:#fff; background-color:#fff; }
			    40% { margin-top:3px; height:26px; }
			    50% { margin-top:5px; height:22px; }
			    60% { margin-top:6px; height:18px; }
			    70% { }
			    /* Missing frames will cause the extra delay */
			    100% { }
			}
			.loading5 {
			  margin: 120px auto;
			  width: 30px;
			  height: 30px;
			  border-radius: 50%;
			  background-color:#fff;
			
			  -webkit-animation: updown 1.0s infinite linear;
			  animation: updown 1.0s infinite linear;
			}
			@-webkit-keyframes updown {
			0% {
			            -webkit-transform: translateY(0%);
			    }
			    50% {
			            -webkit-transform: translateY(-100%);
			    }
			100% {
				   -webkit-transform: translateY(0%);
			   }
			}
			@keyframes updown {
			0% {
			            transform: translateY(0%);
			    }
			    50% {
			            transform: translateY(-100%);
			    }
			100% {
			            transform: translateY(0%);
			   }
			}
			
			
			.loading6 {
			  margin: 100px auto;
			  width: 60px;
			  height: 60px;
			  border-radius: 50%;
			  background-color:#fff;
			
			  -webkit-animation: spinyaxis 3.0s 1s infinite ease-in-out;
			  animation: spinyaxis 3.0s 1s infinite ease-in-out; 
			}
			@-webkit-keyframes spinyaxis
			{  
			0%   {-webkit-transform: rotateY(0deg); -webkit-transform-origin: 0% 0% 5%;}  
			50% {-webkit-transform: rotateY(360deg); -webkit-transform-origin: 0% 0% 5%;}  
			100% {-webkit-transform: rotateY(0deg); -webkit-transform-origin: 0% 0% 5%;}  
			}
			@keyframes spinyaxis
			{
			0%   {transform: rotateY(0deg); -webkit-transform-origin: 0% 0% 5%;}
			50% {transform: rotateY(360deg); -webkit-transform-origin: 0% 0% 5%;}
			100% {transform: rotateY(0deg); -webkit-transform-origin: 0% 0% 5%;}
			}
			
			.loading7 {
			  margin: 100px auto;
			  width: 60px;
			  height: 60px;
			  border-radius: 50%;
			  background-color:#fff;
			
			  -webkit-animation: spinxaxis 3.0s 1s infinite ease-in-out;
			  animation: spinxaxis 3.0s 1s infinite ease-in-out;
			}
			@-webkit-keyframes spinxaxis
			{
			0%   {-webkit-transform: rotateX(0deg); -webkit-transform-origin: 0% 50% 0;}  
			50% {-webkit-transform: rotateX(360deg); -webkit-transform-origin: 0% 50% 0;}  
			100% {-webkit-transform: rotateX(0deg); -webkit-transform-origin: 0% 50% 0;}  
			}
			@keyframes spinxaxis
			{
			0%   {transform: rotateX(0deg); -webkit-transform-origin: 0% 50% 0;}
			50% {transform: rotateX(360deg); -webkit-transform-origin: 0% 50% 0;}
			100% {transform: rotateX(0deg); -webkit-transform-origin: 0% 50% 0;}
			}
			
			.loading8 {
			  margin: 110px auto;
			  left:0px;
			  width: 30px;
			  height: 30px;
			  border-radius: 50%;
			  background-color:#fff;
			
			  -webkit-animation: leftright 1.0s infinite linear;
			  animation: leftright 1.0s infinite linear;
			}
			@-webkit-keyframes leftright {
			0% {
			            -webkit-transform: translateX(0%);
			    }
			26% {
				-webkit-transform: translateX(-100%);
			}
			    51% {
			            -webkit-transform: translateX(0%);
			    }
			75% {
				-webkit-transform: translateX(100%);
			}
			100% {
				-webkit-transform: translateX(0%);		
			
			}
			}
			@keyframes leftright {
			0% {
			            transform: translateX(0%);
			    }
			    50% {
			            transform: translateX(-100%);
			    }
			100% {
			        transform: translateX(0%);
			}
			
			}
			.loading9 {
			height: 50px;
			width: 50px;
			border: 5px solid #fff;
			border-top: 5px solid #333;
			border-radius: 100px;
			margin: 100px auto;
			  -webkit-animation: circling 1.0s infinite linear;
			  animation: circling 1.0s infinite linear;
			}
			@-webkit-keyframes circling {
			from { -webkit-transform:rotate(0deg);}
			to { -webkit-transform:rotate( 360deg);}
			}
			@keyframes circling {
			from { transform:rotate(0deg);}
			to { transform:rotate( 360deg);}
			}
			
			.loading10 {
			height: 50px;
			width: 50px;
			border: 5px solid #000;
			border-top: 5px solid #FDFDFD;
			border-radius: 100px;
			margin: 100px auto;
			  -webkit-animation: circling 1.0s infinite linear;
			  animation: circling 1.0s infinite linear;
			}
			.loading11 {
			height: 60px;
			width: 60px;
			border: 3px solid #000;
			border-radius: 60px;
			margin: 90px auto;
			  -webkit-animation: circling 3.0s infinite linear;
			  animation: circling 3.0s infinite linear;
			}
			.loading11:after {
			content: "";
			position: absolute;
			top: -5px;
			left: 20px;
			width: 11px;
			height: 11px;
			border-radius: 10px;
			background-color: #000;
			}
			.loading12 {
			margin: 100px auto;
			width: 80px;
			height: 80px;
			border-radius: 50%;
			background: linear-gradient(53deg,#333 83.34%,transparent 7%) 0 49;
			background-size: 100% 62%;
			-webkit-animation: circling 3.0s infinite linear;
			  animation: circling 3.0s infinite linear;
			}
			.box {
			width: 25%;
			height: 250px;
			}
			.color {
			background: #2c3e50;
			float:left;
			}
			.color1 {
				float:left;
				background:#d35400;
			}
			.color2 {
			background:#1abc9c;
			float:left;
			}
			.color3 {
			background:#2980b9;
			float:left;
			}
			.color4 {
			background:#38ae4d;
			float:left;
			}
			.color5 {
			background:#e73887;
			float:left;
			}
			.color6 {
			background:#6a3085;
			float:left;
			}
			.color7 {
			background:#febb2f;
			float:left;
			}
			.color8 {
			background:#f49d00;
			float:left;
			}
			
			.color9 {
			background:#27aae2;
			float:left;
			}
			.color10 {
			background:#D4D4D4;
			float:left;
			}
			.color11 {
			background:#700e0d;
			float:right;
			}
			.download {
			color: #fff;
			position: absolute;
			margin: 0 auto;
			font-weight: bold;
			cursor: pointer;
			}
			.download a {
			color:#fff;
			}
			
		</style>
			<div class="box color">
				<div class="loading"></div>
			</div>
			<div class="box color1">
				<div class="loading1"></div>
			</div>
			<div class="box color2">
				<div class="loading2"></div>
			</div>
			<div class="box color3">
				<div class="loading3">
				  <div class="triangle1"></div>
				  <div class="triangle2"></div>
				  <div class="triangle3"></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="box color4">
				<div class="loading4">
				  <div class="bar"></div>
				  <div class="bar"></div>
				  <div class="bar"></div>
				  <div class="bar"></div>
				</div>
			</div>
			<div class="box color5">
				<div class="loading5"></div>
			</div>
			<div class="box color6">
				<div class="loading6"></div>
			</div>
			<div class="box color7">
				<div class="loading7"></div>
			</div>
			<div class="clear"></div>
			<div class="box color8">
				<div class="loading8"></div>
			</div>
			<div class="box color9">
				<div class="loading9"></div>
			</div>
			<div class="box color10">
				<div class="loading10"></div>
			</div>
			<div class="box color11">
				<div class="loading11"></div>
			</div>
	</body>
</html>

