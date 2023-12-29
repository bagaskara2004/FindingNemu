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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>
<div id="script"></div>

</html>