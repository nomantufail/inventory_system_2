<div class="col-lg-12">
    <ul id="myTab" class="nav nav-pills" style="border-bottom: 0px solid;">
        <li class="<?php if($this->uri->segment(2) == '' || $this->uri->segment(2)=='cash_purchase'){echo "active";} ?>">
            <a href="<?= $this->helper_model->controller_path()."cash_purchase" ?>"><i class="fa fa-fw fa-plus-circle"></i> Cash Purchase</a>
        </li>
        <li class="<?php if($this->uri->segment(2) == 'credit_purchase'){echo "active";} ?>">
            <a href="<?= $this->helper_model->controller_path()."credit_purchase" ?>"><i class="fa fa-fw fa-plus-circle"></i> Credit Purchase</a>
        </li>
        <li class="<?php if($this->uri->segment(2) == 'cash'){echo "active";} ?>">
            <a href="<?= $this->helper_model->controller_path()."cash" ?>"><i class="fa fa-fw fa-file-o"></i> Cash Purchase History</a>
        </li>
        <li class="<?php if($this->uri->segment(2) == 'credit'){echo "active";} ?>">
            <a href="<?= $this->helper_model->controller_path()."credit" ?>"><i class="fa fa-fw fa-file-o"></i> Credit Purchase History</a>
        </li>
    </ul>
</div>