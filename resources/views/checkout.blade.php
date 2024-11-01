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

	<body>
		<main>
			<section class="checkout">
				<div class="container">
					<div class="checkout__wrapper">
						<form action="">
							<div class="row">
								<div class="column">
									<h3 class="checkout__title">@if(Session::get('lang') == 'en') Billing Address @else Платіжна адреса @endif</h3>
									<div class="input-box">
										<span>@if(Session::get('lang') == 'en') Full Name @else Повне імʼя @endif: </span>
										<input type="text" name="" id="" placeholder="Jacob Aiden" />
									</div>
									<div class="input-box">
										<span>@if(Session::get('lang') == 'en') Email @else Пошта @endif: </span>
										<input type="email" name="" id="" placeholder="example@example.com" />
									</div>
                                    <div class="input-box">
                                        <span>@if(Session::get('lang') == 'en') Phone @else Телефон @endif: </span>
                                        <input type="number" name="" id="" placeholder="" />
                                    </div>
									<div class="input-box">
										<span>@if(Session::get('lang') == 'en') Address @else Адреса @endif: </span>
										<input type="text" name="" id="" placeholder="Room - Street - Locality" />
									</div>
									<div class="input-box">
										<span>@if(Session::get('lang') == 'en') City @else Місто @endif: </span>
										<input type="text" name="" id="" placeholder="Kyiv" />
									</div>
									<div class="flex">
										<div class="input-box">
											<span>@if(Session::get('lang') == 'en') Country @else Країня @endif: </span>
											<input type="text" name="" id="" placeholder="Ukraine" />
										</div>
										<div class="input-box">
											<span>@if(Session::get('lang') == 'en') Zip Code @else Поштовий індекс @endif: </span>
											<input type="number" name="" id="" placeholder="123 456" />
										</div>
									</div>
								</div>

{{--								<div class="column">--}}
{{--									<h3 class="checkout__title">Payment</h3>--}}
{{--									<div class="input-box">--}}
{{--										<span>Card Accepted: </span>--}}
{{--										<picture>--}}
{{--											<source srcset="./img/imgcards.webp 1x, ./img/imgcards@2x.webp 2x" type="image/webp" />--}}
{{--											<source srcset="./img/imgcards.png 1x, ./img/imgcards@2x.png 2x" type="image/png" />--}}
{{--											<img src="./img/imgcards.png" alt="" />--}}
{{--										</picture>--}}
{{--									</div>--}}
{{--									<div class="input-box">--}}
{{--										<span>Name on&#160;Card: </span>--}}
{{--										<input type="text" name="" id="" placeholder="Mr. Jacob Aiden" />--}}
{{--									</div>--}}
{{--									<div class="input-box">--}}
{{--										<span>Credit Card number: </span>--}}
{{--										<input type="number" name="" id="" placeholder="1111 2222 3333 4444" />--}}
{{--									</div>--}}
{{--									<div class="input-box">--}}
{{--										<span>Exp. Month: </span>--}}
{{--										<input type="text" name="" id="" placeholder="August" />--}}
{{--									</div>--}}
{{--									<div class="flex">--}}
{{--										<div class="input-box">--}}
{{--											<span>Exp. year: </span>--}}
{{--											<input type="number" name="" id="" placeholder="2025 " />--}}
{{--										</div>--}}
{{--										<div class="input-box">--}}
{{--											<span>CVV: </span>--}}
{{--											<input type="number" name="" id="" placeholder="123" />--}}
{{--										</div>--}}
{{--									</div>--}}
{{--								</div>--}}
							</div>
                            <span style="color: red;font-size: 10px">@if(Session::get('lang') == 'en') *DELIVERY FEE 20 EUR @else *Доставка 20 EUR @endif</span><br><br>


                                <button type="submit">@if(Session::get('lang') == 'en') Submit @else Підтвердити @endif</button>
						</form>
					</div>
				</div>
			</section>
		</main>
		<script src="./js/index.bundle.js"></script>
	</body>
</html>
