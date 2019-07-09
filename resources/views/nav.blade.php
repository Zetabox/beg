<nav class="navbar navbar-default " role="navigation">
			<div class="container">
				<!-- TOPBAR -->
				<div class="topbar">
					<ul class="list-inline top-nav">
						<li>
							<div class="btn-group">
								<button type="button" class="btn btn-link dropdown-toggle btn-xs" data-toggle="dropdown"><img src="assets/img/flags/{{ Session::get('language') }}.png" alt="United Kingdom"> <samp class="text-uppercase">{{ Session::get('language')}}</samp> <span class="caret"></span></button>
								<ul class="dropdown-menu dropdown-menu-right country-selector" role="menu">
									<li>
										<a href="/lang/en"><img src="assets/img/flags/en.png" alt="United Kingdom"> EN</a>
									</li>
									<li>
										<a href="/lang/de"><img src="assets/img/flags/de.png" alt="Japan"> DE</a>
									</li>
									<li>
										<a href="lang/fr"><img src="assets/img/flags/fr.png" alt="China"> FR</a>
									</li>
								</ul>
							</div>
						</li>
						<!-- <li><a href="#">Help</a></li>
						<li><a href="#">Support</a></li> -->
					</ul>
				</div>
				<!-- END TOPBAR -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
						<span class="sr-only">Toggle Navigation</span>
						<i class="fa fa-bars"></i>
					</button>
					<a href="#" class="navbar-brand navbar-logo navbar-logo-bigger">
						<img src="assets/img/logo/logo-beg-nav.png" alt="Repute - Responsive Multipurpose Bootstrap Theme">
					</a>
				</div>
				<!-- MAIN NAVIGATION -->
				<div id="main-nav" class="navbar-collapse collapse navbar-mega-menu">
					{!! menu('front','menu.default') !!}
				</div>
				<!-- END MAIN NAVIGATION -->
			</div>
		</nav>