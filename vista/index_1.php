<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Portal FiloEn</title>
	<!--    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo2.png">
	
	    <link rel="stylesheet" href="css/flexsliderr.css" type="text/css">
	    <link rel="stylesheet" href="css/fontello.css" >
	    <link rel="stylesheet" href="css/estilos.css" >
	
	
	    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>   
	    <script src="http://code.jquery.com/jquery-latest.js"></script> 
	
	
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	    <script src="js/jquery.flexslider.js"></script>
	
	    <script type="text/javascript" charset="utf-8">
		$(window).load(function() {
		  $('.flexslider').flexslider();
		});
	      </script>
	
	      <script>
		  function mostrarMensaje(){
		      alert("Para ver Comunidad, ingresa tu usuario y contraseña!")
		  }
	      </script>-->
	<style>
	   
	    .dot{
		width: 0;
		height: 0;
		position: absolute;
		left: 50%;
		top: 50%;

	    }
	    .dot:before {
		content: '';
		width: 50px;
		height: 50px;
		border-radius: 50%;
		background: #fbd301;
		position: absolute;
		left: 50%;
		transform: translateY(0px) rotate(0deg);
		margin-left: -25px;
		margin-top: -25px;
	    }
	    @keyframes dot-move {
		0% {
		    transform: translateY(0) scale(0.5);
		}
		18%, 22% {
		    transform: translateY(120px) ;
		}
		40%, 100% {
		    transform: translateY(0) scale(0.5) ;
		}
	    }
	    @keyframes dot-colors {
		0% {
		    background-color: #fbd301;
		}
		25% {
		    background-color: #ff3270;
		}
		50% {
		    background-color: #208bf1;
		}
		75% {
		    background-color: #afe102;
		}
		100% {
		    background-color: #fbd301;
		}
	    }
	    .dot:nth-child(5):before {
		z-index: 100;
		width: 80px;
		height: 80px;
		margin-left: -40px;
		margin-top: -40px;
		animation: dot-colors 4s ease infinite;
	    }
	    @keyframes dot-rotate-1 {
		0% {
		    transform: rotate(-105deg);
		}
		100% {
		    transform: rotate(270deg);
		}
	    }
	    .dot:nth-child(1) {
		animation: dot-rotate-1 4s 0s linear infinite;
	    }
	    .dot:nth-child(1):before {
		background-color: #ff3270;
		animation: dot-move 4s 0s ease infinite;
	    }
	    @keyframes dot-rotate-2 {
		0% {
		    transform: rotate(165deg);
		}
		100% {
		    transform: rotate(540deg);
		}
	    }
	    .dot:nth-child(2) {
		animation: dot-rotate-2 4s 1s linear infinite;
	    }
	    .dot:nth-child(2):before {
		background-color: #208bf1;
		animation: dot-move 4s 1s ease infinite;
	    }
	    @keyframes dot-rotate-3 {
		0% {
		    transform: rotate(435deg);
		}
		100% {
		    transform: rotate(810deg);
		}
	    }
	    .dot:nth-child(3) {
		animation: dot-rotate-3 4s 2s linear infinite;
	    }
	    .dot:nth-child(3):before {
		background-color: #afe102;
		animation: dot-move 4s 2s ease infinite;
	    }
	    @keyframes dot-rotate-4 {
		0% {
		    transform: rotate(705deg);
		}
		100% {
		    transform: rotate(1080deg);
		}
	    }
	    .dot:nth-child(4) {
		animation: dot-rotate-4 4s 3s linear infinite;
	    }
	    .dot:nth-child(4):before {
		background-color: #fbd301;
		animation: dot-move 4s 3s ease infinite;
	    }
	</style>
    </head>
    <body>
	<div class="dots">
	    <div class="dot"></div>
	    <div class="dot"></div>
	    <div class="dot"></div>
	    <div class="dot"></div>
	    <div class="dot"></div>
	</div>

</body>
</html>