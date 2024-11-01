@extends('partials.layouts.base')

@section('content')

		<div class="mobile-nav">
			<div class="mobile-nav__header">
				<a href="..//" class="logo">LOSTKIDSCLUB<br />2000
				<button class="mobile-nav__close"><img src="./img/icons/close.svg" alt="Close" /></button>
			</div>
			<div class="container-full">
				<ul class="mobile-nav__list">
					<li><a href="/">Homme</a></li>
					<li><a href="docs.html">Femme</a></li>
					<li><a href="docs.html">Archive</a></li>
					<li><a href="docs.html">LOSTKIDSCLUB2000</a></li>
				</ul>
			</div>
		</div>

		<main class="light">
			<section class="product">
				<div class="container-full">
					<div class="product__row">
						<div class="swiper">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<picture>
										<source srcset="../img/product/{{$image}} 1x, ../img/product/{{$image}} 2x" type="image/png" />
										<img src="../img/product/{{$image}}" alt="Image 1" />
									</picture>
								</div>
                                @foreach($productImages as $productImage)
                                    <div class="swiper-slide">
                                        <picture>
                                            <source srcset="../img/product/{{$productImage}} 1x, ../img/product/{{$productImage}} 2x" type="image/png" />
                                            <img src="../img/product/{{$productImage}}" alt="Image 1" />
                                        </picture>
                                    </div>
                                @endforeach
							</div>
							<div class="swiper-button-prev"></div>
							<div class="swiper-button-next"></div>
						</div>

						<aside class="product__details">
							<a href="{{ route('shop') }}" class="product__back"><img src="../img/icons/arrow-black.svg" alt="Back" />@if(Session::get('lang') == 'en') Back @else Назад @endif</a>
							<div class="product__main">
								<h1 class="product__title">{{$name}}</h1>
								<div class="product__description">
									<p>
                                        @if(Session::get('lang') == 'en') {!! $description !!} @else {!! $description_ua !!} @endif

									</p>
								</div>

								<div class="product__sizes form-select-size">
									<button class="@if($xs == 'on') black-border @else sold-out @endif ">xs</button>
									<button class="@if($s == 'on') black-border @else sold-out @endif">s</button>
									<button class="@if($m == 'on') black-border @else sold-out @endif">m</button>
									<button class="@if($l == 'on') black-border @else sold-out @endif">l</button>
									<button class="@if($xl == 'on') black-border @else sold-out @endif">xl</button>
								</div>
								<button id="add_to_cart_button" onclick="addToCart({{ $id }})" class="product__buy">@if(Session::get('lang') == 'en') Add To&#160;Cart&#160;&#8212; @else Додати у кошик @endif €{{$price}} </button>
							</div>
						</aside>
					</div>
					<h2 class="product__related">@if(Session::get('lang') == 'en') Similar @else Схожі@endif</h2>
					<div class="product__related-wrapper">
                        @foreach($AddedProduct as $Product)
                            <article class="card">
                                <a href="/products/{{$Product['id']}}" class="card__link"></a>
                                <div class="card__photo">
                                    <picture>
                                        <source srcset="../img/product/{{$Product['image']}} 1x, ../img/product/{{$Product['image']}} 2x" type="image/png" />
                                        <img src="../img/product/{{$Product['image']}}" alt="Bowling Bag" class="card__img" />
                                    </picture>
                                    <picture>
                                        <source srcset="../img/product/{{$Product['image']}} 1x, ../img/product/{{$Product['image']}} 2x" type="image/png" />
                                        <img src="../img/product/{{$Product['image']}}" alt="Bowling Bag" class="card__img" />
                                    </picture>
                                </div>
                                <div class="card__desc">
                                    <div class="card__name">{{$Product['name']}}</div>
                                    <div class="card__price">€ {{$Product['price']}}</div>
                                </div>
                            </article>
                        @endforeach
					</div>
				</div>
			</section>
		</main>

@endsection
