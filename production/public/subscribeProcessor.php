<?php



/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.

 * 

 * $username = 'alliqua';

 * $password = 'kids1234';

 * dbname='alliqua'

 * 

 */



echo $_POST["nomeCompleto"];





$username = 'alliqua';

$password = 'kids1234';



try {

    $pdo = new PDO('mysql:host=mysql873.umbler.com;dbname=alliqua', $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    $stmt = $pdo->prepare('INSERT INTO students (nomeCompleto, rg, cpf, dataNasc, profissao, escolaridade, email, telFixo, telCelular, logradouro, numero, complemento, bairro, cidade, CEP, curso, pagamento) '

            . 'VALUES(:nomeCompleto, :rg, :cpf, :dataNasc, :profissao, :escolaridade, :email, :telFixo, :telCelular, :logradouro, :numero, :complemento, :bairro, :cidade, :CEP, :curso, :pagamento)');





    $stmt->bindValue(":nomeCompleto", $_POST["nomeCompleto"]);

    $stmt->bindValue(":rg", $_POST["rg"]);

    $stmt->bindValue(":cpf", $_POST["cpf"]);

    $stmt->bindValue(":dataNasc", $_POST["dataNasc"]);

    $stmt->bindValue(":profissao", $_POST["profissao"]);

    $stmt->bindValue(":escolaridade", $_POST["escolaridade"]);

    $stmt->bindValue(":email", $_POST["email"]);

    $stmt->bindValue(":telFixo", $_POST["telFixo"]);

    $stmt->bindValue(":telCelular", $_POST["telCelular"]);

    $stmt->bindValue(":logradouro", $_POST["logradouro"]);

    $stmt->bindValue(":numero", $_POST["numero"]);

    $stmt->bindValue(":complemento", $_POST["complemento"]);

    $stmt->bindValue(":bairro", $_POST["bairro"]);

    $stmt->bindValue(":cidade", $_POST["cidade"]);

    $stmt->bindValue(":CEP", $_POST["CEP"]);

    $stmt->bindValue(":curso", $_POST["curso"]);
	
	$stmt->bindValue(":pagamento", $_POST["payment"]);
	

    $stmt->execute();



    $to = "institutoalliqua@gmail.com";

    $subject = "Inscrição Recebida de " . $_POST["nomeCompleto"];

    $txt = "Eba!!! Recebemos uma inscrição. Nome: " . $_POST["nomeCompleto"] . " - Profissão: " . $_POST["profissao"]. " - Curso: " . $_POST["curso"]. " - Método Pagamento: " . $_POST["payment"]. " - Celular:" . $_POST["telCelular"];

    $headers = "From: webmaster@institutoalliqua.com.br";



    mail($to, $subject, $txt, $headers);

    

} catch (PDOException $e) {

    echo 'Error: ' . $e->getMessage();

}

 



