<!DOCTYPE html>
<html lang="tr">
	<head>
		<title>Giriş Yap | Laravel Muhasebe Programı</title>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	</head>
	<body id="kt_body" class="app-blank">
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="d-flex flex-column flex-lg-row-auto bg-primary w-xl-600px positon-xl-relative">
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
						<div class="d-flex flex-row-fluid flex-column text-center p-5 p-lg-10 pt-lg-20">
							<a href="../dist/index.html" class="py-2 py-lg-20">
								<img alt="Logo" src="{{asset('assets/media/logos/default.svg')}}" class="h-40px h-lg-50px" />
							</a>
							<h1 class="d-none d-lg-block fw-bold text-white fs-2qx pb-5 pb-md-10">Muhasebe Programına Hoşgeldin !</h1>
							<p class="d-none d-lg-block fw-semibold fs-2 text-white">Bu demo muhasebe programı, işletmelerin finansal işlemlerini kolayca takip etmelerini sağlar. Gelir-gider yönetimi, fatura kesme, vergi hesaplama ve raporlama gibi temel muhasebe işlemlerine olanak sağlar.
							</p>
						</div>
						<div class="d-none d-lg-block d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(assets/media/illustrations/sketchy-1/17.png)"></div>
					</div>
				</div>
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<div class="w-lg-500px p-10 p-lg-15 mx-auto">
							<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="../dist/index.html" action="#">
								<div class="text-center mb-10">
									<h1 class="text-dark mb-3">Muhasebe Programına Giriş Yap</h1>
									<div class="text-gray-400 fw-semibold fs-4">Hesabın yok mu ?
									<a href="../dist/authentication/sign-up/basic.html" class="link-primary fw-bold">Hesap Oluştur</a></div>
								</div>
								<div class="fv-row mb-10">
									<label class="form-label fs-6 fw-bold text-dark">E-Posta Adresi</label>
									<input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" />
								</div>
								<div class="fv-row mb-10">
									<div class="d-flex flex-stack mb-2">
										<label class="form-label fw-bold text-dark fs-6 mb-0">Parola</label>
										<a href="../dist/authentication/sign-in/password-reset.html" class="link-primary fs-6 fw-bold">Parolamı Unuttum !</a>
									</div>
									<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
								</div>
								<div class="text-center">
									<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
										<span class="indicator-label">Giriş Yap</span>
									</button>
									<div class="text-center text-muted text-uppercase fw-bold mb-5">Diğer Oturum Seçenekleri</div>
									<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
									<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Continue with Google</a>
									<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
									<img alt="Logo" src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-3" />Continue with Facebook</a>
									<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">
									<img alt="Logo" src="assets/media/svg/brand-logos/apple-black.svg" class="theme-light-show h-20px me-3" />
									<img alt="Logo" src="assets/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show h-20px me-3" />Continue with Apple</a>
								</div>
							</form>
						</div>
					</div>
					<div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
						<div class="d-flex flex-center fw-semibold fs-6">
							<a href="https://keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">Hakkımızda</a>
							<a href="https://devs.keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">Destek</a>
							<a href="https://keenthemes.com/products/oswald-html-pro" class="text-muted text-hover-primary px-2" target="_blank">Sıkça Sorulan Sorular</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<script src="{{asset('assets/js/custom/authentication/sign-in/general.js')}}"></script>
	</body>
</html>
