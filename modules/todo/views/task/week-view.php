<div>
	<h3>Widok tygodnia</h3>
	<table class="table table-stripped">
		<thead>
			<th>Poniedziałek</th>
			<th>Wtorek</th>
			<th>Środa</th>
			<th>Czwartek</th>
			<th>Piątek</th>
			<th>Sobota</th>
			<th>Niedziela</th>
		</thead>
		<tbody>
			<?php foreach ($tasks as $task): ?>
			<tr>
				<?php for ($i = 1; $i < date('N', strtotime($task['start_date'])); $i++): ?>
				<td>&nbsp;</td>
				<?php endfor; ?>

				<td>
					<?= $task['start_time'] ?> - <?= $task['end_time'] ?>&nbsp;&nbsp;
					<a href="/todo/task/view?id=<?= $task['id'] ?>"><?= substr($task['description'], 0, 100); ?></a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
