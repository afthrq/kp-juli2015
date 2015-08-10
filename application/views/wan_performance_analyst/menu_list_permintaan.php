<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Ahmad Fathoriq Fauzi and Muhammad Ashari">
        <title>DB WAN</title>
        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/theme.bootstrap.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/metisMenu.min.css"') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/sb-admin-2.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <img class="header-logo" src="<?php echo base_url('assets/img/header-pertamina.png') ?>" alt="">
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="<?php echo base_url(); ?>user/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="<?php echo base_url() ?>wanperformance"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>wanperformance/menu_list_permintaan" class="sidebar-active"><i class="fa fa-edit fa-fw"></i> Monitoring <span class="badge pull-right"><?php echo $count_mon?></span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Monitoring yang perlu dilakukan</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    List Permintaan
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="mytable" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Perusahaan</th>
                                                    <th>Jenis Lokasi</th>
                                                    <th>Lokasi</th>
                                                    <th>Layanan</th>
                                                    <th>Bandwidth</th>
                                                    <th>Tipe Permintaan</th>
                                                    <th>No. Permintaan</th>
                                                    <th>Tanggal Permintaan</th>
                                                    <th>Tgl. Akhir Pengerjaan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($list_permintaan as $row) : ?>
                                                    <tr class="data">
                                                      <td><?php echo $row->company_name?></td>
                                                      <td><?php echo $row->type_name?></td>
                                                      <td><?php echo $row->site_name?></td>
                                                      <td><?php echo $row->service_name?> | <?php echo $row->package?></td>
                                                      <td><?php echo $row->bw?></td>
                                                      <td><?php echo $row->ord_name?></td>
                                                      <td><?php echo $row->no_form_permintaan?></td>
                                                      <td><?php $permintaan = new DateTime($row->tgl_permintaan); 
                                                                echo $permintaan->format('d-m-Y')?>
                                                      </td>
                                                      <td><?php $date = new DateTime($row->tgl_permintaan);
                                                                $delivtime = $row->delivery_time;
                                                                $date->add(new DateInterval("P". $delivtime. "D"));
                                                                $duedate = $date->format('d-m-Y');
                                                                echo $duedate;?>
                                                      </td>
                                                      <td><?php $now = new DateTime();
                                                                $interval = $date->diff($now);
                                                                $status = $interval->format('%a');
                                                                if ($status >= 7) {
                                                                    echo "<img class='warn' src=".base_url('assets/img/warn-green.png')." >";
                                                                }
                                                                elseif ($status > 1 && $status < 7  ) {
                                                                    echo "<img class='warn' src=".base_url('assets/img/warn-yellow.png')." >";
                                                                }
                                                                else {
                                                                    echo "<img class='warn' src=".base_url('assets/img/warn-red.png')." >";
                                                                }?>
                                                      </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                  <th colspan="10" class="ts-pager form-horizontal">
                                                    <button type="button" class="btn first"><i class="icon-step-backward glyphicon glyphicon-step-backward"></i></button>
                                                    <button type="button" class="btn prev"><i class="icon-arrow-left glyphicon glyphicon-backward"></i></button>
                                                    <span class="pagedisplay"></span> <!-- this can be any element, including an input -->
                                                    <button type="button" class="btn next"><i class="icon-arrow-right glyphicon glyphicon-forward"></i></button>
                                                    <button type="button" class="btn last"><i class="icon-step-forward glyphicon glyphicon-step-forward"></i></button>
                                                    <select class="pagesize input-mini" title="Select page size">
                                                      <option selected="selected" value="10">10</option>
                                                      <option value="20">20</option>
                                                      <option value="30">30</option>
                                                      <option value="40">40</option>
                                                    </select>
                                                    <select class="pagenum input-mini" title="Select page number"></select>
                                                  </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <form id="myform" method="POST" action="<?php echo base_url('wanperformance/monitoring')?>">
                        <input type="hidden" name="order_id" id="id">
                    </form>
                </div>
                <!-- /.container-fluid -->  
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url('assets/js/metisMenu.min.js')?>"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url('assets/js/sb-admin-2.js')?>"></script>

        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.tablesorter.js')?>"></script>

        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.tablesorter.widgets.js')?>"></script>

         <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.tablesorter.pager.js')?>"></script>

        <script type="text/javascript">
            $(function() {

              // NOTE: $.tablesorter.theme.bootstrap is ALREADY INCLUDED in the jquery.tablesorter.widgets.js
              // file; it is included here to show how you can modify the default classes
              $.tablesorter.themes.bootstrap = {
                // these classes are added to the table. To see other table classes available,
                // look here: http://getbootstrap.com/css/#tables
                table        : 'table table-bordered table-striped',
                caption      : 'caption',
                // header class names
                header       : 'bootstrap-header', // give the header a gradient background (theme.bootstrap_2.css)
                sortNone     : '',
                sortAsc      : '',
                sortDesc     : '',
                active       : '', // applied when column is sorted
                hover        : '', // custom css required - a defined bootstrap style may not override other classes
                // icon class names
                icons        : '', // add "icon-white" to make them white; this icon class is added to the <i> in the header
                iconSortNone : 'bootstrap-icon-unsorted', // class name added to icon when column is not sorted
                iconSortAsc  : 'glyphicon glyphicon-chevron-up', // class name added to icon when column has ascending sort
                iconSortDesc : 'glyphicon glyphicon-chevron-down', // class name added to icon when column has descending sort
                filterRow    : '', // filter row class; use widgetOptions.filter_cssFilter for the input/select element
                footerRow    : '',
                footerCells  : '',
                even         : '', // even row zebra striping
                odd          : ''  // odd row zebra striping
              };

              // call the tablesorter plugin and apply the uitheme widget
              $("#mytable").tablesorter({
                // this will apply the bootstrap theme if "uitheme" widget is included
                // the widgetOptions.uitheme is no longer required to be set
                theme : "bootstrap",

                widthFixed: true,

                sortList: [[0,0],[1,0]],

                headerTemplate : '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!

                // widget code contained in the jquery.tablesorter.widgets.js file
                // use the zebra stripe widget if you plan on hiding any rows (filter widget)
                widgets : [ "uitheme", "filter", "zebra" ],

                widgetOptions : {
                  // using the default zebra striping class name, so it actually isn't included in the theme variable above
                  // this is ONLY needed for bootstrap theming if you are using the filter widget, because rows are hidden
                  zebra : ["even", "odd"],

                  // reset filters button
                  filter_reset : ".reset",

                  // extra css class name (string or array) added to the filter element (input or select)
                  filter_cssFilter: "form-control",

                  // set the uitheme widget to use the bootstrap theme class names
                  // this is no longer required, if theme is set
                  // ,uitheme : "bootstrap"

                }
              })
              .tablesorterPager({

                // target the pager markup - see the HTML block below
                container: $(".ts-pager"),

                // target the pager page select dropdown - choose a page
                cssGoto  : ".pagenum",

                // remove rows from the table to speed up the sort of large tables.
                // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
                removeRows: false,

                // output string - default is '{page}/{totalPages}';
                // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
                output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'

              });

            });
        </script>

        <script>
            //using double click
            $("#mytable .data").click(function(){
               $(this).addClass('selected').siblings().removeClass('selected');    
               var value=$(this).find('td:nth-child(3)').html();
            });

            $("#mytable .data").dblclick(function(){    
               var value=$(this).find('td:nth-child(3)').html(); 
               $('#id').val(value);
               $('#myform').submit();   
            });
            //using second click
            /*$("#mytable .data").one("click",function(e) {
                $(this).addClass('selected').siblings().removeClass('selected');    
                var value=$(this).find('td:nth-child(3)').html();
                $(this).one("click",function() {
                    $('#id').val(value);
                    $('#myform').submit();
                });
            });*/
        </script>
    </body>
</html>



