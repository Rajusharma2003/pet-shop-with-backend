<!-- Footer Section -->
<footer class="footer-section position-relative">
    <div class="bg-background-section">
        <div class="container ">
        <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
                <div class="col-md-8">
                    <h2 class="fw-bold">Subscribe to Our Newsletter</h2>
                    <p>Get the latest deals and offers right to your inbox.</p>
                    <form class="d-flex justify-content-center align-items-center gap-2">
                        <input type="email" placeholder="Enter your email..." class="form-control w-50" />
                        <button type="submit" class="btn btn-secondary">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-3 mb-4" data-aos="fade-up">
                    <img src="<?php echo validate_image($_settings->info('logo')) ?>" class="rounded-1 img-fluid w-50 d-inline-block align-top" alt="" loading="lazy">
                    <p>PetPath offers exceptional pet care services including grooming, boarding, and more. Our dedicated team is here for you!</p>
                    <div class="d-flex gap-2 justify-content-center">
                        <a href="#" class="btn btn-outline-light btn-circle">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-circle">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-circle">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-circle">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 mb-4" data-aos="fade-up">
                    <h5 class="fw-bold">Pages</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">Home</a></li>
                        <li><a href="#" class="text-light">About</a></li>
                        <li><a href="#" class="text-light">Services</a></li>
                        <li><a href="#" class="text-light">Team</a></li>
                        <li><a href="#" class="text-light">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4" data-aos="fade-down">
                    <h5 class="fw-bold">Contact Info</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i> shop No: B 184, Handar Vihar, Block B, Palam Extension, New Delhi 110075</li>
                        <li><i class="fas fa-phone-alt me-2"></i> 9974519999999</li>
                        <li><i class="fas fa-envelope me-2"></i> contact@example.com</li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up">
                    <h5 class="fw-bold">Working Hours</h5>
                    <ul class="list-unstyled">
                        <li>Mon - Fri: <span>7am - 6pm</span></li>
                        <li>Saturday: <span>9am - 4pm</span></li>
                        <li>Sunday: <span class="text-danger">Closed</span></li>
                    </ul>
                </div>
            </div>
            <div class="text-center py-3 border-top mt-4">
                <small>© 2024 -  | All rights reserved by <a href="#" class="text-light">ThePetYard</a>. Made by <a href="https://viraladsmedia.com" target="_blank" class="text-light">ViralAdsMedia</a></small>
            </div>
        </div>
    </div>
</footer>

<!-- Date Range Picker (hidden) -->
<div class="daterangepicker ltr show-ranges opensright">
    <div class="ranges">
        <ul>
            <li data-range-key="Today">Today</li>
            <li data-range-key="Yesterday">Yesterday</li>
            <li data-range-key="Last 7 Days">Last 7 Days</li>
            <li data-range-key="Last 30 Days">Last 30 Days</li>
            <li data-range-key="This Month">This Month</li>
            <li data-range-key="Last Month">Last Month</li>
            <li data-range-key="Custom Range">Custom Range</li>
        </ul>
    </div>
    <div class="drp-calendar left">
        <div class="calendar-table"></div>
        <div class="calendar-time" style="display: none;"></div>
    </div>
    <div class="drp-calendar right">
        <div class="calendar-table"></div>
        <div class="calendar-time" style="display: none;"></div>
    </div>
    <div class="drp-buttons">
        <span class="drp-selected"></span>
        <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button>
        <button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button>
    </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url ?>plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url ?>plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- SweetAlert2 -->
<script src="<?php echo base_url ?>plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Toastr -->
<script src="<?php echo base_url ?>plugins/toastr/toastr.min.js"></script>

<!-- Custom scripts -->
<script>
    var _base_url_ = '<?php echo base_url ?>';
</script>
<script src="<?php echo base_url ?>dist/js/script.js"></script>
<script src="<?php echo base_url ?>assets/js/scripts.js"></script>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url ?>plugins/chart.js/Chart.min.js"></script>

<!-- Sparkline -->
<script src="<?php echo base_url ?>plugins/sparklines/sparkline.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url ?>plugins/select2/js/select2.full.min.js"></script>

<!-- JQVMap -->
<script src="<?php echo base_url ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<!-- jQuery Knob Chart -->
<script src="<?php echo base_url ?>plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- daterangepicker -->
<script src="<?php echo base_url ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url ?>plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Summernote -->
<script src="<?php echo base_url ?>plugins/summernote/summernote-bs4.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url ?>dist/js/adminlte.js"></script>

<!-- This is the aos effect -->
 <!-- AOS JavaScript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>
  AOS.init();
</script>
 <!-- End aos -->

<script>
  $(document).ready(function(){
    $('#p_use').click(function(){
      uni_modal("Privacy Policy", "policy.php", "mid-large");
    });

    window.viewer_modal = function($src = '') {
      start_loader();
      var t = $src.split('.');
      t = t[1];
      var view;
      if (t == 'mp4') {
        view = $("<video src='" + $src + "' controls autoplay></video>");
      } else {
        view = $("<img src='" + $src + "' />");
      }
      $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove();
      $('#viewer_modal .modal-content').append(view);
      $('#viewer_modal').modal({
          show: true,
          backdrop: 'static',
          keyboard: false,
          focus: true
      });
      end_loader();
    };

    window.uni_modal = function($title = '', $url = '', $size = "") {
      start_loader();
      $.ajax({
        url: $url,
        error: function(err) {
          console.log(err);
          alert("An error occurred");
        },
        success: function(resp) {
          if (resp) {
            $('#uni_modal .modal-title').html($title);
            $('#uni_modal .modal-body').html(resp);
            if ($size != '') {
              $('#uni_modal .modal-dialog').addClass($size + ' modal-dialog-centered');
            } else {
              $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md modal-dialog-centered");
            }
            $('#uni_modal').modal({
              show: true,
              backdrop: 'static',
              keyboard: false,
              focus: true
            });
            end_loader();
          }
        }
      });
    };

    window._conf = function($msg = '', $func = '', $params = []) {
      $('#confirm_modal #confirm').attr('onclick', $func + "(" + $params.join(',') + ")");
      $('#confirm_modal .modal-body').html($msg);
      $('#confirm_modal').modal('show');
    };
  });
</script>


<!-- This is the website templete  -->

<!-- this is for the style css -->
 <style>
   .body{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  overflow: hidden;
   }
 </style>

 <!-- End here -->