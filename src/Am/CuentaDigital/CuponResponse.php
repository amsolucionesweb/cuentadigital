<?php

namespace Am\CuentaDigital;

/**
 * Datos de respuesta de la generación de un cupón
 *
 * @author Andrés Michel <dev@amsolucionesweb.com.ar>
 */
class CuponResponse
{

    /**
     *
     * @var integer
     */
    public $merchantId;

    /**
     *
     * @var string
     */
    private $ipAddress;

    /**
     *
     * @var string
     */
    private $paymentcode1;

    /**
     *
     * @var string
     */
    private $paymentcode2;

    /**
     *
     * @var string
     */
    private $paymentcode3;

    /**
     *
     * @var string
     */
    private $paymentcode4;

    /**
     *
     * @var string
     */
    private $paymentcode5;

    /**
     *
     * @var string
     */
    private $paymentcode6;

    /**
     *
     * @var string
     */
    private $paymentcode7;

    /**
     *
     * @var string
     */
    private $paymentcode8;

    /**
     *
     * @var string
     */
    private $paymentcode9;

    /**
     *
     * @var string
     */
    private $paymentcode10;

    /**
     *
     * @var string
     */
    private $barcodeImage;

    /**
     *
     * @var string
     */
    private $barcodeBase64;

    /**
     *
     * @var string
     */
    private $invoiceUrl;

    /**
     *
     * @var string
     */
    private $site;

    /**
     *
     * @var string
     */
    private $merchantReference;

    /**
     *
     * @var string
     */
    private $concept;

    /**
     *
     * @var string
     */
    private $curr;

    /**
     *
     * @var float
     */
    private $amount;

    /**
     *
     * @var float
     */
    private $secondAmount;

    /**
     *
     * @var \DateTime
     */
    private $date;

    /**
     *
     * @var \DateTime
     */
    private $dueDate;

    /**
     *
     * @var \DateTime
     */
    private $secondDueDate;

    /**
     *
     * @var string
     */
    private $emailTo;

    /**
     *
     * @var string
     */
    private $country;

    /**
     *
     * @var string
     */
    private $lang;

    /**
     * Crear una instancia en base al xml del response.
     *
     * @param \SimpleXMLElement $xml
     */
    function __construct($xml)
    {
        $this->merchantId = (string)$xml->INVOICE->MERCHANTID;
        $this->ipAddress = (string)$xml->INVOICE->IPADDRESS;
        $this->paymentcode1 = (string)$xml->INVOICE->PAYMENTCODE1;
        $this->paymentcode2 = (string)$xml->INVOICE->PAYMENTCODE2;
        $this->paymentcode3 = (string)$xml->INVOICE->PAYMENTCODE3;
        $this->paymentcode4 = (string)$xml->INVOICE->PAYMENTCODE4;
        $this->paymentcode5 = (string)$xml->INVOICE->PAYMENTCODE5;
        $this->paymentcode6 = (string)$xml->INVOICE->PAYMENTCODE6;
        $this->paymentcode7 = (string)$xml->INVOICE->PAYMENTCODE7;
        $this->paymentcode8 = (string)$xml->INVOICE->PAYMENTCODE8;
        $this->paymentcode9 = (string)$xml->INVOICE->PAYMENTCODE9;
        $this->paymentcode10 = (string)$xml->INVOICE->PAYMENTCODE10;
        $this->barcodeImage = (string)$xml->INVOICE->BARCODEIMAGE;
        $this->barcodeBase64 = (string)$xml->INVOICE->BARCODEBASE64;
        $this->invoiceUrl = (string)$xml->INVOICE->INVOICEURL;
        $this->site = (string)$xml->INVOICE->SITE;
        $this->merchantReference = (string)$xml->INVOICE->MERCHANTREFERENCE;
        $this->concept = (string)$xml->INVOICE->CONCEPT;
        $this->curr = (string)$xml->INVOICE->CURR;
        $this->amount = (string)$xml->INVOICE->AMOUNT;
        $this->secondAmount = (string)$xml->INVOICE->SECONDAMOUNT;
        $this->date = \DateTime::createFromFormat('d/m/Y H:i:s', (string)$xml->INVOICE->DATE.' 00:00:00');
        $this->dueDate = \DateTime::createFromFormat('d/m/Y H:i:s', (string)$xml->INVOICE->DUEDATE.' 00:00:00');
        $this->secondDueDate = \DateTime::createFromFormat(
            'd/m/Y H:i:s',
            (string)$xml->INVOICE->SECONDDUEDATE.' 00:00:00'
        );
        $this->emailTo = (string)$xml->INVOICE->EMAILTO;
        $this->country = (string)$xml->INVOICE->COUNTRY;
        $this->lang = (string)$xml->INVOICE->LANG;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $barcodeBase64
     */
    public function setBarcodeBase64($barcodeBase64)
    {
        $this->barcodeBase64 = $barcodeBase64;
    }

    /**
     * @return string
     */
    public function getBarcodeBase64()
    {
        return $this->barcodeBase64;
    }

    /**
     * @param string $barcodeImage
     */
    public function setBarcodeImage($barcodeImage)
    {
        $this->barcodeImage = $barcodeImage;
    }

    /**
     * @return string
     */
    public function getBarcodeImage()
    {
        return $this->barcodeImage;
    }

    /**
     * @param string $concept
     */
    public function setConcept($concept)
    {
        $this->concept = $concept;
    }

    /**
     * @return string
     */
    public function getConcept()
    {
        return $this->concept;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $curr
     */
    public function setCurr($curr)
    {
        $this->curr = $curr;
    }

    /**
     * @return string
     */
    public function getCurr()
    {
        return $this->curr;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $dueDate
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param string $emailTo
     */
    public function setEmailTo($emailTo)
    {
        $this->emailTo = $emailTo;
    }

    /**
     * @return string
     */
    public function getEmailTo()
    {
        return $this->emailTo;
    }

    /**
     * @param string $invoiceUrl
     */
    public function setInvoiceUrl($invoiceUrl)
    {
        $this->invoiceUrl = $invoiceUrl;
    }

    /**
     * @return string
     */
    public function getInvoiceUrl()
    {
        return $this->invoiceUrl;
    }

    /**
     * @param string $ipAddress
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param int $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return int
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param string $merchantReference
     */
    public function setMerchantReference($merchantReference)
    {
        $this->merchantReference = $merchantReference;
    }

    /**
     * @return string
     */
    public function getMerchantReference()
    {
        return $this->merchantReference;
    }

    /**
     * @param string $paymentcode1
     */
    public function setPaymentcode1($paymentcode1)
    {
        $this->paymentcode1 = $paymentcode1;
    }

    /**
     * @return string
     */
    public function getPaymentcode1()
    {
        return $this->paymentcode1;
    }

    /**
     * @param string $paymentcode10
     */
    public function setPaymentcode10($paymentcode10)
    {
        $this->paymentcode10 = $paymentcode10;
    }

    /**
     * @return string
     */
    public function getPaymentcode10()
    {
        return $this->paymentcode10;
    }

    /**
     * @param string $paymentcode2
     */
    public function setPaymentcode2($paymentcode2)
    {
        $this->paymentcode2 = $paymentcode2;
    }

    /**
     * @return string
     */
    public function getPaymentcode2()
    {
        return $this->paymentcode2;
    }

    /**
     * @param string $paymentcode3
     */
    public function setPaymentcode3($paymentcode3)
    {
        $this->paymentcode3 = $paymentcode3;
    }

    /**
     * @return string
     */
    public function getPaymentcode3()
    {
        return $this->paymentcode3;
    }

    /**
     * @param string $paymentcode4
     */
    public function setPaymentcode4($paymentcode4)
    {
        $this->paymentcode4 = $paymentcode4;
    }

    /**
     * @return string
     */
    public function getPaymentcode4()
    {
        return $this->paymentcode4;
    }

    /**
     * @param string $paymentcode5
     */
    public function setPaymentcode5($paymentcode5)
    {
        $this->paymentcode5 = $paymentcode5;
    }

    /**
     * @return string
     */
    public function getPaymentcode5()
    {
        return $this->paymentcode5;
    }

    /**
     * @param string $paymentcode6
     */
    public function setPaymentcode6($paymentcode6)
    {
        $this->paymentcode6 = $paymentcode6;
    }

    /**
     * @return string
     */
    public function getPaymentcode6()
    {
        return $this->paymentcode6;
    }

    /**
     * @param string $paymentcode7
     */
    public function setPaymentcode7($paymentcode7)
    {
        $this->paymentcode7 = $paymentcode7;
    }

    /**
     * @return string
     */
    public function getPaymentcode7()
    {
        return $this->paymentcode7;
    }

    /**
     * @param string $paymentcode8
     */
    public function setPaymentcode8($paymentcode8)
    {
        $this->paymentcode8 = $paymentcode8;
    }

    /**
     * @return string
     */
    public function getPaymentcode8()
    {
        return $this->paymentcode8;
    }

    /**
     * @param string $paymentcode9
     */
    public function setPaymentcode9($paymentcode9)
    {
        $this->paymentcode9 = $paymentcode9;
    }

    /**
     * @return string
     */
    public function getPaymentcode9()
    {
        return $this->paymentcode9;
    }

    /**
     * @param float $secondAmount
     */
    public function setSecondAmount($secondAmount)
    {
        $this->secondAmount = $secondAmount;
    }

    /**
     * @return float
     */
    public function getSecondAmount()
    {
        return $this->secondAmount;
    }

    /**
     * @param \DateTime $secondDueDate
     */
    public function setSecondDueDate($secondDueDate)
    {
        $this->secondDueDate = $secondDueDate;
    }

    /**
     * @return \DateTime
     */
    public function getSecondDueDate()
    {
        return $this->secondDueDate;
    }

    /**
     * @param string $site
     */
    public function setSite($site)
    {
        $this->site = $site;
    }

    /**
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

}
