<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{title_for_layout}</title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/style.css" />
	
	{css_for_layout}
	
    <!-- Bootstrap -->
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    
    
    <div class="container">
    
    		<header class="navbar-inverse">
  
			    <div class="navbar-inner">
			       <?php echo anchor('home/logout', 'Sair'); ?>
			            
			    </div>
    		</header>
    	
    		
    		<div class="content">
    		
    
				   	<!-- MENU NAVEGAÇÃO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
				   	<nav class="nav_menu">  
				            <div class="panel-group" id="accordion">
				                <div class="panel panel-default">
				                    <div class="panel-heading">
				                        <h4 class="panel-title">
				                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
				                            </span> Administracao</a>
				                        </h4>
				                    </div>
				                    <div id="collapseOne" class="panel-collapse collapse in">
				                        <div class="panel-body">
				                            <table class="table"> 
				                                <tr>
				                                    <td>
				                                        <span class="glyphicon glyphicon-pencil text-primary"></span><?php echo anchor('colaborador/index', 'Importacao Colaboradores'); ?> 
				                                    </td>
				                                </tr>
				                                <tr>
				                                    <td>
				                                        <span class="glyphicon glyphicon-pencil text-primary"></span><?php echo anchor('folha/index', 'Importacao Folha Pagamento	'); ?>
				                                    </td>
				                                </tr>
				                                
				                                <tr>
				                                    <td>
				                                        <span class="glyphicon glyphicon-pencil text-primary"></span><?php echo anchor('colaborador/listar', 'Colaboradores'); ?>
				                                    </td>
				                                </tr>
				                            </table>
				                        </div>
				                    </div>
				                </div>
				                
				                
				                <div class="panel panel-default">
				                    <div class="panel-heading">
				                        <h4 class="panel-title">
				                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
				                            <span class="glyphicon glyphicon-th"></span> Contra Cheque</a>
				                        </h4>
				                    </div>
				                    <div id="collapseTwo" class="panel-collapse collapse">
				                        <div class="panel-body">
				                            <table class="table">
				                                <tr>
				                                    <td>
				                                        <a href="#"> Meu Contra Cheque</a>
				                                    </td>
				                                </tr>
				                                <tr>
				                                    <td>
				                                        <a href="#"> Meu Perfil</a>
				                                    </td>
				                                </tr>
				            
				                            </table>
				                        </div>
				                    </div>
				                </div>
		
					</nav>
					<!--END MENU NAVEGAÇÃO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
					
					<div class="content-title">
						<h3>{title_for_layout}</h3>
					</div>
					
					<div class="content_body">
						{content_for_layout}
					</div>
			
			</div>

	</div>

	
	


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {js_for_layout}
  
  </body>
</html>