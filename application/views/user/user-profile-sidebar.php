<?php 
if(!isset($userInfo) && $this->session->userdata('uid')) {
  $this->load->model('User_model');
  $userInfo = $this->user_model->user_uid($this->session->userdata('uid'))[0];
}
?>
<div class="col-md-3">
  <aside class="user-profile-sidebar">
  <div class="user-profile-avatar text-center">
    <img src="<?=base_url() ?>assets/img/amaze_300x300.jpg" alt="Image  augurs" title="AMaze" />
    <?php if(isset($userInfo)) { ?>
      <h5><?=$userInfo['first_name'] . ' ' . $userInfo['last_name']?></h5>
      <p>Member Since <?= date('M Y', strtotime($userInfo['date'])) ?></p>
    <?php } else { ?>
      <h5>Guest</h5>
    <?php } ?>
  </div>
  <ul class="list user-profile-nav">
    <li><a href="index" <?=$activeMenu == 'index' ? 'class="active"':''?>><i class="fa fa-clock-o"></i>Booking History</a>
    </li>
    <li><a href="userSettings" <?=$activeMenu == 'userSettings' ? 'class="active"':''?>><i class="fa fa-cog"></i>Settings</a>
    </li>
    <!-- <li><a href="travelPhotos" <?=$activeMenu == 'travelPhotos' ? 'class="active"':''?>><i class="fa fa-camera"></i>My Travel Photos</a>
    </li> -->
    <!-- <li><a href="bookingHistory" <?=$activeMenu == 'bookingHistory' ? 'class="active"':''?>><i class="fa fa-clock-o"></i>Booking History</a>
    </li>
    <li><a href="savedCards" <?=$activeMenu == 'savedCards' ? 'class="active"':''?>><i class="fa fa-credit-card"></i>Credit/Debit Cards</a>
    </li>
    <li><a href="wishlist" <?=$activeMenu == 'wishlist' ? 'class="active"':''?>><i class="fa fa-heart-o"></i>Wishlist</a>
    </li> -->
  </ul>
  </aside>
</div>