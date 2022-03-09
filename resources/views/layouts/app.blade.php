<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="C:\Users\jeans\papeleria-yustys\resources\css\app.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="light-theme dark-theme">
    <style>
       @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap');

.light-theme{
    --body-color: #fff;
    --white-color: #000;
    --theme-color: #46D9D0;
    --black-color: #fff;
    --search-color: #eeeeee;
    --fire-bubble: #faf8f8;
    --light-grey: #f2f2f2;
    --deam-white: #000
}
.dark-theme{
    --body-color: #fff;
    --white-color: #000;
    --theme-color: #46D9D0;
    --black-color: #fff;
    --search-color: #eeeeee;
    --fire-bubble: #faf8f8;
    --light-grey: #f2f2f2;
    --deam-white: #000
}

*{margin: 0px; padding: 0px; box-sizing: border-box;}
body{background-color: var(--body-color); color: var(--white-color); font-family: 'Manrope', sans-serif; font-size: 16px; line-height: 24px;}
h1{font-size: 32px; line-height: 40px; color: #fff;}
h2{font-size: 26px; line-height: 34px;}
h3{font-size: 24px; line-height: 32px;}
h4{font-size: 14px; line-height: 22px;}
h5{font-size: 12px; line-height: 20px;}
.theme-btn{background: var(--theme-color); text-decoration: none; color: #fff; border-radius: 6px; width: 100%; padding: 10px 0px; text-align: center; transition: all 0.5s; -webkit-transition: all 0.5s;}
.theme-btn:hover{color: var(--theme-color); background: var(--white-color); text-decoration: none;}
.menu-links.left{left: 0%;}
/*hamburger styling starts*/
.hamburger-icon{ margin-left: 20px; padding: 5px; background: transparent; flex-shrink: 0; width: 35px;border: transparent; display: none;}
.hamburger-icon span{transform-origin: right; -webkit-transform-origin: right; transition: all 0.5s; -webkit-transition: all 0.5s; display: block; width: 100%; background: var(--white-color); height: 2px;}
.hamburger-icon span:nth-child(2){margin: 5px 0px;}
.hamburger-icon.ham-style span:first-child {transform: rotate(-45deg) translateX(2.4px); -webkit-transform: rotate(-45deg) translateX(2.4px);}
.hamburger-icon.ham-style span:nth-child(2) {width: 8px; opacity: 0;}
.hamburger-icon.ham-style span:last-child {transform: rotate(45deg) translateX(2.8px); -webkit-transform: rotate(45deg) translateX(2.8px);}

/*header styling starts*/
.switch { position: relative; display: inline-block;width: 60px; height: 34px; margin-left: 50px;}
.switch input { opacity: 0;width: 0;height: 0;}
.switch {position: relative;}
.switch::before{content: '\f185'; font-size: 12px; line-height: 20px; position: absolute; top: 50%; left: 10px; color: #fff; transform: translateY(-50%); font-family: 'FontAwesome'; font-weight: 900; z-index: 1;}
.switch::after{content: '\f186'; position: absolute; font-size: 12px; line-height: 20px; top: 50%; right: 10px; color: #fff; transform: translateY(-50%);  font-family: 'FontAwesome'; font-weight: 900; z-index: 1;}
.slider { position: absolute;cursor: pointer;top: 0;left: 0;right: 0;bottom: 0;background-color: #FF6431;-webkit-transition: .4s;transition: .4s;}
.slider:before {position: absolute;content: "";height: 26px;width: 26px; right: 4px; bottom: 4px; background-color: #fff ;-webkit-transition: .4s;transition: .4s; z-index: 2;}
input:checked + .slider {background-color: var(--theme-color);}
input:focus + .slider {box-shadow: 0 0 1px var(--theme-color); -webkit-box-shadow: 0 0 1px var(--theme-color)}
input:checked + .slider:before {-webkit-transform: translateX(26px);-ms-transform: translateX(-26px);transform: translateX(-26px);}
/* Rounded sliders */
.slider.round { border-radius: 34px;}
.slider.round:before {border-radius: 50%;}
/*Rounded slider ends*/
.navbar{padding: 32px 16px;}
.header-inner{width: 100%;}
.navbar-light .navbar-brand{font-size: 26px; line-height: 36px; font-weight: 500; color: var(--white-color);}
.navbar-light .navbar-brand:hover{color: var(--white-color);}
.header-content{width: 100%;}
.header-content form{width: 85%;}
.header-content form input[type="search"]::-webkit-input-placeholder{color: var(--white-color);}
.header-content form input[type="search"]{ color: var(--white-color); height: 42px; padding: 10px 20px; border-radius: 50px; border: none;}
.search-icon{position: relative; width: 85%;}
.search-icon i{ position: absolute; top: 50%; right: 10px; width: 20px; height: 20px; line-height: 20px; color: var(--white-color);  transform: translateY(-50%);}
.light-theme .header-content form input[type="search"]{background: #fff;  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 0px 0px 5px rgba(0,0,0, 0.2)}
.dark-theme .header-content form input[type="search"]{}
.header-content a{display: inline-block;}
.header-content .profile{margin: 0px 20px 0px 50px; color: var(--white-color);}
.header-content .profile:hover{text-decoration: none;}
.header-content .profile img{margin-right: 5px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 0px 0px 5px rgba(0,0,0, 0.2); border-radius: 50%;}
.header-content .notification{color: var(--white-color); line-height: 0px; width: 18px; height: 21px; line-height: 21px;}
/*header styling ends*/

/*menu-links tyling starts*/
.menu-links{transition: all 0.8s; -webkit-transition: all 0.5s;}
.menu-links ul{list-style: none; margin-bottom: 0px;}
.menu-links ul li{margin-bottom: 42px;}
.menu-links ul li:last-child{margin-bottom: 0px;}
.menu-links ul li a{color: var(--white-color); transition: all 0.5s; -webkit-transition: all 0.5s; width: fit-content;}
.menu-links ul li:not(.active) a:hover{color: var(--theme-color);}
.menu-links ul li  a i{width: 32px; height: 32px; line-height: 20px; margin-right: 12px;  padding: 6px 0px; text-align: center;}
.menu-links ul li.active a i{border-radius: 2px; background-color: var(--theme-color);  margin-right: 12px;}
.light-theme .menu-links ul li.active a i{color: #fff;}

/*nft-store-content styling starts*/
.nft-store-content{width: 100%; margin: 0px 0px 32px 32px;}
.fire-bubble-art{padding: 32px; background-color: var(--fire-bubble); border-radius: 16px;}
.light-theme .fire-bubble-art{box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);}
.fire-bubble-art .fire-image{border-radius: 16px;}
.fire-bubble-art .fire-width{width: calc(100% / 2);}
.fire-bubble-art .fire-content{padding-left: 32px;}
.light-theme .fire-content .fire-time{box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);}
.fire-content .fire-time{ position: relative; margin: 16px 0px 24px; background: var(--light-grey); padding: 32px; border-radius: 20px;}
.fire-content .fire-time .middle-line{position: absolute; height: 60%; left: 48%; top: 50%; transform: translate(-50%, -50%); background: var(--white-color); width: 1px;}
.fire-content .fire-time h4{margin-bottom: 6px;}
.fire-content .fire-time span{font-size: 22px; line-height: 30px; font-weight: 500;}
.fire-content .fire-user img{margin-right: 5px;}
.fire-content .fire-links{margin-top: 24px;}
.fire-content .fire-links .heart{width: 42px; height: 42px; margin-right: 22px; text-align: center; padding: 9px 0px; border-radius: 6px; transition: all 0.5s; font-size: 22px; -webkit-transition: all 0.5s; border: 1px solid var(--white-color); color: var(--white-color);} 
.fire-content .fire-links .heart:hover{background: var(--theme-color); border: 1px solid var(--theme-color); color: #fff;}
/*paint art styling starts*/
.paint-image{position: relative; margin-bottom: 0px; padding-top: 96%; border-radius: 16px;}
.paint-image h1{position: absolute; margin: 0px; right: 20px; bottom: 30px;}

/*trending styling starts*/
.trending-title{margin: 32px 0px;}
.trending-title h2{margin-bottom: 0px;}
.trending-title .theme-btn{width: 130px; display: inline-block;}
.light-theme .trending-content{border-radius: 15px; background: var(--fire-bubble); box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);}
.trending-content > img{border-top-left-radius: 15px; border-top-right-radius: 15px; width: 100%;}
.trending-desc{padding: 24px; position: relative;}
.trending-desc .user-image{position: absolute; right: 18px; top: -30px; width: 60px; border-radius: 50%; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);}
.trending-desc .user-title{text-transform: capitalize; color: var(--deam-white); margin: 0px; }
.trending-desc .user-position{text-transform: capitalize; margin: 16px 0px; font-size: 18px; line-height: 26px;}
.trending-desc .bid h5{text-transform: capitalize; color: var(--deam-white);  margin-bottom: 7px;}
.trending-desc .bid span{font-size: 20px; line-height: 28px;}

@media(min-width: 1400px) and (max-width: 1599px){
    .header-content form{width: 78%;}
    .fire-bubble-art {padding: 22px;}
    .fire-content .fire-time{padding: 22px;}
    .fire-content .fire-time .middle-line {left: 45%;}
}

@media(min-width: 1200px) and (max-width: 1399px){
    /*global styling starts*/
    h1{font-size: 30px; line-height: 38px;}
    h2{font-size: 24px; line-height: 32px;}
    h3{font-size: 22px; line-height: 30px;}
    h4{font-size: 14px; line-height: 22px;}
    h5{font-size: 12px; line-height: 20px;}
    /*global styling ends*/
    .menu-links ul li {margin-bottom: 18px;}
    .header-content form{width: 75%;}
    .fire-bubble-art {padding: 18px;}
    .fire-bubble-art .fire-content{padding-left: 22px;}
    .fire-content .fire-time span{font-size: 20px; line-height: 28px;}
    .fire-content .fire-time{padding: 18px; margin: 12px 0px 20px;}
    .fire-content .fire-time .middle-line {left: 43%;}
    .trending-desc{padding: 20px;}
    .trending-desc .user-position{margin: 12px 0px;}
    .trending-desc .user-image{width: 40px; top: -22px;}
}

@media(min-width: 992px) and (max-width: 1199px){
    /*global styling starts*/
    h1{font-size: 26px; line-height: 34px;}
    h2{font-size: 20px; line-height: 28px;}
    h3{font-size: 18px; line-height: 26px;}
    h4{font-size: 12px; line-height: 20px;}
    h5{font-size: 12px; line-height: 20px;}
    body{font-size: 15px; line-height: 22px;}
    .theme-btn{font-size: 14px; line-height: 22px; padding: 6px 0px;}
    /*global styling ends*/
    /*navbar styling starts*/
    .navbar{padding: 16px;}
    .navbar-light .navbar-brand{font-size: 18px; line-height: 26px; margin: 0px;}
    .menu-links ul li {margin-bottom: 18px;}
    .menu-links ul li a{padding: 8px;}
    .menu-links ul li a i{margin-right: 10px;}
    .switch{width: 50px; height: 26px; margin-left: 20px;}
    .slider:before{width: 18px; height: 18px; right: 3px;}
    .header-content form{width: 75%;}
    .header-content .profile{margin: 0px 10px 0px 20px;}
    /*navbar styling ends*/
    /*fire up styling starts*/
    .nft-store-content{margin: 0px 0px 30px 22px;}
    .fire-bubble-art .fire-content{padding-left: 10px;}
    .fire-bubble-art{padding: 16px;}
    .fire-content .fire-time{padding: 14px 16px; margin: 10px 0px 15px;}
    .fire-content .fire-time h4{margin-bottom: 2px;}
    .fire-content .fire-time .middle-line {left: 43%;}
    .fire-content .fire-links{margin-top: 18px;}
    .paint-image h1{bottom: 22px;}
    .fire-content .fire-time span{font-size: 16px; line-height: 24px;}
    .fire-content .fire-user {font-size: 14px; line-height: 22px;}
    .fire-content .fire-user img{width: 30px;}
    .fire-content .fire-links .heart{width: 32px; height: 32px; font-size: 14px; padding: 4px 0px; margin-right: 14px;}
    /*trending styling starts*/
    .trending-title {margin: 22px 0px;}
    .trending-desc{padding: 12px;}
    .trending-desc .user-image{width: 35px; top: -20px; right: 14px;}
    .trending-desc .user-position{font-size: 16px; line-height: 24px; margin: 4px 0px 10px;}
    .trending-desc .bid h5{margin-bottom: 4px;}
    .trending-desc .bid span{font-size: 18px; line-height: 26px;}

}
@media(min-width: 768px) and (max-width: 991px){
    /*global styling starts*/
    h1{font-size: 22px; line-height: 28px;}
    h2{font-size: 16px; line-height: 24px;}
    h3{font-size: 14px; line-height: 22px;}
    h4{font-size: 12px; line-height: 20px;}
    h5{font-size: 12px; line-height: 20px;}
    body{font-size: 14px; line-height: 22px;}
    .theme-btn{font-size: 14px; line-height: 22px; padding: 6px 0px;}
    /*navbar styling starts*/
    .hamburger-icon{display: block;}
    .navbar{padding: 16px 0px; flex-wrap: nowrap; -webkit-flex-wrap: nowrap;}
    .navbar-light .navbar-brand{font-size: 18px; line-height: 26px; margin: 0px;}
    .light-theme .menu-links{box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 0px 0px 5px rgba(0,0,0,0.2);}
    .menu-links ul li {margin-bottom: 18px;}
    .menu-links ul li a{padding: 8px;}
    .menu-links ul li a i{margin-right: 10px;}
    .menu-links{position: fixed; top: 0; left: -100%; height: 100%; background: var(--body-color); width: 30%; padding: 50px 0px 0px 20px; z-index: 10;}
    .switch{width: 50px; height: 26px; margin-left: 20px;}
    .switch::before{left: 8px;}
    .slider:before{width: 18px; height: 18px; right: 3px;}
    .header-content form{width: 55%;}
    .light-theme .header-content form input[type="search"]{height: 36px;}
    .header-content .profile{margin: 0px 10px 0px 20px;}
    /*navbar styling ends*/
    /*global styling ends*/
    .nft-store-content{margin: 0px 0px 25px 0px;}
    .fire-bubble-art .fire-content{padding-left: 10px;}
    .fire-bubble-art{padding: 16px;}
    .fire-content .fire-time{padding: 12px 14px; margin: 8px 0px 12px; border-radius: 10px;}
    .fire-content .fire-time h4{margin-bottom: 2px;}
    .fire-content .fire-time .middle-line {left: 43%;}
    .fire-content .fire-links{margin-top: 18px;}
    .paint-image h1{bottom: 22px;}
    .fire-content .fire-time span{font-size: 14px; line-height: 22px;}
    .fire-content .fire-user {font-size: 14px; line-height: 22px;}
    .fire-content .fire-user img{width: 30px;}
    .fire-content .fire-links .heart{width: 32px; height: 32px; font-size: 14px; padding: 4px 0px; margin-right: 14px;}
    /*trending styling starts*/
    .trending-title {margin: 22px 0px;}
    .trending-desc{padding: 12px;}
    .trending-desc .user-image{width: 35px; top: -20px; right: 14px;}
    .trending-desc .user-position{font-size: 15px; line-height: 24px; margin: 4px 0px 10px;}
    .trending-desc .bid h5{margin-bottom: 4px;}
    .trending-desc .bid span{font-size: 16px; line-height: 24px;}
}

@media(max-width: 767px){
    /*global styling starts*/
    h1{font-size: 22px; line-height: 28px;}
    h2{font-size: 16px; line-height: 24px;}
    h3{font-size: 14px; line-height: 22px;}
    h4{font-size: 12px; line-height: 20px;}
    h5{font-size: 12px; line-height: 20px;}
    body{font-size: 14px; line-height: 22px;}
    .theme-btn{font-size: 14px; line-height: 22px; padding: 6px 0px;}
    /*hamburger icon styling starts*/
    .hamburger-icon{margin-left: 10px;}
    /*navbar styling starts*/
    .navbar{padding: 16px 0px; flex-wrap: nowrap; -webkit-flex-wrap: nowrap;}
    .navbar-light .navbar-brand{font-size: 18px; line-height: 26px; margin: 0px;}
    .navbar-light .navbar-brand img{width: 50px;}
    .menu-links{position: fixed; top: 0; left: -100%; height: 100%; background: var(--body-color); width: 70%; padding: 50px 0px 0px 20px; z-index: 10;}
    .light-theme .menu-links{box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 0px 0px 5px rgba(0,0,0,0.2);}
    .menu-links ul li {margin-bottom: 18px;}
    .menu-links ul li a{padding: 8px;}
    .menu-links ul li a i{margin-right: 10px;}
    .switch{width: 40px; height: 22px;}
    .switch::before{left: -2px;}
    .switch::after{right: 7px;}
    .slider{left: -7px;}
    .slider:before{width: 16px; height: 16px; right: 2px; bottom: 3px;}
    .header-content form{width: fit-content; margin-right: 10px;}
    .search-icon{display: none;}
    .header-content .profile{display: none;}
    .hamburger-icon{display: block;}
    /*navbar styling ends*/
    /*global styling ends*/
    .nft-store-content{margin: 0px 0px 25px 0px;}
    .fire-bubble-art .fire-content{padding-left: 0px; margin-top: 15px;}
    .fire-bubble-art{padding: 16px; flex-direction: column; -webkit-flex-direction: column;}
    .fire-bubble-art .fire-width{width: 100%;}
    .fire-content .fire-time{padding: 12px 14px; margin: 8px 0px 12px; border-radius: 10px;}
    .fire-content .fire-time h4{margin-bottom: 2px;}
    .fire-content .fire-time .middle-line {left: 45%;}
    .fire-content .fire-links{margin-top: 18px;}
    .paint-image{margin-top: 30px;}
    .paint-image h1{bottom: 22px;}
    .fire-content .fire-time span{font-size: 14px; line-height: 22px;}
    .fire-content .fire-user {font-size: 14px; line-height: 22px;}
    .fire-content .fire-user img{width: 30px;}
    .fire-content .fire-links .heart{width: 32px; height: 32px; font-size: 14px; padding: 4px 0px; margin-right: 14px;}
    /*trending styling starts*/
    .trending-title {margin: 25px 0px;}
    .trending-desc{padding: 12px;}
    .trending-content{margin-bottom: 25px;}
    .trending-grid .col-md-4:last-child .trending-content{margin-bottom: 0px;}
    .trending-desc .user-image{width: 35px; top: -20px; right: 14px;}
    .trending-desc .user-position{font-size: 15px; line-height: 24px; margin: 4px 0px 10px;}
    .trending-desc .bid h5{margin-bottom: 4px;}
    .trending-desc .bid span{font-size: 16px; line-height: 24px;}
}
    </style>
    <div id="app">
        <header>
            <div class="container-fluid">
              <nav class="navbar navbar-expand-lg navbar-light" style="padding-bottom: 10px;">
                <div class="header-inner d-flex justify-content-between align-items-center">
                  <a class="navbar-brand flex-shrink-0" href="#"><img style="width: 230px;" src="https://i.ibb.co/GQq4kNr/e558a424-10c4-43c2-846d-5d35fc76c6b3.png" alt="logo-image" class="img-fluid">
                  </a>
                  <svg xmlns="http://www.w3.org/2000/svg" style="margin-left: 125px; color: gray;width: 27px;" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/></svg> <input style="margin-left: 10px;" type="text">
                  <div class="header-content d-flex align-items-center justify-content-end">
                    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                      <div class="container">
                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                              <span class="navbar-toggler-icon"></span>
                          </button>
          
                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                              <!-- Left Side Of Navbar -->
                              <ul class="navbar-nav me-auto">
          
                              </ul>
          
                              <!-- Right Side Of Navbar -->
                              <ul class="navbar-nav ms-auto">

                                  <!-- Authentication Links -->
                                  @guest
                                      @if (Route::has('login'))
                                          <li class="nav-item">
                                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                          </li>
                                      @endif
          
                                      @if (Route::has('register'))
                                          <li class="nav-item">
                                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                          </li>
                                      @endif
                                  @else
                                      <li class="nav-item dropdown">
                                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                              {{ Auth::user()->name }}
                                          </a>
          
                                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                              <a class="dropdown-item" href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                                                  {{ __('Logout') }}
                                              </a>
          
                                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                  @csrf
                                              </form>
                                          </div>
                                      </li>
                                  @endguest
                              </ul>
                          </div>
                      </div>
                  </nav>
        
                  </div>
                </div>
                <button class="hamburger-icon">
                  <span></span>
                  <span></span>
                  <span></span>
                </button>
              </nav>
            </div>
          </header>
          <div class="nft-store">
            <div class="container-fluid">
              <div class="nft-store-inner d-flex">
                <div class="menu-links">
                  <ul>
                    <li class="nav-item active">
                      <a href="#" class="d-flex align-items-center nav-link"><i class="fa fa-home" aria-hidden="true"></i>
                        <span>Home</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="d-flex align-items-center nav-link"><i class="fa fa-briefcase" aria-hidden="true"></i>
                        <span>Market</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="d-flex align-items-center nav-link"><i class="fa fa-heart-o" aria-hidden="true"></i>
                        <span>Favourite</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="d-flex align-items-center nav-link"><i class="fa fa-square-o" aria-hidden="true"></i>
                        <span>Collections</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="d-flex align-items-center nav-link"><i class="fa fa-fire" aria-hidden="true"></i>
                        <span>Trending</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="d-flex align-items-center nav-link"><i class="fa fa-star" aria-hidden="true"></i>
                        <span>Featured</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="d-flex align-items-center nav-link"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span>Purchased</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="d-flex align-items-center nav-link"><i class="fa fa-cog" aria-hidden="true"></i>
                        <span>Settings</span></a>
                    </li>
                  </ul>
                </div>
                <div class="nft-store-content">
                  <div class="nft-up-content">
                    <div class="row">
                      <div class="col-md-8">
                        <main class="py-4">
                            @yield('content')
                        </main>
                      </div>
                    </div>
                  </div>
                  
                    <div class="trending-grid">
                      
                        
                            
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
  $(".menu-links li a").click(function (e) {
    $(".menu-links li.active").removeClass("active");
    var $parent = $(this).parent();
    $parent.addClass("active");
  });
  $(".hamburger-icon").click(function () {
    $(".menu-links").toggleClass("left");
  });
  $(".hamburger-icon").click(function () {
    $(this).toggleClass("ham-style");
  });
  const themeSwitch = document.querySelector("#checkbox");
  themeSwitch.addEventListener("change", () => {
    document.body.classList.toggle("dark-theme");
  });
});


</script>
</body>
</html>
