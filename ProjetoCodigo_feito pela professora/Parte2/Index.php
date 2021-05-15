<html>
	<head>
		<title>Index</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
            //testa a variável url que veio lá do htaccess
			if (isset($_GET['url'])) //se estiver preenchida, pega o valor
			  {
                $url =  strtoupper($_GET['url']);
				switch ($url){
					case "NOVOLIVRO":
				        require 'CadLivro.php';
						break;
				    case "HOME":
				         require 'ListarLivro.php';
						 break;
				    case "LISTARLIVRO":
						require 'ListarLivro.php';
						break;
				    default:
				         require 'ListarLivro.php';
			  }
			  }
			  else                     //senão, vai para uma página padrão, neste caso a home do site
                $url = '404.php';
		?>
	</body>
</html>