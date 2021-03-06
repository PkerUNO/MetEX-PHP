<?php $this->assign('title', 'Error'); ?>
<div class="jumbotron">
	<div class="container">
		<h1>Error 404</h1>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3><?php echo $name; ?></h3>
				</div>
				<div class="panel-body">
					<p><?php printf(__d('cake', 'The requested address %s was not found on this server.'), "<strong>'{$url}'</strong>"); ?></p>
				</div>
			</div>
		</div>
	</div>
	<?php
	if (Configure::read('debug') > 0):
	?>
	<div class="row">
		<div class="col-sm-12">
			<?php echo $this->element('exception_stack_trace'); ?>
		</div>
	</div>
	<?php
	endif;
	?>
</div>
