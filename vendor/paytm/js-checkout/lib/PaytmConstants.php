<?php

class PaytmConstants
{
	const TRANSACTION_STATUS_URL_PRODUCTION = "https://securegw.paytm.in/order/status";
	const TRANSACTION_STATUS_URL_STAGING = "https://securegw-stage.paytm.in/order/status";

	const PRODUCTION_HOST = "https://securegw.paytm.in/";
	const STAGING_HOST = "https://securegw-stage.paytm.in/";

	const ORDER_PROCESS_URL = "order/process";
	const ORDER_STATUS_URL = "order/status";
	const INITIATE_TRANSACTION_URL = "theia/api/v1/initiateTransaction";
	const CHECKOUT_JS_URL = "merchantpgpui/checkoutjs/merchants/MID.js";


	const SAVE_PAYTM_RESPONSE = true;
	const CHANNEL_ID = "WEB";
	const APPEND_TIMESTAMP = true;
	const X_REQUEST_ID = "PLUGIN_LARAVEL_";
	const PLUGIN_DOC_URL = "";

	const MAX_RETRY_COUNT = 3;
	const CONNECT_TIMEOUT = 10;
	const TIMEOUT = 10;

	const LAST_UPDATED = "20210616";
	const PLUGIN_VERSION = "1.2";

	const CUSTOM_CALLBACK_URL = "";


	const ID = "paytm";
	const METHOD_TITLE = "Paytm Payments";
	const METHOD_DESCRIPTION = "The best payment gateway provider in India for e-payment through credit card, debit card & netbanking.";

	const TITLE = "Paytm";
	const DESCRIPTION = "The best payment gateway provider in India for e-payment through credit card, debit card & netbanking.";



	const FRONT_MESSAGE = "Thank you for your order, please click the button below to pay with paytm.";
	const NOT_FOUND_TXN_URL = "Something went wrong. Kindly contact with us.";
	const PAYTM_PAY_BUTTON = "Pay via Paytm";
	const CANCEL_ORDER_BUTTON = "Cancel order & Restore cart";
	const POPUP_LOADER_TEXT = "Thank you for your order. We are now redirecting you to paytm to make payment.";

	const TRANSACTION_ID = "<b>Transaction ID:</b> %s";
	const PAYTM_ORDER_ID = "<b>Paytm Order ID:</b> %s";

	const REASON = " Reason: %s";
	const FETCH_BUTTON = "Fetch Status";

}

?>