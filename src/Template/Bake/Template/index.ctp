<?php $this->Html->addCrumb(__("<%= ucfirst($pluralHumanName) %>") , ['controller' => '<%= ucfirst($pluralVar) %>' , 'action' => 'index']); ?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title"><h3><?php echo (isset($page_title) ? $page_title : ""); ?></h3></div>
			</div>
			<div class="panel-body">
				<p><?php echo $this->Html->link(__("Add New <%= ucfirst($pluralHumanName) %>") , array("controller" => "<%= ucfirst($pluralVar) %>" , "action" => "add") , array("class" => "btn btn-default")); ?></p>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
				<%	foreach ($fields as $field) { %>
				<th><?php echo __("<%= ucfirst(str_replace("_" , " " , $field)) %>"); ?></th>
				<% } %>
				<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($<%= $pluralVar %> as $<%= $singularVar %>) {?>
							<tr>
<%        foreach ($fields as $field) {
            $isKey = false;
            if (!empty($associations['BelongsTo'])) {
                foreach ($associations['BelongsTo'] as $alias => $details) {
                    if ($field === $details['foreignKey']) {
                        $isKey = true;
%>
                <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
<%
                        break;
                    }
                }
            }
            if ($isKey !== true) {
                if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
%>
                <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
<%
                } else {
%>
                <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
<%
                }
            }
        }

        $pk = '$' . $singularVar . '->' . $primaryKey[0];
%>
				<td>
									<div class="btn-group">
									<?php echo $this->Html->link(__("Edit") , array("action" => "edit" , $<%= $singularVar %>->id) , array("class" => "btn btn-default btn-xs"));?>
									<?php echo $this->Html->link(__("Delete") , array("action" => "delete" , $<%= $singularVar %>->id) , array("class" => "btn btn-danger btn-xs" , "confirm" => "Confirm delete ?"));?>
									</div>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<div class="paginator">
						<ul class="pagination pagination-sm">
						<?php echo $this->Paginator->first(__('First')) ?>
						<?php echo $this->Paginator->numbers() ?>
						<?php echo $this->Paginator->last(__('Last')) ?>
						</ul>
						<span class="pull-right well well-sm"> <?php echo $this->Paginator->counter(__("Show record").' {{start}} '.__("to").' {{end}} '.__("from").' {{count}} '.__("record"));?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>