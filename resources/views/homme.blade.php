@extends('partials.layouts.base')

@section('content')

    <main class="light">
        <div>
            <section class="catalog">
                <div class="container-full">
                    <div class="catalog__filter">
                        <div class="catalog__filter-list">
                            <!-- <div class="catalog__name-list">HOMME >
                            NEW ARRIVALS</div> -->
                            <button class="catalog__filter-btn">
									<span>
										<em>@if(Session::get('lang') == 'en')
                                                filters
                                            @else
                                                фільтри
                                            @endif</em>
									</span>
                                <span>
										<em>@if(Session::get('lang') == 'en')
                                                filters
                                            @else
                                                фільтри
                                            @endif</em>
									</span>
                            </button>
                        </div>
                    </div>
                    <div class="catalog__cards">

                        @foreach($products as $product)
                            <article class="card">
                                <a href="/products/{{ $product->id }}" class="card__link"></a>
                                <div class="card__photo">
                                    <picture>
                                        <source
                                            srcset="../img/product/{{$product->image}} 1x, ../img/product/{{$product->image}}"
                                            type="image/png"/>
                                        <img src="../img/product/{{$product->image}}" alt="Bowling Bag"
                                             class="card__img"/>
                                    </picture>
                                    @if($product->additional_image !== null)
                                        <picture>
                                            <source
                                                srcset="../img/product/{{$product->additional_image}} 1x, ../img/product/{{$product->additional_image}} 2x"
                                                type="image/png"/>
                                            <img src="../img/product/{{$product->additional_image}}" alt="Bowling Bag"
                                                 class="card__img"/>
                                        </picture>
                                    @else
                                        <picture>
                                            <source
                                                srcset="../img/product/{{$product->image}} 1x, ../img/product/{{$product->image}} 2x"
                                                type="image/png"/>
                                            <img src="../img/product/{{$product->image}}" alt="Bowling Bag"
                                                 class="card__img"/>
                                        </picture>
                                    @endif
                                </div>
                                <div class="card__desc">
                                    <div class="card__name">{{$product->name}}</div>
                                    <div class="card__price">€{{$product->price}}</div>
                                </div>
                            </article>
                        @endforeach


                    </div>
                    {{--                    <button class="load-more">load more</button>--}}
                </div>
            </section>
        </div>
    </main>

@endsection
