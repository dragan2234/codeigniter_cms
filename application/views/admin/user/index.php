<section>
	<h2>
		Users
	</h2>
	<?php echo anchor('admin/user/edit', '<i class= "icon-plus"</i> ADD A USER'); ?>
	<table class="table table-stripped">
		<thead>
			<tr>
				<th>email</th>
				<th>edit</th>
				<th>delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($users)): foreach($users as $user): ?>
		
			<tr>
				<td><?php echo anchor('admin/user/edit/' . $user->id, $user->email); ?></td>
				<td>
					<?php echo btn_edit('admin/user/edit/'. $user->id); ?>
				</td>
				<td>
					<?php echo btn_delete('admin/user/delete/'. $user->id);  ?>
				</td>
			</tr>
					<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="3">We could not find any users.</td>
			</tr>
		<?php endif; ?>
		</tbody>
	</table>
</section>