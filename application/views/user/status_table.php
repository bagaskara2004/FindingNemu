<div class="container-fluid background-blue mt-5 ">
	<div class="container background-blue2 rounded daftar-barang pb-3" >
		<div class="table-status">
			<div class="card-header fs-5 fw-bold text-center responsive-font-example text-light p-3 " id="label">
				Status
			</div>
			<!--Table Content-->
			<div class="card">
				<div style="overflow-y: auto; overflow-x: auto;">
					<table class="card-table">
						<thead>
						<tr>
							<th>No</th>
							<th>Judul</th>
							<th>Status</th>
						</tr>
						</thead>
						<tbody>
						<?php
							$number =1;
							foreach ($result as $status):
							?>

						<tr>
							<td><?= $number; ?></td>
							<td><?= $status -> judul; ?></td>
							<th class="colorText"><?= $status -> info; ?></th>
						</tr>
						<?php
							$number++;
							endforeach;
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var els = document.getElementsByClassName('colorText');
	for (var i = 0; i < els.length; i++){
		var cell = els[i];

		if (cell.textContent === "menunggu") {
			cell.classList.remove('red');
			cell.classList.remove('yellow');
			cell.classList.add('green');
		}
		if (cell.textContent === "ditolak") {
			cell.classList.remove('green');
			cell.classList.remove('yellow');
			cell.classList.add('red');
		}
		if (cell.textContent === "diunggah") {
			cell.classList.remove('green');
			cell.classList.remove('red');
			cell.classList.add('yellow');
		}

	}
</script>
