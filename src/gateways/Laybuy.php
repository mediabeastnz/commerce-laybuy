<?php

namespace mediabeastnz\laybuy\gateways;

use Craft;
use craft\commerce\base\RequestResponseInterface;
use craft\commerce\omnipay\base\OffsiteGateway;
use Omnipay\Common\AbstractGateway;
use Omnipay\Omnipay;
use Omnipay\Laybuy\Gateway as Gateway;
use yii\base\NotSupportedException;
use craft\commerce\models\Transaction;
use craft\commerce\records\Transaction as TransactionRecord;

/**
 * Gateway represents Laybuy gateway
 *
 * @author    Myles Derham. <myles.derham@gmail.com>
 */

class Laybuy extends OffsiteGateway
{
    // Properties
    // =========================================================================
    /**
     * @var string
     */
    public $merchantId;
        /**
     * @var string
     */
    public $merchantSecret;
    /**
     * @var bool
     */
    public $testMode = true;

    // Public Methods
    // =========================================================================
    
    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('commerce', 'Laybuy');
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return Craft::$app->getView()->renderTemplate('craft-commerce-laybuy/gatewaySettings', ['gateway' => $this]);
    }

    /**
     * @inheritdoc
     */
    public function supportsPaymentSources(): bool
    {
        return false;
    }

    public function supportsRefund(): bool
    {
        return true;
    }

    public function supportsPartialRefund(): bool
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function supportsWebhooks(): bool
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function supportsCapture(): bool
    {
        return false;
    }
    
    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createGateway(): AbstractGateway
    {
        /** @var Gateway $gateway */
        $gateway = Omnipay::create($this->getGatewayClassName());
        $gateway->setTestMode($this->testMode);
        $gateway->setMerchantId($this->merchantId);
        $gateway->setMerchantSecret($this->merchantSecret);
        return $gateway;
    }

    /**
     * @inheritdoc
     */
    protected function getGatewayClassName()
    {
        return '\\'.Gateway::class;
    }

    /**
     * @inheritdoc
     */
    protected function createPaymentRequest(Transaction $transaction, $card = null, $itemBag = null): array
    {
        $request = parent::createPaymentRequest($transaction, $card, $itemBag);
        
        $request['phone'] = $transaction->order->billingAddress->phone;

        return $request;

    }
}