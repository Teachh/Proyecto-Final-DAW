@extends('layouts.app')

@section('content')
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="hs-text">
								<h2><span>Dibujar</span> es para todo el mundo</h2>
								<p>Bienvenido a la plataforma de dibujo a partir de una imagen! Disfruta dibujando y viendo los dibujos de otra gente </p>
								<a href="{{ url('/register') }}" class="site-btn">Regístrate</a>
								<a href="#info" class="site-btn sb-c2">Obten más información</a>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="hr-img">
								<img src="img/draw_index.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Intro section -->
	<section id="info" class="intro-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-title">
						<h2>Únete a la red social de dibujo amateur!</h2>
					</div>
				</div>
				<div class="col-lg-6">
					<p>Escoge una imagen y dibujala a tu manera, los usuarios de esta plataforma podrán valorarte, al igual que tú! Intenta llegar al podio del ránquing para obtener recompensas!</p>
					<a href="#" class="site-btn">Regístrate</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->

	<!-- How section -->
	<section class="how-section spad set-bg" data-setbg="img/parrot_index.png" style="background-size:20rem;background-position: 100% 15%;">
		<div class="container text-white">
			<div class="section-title">
				<h2>Cómo funciona</h2>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="how-item">
						<div class="hi-icon">
							<img src="img/icons/brain.png" alt="">
						</div>
						<h4>Créate una cuenta</h4>
						<p>El primer paso es el más simple, créate una cuenta y accede a la plataforma </p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="how-item">
						<div class="hi-icon">
							<img src="img/icons/pointer.png" alt="">
						</div>
						<h4>Empieza a dibujar</h4>
						<p>A partir de una imagen que escojas, intenta imitarlo en su plenitud </p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="how-item">
						<div class="hi-icon">
							<img src="img/icons/smartphone.png" alt="">
						</div>
						<h4>Mira los dibujos</h4>
						<p>Puedes participar en la comunidad de dibujo incluso sin haber dibujado </p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- How section end -->

	<!-- Premium section end -->
	<section class="premium-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-title">
						<h2>Diferentes estilos de dibujo</h2>
					</div>
				</div>
				<div class="col-lg-6">
					<p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="premium-item">
						<img src="img/premium/1.jpg" alt="">
						<h4>No ad interruptions </h4>
						<p>Consectetur adipiscing elit</p>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="premium-item">
						<img src="img/premium/2.jpg" alt="">
						<h4>High Quality</h4>
						<p>Ectetur adipiscing elit</p>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="premium-item">
						<img src="img/premium/3.jpg" alt="">
						<h4>Listen Offline</h4>
						<p>Sed do eiusmod tempor </p>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="premium-item">
						<img src="img/premium/4.jpg" alt="">
						<h4>Download Music</h4>
						<p>Adipiscing elit</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Premium section end -->

    @endsection
