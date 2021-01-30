<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <!-- <title><?php bloginfo("name");?> - <?php bloginfo("description");?></title> -->
    <!-- Bootstrap Core CSS -->

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri();?>">
<?php wp_head();?>
</head>

<body <?php body_class();?>>
    <header class="header-style-1">
        <div class="top-bar animate-dropdown">
            <div class="container">
                <div class="header-top-inner">
                    <div class="cnt-account">
                        <ul class="list-unstyled">
                            <li><a href="<?php echo esc_url(home_url('/'));?>my-account/"><i class="icon fa fa-user"></i>My Account</a></li>
                            <li><a href="<?php echo esc_url(home_url('/'));?>cart/"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                            <li><a href="<?php echo esc_url(home_url('/'));?>checkout/"><i class="icon fa fa-check"></i>Checkout</a></li>
                            <li><a href="<?php echo esc_url(home_url('/'));?>login/"><i class="icon fa fa-lock"></i>Login</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-10 logo-holder">
                        <div class="logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>"> <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" alt="logo"> </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                        <div class="dropdown dropdown-cart">
                            <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                                <div class="items-cart-inner">
                                    <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                    <div class="basket-item-count"><span class="count">
                                        <?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?>

                                    </span></div>
                                    <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price"> <span class="sign"></span><span class="value"><?php wc_cart_totals_order_total_html(); ?></span> </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-nav animate-dropdown">
                <div class="container">
                    <div class="yamm navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        </div>
                        <div class="nav-bg-class">
                            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                                <div class="nav-outer" id="nav">
                                   
                                 <?php
                                 wp_nav_menu(
                                    array(
                                       'theme_location'=>'top-menu',
                                       'container_class'=>'nav-outer',
                                       'items_wrap'=>'<ul class="nav navbar-nav">%3$s</ul>'
                                    )
                                 )

                                 ?>
                                  
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </header>