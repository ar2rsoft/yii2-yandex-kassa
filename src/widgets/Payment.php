<?php

namespace ar2rsoft\yakassa\widgets;

use ar2rsoft\yakassa\CustomerInterface;
use ar2rsoft\yakassa\OrderInterface;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class Payment
 * @package ar2rsoft\yakassa\widgets
 *
 * @property \ar2rsoft\yakassa\YaKassa $component
 */
class Payment extends Widget
{
    public $component = 'yakassa';
    public $data      = [];
    public $paymentType;
    public $options;

    /**
     * @var CustomerInterface
     */
    public $userIdentity;

    /**
     * @var OrderInterface
     */
    public $order;

    /**
     * @var string
     */
    public $submitText = 'Submit';

    public function run()
    {
        echo Html::beginForm($this->getComponent()->paymentAction, 'post', $this->options);

        echo Html::hiddenInput('shopId', $this->getComponent()->shopId);
        echo Html::hiddenInput('scid', $this->getComponent()->scId);
        echo Html::hiddenInput('sum', $this->order->getTotalPrice());
        echo Html::hiddenInput('customerNumber', $this->userIdentity->getCustomerId());
        if (is_array($this->paymentType)) {
            echo Html::dropDownList('paymentType', array_keys($this->paymentType)[0], $this->paymentType);
        }
        if (is_array($this->data)) {
            foreach ($this->data as $key => $value) {
                echo Html::hiddenInput($key, $value);
            }
        }
        if ($phone = $this->userIdentity->getCustomerPhone()) {
            echo Html::hiddenInput('cps_phone', $phone);
        }
        if ($email = $this->userIdentity->getCustomerEmail()) {
            echo Html::hiddenInput('cps_email', $email);
        }
        if ($orderId = $this->order->getId()) {
            echo Html::hiddenInput('orderNumber', $orderId);
        }
        echo Html::submitButton(Yii::t($this->getComponent()->messagesCategory, $this->submitText));

        echo Html::endForm();
    }

    /**
     * @return \ar2rsoft\yakassa\YaKassa;
     */
    public function getComponent()
    {
        return Yii::$app->get($this->component);
    }
}

