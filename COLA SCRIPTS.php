
:: CONEXAO
<?
$conexao = new mysqli("localhost", "viskooco_vk8", "xxxxxxxxx", "viskooco_vk8");
if ($conexao->connect_error) { die('FALHOU : ('. $conexao->connect_errno .') '. $conexao->connect_error); };
?>

::WHILE
<?
include("../config/conexao/conectar.php");
$query = $conexao->query("SELECT * FROM usuario");
while($row = $query->fetch_assoc()) {
  $usuario = $row["usuario"];
  $senha = $row["senha"];
  $email = $row["email"];
}
$query->free();
$conexao->close();
?>

::UPDATE,INSERT ou DELETE
<?
include("../config/conexao/conectar.php");
$query = "UPDATE usuario SET usuario='$usuario', senha='$senhacript', email='$email'";
//  $query = "INSERT INTO `imagens` VALUES ('$id_modulo', '0', '$lorempixel', '$loremtitulo', '$loremconteudo', '', '')";

if ($conexao->query($query) === TRUE) {

} else {
   echo "Erro na grava��o: " . $conexao->error;
};

$conexao->close();
?>


::RETORNAR RESULTADOS - WHILE
<?php
include("../config/conexao/conectar.php");
$query = $conexao->query("SELECT * FROM usuario");

while($row = $query->fetch_assoc()) {
  $usuario = $row["usuario"];
  $senha = $row["senha"];
  $email = $row["email"];
}

$query->free();
$conexao->close();
?>


::TOTAL DE registros
<?
include("./config/conexao/conectar.php");

if ($result = $mysqli->query("SELECT * FROM vkblog where idblog='$idblog'")) {

    $totaldeposts = $result->num_rows;
    $result->close();
}

$query->free();
$conexao->close();
?>




<br>-----------<br>
SELECIONAR COM LIMITE<br>
<?php
$query = "SELECT * FROM links ORDER BY titulo limit 9";
?>

<br>-----------<br>
CRIPTOGRAFIA -- CRIPTOGRAFAR<br>
<?php $nome_do_arquivo = md5("sistemascs"); ?><br>

<br>-----------<br>
CRIPTOGRAFIA -- DESCRIPTOGRAFAR<br>
<?php $descriptogramado=$nome_doarquivomd5("sistemascs"); ?><br>



<br>-----------<br>
randomicamente use assim<br>
<?php
$query = "SELECT * FROM bannerrandom order by rand()";
?>



<br>-----------<br>
Para selecionar a tabela que a condi��o seja tal<br>
<?php
$query = "SELECT * FROM tabela_do_db WHERE COD='001'";
?>


<br>-----------<br>
Seleciona sem REPETIR<br>
<?php
$query = "SELECT distinct COLUNA FROM tabela_do_db WHERE COD='001'";
?>


<br>-----------<br>
Seleciona unindo tabelas INNER JOIN<br>
<?php
$query = "
SELECT distinct I.clicavel, I.arquivo

FROM imagens I
INNER JOIN vkcolunas C
INNER JOIN vkconteudo O

ON O.id = I.idref

order by  C.ordem_col;
";
?>



<br>-----------<br>
Para selecionar parte de uma string na tabela dentro do registro
os percentuais significa a mesma coisa que * tipo *.exe e tal<br>
<?php
$query = "SELECT * FROM tabela WHERE registro LIKE '%$variavel%'";
?>


<br>-----------<br>
Predefininco uma vari�vel pra usar que veio de outra p�gina
<?php
if (isset($_GET["valor"]))
{
$valor = $_GET["valor"];
echo "voc� clicou no link $valor<p>";
}
else
{
echo "Clique em um dos links abaixo:<p>";
}
?>
<a href="teste.php?valor=1">link 1</a><br>
<a href="teste.php?valor=2">link 2</a><br>



<br>-----------<br>
Inserir novo dados na tabela "sendo a quarta pra isso"<br>


<?php
$query = "INSERT INTO `tabela` VALUES ('id', 'teste_dados')";
$mysqli->query($query);
$mysqli->close();
?>



<br>-<br>
MOVENDO<br>
INSERT INTO tabela1 (nomes dos campos separados por v�rgula) SELECT nomes dos campos separados por v�rgula FROM tabela2 WHERE cl�usula


<br>-----------<br>
Atualizando registro do banco de dados por outro dado
tipo um c�digo vamos dizer<br>
<?php
include("../config/conexao/conectar.php");
$query = "UPDATE usuario SET usuario='$usuario', senha='$senhacript', email='$email'";

if ($conexao->query($query) === TRUE) {

} else {
   echo "Erro na grava��o: " . $conexao->error;
}

$conexao->close();
?>



<br>-----------<br>
Apagar Registro<br>
<?php
$query =
"DELETE FROM teste WHERE id='34'";
$mysqli->query($query);
$mysqli->close();
?>


<br>-----------<br>
Apagar Registro com LIMITE<br>
<?
$query ="DELETE FROM temp WHERE item='$item' limit 1";
?>


<? //escluir arquivo
unlink("uploads/$img");
?>

<br>-----------<br>
lendo dados de um formul�rio-vari�vel<br>
$texto = $_POST["texto"];
^var      ^cod      ^id do form

<br>-----------<br>
e-mail pelo php<br>
<?php
$nome = $_POST["nome"];
$email = $_POST["email"];
$avaliacao = $_POST["avaliacao"];
$msg = $_POST ["msg"];
$mensagem = "Avalia��o do site por $nome\n\n";
$mensagem .= "Nome: $nome\n\n";
$mensagem .= "E-mail: $email\n\n";
$mensagem .= "$nome avaliou o site como: $avaliacao\n\n";
$mensagem .= "Mensagem deixada por $nome\n$msg\n\n";
mail("digite aqui o email para onde ir� o formul�rio", "Avalia��o", $mensagem, "From: $nome");
echo "<h3> Obrigado pela avalia��o</h3>\n\n";
?>

PRIORIDADE ALTA<br>
<?php
        $headers = "MIME-Version: 1.0\n" ;
        $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
        $headers .= "X-Priority: 1 (Higuest)\n";
        $headers .= "X-MSMail-Priority: High\n";
        $headers .= "Importance: High\n";
		$headers .= "From: josiasfazendounstestes@waslammiguel.com.br\n";


		mail("josias@viskoo.com.br", "Teste voc� recebeu isso?", $mensagem, $headers);
?>


<br />UPLOAD ARQUIVO DO FORMUL�RIO MOVENDO PARA O HOST </br>
<?php
$curriculum = $_FILES["curriculum"]["name"];
@move_uploaded_file($_FILES["curriculum"]["tmp_name"],"./uploads/$curriculum");
//para enviar o form precisa ter   enctype="multipart/form-data"
?>

<br />
<form name="form1" method="post" action="enviar-email.php" enctype="multipart/form-data">
<br />

<br>
<?
$File_Name          = strtolower($_FILES['imagem']['name']);
$File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
$Random_Number      = rand(0, 9999999999); //Random number to be added to name.
$NewFileName 		= $Random_Number.$File_Ext; //new file name

@move_uploaded_file($_FILES["imagem"]["tmp_name"],"./uploads/$NewFileName");

?>




<BR /> ANEXAR NO EMAIL <BR />
N�O TESTEI AINDA
<?
$boundary = strtotime('NOW');
$headers = "From: Eu \n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"\n";
?>

<?
//ANEXO uploads/$arquivo
$mensagem .= "�" . $boundary . "\n";
$mensagem .= "Content-Transfer-Encoding: base64\n";
$mensagem .= "Content-Disposition: attachment; filename=\"imagem.gif\"\n\n";
ob_start();
readfile("uploads/$arquivo");
$enc = ob_get_contents();
ob_end_clean();

$msg_temp = base64_encode($enc). "\n";
$tmp[1] = strlen($msg_temp);
$tmp[2] = ceil($tmp[1]/76);

for ($b = 0; $b <= $tmp[2]; $b++) {
$tmp[3] = $b * 76;
$msg .= substr($msg_temp, $tmp[3], 76) . "\n";
}
//ANEXO DEPOIS USE  AFUNCAO MAIL
?>


<?

//PROTECAO PHP INJECTION

    if(eregi("http|www|ftp|.dat|.txt|.gif|wget", $textoeditado))
    {
        echo "Erro na URL!";

    }else{





    }

?>


<br>-----------<br>
CONDI��O SE ENT�O SEN�O<br>
<?php
if ($a == 100) //se fosse string usa-se 'aspas simples'
{
echo("� IGUAL<br>");
}
else
{
echo ("N�O � IGUAL<br>");
}
?>




LINK INTERNO<br>
<a href="#abaixo">Ir abaixo</a>
<a name="abaixo"></a>



<br>-----------<br>COOKIES FICAM NO MESMO DIRET�RIO WEB
gravando cookie<br>
<?
setcookie("empresa_logada", $titulo);
?>


<br>-----------<br>
LENDO COOKIE<br>
<? $db_dados_cidade = $_COOKIE["cook_dbcidade"]; ?>


<br>-----------<br>
Apaga cookie<br>
<? setcookie("empresa_logada", '', time()-3600); ?>

<br>-----------<br>
Se cookie existe<br>
<?php
if (isset($_COOKIE["regis_login"]))
{
$regis_login = $_COOKIE["regis_login"];
}
else
{
}
?>


<br>-----------<br>
Data e horabr>
<?
$data = date("d/m/y");
$hora = date("h:i:s");
$semana = date("w");
?>


<?
function SomarData($data, $dias, $meses, $ano)
{
   $data = explode("/", $data);
   $newData = date("d/m/Y", mktime(0, 0, 0, $data[1] + $meses,
     $data[0] + $dias, $data[2] + $ano) );
   return $newData;
}
?>

<?
echo SomarData("30/01/2011", 10, 0, 0);
?>


<?php
if ($semana == '1')
{
$semana = 'Segunda-Feira';
}
else
{
if ($semana == '2')
{
$semana = 'Ter�a-Feira';
}
else
{
if ($semana == '3')
{
$semana = 'Quarta-Feira';
}
else
{
if ($semana == '4')
{
$semana = 'Quinta-Feira';
}
else
{
if ($semana == '5')
{
$semana = 'Sexta-Feira';
}
else
{
if ($semana == '6')
{
$semana = 'S�bado';
}
else
{
if ($semana == '7')
{
$semana = 'Domingo';
}
else
{
}
}
}
}
}
}
}
?>


<br>-----------<br>
N�mero de registro<br>
<?
// para pegarmos o n�mero total de registros
$sql_select_all = "SELECT * FROM registro_empresa";
// Executa o query da sele��o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari�vel com o n�mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari�vel, desta vez com o n�mero de p�ginas que ser� precisa.
?>

<?php echo $total_registros?><br>


<br>---------------subtraindo caracteres de variavel
    <?php
    $rest = substr("abcdef", -1);    // retorna "f"
    $rest = substr("abcdef", -2);    // retorna "ef"
    $rest = substr("abcdef", -3, 1); // retorna "d"
    ?>


<BR /> TRATAR ACENTUACOES VARIAVEIS
<?
function tratar_arquivo_upload($string){
   // pegando a extensao do arquivo
   $partes 	= explode(".", $string);
   $extensao 	= $partes[count($partes)-1];
   // somente o nome do arquivo
   $nome	= preg_replace('/\.[^.]*$/', '', $string);
   // removendo simbolos, acentos etc
   $a = '���������������������������������������������������������������???';
   $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr-';
   $nome = strtr($nome, utf8_decode($a), $b);
   $nome = str_replace(".","-",$nome);
   $nome = preg_replace( "/[^0-9a-zA-Z\.]+/",'-',$nome);
   return utf8_decode(strtolower($nome.".".$extensao));
}

$filename = tratar_arquivo_upload(utf8_decode($file['name']));
?>


<br>-----------<br>
Arredonda pra cima o valor<br>
<?
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$3);
?>

PARAR E N�O EXECUTAR MAIS NADA PARA BAIXO<BR>
<script>
stop;
</script>


Window alert<br>
<script>
window.alert('O arquivo foi apagado do sistema inclusive !');
window.close();
</script>

<script>
window.alert('O arquivo foi apagado do sistema inclusive !');
history.back();
</script>


LINK JAVA
<script>
window.alert('O arquivo foi apagado do sistema inclusive !');
window.location.href = 'index.php';
</script>

refresh
<script>
window.location.reload();
</script>


OPCAO OK e CANCELAR
<script language=javascript>
msg = "confirmar ou cancelar ?";
if(confirm(msg)){
msg = "confirmou";
}else{
msg = "cancelou";
}
document.write(msg);
</script>


javascript:history.back(1)





ou



history.back();



     <!-- ### Aplicando CSS a partir da Rolagem ##### -->
      <script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>

          <script type="text/javascript">

$(document).ready(function(){
	var element = $('#minhaDiv'), className = 'teste-css';

   $(document).scroll(function() {
  		if ($(this).scrollTop() >= 5) {
				element.addClass(className);
  		} else {
   			element.removeClass(className);
 			}
	 });
});

</script>



<!-- ###PARALLAS OBJECT -->
   <script>
        function parallax() {

            //BOTAO
            var homebt = document.getElementById('homebt');
            homebt.style.bottom = -(window.pageYOffset / 1) + 'px';

        }
        window.addEventListener("scroll", parallax, false);
    </script>


<!-- ###Aplicado e removendo quando o mouser posicionar sobre -->
<script>
document.getElementById("produto").onmouseover = function() { mouseOver() };
document.getElementById("produto").onmouseout = function() { mouseOut() };


              //#Aplicando v�rios CSS
function mouseOver() {
    $('.hrico').addClass('hrico-hover');
    $('.descrito').addClass('descrito-hover');
    $('.ico-titulo').addClass('ico-titulo-hover');
    $('.link').addClass('a-hover');
    $('.titulo').addClass('h2bold');
}
        //#Removendo v�rios CSS
function mouseOut() {
    $('.hrico').removeClass('hrico-hover');
    $('.descrito').removeClass('descrito-hover');
    $('.ico-titulo').removeClass('ico-titulo-hover');
    $('.link').removeClass('a-hover');
    $('.titulo').removeClass('h2bold');
}
    </script>




<br />remove DIV em segundos</br>
<script type="text/javascript">

$(document).ready(function(){
   setTimeout(function(){

  $("div.perfil").fadeOut("slow", function () {
  $("div.perfil").remove();
      });

}, 2000);
 });

</script>


SE EXISTE<br>
<?php
if (isset($_COOKIE["empresa_logada"]))
{
$empresa_logada_valor = $_COOKIE["empresa_logada"];
?>Empresa <b><?php echo $empresa_logada_valor?> </b>livre para edi��o,<a href="desconectar.php">[logout]</a><?
}
else
{
}
?>


LOCAWEB SENDER<br />
<?php

/* Medida preventiva para evitar que outros dom�nios sejam remetente da sua mensagem. */
if (eregi('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
        $emailsender='$emaildb'; // Substitua essa linha pelo seu e-mail@seudominio
} else {
        $emailsender = "mri@" . $_SERVER[HTTP_HOST];
        //    Na linha acima estamos for�ando que o remetente seja 'webmaster@seudominio',
        // Voc� pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
}

/* Verifica qual �o sistema operacional do servidor para ajustar o cabe�alho de forma correta.  */
if(PATH_SEPARATOR == ";") $quebra_linha = "\r\n"; //Se for Windows
else $quebra_linha = "\n"; //Se "não for Windows"

$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$cidade = $_POST ["cidade"];
$estado = $_POST ["estado"];
$empresa = $_POST ["empresa"];
$msg = $_POST ["mensagem"];


/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '<P>Mensagem diretamente pelo site:</P>
<P>Segue:</P>
<p><b><i>'.$nome.'</i></b></p>
<p><b><i>'.$email.'</i></b></p>
<p><b><i>'.$telefone.'</i></b></p>
<p><b><i>'.$cidade.'</i></b></p>
<p><b><i>'.$estado.'</i></b></p>
<p><b><i>'.$empresa.'</i></b></p>
<p><b><i>'.$msg.'</i></b></p>
<hr>';

$headers = "MIME-Version: 1.1" .$quebra_linha;
$headers .= "Content-type: text/html; charset=iso-8859-1" .$quebra_linha;
// Perceba que a linha acima cont�m "text/html", sem essa linha, a mensagem n�o chegar� formatada.
$headers .= "From: " . $emailsender.$quebra_linha;
$headers .= "Cc: " . $comcopia . $quebra_linha;
$headers .= "Bcc: " . $comcopiaoculta . $quebra_linha;
$headers .= "Reply-To: " . $emailremetente . $quebra_linha;

if(!mail("$emaildb", "MBR do site", $mensagemHTML, $headers ,"-r"."$emaildb")){ // Se for Postfix
    $headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "n�o for Postfix"
    mail("$emaildb", "MRI e-mail do site", $mensagemHTML, $headers );
}
?>



FORM DE UPLOAD DE ARQUIVO<br>
            <form action="carregando_arquivo.php" method="post" enctype="multipart/form-data">
    <table width="278" border="0" align="center" cellspacing="1" cellpadding="1">
      <tr bgcolor="#E1E1E1">
        <td bgcolor="#E1E1E1"><font size="2" face="Verdana" class="otexto">Diret&oacute;rio</font></td>
        <td><input type="radio" name="select_dir" value="diretorio" checked></td>
        <td bgcolor="#E1E1E1"><select name="diretorio" size="1">
            <option value="uploads">Padr&atilde;o</option>
          </select>        </td>
      </tr>
      <tr bgcolor="#E1E1E1">
        <td bgcolor="#E1E1E1"><font size="2" face="Verdana" class="otexto">Arquivo</font></td>
        <td>&nbsp;</td>
        <td bgcolor="#E1E1E1"><input type="file" size=20 name="file"></td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><div align="center">
          <input type="submit" value="Enviar o arquivo da empresa" name="submit" />
        </div></td>
      </tr>
    </table>
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <br>
        <br>
  </form>









UPLOAD DO ARQUIVO<br>
<?php //upload do arquivo pelo diretorio do form identificado
$umask_anterior = umask(0);
if ($_FILES["file"]["error"] === 0)
{
@ mkdir($_POST["{$_POST["select_dir"]}"],0777);
@ move_uploaded_file($_FILES["file"]["tmp_name"],"./{$_POST["{$_POST["select_dir"]}"]}/{$_FILES["file"]["name"]}");
?>
<script>
window.alert('Arquivo inserido na p�gina principal sodelivery com sucesso!!');
history.back();
</script>
<?
}
else
{
switch ($_FILES["file"]["error"])
{
case 1:
$msg_err = "O arquivo no upload � maior do que o limite \ndefinido em upload_max_filesize no php.ini!";
break;
case 2:
$msg_err = "O arquivo ultrapassa o limite de tamanho em \nMAX_FILE_SIZE que foi especificado no formul�rio!";
break;
case 3:
$msg_err = "O upload do arquivo foi feito parcialmente!";
break;
case 4:
$msg_err = "N�o foi feito o upload do arquivo. Tente novamente!!!";
break;
default:
$msg_err = "Ocorreu um erro.\nVerifique qual o problema!!!";
}
?>
<script>
window.alert('<?=$msg_err?>');
history.back();
</script>
<?
umask($umask_anterior);
}
?>



Nome de arquivo do form<br>
<? $nome_do_arquivo = $_FILES["file"]["name"];?>




<br />
UPLOAD POWER

<? //as fun��es
function upload($arquivo,$caminho){
	if(!(empty($arquivo))){
		$arquivo1 = $arquivo;
		$arquivo_minusculo = strtolower($arquivo1['name']);
		$caracteres = array("�","~","^","]","[","{","}",";",":","�",",",">","<","-","/","|","@","$","%","�","�","�","�","�","�","�","�","+","=","*","&","(",")","!","#","?","`","�"," ","�");
		$arquivo_tratado = str_replace($caracteres,"",$arquivo_minusculo);
		$destino = $caminho."/".$arquivo_tratado;
		if(move_uploaded_file($arquivo1['tmp_name'],$destino)){
			echo "<script>window.alert('Arquivo enviado com sucesso.');</script>";
		}else{
			echo "<script>window.alert('Erro ao enviar o arquivo');</script>";
		}
	}
}

function arquivo_nome($arquivo){
	if(!(empty($arquivo))){
		$arquivo1 = $arquivo;
		$arquivo_minusculo = strtolower($arquivo1['name']);
		$caracteres = array("�","~","^","]","[","{","}",";",":","�",",",">","<","-","/","|","@","$","%","�","�","�","�","�","�","�","�","+","=","*","&","(",")","!","#","?","`","�"," ","�");
		$arquivo_tratado = str_replace($caracteres,"",$arquivo_minusculo);
		return $arquivo_tratado;
	}
}

?>

<? //para as variaveis
$arquivodestacado = $_FILES["arquivodestacado"];
$diretorio = "../uploads";
?>

<?php //para o upload
upload($arquivodestacado,$diretorio);

arquivo_nome($arquivodestacado); // retorna echo novo nome corrigido
?>






substr

(PHP 4, PHP 5)

substr � Retorna uma parte de uma string
Descri��o
string substr ( string $string , int $start [, int $length ] )

Retorna a parte de string especificada pelo par�metro start e length .
Par�metros

string

    A string de entrada.
start

    Se start n�o for negativo, a string retornada iniciar� na posi��o start em string , come�ando em zero. Por exemplo, na string 'abcdef', o caractere na posi��o 0 � 'a', o caractere na posi��o 2 � 'c', e assim em diante.

    Se start for negativo, a string retornada ir� come�ar no caractere start a partir do fim de string .

    Exemplo #1 Usando um in�cio negativo
    <?php
    $rest = substr("abcdef", -1);    // retorna "f"
    $rest = substr("abcdef", -2);    // retorna "ef"
    $rest = substr("abcdef", -3, 1); // retorna "d"
    ?>
length

    Se length for dado e for positivo, a string retornada ir� conter length caracteres come�ando em start (dependendo do tamanho de string ). Se a string � menor do que start , ser� retornado FALSE.

    Se length for dado e for negativo, ent�o esta quantidade caracteres ser�o omitidos do final de string (ap�s a posic�o de inicio ter sido calculada quando start for negativo). Se start denota uma posi��o al�m da truncagem, uma string vazia ser� retornada.

    Exemplo #2 Usando um length negativo
    <?php
    $rest = substr("abcdef", 0, -1);  // retorna "abcde"
    $rest = substr("abcdef", 2, -1);  // retorna "cde"
    $rest = substr("abcdef", 4, -4);  // retorna ""
    $rest = substr("abcdef", -3, -1); // retorna "de"
    ?>

Valor Retornado

Retorna a parte extra�da da string.
Exemplos

Exemplo #3 Uso b�sico da substr()
<?php
echo substr('abcdef', 1);     // bcdef
echo substr('abcdef', 1, 3);  // bcd
echo substr('abcdef', 0, 4);  // abcd
echo substr('abcdef', 0, 8);  // abcdef
echo substr('abcdef', -1, 1); // f

// Accessing single characters in a string
// can also be achived using "curly braces"
$string = 'abcdef';
echo $string{0};                 // a
echo $string{3};                 // d
echo $string{strlen($string)-1}; // f


$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$onlyconsonants = str_replace($vowels, "", "Hello World of PHP");

?>



<!-- comandos -->
<script language="JavaScript" src="shortcut.js"></script>
<script>
shortcut.add("ctrl+w",function()
{
senha.focus();
});



shortcut.add("ctrl+q",function()
{
registro.focus();
});

</script>

<?
/* GERADOR DE ID UNICO */
$id = uniqid();

?>


<? /* SIMPLES GERADOR DE IDs */
/* O ID � {dia}{mes}{hora}{minuto}{segundo}[ano] */
$id_dia = date("d");
$id_mes = date("m");
$id_hora = date("h");
$id_minutos = date("i");
$id_segundos = date("s");
$id_ano = date("y");
$id = "$id_ano$id_mes$id_dia$id_hora$id_minutos$id_segundos"; //corrigido order by ID
?>

<?
// criar um arquivo contador.txt com o numero 1 dentro
$arquivo1 = fopen("contador.txt", "a+");
chmod("contador.txt", 0777);
$esc = fread($arquivo1, filesize("contador.txt"));
fclose($arquivo1);
$contador = $esc+1;
$arquivo2 = fopen("contador.txt","r+");
fwrite($arquivo2, $contador);
fclose($arquivo2);
$id = $contador;
?>

<?php //ID DA SESS�O
session_start();
$sessao = session_id();
?>

<?php
/* fun��o */
function inserir($tabela, $id, $imagem)
{
$consulta =
"INSERT INTO `$tabela` VALUES ('$id', '$imagem')";
$resultado = mysql_query($consulta)
or die("Falha na execu��o da consulta");
}

if ($nome_do_arquivo1 == '')
{
}
else
{
inserir (fotos, $grupo, $nome_do_arquivo1);
}
?>

<?
	$hostname = gethostbyaddr($_SERVER['SERVER_ADDR']);

	$ip = gethostbyname($hostname);
	echo "hostname:$hostname<br>ip:$ip";
	?>



Durmir tempo - dar um tempo delay
<?
sleep(3);
?>
OUU
<META HTTP-EQUIV="REFRESH" CONTENT="4; URL=index.php">

<?php
$ftp = ftp_connect("host");
ftp_login($ftp, "login", "******");
ftp_site($ftp, "chmod 0777 minha/pasta/para/ser/alterada");
ftp_site($ftp, "chmod 0777 meu/arquivo.txt");
ftp_quit($ftp);
?>



exibir e ocultar uma layout

<script type="text/javascript">
function show(object,val) {
document.getElementById(object).style.visibility = val;
}
</script>
<a href="#" onmouseover="show('myId','visible')" onmouseOut="show('myId','hidden')">LINK</a>

<body onLoad="
show('myld','hidden');
show('myld2','hidden');
show('myld3','hidden');
show('myld4','hidden');
">


. == - Igual a;
. != - Diferente de (ou n�o igual a);
. < - Menor que;
. > - Maior que;
. <= - Menor ou igual a;
. >= - Maior ou igual a.




//FUN��O PARA ESCREVER UMA STRING COM A COR VERMELHA NA TELA E NEGRITO
<?php
...
function escreve_vermelho_neg($str){
        echo "<font color=\"#FF0000\"><b>$str</b></font>";
}
...
?>


Chamando a mesma:
<?php
...
$string = "Hello World!!";
escreve_vermelho_neg($string);
...
?>


<?
// SUBSTITUI PALAVRAS REFERENTE A VARIAVEL $P ACRESCENTANDO O STRONG NO COME�O E FINAL
$negrito = "<strong>".$p."</strong>";
?>
	<?while($exibe = mysql_fetch_array($exec))
	{
		$color = $color?"":"#e1e1e1";
		?>
	<tr bgcolor="<?=$color?>">

		<td><?=str_replace($p, $negrito, $exibe["nome_usu"])?></td>
		<td><?=str_replace($p, $negrito, $exibe["login_usu"])?></td>
		<td><?=str_replace($p, $negrito, $exibe["email_usu"])?></td>
	</tr>
	<?
	}//fechando o while
?>


<?php
    $stringona = "N�o preciso esquentar a cabe�a para substituir um peda�o.";
    echo(str_replace("esquentar", "fundir", $stringona));
?>

<?
preg_replace("/<img[^>]+\>/i", "(image) ", $content);
echo $content;
?>


<?php
if (isset($_GET["area"]))
{
$area = $_GET["area"];
include ("$area.php");
}
else
{
include ("home.php");
}
?>

CSS RODAP� NA DIV<br />

#rodape {
    position: relative;
    bottom: 0;
    height: 160px;
    text-align: center;
    width: 100%;
    background-color: #0FF;
    clear: both;
}


<?php
   $url_inicio = "http://";
   $url_host = $_SERVER['SERVER_NAME'];
   $url_pagina = $_SERVER['REQUEST_URI'];
   echo "Endere�o do seu website: " . $url_inicio . $url_host . $url_pagina;
?>


PEGAR O NOME DO COMPUTADOR // se tiver software crackeado da adobe na m�quina da� n�o pega
<?php
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
echo $hostname;
?>

Fun��o de javascript interessante com imagem

<img src='baixarpadr�o.jpg' name='pbaixar' width="15%" height='15%' onmouseover='document.pbaixar.src="imgbaixar.gif"' onmouseout='document.pbaixar.src="baixarpadr�o.jpg"'>



<br /> Mascara de campo mask field <br />

<input name="cnpjform" type="text" id="cnpjform" size="60" onblur="if(this.value == '') {this.value = 'Coloque o CNPJ';}" onfocus="if(this.value == 'Coloque o CNPJ') {this.value = '';}" value="Coloque o CNPJ"/>




<br /> AJAX LOAD URL </br>

<script src="js/jquery.min.js"></script>

<script>
function carregarpagina(alvo,pagina) {
	$(alvo).fadeIn(700);
  $(alvo).html('<p><img src="loading.gif" /></p>');
  $(alvo).load(pagina);
}
</script>

<input type="button" onclick="carregarpagina(primeira,'teste.php')" value="Click Me!" />

<a href="javascript:void(0)" onClick="carregarpagina(segunda,'teste.php')">clique aqui</a>

<div id="primeira">
  <p>Placeholding text</p>
</div>

<div id="segunda">
  <p>Placeholding text</p>
</div>


<br />Ocultando erro do PHP
error_reporting(0);







lendo XML em PHP <br />

<?


$xml = simplexml_load_file("http://g1.globo.com/Rss2/0,,AS0-5598,00.xml");


$quant = 5;


for($i=0;$i<$quant;$i++) {


  $titulo = $xml->channel->item[$i]->title;


  $link = $xml->channel->item[$i]->link;


  $hora = $xml->channel->item[$i]->pubDate;


  $hora = explode(" ",$hora);


  echo "<a href=".$link.">".$hora[4]." - ".utf8_decode($titulo)."</a><br>";


}


?>


</BR>
CSS GRID RESPONSIVE

<style type="text/css">

.corpo {
	width:100%;
}

.box-form {
	display:inline-block;
	width:170px	;
	vertical-align:top;
	margin:4px;
	background:#3C6;
}

@media (max-width: 1000px) {

  .grid3 {
	display:list-item;
	width:30%;
	vertical-align:top;
}

  }

@media (min-width: 800px) {

.grid3 {
	display:inline-block;
	width:30%;
	vertical-align:top;
}

}
</style>




<BR />
CSS RESPONSIVE FILE

<link href="estilomri-home-desk.css" rel="stylesheet" type="text/css" media="(min-width: 320px)"/>
<link href="estilomri-home-mobile.css" rel="stylesheet" type="text/css" media="(max-width: 800px)"/>


Abrir janela popup

<script language="JavaScript">
function abrir(URL) {

  var width = 150;
  var height = 250;

  var left = 99;
  var top = 99;

  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

}
</script>

<a href="javascript:abrir('http://codigofonte.net/');">Clique Aqui</a>



//FOCUS FIELD

 onfocus="this.value=''"



 //scroll bar style

 ::-webkit-scrollbar {
    width: 12px;
}
::-webkit-scrollbar-track {
    background-color: #eaeaea;
    border-left: 1px solid #ccc;
}
::-webkit-scrollbar-thumb {
    background-color: #ccc;
}
::-webkit-scrollbar-thumb:hover {
    background-color: #aaa;
}






//ROLADEM SUAVE NA NAVE


//INSERIR NO FINAL

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
		</script>


        //usar classes "anchorList"

        // usar �ncora  #link



   ##Remove tags de um c�digo
<?php
2
// Define uma string com c�digo HTML
3
$entrada = '<p>Ah�... <a href="mailto: fulaninho@uol.com.br">eu</a> sou <strong>malandr�o!</strong></p>';
4

5
$saida = strip_tags($entrada, '<strong><p>');
6
echo $saida;
7
// Sa�da: <p>Ah�... eu sou <strong>malandr�o!</strong></p>
8
?>



UNICODE e ANSI TEXTO CONVERTER
<? $titulounicode = mb_convert_encoding ($titulo, 'UTF-8', 'US-ASCII'); ?>








<script type="text/javascript">
function getEndereco() {

    if ($.trim($("#cep").val()) !== "") {
        $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep=" + $("#cep").val(), function() {

            if (resultadoCEP["resultado"]) {
                $("#rua").val(unescape(resultadoCEP["tipo_logradouro"]) + " " + unescape(resultadoCEP["logradouro"]));
                $("#bairro").val(unescape(resultadoCEP["bairro"]));
                $("#cidade").val(unescape(resultadoCEP["cidade"]));
                $("#estado").val(unescape(resultadoCEP["uf"]));
                $("#pais").val('Brasil');
                $("#numero").focus();
            }
        });
    }

}
</script>




ADQUIRIR IP USU�RIO



<? $ip = $_SERVER["REMOTE_ADDR"]; ?>


#scrool visible

<script>
$( window ).scroll(function() {
    nScrollPosition = $( window ).scrollTop();
    if(nScrollPosition>=130){
         $( ".logo-scroole" ).css( "display", "block" );
    }else{
         $( ".logo-scroole" ).css( "display", "none" );
    }
});
</script>



//MENU FUNCAO ABRE FIXA FECHA DEIXA NORMAL (Nastaria)

  <script type="text/javascript">

    $(document).ready(function(){


      var element = $('#menunastariafixar'), className = 'fixed-top';

       $(document).scroll(function() {
          if ($(this).scrollTop() >= 200) {

              var x = document.getElementById("menudinamico").getAttribute("aria-expanded");

              if (x == "true")
              {

                } else {

                  element.addClass(className);

                }

          } else {
              element.removeClass(className);
          }
       });


    });

  </script>





<style>
    .logo-scroole
{
    display: none;
}
</style>


<!-- ANIMACAO CSS -->

<style>
    @keyframes fontbulger {
  0% {
    font-size: 10px;
  }
  30% {
    font-size: 15px;
  }
  100% {
    font-size: 12px;
  }
}

#box {
   animation: fontbulger 2s infinite;
}
</style>



<!-- CARRINHO SCRIPT -->
<? session_start();

    if (isset($_SESSION['venda']))
    {

    }
else{
    $_SESSION['venda'] = array();
}
?>

<?
 if (isset($_GET["limpar"]))
     {
         session_destroy();
     ?>
     <script>
         window.location.href = 'carrinho.php';
    </script>
    <?
     }
     else
     {
     }
?>


<?
 if (isset($_GET["del"]))
     {
      $id_del = $_GET["del"];
     unset($_SESSION['venda'][$id_del]);
     }
     else
     {
     }
?>

 <table class="table table-hover">
     <tr>
         <td><strong>Produto</strong></td>
         <td><strong>Valor</strong></td>
         <td><strong>Quantidade</strong></td>
         <td><strong>Soma</strong></td>
         <td><strong>Remover</strong></td>

     </tr>


      <? //SE der PAU EXPERIMENTE TIRAR ISSO
$soma_total = "0";
?>
 <?php
    foreach($_SESSION['venda'] as $id_produto => $quantidade):


    $consulta="SELECT * FROM viskmodulos where id='$id_produto'";
    $resultado = mysql_query($consulta)
    or die("Falha na execu??o da consulta");

    $linha = mysql_fetch_assoc($resultado);
    $id_prod_sec = $linha["id"];
    $titulo = $linha["titulo"];
    $valor = $linha["nome"];


?><tr>
     <td><? echo $titulo ?></td>
         <td><? echo 'R$ ' . number_format($valor, 2, ',', '.');?></td>
         <td><? echo $quantidade ?></td>
         <td><? $soma_linha = $quantidade * $valor; ?> <? echo 'R$ ' . number_format($soma_linha, 2, ',', '.');?>
     <? $soma_total = $soma_total + $soma_linha; ?>
        </td>
         <td><a href="?del=<? echo $id_prod_sec; ?>"<i class="glyphicon glyphicon-remove"></i></td>
         </tr><?



    endforeach;
     ?>
      <tr>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td>Total: <strong><? echo 'R$ ' . number_format($soma_total, 2, ',', '.');?></strong></td>

     </tr>
</table>
    <div class="row text-right"><a href="?limpar=s"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> Limpar carrinho</a></div>
    </div>
<!--/CARRINHO -->

<!-- ADD NO CARRINHO -->
<?
$id_produto = $_GET["id"];
$quantidade_produto = $_POST["quantidade"];

if ($quantidade_produto == "")
{
    $quantidade_produto = "1";
}
?>


<? session_start();

    if (isset($_SESSION['venda']))
    {
    }
else{
    $_SESSION['venda'] = array();
}
?>


<?
    $_SESSION['venda'][$id_produto] = $quantidade_produto;
?>


<script>
window.alert('Produto adicionado no carrinho');
window.location.href = 'carrinho.php';
</script>
<!-- / ADD NO CARRINHO -->




<!--protegento-->




.htaccess
--in�cio
    <FilesMatch "\.([Jj][Pp][Gg]|[Pp][Nn][Gg]|[Gg][Ii][Ff]|[Bb][Mm][Pp])">
    order deny,allow
    allow from all
    </FilesMatch>
    deny from all
--fim


Trabalhando com Array

  <?php

    $carro = array();
$carro['cor'] = 'Vermelho';
$carro['modelo'] = 'CrossFox';
$carro['fabricante'] = 'Volkswagen';

    foreach ($carro as $key => $value) {

    echo "Key: $key; Value: $value<br />\n";

    }

    ?>


		STORE PROCEDURE

		<? $mysqli = new mysqli('localhost', 'shoemix_loja', 'yasYdD3g', 'shoemix_loja'); ?>


		<? include("config-loja/conexao/config.php");
		$result = $mysqli->query("CALL SpClienteConsultaPorCPF('$usuariocpf')");

		if (!$result) {

		    die('Query failed returning error: ' . $mysqli->connect_errno);

		} else {

		    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

		        $id = $row['CodCliente'];
		        $cpfcnpj = $row['CpfCnpj'];
		        $nomecompleto = $row['NomeCompleto'];
		        $telefoneresidencial = $row['TelefoneRes'];
		        $telefonecomercial = $row['TelefoneComercial'];
		        $celular = $row['Celular'];
		        $telefonerecado = $row['TelefoneRecado'];
		        $email = $row['email'];
		        $senha = $row['Ps'];

		    }
		}
		?>


		<? include("config-loja/conexao/config.php");
		$result = $mysqli->query("CALL SpClienteAlterarDados('$cpfcnpj', '$nomecompleto', '$email', '$telefonere', '$telefonecomercial', '$celular', '$telefonerecado')");
		?>


		CRIANDO STORE PROCEDURE

		CREATE DEFINER=`shoemix_loja`@`%` PROCEDURE `SpClienteAlterarDados`(cpfcnpj varchar(100),nomecompleto varchar(100),email varchar(100),telefonere varchar(100),telefonecomercial varchar(100),celular varchar(100),telefonerecado varchar(100))
		BEGIN

		        /* JOSIAS VISKOO */

		UPDATE Cliente SET

		 NomeCompleto = nomecompleto,
		 TelefoneRes = telefonere,
		 TelefoneComercial = telefonecomercial,
		 Celular = celular,
		 TelefoneRecado = telefonerecado,
		 email = email

		 where CpfCnpj = cpfcnpj;

		END



<?// CLASSE ORIENTADA A OBJETOS ?>

    <? class loja {

  private $nvendedoras = "7";
  private $loja1 = "Rua Tal";

  public function getvendedoras() {
    return $this->nvendedoras;
  }

  public function setvendedoras($venderasnum)
  {
    $this->nvendedoras = $venderasnum;
  }
}

$loja = new loja;

$loja->setvendedoras('20');
echo $loja->getvendedoras();
?>



<?



function conectar(){
  gerarlog("Conexao","inicio");
  //Config
  $usuario = "catalogo_shoemix";
  $senha = "snp3YjtN4hxhwW8t";
  $banco = "catalogo_shoemix";

  $conexao = new mysqli("localhost", $usuario, $senha, $banco);
  if ($conexao->connect_error) { die('FALHOU : ('. $conexao->connect_errno .') '. $conexao->connect_error); }
  else { return $conexao; };
  gerarlog("Conexao","fim");

};






function RetornaTags($id_prod) {
  $conexao = conectar();
  $query = $conexao->query("

  select PT.id_tag, PTAG.descricao, PTAG.hexabg, PTAG.hexatxt
       from produtotag PT
       inner join produtos_app_tag PTAG on (PT.id_tag = PTAG.idtag)
       inner join produtos_app_tipotag TPTAG on (TPTAG.idtipotag = PTAG.tipotag )
       where TPTAG.tipodescricao = 'PROMOCAO'
         and PTAG.ativo = 1
         and id_prod = '$id_prod'

  ");

  $tags = array();
  $contador = 0;

    while($row = $query->fetch_assoc()) {
      $tags[$contador]['descricao'] = $row["descricao"];
      $tags[$contador]['idtag'] = $row["id_tag"];
      $tags[$contador]['hexabg'] = $row["hexabg"];
      $tags[$contador]['hexatxt'] = $row["hexatxt"];

      $contador = $contador + 1;
  }


  return $tags;

  $query->free();
  $conexao->close();
};



function CriarOrcamento(){
    gerarlog("CriarOrcamento","inicio");
    $conexao = conectar();
    $idunico = uniqid();
    $query = "INSERT INTO `Pedido` VALUES (NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'orcamento','$idunico')";

    if ($conexao->query($query) === TRUE) {
        return $idunico;
    } else {
       echo "Erro:" . $conexao->error;
    };
    $conexao->close();
    gerarlog("CriarOrcamento","fim");
};
