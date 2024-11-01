<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Clothes</title>
		<link rel="stylesheet" href="./css/main.css" />

		<link rel="icon" type="image/x-icon" href="./img/favicons/favicon.svg" />
		<link rel="apple-touch-icon" sizes="180x180" href="./img/favicons/apple-touch-icon.png" />
	</head>

	<body class="page-main-padding">
		<div class="cart">
			<header class="cart__header">
				<h3 class="cart__title">Cart</h3>
				<button class="cart__close" data-hover="close"><span>close</span></button>
			</header>

			<div class="cart__content">
				<article class="cart__item">
					<div class="cart__photo">
						<picture>
							<source srcset="./img/catalog/7.webp 1x, ./img/catalog/7@2x.webp 2x" type="image/webp" />
							<source srcset="./img/catalog/7.png 1x, ./img/catalog/7@2x.png 2x" type="image/png" />
							<img src="./img/catalog/7.png" alt="Bowling Bag" class="cart__img" />
						</picture>
					</div>
					<div class="cart__desc">
						<div class="cart__name">Bowling bag</div>
						<div class="cart__color-item">black</div>
						<div class="cart__price">$3,480.00</div>
					</div>
					<div class="cart__add" data-ticket-id="1">
						<button class="minus-btn">
							<img src="./img/icons/minus.svg" alt="Minus" />
						</button>
						<span class="count">1</span>
						<button class="plus-btn">
							<img src="./img/icons/plus.svg" alt="Plus" />
						</button>
					</div>
				</article>
				<article class="cart__item">
					<div class="cart__photo">
						<picture>
							<source srcset="./img/catalog/9.webp 1x, ./img/catalog/9@2x.webp 2x" type="image/webp" />
							<source srcset="./img/catalog/9.png 1x, ./img/catalog/9@2x.png 2x" type="image/png" />
							<img src="./img/catalog/9.png" alt="Bowling Bag" class="cart__img" />
						</picture>
					</div>
					<div class="cart__desc">
						<div class="cart__name">Bowling bag</div>
						<div class="cart__color-item">black</div>
						<div class="cart__price">$3,480.00</div>
					</div>
					<div class="cart__add" data-ticket-id="2">
						<button class="minus-btn">
							<img src="./img/icons/minus.svg" alt="Minus" />
						</button>
						<span class="count">1</span>
						<button class="plus-btn">
							<img src="./img/icons/plus.svg" alt="Plus" />
						</button>
					</div>
				</article>
			</div>

			<footer class="cart__footer">
				<div class="cart__footer-content">
					<div class="cart__footer-content-wrapper">
						<span class="cart__pay">Subtotal: </span>
						<span class="cart__price">$15,350.00</span>
					</div>
					<a href="checkout.html">Continue to&#160;checkout</a>
				</div>
			</footer>
		</div>
		<div class="fade"></div>
		<header class="header">
			<div class="container-full">
				<div class="header__row">
					<a href="/" class="header__logo logo">LOSTKIDSCLUB<br />2000
					<nav class="header__links nav">
						<ul class="nav__list">
							<li>
								<a href="homme.html" class="active" data-hover="Homme"><span>Homme</span></a>
								<!-- <ul class="subnav__list">
                            <li><a href="#!">Sublink 1</a></li>
                            <li><a href="#!">Sublink 2</a></li>
                            <li><a href="#!">Sublink 3</a></li>
                        </ul> -->
							</li>
							<li>
								<a href="#!" data-hover="Femme"><span>Femme</span></a>
								<!-- <ul class="subnav__list">
                            <li><a href="#!">Sublink 1</a></li>
                            <li><a href="#!">Sublink 2</a></li>
                            <li><a href="#!">Sublink 3</a></li>
                        </ul> -->
							</li>
							<li>
								<a href="archive.html" data-hover="Archive"><span>Archive</span></a>
							</li>
							<li>
								<a href="erd-paris.html" data-hover="LOSTKIDSCLUB2000"><span>LOSTKIDSCLUB2000</span></a>
							</li>
						</ul>
					</nav>
					<div class="header__nav">
						<form action="#" class="header__search">
							<input type="text" id="search" placeholder="search" />
						</form>
						<a href="#!" class="header__account" data-hover="Account"><span>Account</span></a>
						<button class="header__cart">Cart (2)</button>
					</div>
					<div class="header__icons">
						<button class="mobile-nav-btn">
							<div class="nav-icon"></div>
						</button>
						<button class="header__cart-btn">
							<img src="./img/icons/cart.svg" alt="" />
						</button>
					</div>
				</div>
			</div>
		</header>
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

		<main>
			<section class="gallery">
				<div class="container-full">
					<div class="gallery__row">
						<div class="gallery__wrapper">
							<div class="gallery__panel">
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/1.webp 1x, ./img/gallery/1@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/1.jpg 1x, ./img/gallery/1@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/1.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/2.webp 1x, ./img/gallery/2@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/2.jpg 1x, ./img/gallery/2@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/2.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/3.webp 1x, ./img/gallery/3@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/3.jpg 1x, ./img/gallery/3@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/3.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/4.webp 1x, ./img/gallery/4@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/4.jpg 1x, ./img/gallery/4@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/4.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/5.webp 1x, ./img/gallery/5@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/5.jpg 1x, ./img/gallery/5@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/5.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/6.webp 1x, ./img/gallery/6@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/6.jpg 1x, ./img/gallery/6@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/6.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/7.webp 1x, ./img/gallery/7@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/7.jpg 1x, ./img/gallery/7@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/7.jpg" alt="Gallery Image" />
									</picture>
								</div>
							</div>
							<div class="gallery__panel" aria-hidden="true">
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/1.webp 1x, ./img/gallery/1@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/1.jpg 1x, ./img/gallery/1@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/1.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/2.webp 1x, ./img/gallery/2@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/2.jpg 1x, ./img/gallery/2@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/2.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/3.webp 1x, ./img/gallery/3@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/3.jpg 1x, ./img/gallery/3@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/3.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/4.webp 1x, ./img/gallery/4@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/4.jpg 1x, ./img/gallery/4@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/4.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/5.webp 1x, ./img/gallery/5@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/5.jpg 1x, ./img/gallery/5@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/5.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/6.webp 1x, ./img/gallery/6@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/6.jpg 1x, ./img/gallery/6@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/6.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/7.webp 1x, ./img/gallery/7@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/7.jpg 1x, ./img/gallery/7@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/7.jpg" alt="Gallery Image" />
									</picture>
								</div>
							</div>
						</div>
						<div class="gallery__wrapper">
							<div class="gallery__panel gallery__panel--reverse" aria-hidden="true">
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/8.webp 1x, ./img/gallery/8@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/8.jpg 1x, ./img/gallery/8@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/8.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/9.webp 1x, ./img/gallery/9@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/9.jpg 1x, ./img/gallery/9@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/9.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/10.webp 1x, ./img/gallery/10@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/10.jpg 1x, ./img/gallery/10@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/10.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/11.webp 1x, ./img/gallery/11@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/11.jpg 1x, ./img/gallery/11@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/11.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/12.webp 1x, ./img/gallery/12@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/12.jpg 1x, ./img/gallery/12@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/12.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/13.webp 1x, ./img/gallery/13@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/13.jpg 1x, ./img/gallery/13@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/13.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/14.webp 1x, ./img/gallery/14@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/14.jpg 1x, ./img/gallery/14@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/14.jpg" alt="Gallery Image" />
									</picture>
								</div>
							</div>
							<div class="gallery__panel gallery__panel--reverse">
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/8.webp 1x, ./img/gallery/8@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/8.jpg 1x, ./img/gallery/8@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/8.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/9.webp 1x, ./img/gallery/9@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/9.jpg 1x, ./img/gallery/9@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/9.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/10.webp 1x, ./img/gallery/10@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/10.jpg 1x, ./img/gallery/10@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/10.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/11.webp 1x, ./img/gallery/11@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/11.jpg 1x, ./img/gallery/11@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/11.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/12.webp 1x, ./img/gallery/12@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/12.jpg 1x, ./img/gallery/12@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/12.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/13.webp 1x, ./img/gallery/13@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/13.jpg 1x, ./img/gallery/13@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/13.jpg" alt="Gallery Image" />
									</picture>
								</div>
								<div class="gallery__panel-box">
									<picture>
										<source srcset="./img/gallery/14.webp 1x, ./img/gallery/14@2x.webp 2x" type="image/webp" />
										<source srcset="./img/gallery/14.jpg 1x, ./img/gallery/14@2x.jpg 2x" type="image/jpeg" />
										<img src="./img/gallery/14.jpg" alt="Gallery Image" />
									</picture>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<footer class="footer">
			<div class="container-full">
				<div class="footer__row">
					<div class="footer__left">
						<span class="footer__copyright"> enfants riches d&#233;prim&#233;s &#169; 2024</span>
						<a href="#!" class="footer__link" data-hover="Stockists"><span>Stockists</span></a>
						<a href="#!" class="footer__link" data-hover="Contact"><span>Contact</span></a>
						<a href="#!" class="footer__link" data-hover="Legal"><span>Legal</span></a>
					</div>
					<div class="footer__right">
						<a href="#!" class="footer__inc">site by&#160;special offer, inc.</a>
					</div>
				</div>
			</div>
		</footer>

		<script src="./js/index.bundle.js"></script>
	</body>
</html>
