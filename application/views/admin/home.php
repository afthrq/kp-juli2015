<!-- /.navbar-top-links -->
<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
      <li>
        <a href="<?php echo base_url() ?>user/home/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
      </li>
      <li>
        <a href="<?php echo base_url() ?>user/table/"><i class="fa fa-table fa-fw"></i> Tables</a>
      </li>
      <li>
        <a href="<?php echo base_url() ?>user/forms/"><i class="fa fa-edit fa-fw"></i> Forms</a>
      </li>
    </ul>
  </div>
  <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>
<div id="page-wrapper">
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header"><?php print_r($this->session->userdata('user_name')) ?> Home</h1>
    <li>
      <div>
        <p>
          <strong>Task 1</strong>
          <span class="pull-right text-muted">40% Complete</span>
        </p>
        <div class="progress progress-striped active">
          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
            <span class="sr-only">40% Complete (success)</span>
          </div>
        </div>
      </div>
    </li>
    <li>
      <div>
        <p>
          <strong>Task 2</strong>
          <span class="pull-right text-muted">20% Complete</span>
        </p>
        <div class="progress progress-striped active">
          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
            <span class="sr-only">20% Complete</span>
          </div>
        </div>
      </div>
    </li>
    <li>
      <div>
        <p>
          <strong>Task 3</strong>
          <span class="pull-right text-muted">60% Complete</span>
        </p>
        <div class="progress progress-striped active">
          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
            <span class="sr-only">60% Complete (warning)</span>
          </div>
        </div>
      </div>
    </li>
    <li
      <div>
        <p>
          <strong>Task 4</strong>
          <span class="pull-right text-muted">80% Complete</span>
        </p>
        <div class="progress progress-striped active">
          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
            <span class="sr-only">80% Complete (danger)</span>
          </div>
        </div>
      </div>
    </li>
  </div>
  <!-- /.col-lg-12 -->
</div>
</div>
<!-- /#page-wrapper -->
</div>