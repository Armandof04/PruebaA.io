 - <?=$this->tag->linkTo("index","Regresar"); ?>
<form action='' method='post'>
 <input type="hidden" name="<?php echo $this->security->getTokenKey() ?>"
                value="<?php echo $this->security->getToken() ?>"/>
	<table>
		<tr>
			<td>
				Usuario ID  <?=$this->tag->textField(['usuario_id','size'=>30] );?>  int
		    </td>
		</tr>
		<tr>
		 	<td>
				email   <?=$this->tag->textField(['email','size'=>30] );?> varchar
		   </td>
		</tr>
		<tr>
			<td>
				Nombre    <?=$this->tag->textField(['nombre','size'=>30] );?> varchar
		    </td>
		 </tr>
		<tr>
			<td>
				Password    <?=$this->tag->textField(['password','size'=>30] );?> varchar
		<tr>
			<td>
				Activo    <?=$this->tag->textField(['activo','size'=>30] );?> varchar
			</td>
		<tr>
			<td>
				Fecha de Registro   <?=$this->tag->textField(['fecha_registro','size'=>30] );?> datetime
		    </td>
		</tr>
		<tr>
			<td>
				Fecha Login   <?=$this->tag->textField(['fecha_login','size'=>30] );?> datetime
		    </td>
		</tr>
		<tr>
			<td>
				Intento de Session    <?=$this->tag->textField(['intento_de_session','size'=>30] );?> int
		    </td>
		</tr>
		<tr>
			<td>
				Ultimo intento de session    <?=$this->tag->textField(['ultimo_intento_de_session','size'=>30] );?> bigint
		    </td>
		</tr>
		<tr>
			<td>
				Tiempo de session    <?=$this->tag->textField(['tiempo_session','size'=>30] );?> bigint
		    </td>
		</tr>
		<tr>
			<td>
				Usuario acivacion key    <?=$this->tag->textField(['usuario_activacion_key','size'=>30] );?>   varchar
		    </td>
		</tr>
		<tr>
			<td>
				usaurio activacion email   <?=$this->tag->textField(['usuario_activacoin_email','size'=>30] );?>  varchar
		    </td>
		</tr>
		<tr>
			<td>
				Usuario activacion contraseña    <?=$this->tag->textField(['usuario_activacoin_contrasena','size'=>30] );?>   varchar
		    </td>
		</tr>

		<tr>
			<td>
				<?=$this->tag->submitButton('Submit');?>
			</td>
		</tr>
	</table>
</form>