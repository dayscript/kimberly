<?
	/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/
	$lan = isset( $_SESSION[ "language" ] ) ? $_SESSION[ "language" ] : "es";

	$campsForm = array(

		0 => array(
			"es" => "Nombre",
			"en" => "Name",
			"validation_es" => "Debe ingresar su nombre",
			"validation_en" => "Name plase!"
		),

		1 => array(
			"es" => "Apellido",
			"en" => "Surname",
			"validation_es" => "Debe ingresar su apellido!",
			"validation_en" => "Surname plase!"
		),

		2 => array(
			"es" => "Direcci&oacute;n",
			"en" => "Address",
			"validation_es" => "Debe ingresar su direcci�n!",
			"validation_en" => "Address plase!"
		),

		3 => array(
			"es" => "Direcci&oacute;n",
			"en" => "Address",
			"validation_es" => "Debe ingresar su direcci�n!",
			"validation_en" => "Address plase!"
		),

		3 => array(
			"es" => "N&uacute;mero de identificaci&oacute;n",
			"en" => "ID",
			"validation_es" => "Debe ingresar su n&uacute;mero de identificaci&oacute;n!",
			"validation_en" => "Address plase!"
		),

		4 => array(
			"es" => "Tel&eacute;fono",
			"en" => "Phone",
			"validation_es" => "Debe ingresar su n&uacute;mero de tel�fono!",
			"validation_en" => "Phone plase!"
		),

		5 => array(
			"es" => "Ciudad",
			"en" => "City",
			"validation_es" => "Debe ingresar su ciudad!",
			"validation_en" => "City plase!"
		),

		6 => array(
			"es" => "E-mail",
			"en" => "E-mail",
			"validation_es" => "Debe ingresar su E-mail!",
			"validation_en" => "E-mail plase!"
		),

		7 => array(
			"es" => "Comentario",
			"en" => "Comment",
			"validation_es" => "Debe ingresar su Comentario!",
			"validation_en" => "Comment plase!"
		),

		8 => array(
			"es" => "Digite los caracteres de la imagen",
			"en" => "Type the characters of the image",
			"validation_es" => "Debe ingresar los caracteres",
			"validation_en" => "Please provide the information"
		),

		9 => array(
			"es" => "en la casilla",
			"en" => "in the box."
		),

		10 => array(
			"es" => "Clic ac&aacute; si no identifica la imagen.",
			"en" => "Click here if image not displaying correctly."
		)

	);

	try {

		$firstname = strip_tags( trim( urldecode( $_POST["firstname"] )));
		$lastname = strip_tags( trim( urldecode( $_POST["lastname"] )));
		$email = strip_tags( trim( urldecode( $_POST["email"] )));
		$city = strip_tags( trim( urldecode( $_POST["city"] )));
		$phone = strip_tags( trim( urldecode( $_POST["phone"] )));
		$identification = strip_tags( trim( urldecode( $_POST["identification"] )));
		$address = strip_tags( trim( urldecode( $_POST["address"] )));
		$message = strip_tags( trim( urldecode( $_POST["message"] )));

		if (isset ($_REQUEST["update"]) && !empty ($_REQUEST["update"]))	{

			if( isset( $SESSION["security.captcha.image"] ) && isset( $_REQUEST["eyeshield"] ) && $SESSION["security.captcha.image"] == strtolower( $_REQUEST["eyeshield"] ) )	{

				require_once (dirname (dirname (dirname (__FILE__))) . "/source/intranet/util/IntranetProperties.class.php" );

				require_once ( URL_HOME . "source/external/phpmailer/class.phpmailer.php" );
				$mailer = new PHPMailer ( );

				$mailer->From 	= "Contactenos www.globalcdb.com <contactenos@globalcdb.com>";
				$mailer->FromName 	= ucwords (strtolower ($firstname . " " . $lastname));
				$mailer->Sender 	= "contactenos@globalcdb.com";
				
				$mailer->AddReplyTo ($email, $mailer->FromName);

				$mailer->Subject = "Contactenos - Global Securities";
				$mailer->isHTML( true );

				if(!strstr($_SERVER['HTTP_USER_AGENT'],'DayDev') ){

				/*
				$mailer->AddAddress( "veronica.rodriguez@globalcdb.com", "veronica.rodriguez@globalcdb.com" );
				$mailer->AddAddress( "aortiz@globalcdb.com", "aortiz@globalcdb.com" );
				$mailer->AddAddress( "servicioalcliente@globalcdb.com", "servicioalcliente@globalcdb.com" );
				$mailer->AddAddress( "sarlaft@globalcdb.com", "sarlaft@globalcdb.com" );
				$mailer->AddAddress( "soporte@globalcdb.com", "soporte@globalcdb.com" );
				*/
				//$mailer->AddAddress( "contactenos@globalcdb.com", "contactenos@globalcdb.com" );
				$mailer->AddAddress( "contactenos@globalcdb.com", "contactenos@globalcdb.com" );
				//$mailer->AddAddress( "aacevedo@dayscript.com", "aacevedo@dayscript.com" );


				//$mailer->AddAddress( "clandazabal@dayscript.com", "clandazabal@dayscript.com" );
				//$mailer->AddAddress( "acadena@dayscript.com", "acadena@dayscript.com" );
				//$mailer->AddAddress( "antorres@dayscript.com", "antorres@dayscript.com" );
				//$mailer->AddAddress( "afarfan@dayscript.com", "afarfan@dayscript.com" );

				}

				$htmlText = "" .
					"<html>" .
					"<head>" .
					"	<title>Global Securities</title>" .
					"	<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>" .
					"	<style>" .
					"		.tetboldblanco { " .
					"			font-face: Arial;" .
					"			color: #FFFFFF;" .
					"			font-style: bold;" .
					"		}" .
					"	</style>" .
					"</head>" .
					"<body>" .
					"<table width='541' border='0' align='center' cellpadding='0' cellspacing='0' class='marcogris1'>" .
					"<tr>" .
					"	<td bgcolor='#3D6895'><a href='" . INTRA_BASE_HOST. "'><img src='" . INTRA_BASE_HOST . "/tgsg/site/imagenes/logo_mail.jpg' border='0'></a></td>" .
					"</tr>" .
					"</table>" .
					"<table width='583'  border='0' align='center' cellpadding='0' cellspacing='15' bgcolor='#FFFFFF' class='marcogris1'>" .
					"<tr>" .
					"	<td bgcolor='#5884B1' align='center' class='ind_titulo'>Cont&aacute;ctenos - Global Securities</td>" .
					"</tr>" .
					"<tr>" .
					"	<td align='center' class='texto'>" .
					"		<table width='100%' border='0' align='center' cellPadding='3' cellSpacing='0' bordercolor='#FFFFFF' bgColor='#F3F3F3'>" .
					"		<tr>" .
					"			<td width='43%' class='tex_form' align='right'>" . $campsForm[ 0 ][ $lan ] . "</td>" .
					"			<td width='3%'>&nbsp;</td>" .
					"			<td width='54%' align='left' class='texto'>" .  $firstname  . "</td>" .
					"		</tr>" .
					"		<tr>" .
					"			<td width='43%' class='tex_form' align='right'>" . $campsForm[ 1 ][ $lan ] . ":</td>" .
					"			<td width='3%'>&nbsp;</td>" .
					"			<td width='54%' align='left' class='texto'>" . $lastname . "</td>" .
					"		</tr>" .
					"		<tr>" .
					"			<td width='43%' class='tex_form' align='right'>" . $campsForm[ 6 ][ $lan ] . ":</td>" .
					"			<td width='3%'>&nbsp;</td>" .
					"			<td width='54%' align='left' class='texto'>" . $email . "</td>" .
					"		</tr>" .
					"		<tr>" .
					"			<td width='43%' class='tex_form' align='right'>" . $campsForm[ 5 ][ $lan ] . ":</td>" .
					"			<td width='3%'>&nbsp;</td>" .
					"			<td width='54%' align='left' class='texto'>" . $city . "</td>" .
					"		</tr>" .
					"		<tr>" .
					"			<td width='43%' class='tex_form' align='right'>" . $campsForm[ 4 ][ $lan ] . ":</td>" .
					"			<td width='3%'>&nbsp;</td>" .
					"			<td width='54%' align='left' class='texto'>" . $phone . "</td>" .
					"		</tr>" .
					"		<tr>" .
					"			<td width='43%' class='tex_form' align='right'>" . $campsForm[ 2 ][ $lan ] . ":</td>" .
					"			<td width='3%'>&nbsp;</td>" .
					"			<td width='54%' align='left' class='texto'>" . $address . "</td>" .
					"		</tr>" .
					"		<tr>" .
					"			<td width='43%' class='tex_form' align='right'>" . $campsForm[ 3 ][ $lan ] . ":</td>" .
					"			<td width='3%'>&nbsp;</td>" .
					"			<td width='54%' align='left' class='texto'>" . $identification . "</td>" .
					"		</tr>" .
					"		</table>" .
					"	</td>" .
					"</tr>" .
					"<tr>" .
					"	<td bgcolor='#5884B1' align='center' class='tetboldblanco'>" . $campsForm[ 7 ][ $lan ] . "</td>" .
					"</tr>" .
					"<tr>" .
					"	<td align='left' class='ind_titulo' bgColor='#F3F3F3'>" . $message . "</td>" .
					"</tr>" .
					"</table>" .
					"</body>" .
					"</html>";

				$mailer->Body = $htmlText;
				$mailer->SetLanguage( "es", URL_HOME . "source/external/phpmailer/" );
				if(!$mailer->Send()) {

				echo "Mailer Error: " . $mailer->ErrorInfo;

				} else {
				echo "Message sent!";

}


			//if(!strstr($_SERVER['HTTP_USER_AGENT'],'DayDev') ){

				if($firstname != '' && $lastname != '' && $email  != '' && $city != '' && $phone != ''
					&& $address != '' && $identification != '' && $message != '')
				{
					$db = DataBaseFactory::getInstance( DATABASE_TYPE );



					$sql = "INSERT INTO informacion_contactenos (nombre, apellido, direccion, cedula, telefono_celular, ciudad, email, comentario)
							VALUES ('". mysql_real_escape_string($firstname) ."', '". mysql_real_escape_string($lastname) ."', '". mysql_real_escape_string($address) ."', '". mysql_real_escape_string($identification) ."',
							'". mysql_real_escape_string($phone)."', '". mysql_real_escape_string($city)."', '". mysql_real_escape_string($email)."', '". mysql_real_escape_string($message)."') ";

					$db->db_query( $sql, false, null );





				}
		//}
			}
			else	{
				echo '<b style="color:red">Verificaci&oacute;n visual incorrecta.</b>';
			}

		}
	} catch (Exception $exc){}

	unset( $SESSION["security.captcha.image"] );
?>
<script>
	function validate ( )	{

		RegExPattern = /^(?:\+|-)?\d+$/;

		if ( document.getElementById ( 'firstname' ).value.length == 0 )	{
			alert ( '<?= $campsForm[ 0 ][ "validation_" . $lan ] ?>!' );
			document.getElementById ( 'firstname' ).focus ( );
		}
		else if ( document.getElementById ( 'lastname' ).value.length == 0 )	{
			alert ( '<?= $campsForm[ 1 ][ "validation_" . $lan ] ?>' );
			document.getElementById ( 'lastname' ).focus ( );
		}
		else if ( document.getElementById ( 'address' ).value.length == 0 )	{
			alert ( '<?= $campsForm[ 2 ][ "validation_" . $lan ] ?>!' );
			document.getElementById ( 'address' ).focus ( );
		}
		else if ( !document.getElementById ( 'identification' ).value.match(RegExPattern) )	{
			alert ( '<?= $campsForm[ 3 ][ "validation_" . $lan ] ?>!' );
			document.getElementById ( 'identification' ).focus ( );
		}
		else if ( !document.getElementById ( 'phone' ).value.match(RegExPattern) )	{
			alert ( '<?= $campsForm[ 4 ][ "validation_" . $lan ] ?>!' );
			document.getElementById ( 'phone' ).focus ( );
		}
		else if ( document.getElementById ( 'city' ).value.length == 0 )	{
			alert ( '<?= $campsForm[ 5 ][ "validation_" . $lan ] ?>!' );
			document.getElementById ( 'city' ).focus ( );
		}
		else if ( document.getElementById ( 'email' ).value.match( /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/ ) )	{
			alert ( '<?= $campsForm[ 6 ][ "validation_" . $lan ] ?>!' );
			document.getElementById ( 'email' ).focus ( );
		}
		else if ( document.getElementById ( 'message' ).value.length == 0 )	{
			alert ( '<?= $campsForm[ 7 ][ "validation_" . $lan ] ?>!' );
			document.getElementById ( 'message' ).focus ( );
		}
		else if ( document.getElementById ( 'eyeshield' ).value == '' )	{
			alert ( '<?= $campsForm[ 8 ][ "validation_" . $lan ] ?>' );
			document.getElementById ( 'eyeshield' ).focus ( );
		}
		else document.getElementById ( 'form' ).submit ( );
	}

	function validateEmail ( email )	{
		var pos = 0;
		if ( email.length > 7 && email.indexOf ( ' ', 0 ) == -1 )	{
			pos = email.indexOf ( '@', 0 );
			if ( pos > 1 && email.indexOf ( '@', pos ) && email.indexOf ( '.', pos ) > ( pos + 3 ) )	{
				pos = email.indexOf ( '.', pos );
				if ( pos > -1 && pos < email.length - 3 )
					return true;
			}
		}
		return false;
	}

	function recaptcha( )	{
		document.getElementById ( 'pincaptcha' ).src += '&amp=' + Math.random( ) + '=';
	}


	function clearForm(){
	}
</script>
<form name="form" id="form" action="/index.php?page=<?= $REQUEST["page"] ?>&idFile=<?= $REQUEST["idFile"] ?>" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="32" valign="bottom" align="center">

                          <table width="570" border="0" cellspacing="0" cellpadding="0">
<?
	if (isset ($_REQUEST["update"]) && !empty ($_REQUEST["update"]))	{
?>
				<tr>
					<td bgcolor="#3b6a9c" align="center" class="ind_titulo" style="color: #FFF">Contacto enviado</td>
				</tr>
				<tr>
					<td class="textgral">
						<table width="100%" border="0" align="center" cellPadding="3" cellSpacing="0" bordercolor="#FFFFFF" bgColor="#F3F3F3">
						<tr>
							<td class="texto" align="center">
								Gracias por sus comentarios
							</td>
						</tr>
						</table>
					</td>
				</tr>
<?
	}
?>
                            <tr>
                              <td align="center">
								<table border="0" cellspacing="0" cellpadding="2" align="center">
                                <tr>

                                  <td colspan="5">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="right" class="tex_form"><div align="right"><span style="color: #C40000">*</span><?= $campsForm[ 0 ][ $lan ] ?></div></td>
                                  <td width="1">&nbsp;</td>
                                  <td colspan="3" align="left"><input type="text" name="firstname" id="firstname" style="width: 160px;"></td>
                                </tr>
                                <tr>

                                  <td class="tex_form"><div align="right"><span style="color: #C40000">*</span><?= $campsForm[ 1 ][ $lan ] ?></div></td>
                                  <td>&nbsp;</td>
                                  <td colspan="3" align="left"><input type="text" name="lastname" id="lastname" style="width: 160px;"></td>
                                </tr>
                                <tr>
                                  <td class="tex_form"><div align="right"><span style="color: #C40000">*</span><?= $campsForm[ 2 ][ $lan ] ?></div></td>
                                  <td>&nbsp;</td>

                                  <td colspan="3" align="left"><input type="text" name="address" id="address" style="width: 160px;"></td>
                                </tr>
                                <tr>
                                  <td class="tex_form"><div align="right"><span style="color: #C40000">*</span><?= $campsForm[ 3 ][ $lan ] ?></div></td>
                                  <td>&nbsp;</td>

                                  <td colspan="3" align="left"><input type="text" name="identification" id="identification" style="width: 160px;"></td>
                                </tr>
                                <tr>
                                  <td class="tex_form"><div align="right"><span style="color: #C40000">*</span><?= $campsForm[ 4 ][ $lan ] ?></div></td>
                                  <td>&nbsp;</td>
                                  <td colspan="3" align="left"><input type="text" name="phone" id="phone" style="width: 160px;"></td>
                                </tr>
                                <tr>

                                  <td class="tex_form"><div align="right"><span style="color: #C40000">*</span><?= $campsForm[ 5 ][ $lan ] ?></div></td>
                                  <td>&nbsp;</td>
                                  <td colspan="3" align="left"><input type="text" name="city" id="city" style="width: 160px;"></td>
                                </tr>
                                <tr>
                                  <td class="tex_form"><div align="right"><span style="color: #C40000">*</span><?= $campsForm[ 6 ][ $lan ] ?></div></td>
                                  <td class="tex_form">&nbsp;</td>
                                  <td colspan="3" align="left" class="tex_form"><input type="text" name="email" id="email" style="width: 160px;"></td>

                                </tr>
                                <tr>
                                  <td valign="top" class="tex_form"><div align="right"><span style="color: #C40000">*</span><?= $campsForm[ 7 ][ $lan ] ?></div></td>
                                  <td>&nbsp;</td>
                                  <td colspan="3" align="left"><textarea name="message" id="message" rows="5" cols="24"></textarea></td>
                                </tr>
								<tr>
									<td class="tex_form" colspan="5">
										<?= $campsForm[ 8 ][ $lan ] ?> <img id="pincaptcha" src="/services/?action=generate&amp;service=security.captcha.image&amp;rand=<?= rand( 1000, 9999 ) ?>" height="30" width="100" alt="" /> <?= $campsForm[ 9 ][ $lan ] ?> <input name="eyeshield" type="text" id="eyeshield" style="width:60px;" />.
										<br />
										<em><a class="link" href="#" onclick="recaptcha( ); return false;"><?= $campsForm[ 10 ][ $lan ] ?></a></em>
										<br />
										<br />
									</td>
								</tr>
                                <tr>
                                  <td colspan="5" align="center">
										<a href="javascript:validate()">
										<? if( $lan == "es" ){ ?>
											<img src="https://www.globalcdb.com/tgsg/site/imagenes/bot_enviar.jpg" width="50" height="18" border="0">
										<? }else{ ?>
											<img src="https://www.globalcdb.com/site/images/SEND.jpg" width="50" height="18" border="0">
										<? } ?>
										</a>

										<a href="javascript:clearForm()">
										<? if( $lan == "es" ){ ?>
											<img src="https://www.globalcdb.com/tgsg/site/imagenes/bot_borrar.jpg" width="50" height="18" border="0">
										<? }else{ ?>
											<img src="https://www.globalcdb.com/site/images/DELETE.jpg" width="50" height="18" border="0">
										<? } ?>
										</a>
								  </td>
                                </tr>
                              </table>
                              <br /><br />
                              </td>
                            </tr>
                          </table></td>
                </tr>
            </table>
<input type="hidden" name="update" value="true">
</form>