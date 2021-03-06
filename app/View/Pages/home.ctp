<div class="jumbotron line-7">
	<div class="container">
		<h1>mét<strong>ex</strong></h1>
		<p>The Paris Métro Experience</p>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-4">
			<?php echo $this->Html->image('/media/images/stations/16/thumb_6-3.jpg', array('alt' => 'Bercy station on Line 14', 'class' => 'img-responsive')); ?>
		</div>
		<div class="col-sm-8">
			<p>The Paris Métro is one of the oldest underground railway systems in the world. For over 100 years it has carried locals and foreigners alike around what is arguably Europe's most beautiful capital city. But whether you use it every day or have never even been, the Paris Métro is full of interesting architecture, great views, and hidden secrets.</p>
			<p>MétEX is a virtual tour designed to recreate the experiences associated with travelling on the Métro.</p>
			<p>Whatever you choose to do in MétEX, I hope that it either brings back memories or increases your desire to visit. Please have fun and enjoy your visit!</p>
			<p>Please begin your tour by <?php echo $this->Html->link('selecting a line', array('controller' => 'lines', 'action' => 'index')); ?>.</p>
		</div>
	</div>
</div>
