@if(!empty($cartItemsData))
    <div class="cart__content">
        <button onclick="removeFromCartAll()">@if(Session::get('lang') == 'en')
                Clear all
            @else
                Очистити все
            @endif</button>
        @foreach ($cartItemsData as $item)

            <article class="cart__item">
                <div class="cart__photo">
                    <picture>
                        <source srcset="../img/product/{{ $item['image'] }} 1x, ../img/product/{{ $item['image'] }} 2x"
                                type="image/png"/>
                        <img src="../img/product/{{ $item['image'] }}" class="cart__img"/>
                    </picture>
                </div>
                <div class="cart__desc">
                    <div class="cart__name">{{ $item['name'] }} [ {{$item['size']}} ]</div>
                    <div class="cart__price">€{{ $item['price'] }}</div>

                </div>
                <div class="cart__add" data-ticket-id="1">
                    <button class="minus-btn" onclick="removeFromCart(this)"
                            data-id="@if($item['quantity']>0){{$item['product_id'].'_'.$item['size']}}@else {{ $item['product_id'] }} @endif"
                    >
                        <img src="../img/icons/minus.svg" alt="Minus"/>
                    </button>
                    <span class="count">{{$item['quantity']}}</span>
                    <button class="plus-btn" onclick="plusToCart('{{ $item['product_id'] }}', '{{$item['size']}}')">
                        <img src="../img/icons/plus.svg" alt="Plus"/>
                    </button>
                </div>
            </article>
        @endforeach
    </div>

    <footer class="cart__footer">
        <div class="cart__footer-content">
            <div class="cart__footer-content-wrapper">
                <span class="cart__pay">Subtotal: </span>
                <span class="cart__price">€{{$cartTotal}}</span>
            </div>

            <a href="/checkout">@if(Session::get('lang') == 'en') Continue to&#160;checkout @else Перейти до оформлення @endif</a>
        </div>
    </footer>

@else
    <div class="cart__item">
        @if(Session::get('lang') == 'en') YOUR CART IS EMPTY @else ПУСТО @endif
    </div>
@endif
<style>

</style>
