<?php 

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;


/**
* 
*/
class PaypalController extends BaseController
{
	
	private $_api_context;
	function __construct()
	{
		$paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
	}

	public function pay()
		{
			#dd(Input::all());
			$payer = new Payer();
			$payer->setPaymentMethod('paypal');


			$counter = 0;
			$items = [];
			foreach(Input::all() as $input)
			{

				if(Input::has('item_name'.$counter))
				{
					$item = new Item();
				$item->setName(Input::get('item_name'.$counter))
					 ->setCurrency('EUR')
					 ->setQuantity(Input::get('item_qtt'.$counter))
					 ->setPrice(Input::get('item_price'.$counter));
					$items[] = $item;
				

				}
				
				$counter ++;
			}
			
			$item_list = new ItemList();
			$item_list->setItems($items);

			$amount = new Amount();
			$amount->setCurrency('EUR')
			->setTotal(Input::get('total'));

			$transaction = new Transaction();
			$transaction->setAmount($amount)
						->setItemList($item_list)
						->setDescription('This is just a demo transaction');

			$redirect_url = new RedirectUrls();
			$redirect_url->setReturnUrl(URL::route('paymentStatus'))
						 ->setCancelUrl(URL::route('paymentStatus'));

			$payment = new Payment();
			$payment->setIntent('sale')
					->setPayer($payer)
					->setRedirectUrls($redirect_url)
					->setTransactions(array($transaction));

			try {
				        $payment->create($this->_api_context);
				    } catch (\PayPal\Exception\PPConnectionException $ex) {
				        if (\Config::get('app.debug')) {
				            echo "Exception: " . $ex->getMessage() . PHP_EOL;
				            $err_data = json_decode($ex->getData(), true);
				            exit;
				        } else {
				            die('Some error occur, sorry for inconvenient');
				        }
				    }

				    foreach($payment->getLinks() as $link) {
				        if($link->getRel() == 'approval_url') {
				            $redirect_url = $link->getHref();
				            break;
				        }
				    }

				    // add payment ID to session
				    Session::put('paypal_payment_id', $payment->getId());

				    if(isset($redirect_url)) {
				        // redirect to paypal
				        return Redirect::away($redirect_url);
				    }

				    return Redirect::route('original.route')
				        ->with('error', 'Unknown error occurred');
		}
public function paymentStatus()
		{
			$payment_id = Session::get('paypal_payment_id');

			Session::forget('paypal_payment_id');

			if(empty(Input::get('PayerID')) || empty(Input::get('token')))
			{
				return "Operation failed";
			}

			$payment = Payment::get($payment_id, $this->_api_context);
			$execution = new PaymentExecution();
			$execution->setPayerId(Input::get('PayerID'));


			$result = $payment->execute($execution, $this->_api_context);

			if($result->getState() == 'approved')
					{
						return 'Payment was successfull , we Thank you for that';
					}
			else {
				return "Operation failed";
			}
		}






















}
 ?>