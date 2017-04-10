<div class="container">
    <h1 class="page-title">Contact Us</h1>
</div>
<div class="container">
    <div class="row">
        <div class=" col-md-6" style="margin-bottom:20px;">
            <div class="map_box">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3562.1743277917253!2d80.94267711463266!3d26.770712483188873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfb78041db227%3A0x86fb742e0ecd1c1f!2sRaebareli+Rd%2C+South+City%2C+Lucknow%2C+Uttar+Pradesh+226012!5e0!3m2!1sen!2sin!4v1485599479377" width="100%" height="310" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-6">
            <p>By using new methods and advanced technology, we can offer the lowest fares and highest standard of service in travel today. KPHolidays only think about how to satisfy you, no matter how long it takes, or how low they get your fare.</p>
            <?=$this->session->flashdata('msg')?>
            <form class="mt30" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input class="form-control" name="fullname" required="required" value="<?php echo (set_value('fullname') == false) ? set_value('fullname'): ''; ?>" type="text" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input class="form-control" name="email" required="required" value="<?php echo (set_value('email') == false) ? set_value('email') : ''; ?>" type="email" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" name="message" required="required" minlength="10" maxlength="500"><?php echo (set_value('message') == false) ? set_value('message') : ''; ?></textarea>
                </div>
                <input class="btn btn-primary" type="submit" name="send" value="Send Message" />
            </form>
        </div>
        <div class=" clearfix"></div>
    </div>
    <div class="gap"></div>
</div>