<?php
/**
 * Created by Zeenomlabs.
 * User: ZeenomLabs
 * Date: 4/6/15
 * Time: 12:52 AM
 */
?>

<section class="col-md-12">
    <ul id="myTab" class="nav nav-pills page-header" style="border-bottom: 0px solid;">
        <li class="<?php if($this->uri->segment(3) == 'suppliers' || $this->uri->segment(3) == ''){echo "active";} ?>" ><a href="<?= base_url()."agents/index/suppliers/?".$_SERVER['QUERY_STRING']?>">Suppliers</a></li>
        <li class="<?php if($this->uri->segment(3) == 'customers'){echo "active";} ?>"><a href="<?= base_url()."agents/index/customers/?".$_SERVER['QUERY_STRING']?>">Customers</a></li>
    </ul>
</section>