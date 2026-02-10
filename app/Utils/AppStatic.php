<?php
namespace App\Utils;

class AppStatic{

    # Caching Version
    const CACHE_VERSION = "1.0.1";

    
    public const ACTIVE             = "active";
    public const IN_ACTIVE          = "inactive";
    public const AMOUNT             = "amount";
    public const PERCENTAGE         = "percentage";

    
    public const PROMO_EARN_BALANCE_TRANSFERED    = 1;
    public const ECOMMERCE_ORDER    = 1;
    public const CASH_ON_DELIVERY   = 1;

    # Order Status Numbers
    public const ORDER_CANCELLED                   = 0;
    public const ORDER_COMPLETED                   = 1;
    public const ORDER_DECLINED                    = 2;
    public const ORDER_PENDING                     = 3;
    public const ORDER_CONFIRMED                   = 4;
    public const ORDER_PACKAGING_DONE              = 5;
    public const ORDER_HANDOVER_TO_COURIER         = 6;
    public const ORDER_SHIPPED                     = 7;
    public const ORDER_SHIPMENT_DONE               = 8;
    public const ORDER_DELIVERED_WITH_DELIVERY_BOY = 9;

    #Discount Type
    public const DISCOUNT_PERCENTAGE_TYPE  = 1;
    public const DISCOUNT_FLAT_AMOUNT_TYPE = 2;
    public const DISCOUNT_PERCENTAGE_MAX_VALUE = 100;

    public const COMPANY_CHALAN_PREFIX = "pro_"; // You may replace with your project name keyword


/**
     * Request Response Codes
     * */

     public const SUCCESS           = 200;
     public const SUCCESS_WITH_DATA = 201;
     public const VALIDATION_ERROR  = 400;
     public const NOT_FOUND         = 404;
     public const UNAUTHORIZED      = 401;
     public const INTERNAL_ERROR    = 500;
     public const INVALID           = 525;
     public const PRODUCT_PRICE_INCREASED_OR_NOT_FOUND   = 626;
 
 
     /**
      * Status Codes
      * */
     public const TRUE = true;
     public const FALSE = false;
 
     /**
      * Login Center
      * */
     public const MESSAGE_WELCOME_BACK   = "Welcome Back!";
     public const MESSAGE_SUCCESS_LOGOUT = "Aww! Logout. We are waiting for you ;) Come back soon!.";
     public const MESSAGE_INVALID        = "Invalid Information!";
     public const MESSAGE_PROFILE        = "Authorized user Data";
     public const MESSAGE_UNAUTHORISED   = "Opps! You are not authorized, please Login first.";
 
     /*
      * Response Messages
      * */
     public const DATA_FIND_BY_ID = "Data fetching by id";
     public const DATA_CALL       = "Success! All/Data called";
     public const DATA_STORE      = "Success! A new database record saved";
     public const DATA_UPDATED    = "Success! Data is up to date";
     public const DATA_DELETED    = "Success! A database record is deleted";
     public const INVALID_DATA    = "Sorry! Invalid Ref ID";
     public const INVALID_ORDER_STATUS    = "Sorry! Invalid order status no";
     public const INVALID_STOCK    = "Sorry! There has no stock for your query.";
     public const INSUFFICIENT_STOCK    = "Sorry! Invalid Stock.";
     public const CHECKOUT_FAILED    = "Sorry! Checkout Failed";
     public const PRODUCT_PRICE_OR_DELETED = "Sorry, Product Price increased/Deleted from the Database Record";
     public const EMPTY_CART = "Sorry, Your Shopping cart is empty";
     public const MESSAGE_SEARCHING_RESULT = "Final!, Searching results are";
 
     public const CATEGORY_STORE_MESSAGE = "Success! New Category successfully saved";
     public const CATEGORY_DELETE_MESSAGE = "Success! Category successfully Deleted";
 
 
     /**
      * Exceptions Center
      * */
 
     public const METHOD_NOT_ALLOWED = "Method Not Allowed Http Exception Found";
 
     /**
      * Order Pending Note
      * */
     public const ORDER_PENDING_NOTE = "Sir/Madam, We received a order from you. Currently our team is working with your order, We will update you soon. Thank you.";
 
     public const ORDER_STATUS_INSIDE = "0 = Cancelled,1 = Completed/Done,2 = Declined,3 = Pending,4 = Confirmed,5 = Packaging Done,6 = Handover to the Courier,7 = Product Shipped,8 = Shipment Done,9 = Product delivering via Delivery Boy";

     public function purchaseChalanGenerator()
    {
        $chalan_prefix = self::COMPANY_CHALAN_PREFIX;
        $date_prefix   = todayDateTimePrefix();

        return "{$chalan_prefix}{$date_prefix}_".randGen();
    }

}
 