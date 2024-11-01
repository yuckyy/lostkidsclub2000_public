@extends('partials.layouts.base')

@section('content')
    <main class="light">
			<section class="erd-paris" id="erd-paris">
				<div class="container-full">
					<div class="erd-paris__row">
						<div class="erd-paris__left">
							<div class="erd-paris__headlines">
								<h1 class="erd-paris__title">LOSTKIDSCLUB2000</h1>
								<h2 class="erd-paris__subtitle">@if(Session::get('lang') == 'en') CONTACTS @else КОНТАКТИ @endif</h2>
							</div>
							<ul class="erd-paris__schedule">
                                <li><a class="links-contacts" href="https://t.me/lostkidsclub2000">TELEGRAM</a></li>
                                <li><a class="links-contacts" href="https://www.instagram.com/lostkidsclub2000?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">INSTAGRAM</a></li>
                                <li><a class="links-contacts" href="mailto:info@lostkidsclub2000.com">info@lostkidsclub2000.com</a></li>

							</ul>
							<a href="tel:+380939992000" class="erd-paris__call">call +38 093 999 2000</a>
						</div>
						<div class="erd-paris__right">
{{--							<picture>--}}
{{--								<source srcset="./img/erd-paris/1.webp 1x, ./img/erd-paris/1@2x.webp 2x" type="image/webp" />--}}
{{--								<source srcset="./img/erd-paris/1.jpg 1x, ./img/erd-paris/1@2x.jpg 2x" type="image/jpeg" />--}}
{{--								<img src="./img/erd-paris/1.jpg" alt="LOSTKIDSCLUB2000" />--}}
{{--							</picture>--}}
						</div>
					</div>
				</div>
			</section>
		</main>
    <style>
        .links-contacts{
            font-size: 20px;
            color: black;
        }
    </style>
@endsection
