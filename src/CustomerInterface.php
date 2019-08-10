<?php
/**
 * Created by PhpStorm.
 * User: ar2r
 * Date: 10.08.2019
 * Time: 11:09
 */

namespace ar2rsoft\yakassa;

interface CustomerInterface
{
    /**
     * Should return unique user identificator in your customer table
     * @return integer||string
     */
    public function getCustomerId();

    /**
     * Should return customer email, if exists
     * Would be used to generate payment form
     * @return string
     */
    public function getCustomerEmail();

    /**
     * Should return customer phone
     * Used to generate payment form
     * @return string
     */
    public function getCustomerPhone();
}