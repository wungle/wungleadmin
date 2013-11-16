<div class="userRoles form">
	<?php echo $this->Form->create('UserRole'); ?>
		<fieldset>
			<legend><?php echo __('Admin Edit User'); ?></legend>
			<?php
				if($this->params['action'] === 'admin_edit') {
					echo $this->Form->input('id');
				}
				echo $this->Form->input('user_group_id');
				echo $this->Form->input('name');
			?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List User Roles'), array('controller' => 'user_roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Role'), array('controller' => 'user_roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
