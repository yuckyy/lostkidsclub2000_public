@extends('partials.layouts.base')

@section('content')
		<div class="mobile-nav">
			<div class="mobile-nav__header">
				<a href="..//" class="logo">LOSTKIDSCLUB<br />2000
				<button class="mobile-nav__close"><img src="./img/icons/close.svg" alt="Close" /></button>
			</div>
{{--			<div class="container-full">--}}
{{--				<ul class="mobile-nav__list">--}}
{{--					<li><a href="/">Homme</a></li>--}}
{{--					<li><a href="docs.html">Femme</a></li>--}}
{{--					<li><a href="docs.html">Archive</a></li>--}}
{{--					<li><a href="docs.html">LOSTKIDSCLUB2000</a></li>--}}
{{--				</ul>--}}
{{--			</div>--}}
		</div>

		<main>
{{--			<section class="hero" id="hero">--}}
{{--				<div class="hero__row">--}}
{{--					<div class="hero__wrapper-img">--}}
{{--						<a href="homme.html" class="hero__link">--}}
{{--							<picture>--}}
{{--								<source srcset="./img/hero/1.webp 1x, ./img/hero/1@2x.webp 2x" type="image/webp" />--}}
{{--								<source srcset="./img/hero/1.jpg 1x, ./img/hero/1@2x.jpg 2x" type="image/jpeg" />--}}
{{--								<img src="./img/hero/1.jpg" class="hero__img" alt="Hero image" />--}}
{{--							</picture>--}}
{{--							<span class="hero__name">Shop homme</span>--}}
{{--						</a>--}}
{{--					</div>--}}
{{--					<div class="hero__wrapper-img">--}}
{{--						<a href="#!" class="hero__link">--}}
{{--							<picture>--}}
{{--								<source srcset="./img/hero/2.webp 1x, ./img/hero/2@2x.webp 2x" type="image/webp" />--}}
{{--								<source srcset="./img/hero/2.jpg 1x, ./img/hero/2@2x.jpg 2x" type="image/jpeg" />--}}
{{--								<img src="./img/hero/2.jpg" class="hero__img" alt="Hero image" />--}}
{{--							</picture>--}}
{{--							<span class="hero__name">Shop femme</span>--}}
{{--						</a>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</section>--}}
            <section class="video" id="video">
                <video autoplay muted loop playsinline>
                    <source src="https://player.vimeo.com/progressive_redirect/playback/993846798/rendition/720p/file.mp4?loc=external&signature=25efd1a6e411df14d35076f7a823ea681aa9b60f2f5f271543349e81102518b5" type="video/mp4" />
                </video>
                <span class="video__text">LOSTKIDSCLUB2000 / 2024</span>
{{--                <a href="{{ route('shop') }}" class="video__link"></a>--}}
                <a href="{{ route('shop') }}"><button class="center-button btn ">@if(Session::get('lang') == 'en') SHOP @else МАГАЗИН @endif</button></a>
            </section>
        </main>



@endsection
