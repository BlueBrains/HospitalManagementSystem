<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    
    <title><?php if (isset($title)) echo $title; else echo "title"; ?></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- TABLE STYLES-->
    <link href="<?php echo base_url();?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />   
    <!-- JQUERY.UI STYLES-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.ui.css" type="text/css" media="screen" />
    <!-- CHOSEN.JQUERY STYLES-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.min.css" type="text/css" media="screen" />    
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="<?php echo base_url();?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url();?>/javascript/SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
  <link href="<?php echo base_url();?>/javascript/SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript">
            $(document).ready(function(){
                $('.TabbedPanels .TabbedPanelsContent:first').hide();
                $('#ok').hide();
                 //$('#s_'+'2').slideToggle('slow');
                //$('.TabbedPanels .TabbedPanelsContent:nth-child(2)').slideDown('slow');
                
                $('.TabbedPanelsTab').click(function(){
                                                        var x=$(this).attr('id');
                                                        //alert(x);
                                                        $('#s_'+x).hide();
                                                        $('#s_'+x).slideToggle('slow');
                                                          $('#ok').fadeIn('slow');});
            });
        </script>
</head>
<body>
    <div id="wrapper" style="background-color: #0D4F7A;">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0;background-color: #0D4F7A;">
            <div class="navbar-header" style="margin-left: 2px; padding-left: 22px;background-color: #0D4F7A;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="#"><img src="<?php echo base_url();?>assets/img/logo2.png" class="img-responsive" alt="Responsive image" style="margin-right: 50px;"></a>
                <!--<a class="navbar-brand" href="index.html"><?php $section ?></a>-->
                 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 12px;margin-top: 7px;"> 
 Last access : <?php echo(date("Y-m-d",$user->last_login));?> &nbsp; <a href="<?php echo base_url()?>auth/logout" class="btn btn-danger square-btn-adjust" style="background-color: #0F275A;">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
