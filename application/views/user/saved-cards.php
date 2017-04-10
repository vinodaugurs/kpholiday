<?php include(APPPATH.'views/home/header.php');?>

<div class="container">
    <h1 class="page-title">Credit/Debit Cards</h1>
</div>

<div class="container">
    <div class="row">
        <?php include(APPPATH.'views/user/user-profile-sidebar.php'); ?>
        <div class="col-md-9">
            <div class="mfp-with-anim mfp-hide mfp-dialog" id="edit-card-dialog">
                <h3 class="mb0">Edit Card</h3>
                <p>Visa XXXX XXXX XXXX 1234</p>
                <form class="cc-form">
                    <div class="clearfix">
                        <div class="form-group form-group-cc-number">
                            <label>Card Number</label>
                            <input class="form-control" placeholder="xxxx xxxx xxxx xxxx" type="text" /><span class="cc-card-icon"></span>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="form-group form-group-cc-name">
                            <label>Cardholder Name</label>
                            <input class="form-control" value="John Doe" type="text" />
                        </div>
                        <div class="form-group form-group-cc-date">
                            <label>Valid Thru</label>
                            <input class="form-control" placeholder="mm/yy" type="text" />
                        </div>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input class="i-check" type="checkbox" />Set as primary</label>
                    </div>
                    <ul class="list-inline">
                        <li>
                            <input class="btn btn-primary" type="submit" value="Edit Card" />
                        </li>
                        <li>
                            <button class="btn btn-primary"><i class="fa fa-times"></i> Remove Card</button>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="mfp-with-anim mfp-hide mfp-dialog" id="new-card-dialog">
                <h3>New Card</h3>
                <form class="cc-form">
                    <div class="clearfix">
                        <div class="form-group form-group-cc-number">
                            <label>Card Number</label>
                            <input class="form-control" placeholder="xxxx xxxx xxxx xxxx" type="text" /><span class="cc-card-icon"></span>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="form-group form-group-cc-name">
                            <label>Cardholder Name</label>
                            <input class="form-control" value="John Doe" type="text" />
                        </div>
                        <div class="form-group form-group-cc-date">
                            <label>Valid Thru</label>
                            <input class="form-control" placeholder="mm/yy" type="text" />
                        </div>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input class="i-check" type="checkbox" checked/>Set as primary</label>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Add Card" />
                </form>
            </div>
            <div class="row row-wrap">
                <div class="col-md-4">
                    <div class="card-thumb">
                        <ul class="card-thumb-actions">
                            <li>
                                <a class="fa fa-pencil popup-text" href="#edit-card-dialog" rel="tooltip" data-placement="top" title="edit" data-effect="mfp-zoom-out"></a>
                            </li>
                            <li>
                                <a class="fa fa-times" href="#" rel="tooltip" data-placement="top" title="remove"></a>
                            </li>
                        </ul>
                        <p class="card-thumb-number">XXXX XXX XXXX 5622</p>
                        <p class="card-thumb-valid">valid thru <span>8 / 18</span>
                        </p>
                        <img class="card-thumb-type" src="<?=base_url()?>assets/img/payment/mastercard-curved-32px.png" alt="Image  augurs" title="kpholidays" /><small>cardholder name</small>
                        <h5 class="uc">John Doe</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-thumb card-thumb-primary"><span class="card-thumb-primary-label">primary</span>
                        <ul class="card-thumb-actions">
                            <li>
                                <a class="fa fa-pencil popup-text" href="#edit-card-dialog" rel="tooltip" data-placement="top" title="edit" data-effect="mfp-zoom-out"></a>
                            </li>
                            <li>
                                <a class="fa fa-times" href="#" rel="tooltip" data-placement="top" title="remove"></a>
                            </li>
                        </ul>
                        <p class="card-thumb-number">XXXX XXX XXXX 9923</p>
                        <p class="card-thumb-valid">valid thru <span>12 / 16</span>
                        </p>
                        <img class="card-thumb-type" src="<?=base_url()?>assets/img/payment/mastercard-curved-32px.png" alt="Image  augurs" title="kpholidays" /><small>cardholder name</small>
                        <h5 class="uc">John Doe</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-thumb">
                        <ul class="card-thumb-actions">
                            <li>
                                <a class="fa fa-pencil popup-text" href="#edit-card-dialog" rel="tooltip" data-placement="top" title="edit" data-effect="mfp-zoom-out"></a>
                            </li>
                            <li>
                                <a class="fa fa-times" href="#" rel="tooltip" data-placement="top" title="remove"></a>
                            </li>
                        </ul>
                        <p class="card-thumb-number">XXXX XXX XXXX 4335</p>
                        <p class="card-thumb-valid">valid thru <span>6 / 15</span>
                        </p>
                        <img class="card-thumb-type" src="<?=base_url()?>assets/img/payment/american-express-curved-32px.png" alt="Image  augurs" title="kpholidays" /><small>cardholder name</small>
                        <h5 class="uc">John Doe</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-thumb">
                        <ul class="card-thumb-actions">
                            <li>
                                <a class="fa fa-pencil popup-text" href="#edit-card-dialog" rel="tooltip" data-placement="top" title="edit" data-effect="mfp-zoom-out"></a>
                            </li>
                            <li>
                                <a class="fa fa-times" href="#" rel="tooltip" data-placement="top" title="remove"></a>
                            </li>
                        </ul>
                        <p class="card-thumb-number">XXXX XXX XXXX 1547</p>
                        <p class="card-thumb-valid">valid thru <span>11 / 18</span>
                        </p>
                        <img class="card-thumb-type" src="<?=base_url()?>assets/img/payment/visa-curved-32px.png" alt="Image  augurs" title="kpholidays" /><small>cardholder name</small>
                        <h5 class="uc">John Doe</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-thumb">
                        <ul class="card-thumb-actions">
                            <li>
                                <a class="fa fa-pencil popup-text" href="#edit-card-dialog" rel="tooltip" data-placement="top" title="edit" data-effect="mfp-zoom-out"></a>
                            </li>
                            <li>
                                <a class="fa fa-times" href="#" rel="tooltip" data-placement="top" title="remove"></a>
                            </li>
                        </ul>
                        <p class="card-thumb-number">XXXX XXX XXXX 9348</p>
                        <p class="card-thumb-valid">valid thru <span>8 / 16</span>
                        </p>
                        <img class="card-thumb-type" src="<?=base_url()?>assets/img/payment/american-express-curved-32px.png" alt="Image  augurs" title="kpholidays" /><small>cardholder name</small>
                        <h5 class="uc">John Doe</h5>
                    </div>
                </div>
                <div class="col-md-4"><a class="card-thumb popup-text" href="#new-card-dialog" data-effect="mfp-zoom-out"><i class="fa fa-plus card-thumb-new"></i><p >add new card</p></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="gap"></div>
<?php include(APPPATH.'views/home/footer.php');?>