<?php
namespace App\Http\Controllers;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

class CheckoutController extends Controller {
    public function checkout(){
        if (session('cart') !== null){
            $total = 0;
            $products = session('cart');
            foreach ($products as $product){
                $total+=$product['price']*$product['quantity'];
            }
            return view('checkout',compact('total'));
        }else{
            redirect('online');
        }

    }

    /**
     * @throws GuzzleException
     */
    public function createorder(Request $request)
    {

        $allData =array();
        $requestData = $request->all();
        $pay=$requestData['pay'];
        $cartData = session('cart');

        foreach ($cartData as $item) {
            $id = DB::table('orders')->insertGetId([
                'user_name' => $requestData['name'],
                'user_surname' => $requestData['surname'],
                'user_phone' => $requestData['phone'],
                'user_email' => $requestData['email'],
                'user_country' => $requestData['country'],
                'user_city' => $requestData['city'],
                'user_address' => $requestData['address'],
                'user_index' => $requestData['index'],
                'user_social_link' => $requestData['info'],
                'user_info' => $requestData['info2'],
                'product_name' => $item['name'],
                'price' => $item['price'],
                'product_quantity' => $item['quantity'],
                'product_size' => $item['size'],
            ]);
        }

        $total = 0;
        $products = session('cart');
        foreach ($products as $product){
            $total+=$product['price']*$product['quantity'];
        }
        $orderInfo = "Імʼя: " . $requestData['name'] . "%0AПриізвище: " . $requestData['surname'] . "%0AКраїна: " . $requestData['country'] . "%0AГород: " . $requestData['city']  . "%0AАдреса: " . $requestData['address'] . "%0AІндекс: " . $requestData['index'] . "%0AПошта: " . $requestData['email']  . "%0AТелефон: " . $requestData['phone'] . "%0A" . "Інста: " . $requestData['info'] . "%0A" . "Шмот: " ;
        if ($cartData) {
            $nameProduct = '';
            $orderInfo3 = '';
            $orderInfo2 = '';
            foreach ($cartData as $data) {
                $orderInfo3 .= $data['name'] . ",";
                $orderInfo2 .= $data['name'] . "%0A"."Розмір:".$data['size'] . "%0A"."Кількість:".$data['quantity'] . "%0A";

            }
            $nameProduct.=$orderInfo3;
            $orderInfo.=$orderInfo2. "%0A"."Сума:".$total."€";
            Mail::to($requestData['email'])->send(new OrderShipped($requestData,$cartData,$total));
        }



        $token = env('TELEGRAM_TOKEN');
        $chat_id = env('TELEGRAM_CHAT_ID');
        $allowed_domain = 'sortcompany.shop';

        if (isset($_SERVER['HTTP_REFERER'])) {
            $referer = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);

            if ($referer === $allowed_domain) {

                $client = new Client();
                $url = "https://api.telegram.org/bot{$token}/sendMessage?{$chat_id}&parse_mode=html&text={$orderInfo}";
                if ($client->get($url)){

                if ($pay === '1') {

                    $basketOrder = [];
                    $totalAmount = 0;

                    foreach ($cartData as $index => $data) {
                        $basketOrder[] = array(
                            'name' => $data['name'],
                            'price' => $data['price'] * 100,
                            'qty' => intval($data['quantity']),
                            'code' => strval($data['id']),
                            'sum' => intval($data['price'] * 100)
                        );
                        $totalAmount += $data['price'] * $data['quantity'] * 100;
                    }

                    $data = array(
                        'amount' => intval($totalAmount),
                        'ccy' => 978,
                        'merchantPaymInfo' => array(
                            'reference' => '84d0070ee4e44667b31371d8f8813947',
                            'destination' => $requestData['name'] . ' ' . $requestData['surname'],
                            'comment' => 'оплата за товар',
                            'customerEmails' => [$requestData['email']],
                            'basketOrder' => $basketOrder
                        ),
                        'redirectUrl' => 'https://sortcompany.shop/confirm',
                        'webHookUrl' => 'https://sortcompany.shop/mono/acquiring/webhook/maybesomegibberishuniquestringbutnotnecessarily',
                        'validity' => 3600,
                        'paymentType' => 'debit',

                        'saveCardData' => array(
                            'saveCard' => true,
                            'walletId' => '69f780d841a0434aa535b08821f4822c'
                        )
                    );

                    $postData = json_encode($data);

                    $headers = array(
                        'Content-Type: application/json',
                        'X-Token:mULgO0ZjHpKrIhQmmaajQYA'
                    );

                    $ch = curl_init('https://api.monobank.ua/api/merchant/invoice/create');
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                    $response = curl_exec($ch);

                    if ($response === false) {
                        echo  curl_error($ch);
                    } else {
                        $responseArray = json_decode($response, true);

                        if (json_last_error() === JSON_ERROR_NONE && isset($responseArray['pageUrl'])) {
                            $pageUrl = $responseArray['pageUrl'];
                            return redirect()->away($pageUrl);
                        } else {
                            echo "Error decoding JSON or 'pageUrl' not found";
                        }
                    }

                    curl_close($ch);



                } else {
                    $request->session()->forget('cart');
                    return view('confirm');
                }

                }else{
                    redirect('online');
                }
            } else {

                die('Access denied');
            }
        } else {

            die('Access denied');
        }


    }




}
