<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Sistema Contra Cheque Online - PMC</title>
   {css_for_layout}
 </head>
 <body>
       
    <div class="container">
    <div class="row_login">
      
            <h1 class="text-center login-title">Sistema Contra Cheque Online - PMC</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                 <?php echo validation_errors(); ?>
  				 <?php echo form_open('login/logar'); ?>
		                <input type="text" id="username" name="username" class="form-control" placeholder="Usuario" required autofocus>
		                <input type="password" id="passowrd" name="password" class="form-control" placeholder="Senha" required>
		                <button class="btn btn-lg btn-primary btn-block" type="submit">
		                   Entrar</button>
		                <label class="checkbox pull-left">
		                    <input type="checkbox" value="remember-me">
		                    Lembre-me
		                </label>
		                <a href="#" class="pull-right need-help">Necessita de Ajuda ? </a><span class="clearfix"></span>
                </form>
            </div>
            
        </div>
    
</div>
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {js_for_layout}
 </body>
</html>