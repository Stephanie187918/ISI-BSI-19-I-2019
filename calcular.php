<?php
                         
header('Content-type: text/html');  

try
{
	
	$operando1 = filter_var($_POST['operando1'], FILTER_SANITIZE_NUMBER_FLOAT);
	$operando2 = filter_var($_POST['operando2'], FILTER_SANITIZE_NUMBER_FLOAT);


	if(!filter_var($operando1, FILTER_VALIDATE_FLOAT) ||
	   !filter_var($operando1, FILTER_VALIDATE_FLOAT))
			throw new Exception("Operadores inválidos: [{$operando1}] y [{$operando2}]");

	$operador = $_POST['operador'];

		if(!in_array($operador, array('SU', 'RE', 'MU', 'DI')))
			throw new Exception ("Operador inválido: [{$operador}]");

	$resultado = 0;

	switch($operador)
	{
		case 'SU':	$resultado = $operando1 + $operando2;
							break;
		
		case 'RE':	$resultado = $operando1 - $operando2;
							break;
		
		case 'MU':	$resultado = $operando1 * $operando2;
							break;
		
		case 'DI':		
		
							if ($operando2 == 0)
								throw new Exception ('División por cero');
		
							$resultado = $operando1 / $operando2;
							break;
		
		default:	
							
							throw new Exception('Operador desconocido');
							break;
	}
}
catch(Exception $e)		
{
	
	header("Status: 400 Bad Request", true, 400); 
	
	echo $e -> getMessage();
	
	exit(1);
}

header("Status: 200 OK", true, 200); 

echo number_format($resultado, 4);

exit(0);

?>