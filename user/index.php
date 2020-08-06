<?php
session_start();
if (isset($_SESSION['User'])) {
    header("Location: ./home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DE-CODE - Deep Code Exercise</title>

    <link rel="icon" href="../assets/images/icon.png"/>
    <link rel="stylesheet" href="../assets/css/core/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/custom.css">

</head>

<div id="preloader">
    <img class="preloader" src="../assets/images/core/icon.png" alt="">
</div>

<header class="header header_style_01">
    <nav class="navbar header-nav navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="../assets/images/core/logo.png" alt="image"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarApp" aria-controls="navbarApp" aria-expanded="false" aria-label="Toggle navigation">
				<span></span>
				<span></span>
				<span></span>
			</button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarApp">
                <ul class="navbar-nav">
                    <li><a class="nav-link active" href="#home">Home</a></li>
                    <li><a class="nav-link" href="#pricing">Pricing</a></li>
                    <li><a class="nav-link" href="#faqs">FAQs</a></li>
                    <li><a class="nav-link" href="register.php">Register</a></li>
                    <li><a class="nav-link" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<section id="home" class="cd-hero js-cd-hero">
    <ul class="cd-hero__slider">
        <li class="cd-hero__slide cd-hero__slide--selected js-cd-slide flex-center">
            <div class="cd-hero__content cd-hero__content--full-width">
                <h2 style="color:black">Learn With Us !</h2>
                <p style="color:black">Learn the basic of Code and Cyber Security with our courses.</p>
                <a href="register.php" class="hvr-bounce-to-right cd-hero__btn">Register</a>
                <a href="login.php" class="hvr-bounce-to-right cd-hero__btn cd-hero__btn--secondary">Login</a>
            </div>
        </li>

        <div class="cd-hero__nav js-cd-nav">
            <nav>
                <span class="cd-hero__marker cd-hero__marker--item-1 js-cd-marker"></span>
                <ul>
                    <li class="cd-selected"><a href="#0">01</a></li>
                </ul>
            </nav>
        </div>
</section>

<div id="pricing" class="section lb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Pricing</h3>
            <p>Upgrade Your Experience <strong>starting from $45 per Month !</strong> Get Access to more modules,
                courses, and VMs.</p>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="price-value">$0
                        <span class="month">Free Subscription</span>
                    </div>
                    <h3 class="title">Standard</h3>
                    <ul class="pricing-content">
                        <li>3 Free Courses</li>
                        <li>Live Support</li>
                        <li><s>Priority to Get New Courses</s></li>
                    </ul>
                    <a href="./register.php" class="pricingTable-signup hvr-bounce-to-right">Get Started</a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="pricingTable active">
                    <div class="price-value">$30
                        <span class="month">monthly</span>
                    </div>
                    <h3 class="title">Ultimate</h3>
                    <ul class="pricing-content">
                        <li>Unlimited Access to All Courses</li>
                        <li>24/7 Priority Live Support</li>
                        <li>Priority to Get New Courses</li>
                    </ul>
                    <a href="./register.php" class="pricingTable-signup hvr-bounce-to-right">Get Started</a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="price-value">$15
                        <span class="month">monthly</span>
                    </div>
                    <h3 class="title">Premium</h3>
                    <ul class="pricing-content">
                        <li>All Perks from Standard Subscription</li>
                        <li>3 Additional Courses Every Month</li>
                        <li>Live Support</li>
                        <li><s>Priority to Get New Courses</s></li>
                    </ul>
                    <a href="./register.php" class="pricingTable-signup hvr-bounce-to-right">Get Started</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</div>

<div id="faqs" class="section lb">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3">
                <div class="faq-right">
                    <img src="../assets/images/core/logo.png" class="img-fluid" alt=""/>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <a href="" class="btn-link" type="button" data-toggle="collapse"
                                   data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Do i need to know how to code before signing up ?
                                </a>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                No, in fact, you can learn from our courses which is specialy designed for you
                                to learn how to code step-by-step.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <a href="" class="btn-link collapsed" type="button" data-toggle="collapse"
                                   data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Do i need to subscribe to access the courses ?
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                We gave you 3 starting courses for free to try out our courses. You can also 
                                subscribe to upgrade your experience.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

<script src="../assets/js/all.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/swiper.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        effect: 'coverflow',
        centeredSlides: true,
        loopFillGroupWithBlank: true,
        slidesPerView: 3,
        initialSlide: 3,
        keyboardControl: true,
        mousewheelControl: false,
        lazyLoading: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            1199: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            991: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            767: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            575: {
                slidesPerView: 1,
                spaceBetween: 3,
            }
        }
    });
</script>

</html>