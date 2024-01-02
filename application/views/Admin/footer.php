<?php if ($this->session->userdata('nama_admin') == '') {
	redirect('Cauth/login', 'refresh');
}
?>
<footer class="content-footer footer bg-footer-theme">
	<div class="container-xxl">
		<div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
			<div>
				<img src="<?= base_url('asset/img/logo.png') ?>" alt="findingnemu" style="width: 80px;" class="img-fluid">
				• Copyright ©
				<script>
					document.write(new Date().getFullYear());
				</script>
				Finding Nemu PNB
			</div>
			<div>
				<a href="#" class="footer-link me-4" target="_blank"><i class="bi bi-facebook"></i></a>
				<a href="#" target="_blank" class="footer-link me-4"><i class="bi bi-twitter"></i></a>
				<a href="#" target="_blank" class="footer-link d-none d-sm-inline-block"><i class="bi bi-github"></i></a>
			</div>
		</div>
	</div>
</footer>
</div>
</div>
<!--End of Datatable-->
<!--Sidebar toggler-->
<script>
	const sidebarToggle = document.querySelector("#sidebar-toggle");
	sidebarToggle.addEventListener("click", function() {
		document.querySelector("#sidebar").classList.toggle("collapsed");
		document.querySelector("#nav-logo").classList.toggle("collapsed");
	});
</script>

<script>
	$(document).ready(function() {
		let location = $lokasi;

		let isSearching = false;

		data_item();

		$('#search').on('input', function() {
			$('button i.bi').addClass('bi-x-lg');
			if ($('#search').val() == "") {
				$('button i.bi').removeClass('bi-x-lg');

				isSearching = false;
			} else {

				isSearching = true;
			}
			data_item();
		});

		$('#btnSearch').on("click", function() {
			$('#search').val("");
			$('button i.bi').removeClass('bi-x-lg');

			isSearching = false;
			data_item();
		});

		$("#search").on('keypress', function(e) {
			if (e.keyCode == 13) {
				window.scrollTo(0, 300);
			}
		});

		function data_item() {
			$.ajax({
				url: '<?= base_url() ?>/Cadmin/search',
				method: 'post',
				data: {
					cari: $('#search').val(),
					lokasi: location
				},
				success: function(data) {

					if (isSearching) {
						$('#content').html(data);
					} else {

						$('#content').html('');
					}
				}
			});
		}
	});
</script>


</body>

</html>