<div class="mobile-nav">
    <div class="mobile-nav__header">
        <a href="..//" class="logo">LOSTKIDSCLUB<br/>2000
        </a>
        <button class="mobile-nav__close"><img src="../img/icons/close.svg" alt="Close"/></button>
    </div>
    <div class="container-full">
        <ul class="mobile-nav__list">
            <li><a href="/">@if(Session::get('lang') == 'en') Home @else Гловна @endif</a></li>
            <li><a href="/shop">@if(Session::get('lang') == 'en') Shop @else Товари @endif</a></li>
        </ul>
    </div>
</div>
<header class="header">
    <div class="container-full">
        <div class="header__row">
            <a href="/" class="header__logo logo">LOSTKIDSCLUB<br />2000
                <nav class="header__links nav">
                    <ul class="nav__list">
                        <li>

                        </li>
                        <li>

                        </li>
                        <li>

                        </li>
                        <li>
                            <a href="erd-paris.html" data-hover="LOSTKIDSCLUB2000"><span> </span></a>
                        </li>
                    </ul>
                </nav>
                <div class="header__nav">
                    <button onclick="viewCart()"  class="header__cart">@if(Session::get('lang') == 'en') Cart ( @else Кошик ( @endif  <span id="cartcount">@if (session('cart'))
                                {{ count(session('cart')) }}
                            @else
                                0
                            @endif  </span> )  </button>
                </div>
                <div class="header__icons">
                    <button class="mobile-nav-btn">
                        <div class="nav-icon"></div>
                    </button>
                    <button onclick="viewCart()" class="header__cart-btn">
                        <img src="../img/icons/cart.svg" alt="" />
                    </button>
                </div>
        </div>
    </div>
</header>
