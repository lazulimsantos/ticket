<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notificacao extends CI_Controller {

	$method = $_SERVER['REQUEST_METHOD'];

	if ('POST' == $method) {
		$credentials = PagSeguroConfig::getAccountCredentials();
		$type = $_POST['notificationType'];
		$notificatioCode = $_POST['notificatioCode'];

		if ($type == 'TRANSACTION') {
			$transaction = PagSeguroNotificationService::checkTransaction($credentials, $notificatioCode);
			$status = $transaction->getStatus();
			$meioPagamento = $transaction->getPaymentMethod();
			$tipoMeio = $meioPagamento->getType();
			$itens = $transaction->getItems();
			$codigo = $transaction->getCode();
		}
	}
}