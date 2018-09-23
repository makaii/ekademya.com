    <footer class="c3 text-white" style="margin-top: 6rem;padding-top: 1rem; padding-bottom: .25rem;">
      <div class="container-fluid">
        <div>
          <small>
            <pre class="text-white"><?php $userdata = $this->Admin_model->display_userdata();if($userdata==1){print_r($this->session->all_userdata());} ?></pre>
          </small>
        </div>
        <div class="row text-center">
          <div class="col">
            <small><strong>Company</strong></small>
            <ul class="list-unstyled">
              <li class="text-muted">About Us</li>
              <li class="text-muted">Partners</li>
              <li class="text-muted">Topics</li>
            </ul>
          </div>
          <div class="col">
            <small><strong>Community</strong></small>
            <ul class="list-unstyled">
              <li class="text-muted">Careers</li>
              <li class="text-muted">Developers</li>
              <li class="text-muted">Free Classes</li>
            </ul>
          </div>
          <div class="col">
            <small><strong>Connect</strong></small>
            <ul class="list-unstyled">
              <a href="<?php echo base_url('blog'); ?>"><li class="text-muted">Blog</li></a>
              <li class="text-muted">Forum</li>
            </ul>
          </div>
        </div>
        <hr>
        <div class="row text-center">
          <div class="col">
            <small>© 2017 Ekademya&#8482 Inc. All rights reserved.</small>
          </div>
          <div class="col">
            <ul class="list-inline">
              <li class="list-inline-item"><small>Terms</small></li>
              <li class="list-inline-item"><small>Privacy Policy</small></li>
              <li class="list-inline-item"><small>Intellectual Property</small></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>