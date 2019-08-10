<?php
/**
 * Created by PhpStorm.
 * User: ar2r
 * Date: 10.08.2019
 * Time: 11:09
 */

namespace ar2rsoft\yakassa;

interface OrderInterface
{
    /**
     * Should return unique orderId
     * Used to generate payment form
     * @return mixed
     */
    public function getId();

    /**
     * Should return total order cost
     * Used to generate payment form
     * @return integer
     */
    public function getTotalPrice();
}