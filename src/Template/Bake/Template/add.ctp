<?php $this->Html->addCrumb(__("<%= ucfirst($pluralHumanName) %>") , ['controller' => '<%= ucfirst($pluralVar) %>' , 'action' => 'index']); ?>
<?php $this->Html->addCrumb(__("Add New <%= ucfirst($pluralHumanName) %>") , ['controller' => '<%= ucfirst($pluralVar) %>' , 'action' => 'add']); ?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title"><h3><?php echo (isset($page_title) ? $page_title : ""); ?></h3></div>
			</div>
			<div class="panel-body">
				<?php echo $this->Form->create($<%= $singularVar %>); ?>
		<%	foreach ($fields as $field) {
		if(!in_array($field , $primaryKey)) {
		%>
		<?php echo $this->Form->input("<%= $field %>"); ?>
		<% }} %>
		<?php echo $this->Form->submit(__("Submit")); ?>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>