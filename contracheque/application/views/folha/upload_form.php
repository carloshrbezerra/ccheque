<?php echo $error;?>

<?php echo form_open_multipart('folha/upload');?>

	Arquivo: 
	<input type="file" name="userfile" size="20" data-filename-placement="inside"/>
	
	<br /><br />
	
	<input type="submit" value="Importar" />

</form>
