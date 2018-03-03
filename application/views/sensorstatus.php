<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
	<div class="header"></div>
	<div class="container-fluid">
		<div class="row">
			<!-- nav bar -->
			<div class="col-lg-2" style="padding:0;">
				<div>
					<!--scroll bar-->
					<nav>
						<ul class="side-nav">
							<li class="side-nav-link-panel">
								<a class="side-nav-link" href="Welcome">map</a>
							</li>
							<li class="side-nav-link-panel">
								<a  class="side-nav-link">report</a>
							</li>
							<li class="side-nav-link-panel">
								<a class="side-nav-link">chart</a>
							</li>
							<li class="side-nav-link-panel">
								<a class="side-nav-link" href = "Sensor">status</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>

			<!--details-->
			<div class="col-lg-10 row">
				
			</div>


			<!-- <hr />
				<footer>
					<div class="container-fluid">
						<p>&copy; @DateTime.Now.Year - Logical Supporting Logistic System</p>
					</div>
				</footer> -->

			<div class="container-fluid">Page rendered in
				<strong>{elapsed_time}</strong> seconds.
				<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
			</div>
		</div>
	</div>
</body>



</html>