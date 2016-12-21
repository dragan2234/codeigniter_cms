<h3><?php echo empty($page->id) ? 'Add a new page' : 'Edit page ' . $page->title; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Parent</td>
		<td><?php echo form_dropdown('parent_id', $pages_no_parents, $this->input->post('parent_id') ? $this->input->post('parent_id') : $page->parent_id); ?></td>
	</tr>
	<tr>
	<tr>
		<td>template</td>
		<td><?php echo form_dropdown('template', array('page'=>'page', 'news_archive'=>'news_archive', 'homepage'=>'homepage'), $this->input->post('template') ? $this->input->post('template') : $page->template); ?></td>
	</tr>
	<tr>
		<td>title</td>
		<td><?php echo form_input('title', set_value('title', $page->title)); ?></td>
	</tr>
	<tr>
		<td>slug</td>
		<td><?php echo form_input('slug', set_value('slug', $page->slug)); ?></td>
	</tr>
	<tr>
		<td>Body</td>
				<td><?php echo form_textarea('body', set_value('body', $page->body)); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?> 
