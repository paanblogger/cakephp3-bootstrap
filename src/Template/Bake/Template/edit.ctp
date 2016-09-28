<?php $this->Html->addCrumb(__("<%= ucfirst($pluralHumanName) %>") , ['controller' => '<%= ucfirst($pluralVar) %>' , 'action' => 'index']); ?>
<?php $this->Html->addCrumb(__("Edit <%= ucfirst($pluralHumanName) %>")); ?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title"><h3><?php echo (isset($page_title) ? $page_title : ""); ?></h3></div>
			</div>
			<div class="panel-body">
				<?php echo $this->Form->create($<%= $singularVar %>); ?>
        <?php
<%
        foreach ($fields as $field) {
            if (in_array($field, $primaryKey)) {
                continue;
            }
            if (isset($keyFields[$field])) {
                $fieldData = $schema->column($field);
                if (!empty($fieldData['null'])) {
%>
            echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'empty' => true]);
<%
                } else {
%>
            echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>]);
<%
                }
                continue;
            }
            if (!in_array($field, ['created', 'modified', 'updated'])) {
                $fieldData = $schema->column($field);
                if (in_array($fieldData['type'], ['date', 'datetime', 'time']) && (!empty($fieldData['null']))) {
%>
            echo $this->Form->input('<%= $field %>', ['empty' => true]);
<%
                } else {
%>
            echo $this->Form->input('<%= $field %>');
<%
                }
            }
        }
        if (!empty($associations['BelongsToMany'])) {
            foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
%>
            echo $this->Form->input('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>]);
<%
            }
        }
%>
        ?>
		<?php echo $this->Form->submit(__("Submit")); ?>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>