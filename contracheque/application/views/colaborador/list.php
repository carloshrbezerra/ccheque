<?php ?>

<script>

function cpf(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                                             //de novo (para o segundo bloco de números)
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
    return v
}
	
</script>

<div class="span7">
<div class="widget stacked widget-table action-table">

<div class="widget-header">
<i class="icon-th-list"></i>
<h3>Colaboradores</h3>
</div> <!-- /widget-header -->

<div class="widget-content">
			
<table class="table table-striped table-bordered">
						
						<thead>
							<tr>
								<th>Matricula</th>
								<th>Nome</th>
								<th>Cargo</th>
								<th>CPF</th>
								<th>Valor Provento</th>
								<th class="td-actions">Acao</th>
							</tr>
						</thead>
								
								
								
								<tbody>
								 <?php
    								foreach ($colaboradores as $c):
    							 ?>
								<tr>
								
										<td><?php echo $c->matricula; ?></td>
										<td><?php echo $c->nome; ?></td>
										<td><?php echo $c->cargo; ?></td>
										<td><?php echo  substr($c->cpf, 0,3) . "." . substr($c->cpf, 3,3) . "." . substr($c->cpf, 6,3) . "-" . substr($c->cpf, 9,11);?></td>
										<td><?php echo 'R$ ' . number_format($c->valor_provento, 2, ',', '.'); ?></td>
										
										
										
										
										<td class="td-actions">
											<a href="javascript:;" class="btn btn-small btn-primary">
													<i class="btn-icon-only icon-ok"></i>
											</a>
										</td>
								</tr>
								<?php  endforeach; ?>

							</tbody>
							

							
							
							</table>
								
							</div> <!-- /widget-content -->
								
							</div> <!-- /widget -->
							</div>
							
							<div class="paginacao">
             <?php echo $paginacao; ?>
             <?php echo (isset($pagination)) ? $pagination : ''; ?>
             <?php printf('<div class="paginacao clearfix"> paginacao: %s </div>', $this->pagination->create_links()); ?>
             
         </div>