<?php
/**
 * Created by Zeenomlabs.
 * User: ZeenomLabs
 * Date: 4/7/15
 * Time: 6:42 AM
 */

class Purchase_Invoice {

    public $id;
    public $supplier;
    public $date;
    public $extra_info;
    public $entries;

    public function __construct()
    {
        $this->entries = array();
    }

    public function extra_info_simplified()
    {
        $extra_info = $this->extra_info;
        if(strlen($extra_info) > 50)
        {
            $extra_info = substr($extra_info, 0,50);
            $extra_info.="...";
        }
        return $extra_info;
    }
} 