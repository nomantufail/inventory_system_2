<style>    .editable-error-block{        color: red;        font-weight: bold;    }</style><div id="page-wrapper"><div class="container-fluid">    <!--including editable links-->    <?php include_editable_libs(); ?><div class="row">    <div class="col-lg-12">        <section class="col-md-5">            <h3 class="page-header">                Customers                <small>                    <select class="" name="customers" id="customers" onchange="change_agent('<?= base_url()."agents/profile/" ?>','customers')" style="border: none;">                        <?php foreach($customers as $agent): ?>                            <?php                                $selected = ($profile->id == $agent->id)?'selected':'';                            ?>                        <option value="<?= $agent->id ?>" <?= $selected ?>><?= ucwords($agent->name); ?></option>                        <?php endforeach; ?>                    </select>                </small>            </h3>        </section>        <section class="col-md-7">            <ul id="myTab" class="nav nav-pills page-header">                <li class="active"><a href="<?= base_url()."agents/profile/".$profile->id;?>">Profile</a></li>                <li><a href="<?= base_url()."agents/tankers/".$profile->id;?>">Tankers</a></li>                <!--<li><a href="<?/*= base_url()."agents/accounts/".$profile->id;*/?>">Accounts</a></li>-->            </ul>        </section>    </div></div><section><div id="myTabContent" class="tab-content" style="min-height: 500px;"><div class="tab-pane fade in active" id="profile">    <br><br>    <div class="col-lg-12">        <section style="background-color: ;" class="col-md-3 visible-lg visible-md">            <img src="<?= images()?>profile.jpg" width="100%" height="100%">        </section>        <section style="background-color: ;" class="col-md-3 visible-sm">            <img src="<?= images()?>profile.jpg" width="200px" height="270px">        </section>        <section style="background-color: ;" class="col-md-6">            <table class="table">                <tr style="border-top: 2px solid #ffffff;">                    <th>Name</th>                    <td><a href="#" id="name" data-type="text" data-pk="<?= $profile->id ?>" data-url="<?= base_url()."helper_controller/edit_record/agents/required" ?>" data-title="Change Address"><?= $profile->name; ?></a></td>                </tr>                <tr style="border-top: 2px solid #ffffff;">                    <th>Phone 1</th>                    <td><a href="#" id="phone" data-type="text" data-pk="<?= $profile->id ?>" data-url="<?= base_url()."helper_controller/edit_record/agents" ?>" data-title="Change Address"><?= $profile->phone; ?></a></td>                </tr>                <tr style="border-top: 2px solid #ffffff;">                    <th>Email 1</th>                    <td><a href="#" id="email" data-type="email" data-pk="<?= $profile->id ?>" data-url="<?= base_url()."helper_controller/edit_record/agents" ?>" data-title="Change Address"><?= $profile->email; ?></a></td>                </tr>                <tr style="border-top: 2px solid #ffffff;">                    <th>Address</th>                    <td>                        <a href="#" id="address" data-type="text" data-pk="<?= $profile->id ?>" data-url="<?= base_url()."helper_controller/edit_record/agents" ?>" data-title="Change Address"><?= $profile->address; ?></a>                    </td>                </tr>            </table>        </section>        <section style="background-color: ;" class="col-md-12">            <hr>            And other details goes here if needed...        </section>    </div></div></div></section></div></div><script>    $(function(){        $('#address').editable({            inputclass: 'form-control'        });        $('#email').editable({            inputclass: 'form-control'        });        $('#phone').editable({            inputclass: 'form-control'        });        $('#name').editable({            inputclass: 'form-control'        });    });</script>