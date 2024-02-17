<?php 
header("Content-type: text/css; charset: UTF-8");

//Global variables
$baseColor = get_field('base_color', 'options');
$lightGray = get_field('light_gray', 'options');
$gray = get_field('gray', 'options');
$darkGray = get_field('dark_gray', 'options');

$primary = get_field('primary', 'options');
$secondary = get_field('secondary', 'options');
$tertiary = get_field('tertiary', 'options');
$quaternary = get_field('quaternary', 'options');
$quinary = get_field('quinary', 'options');
$senary = get_field('senary', 'options');
$announcementBG= get_field('announcement_bg', 'options');

$topbarBG = get_field("topbar_background_color", "option");
$topbarColor = get_field("topbar_color", "options"); 

$footerBg = get_field ("footer_bg", "options");

$btnP1 = get_field ("btnp1", "options"); 
$btnP2 = get_field ("btnp2", "options");
$btnPColor = get_field ("btnpcolor", "options");

$btnS1 = get_field ("btns1", "options"); 
$btnS2 = get_field ("btns2", "options");
$btnSColor = get_field ("btnscolor", "options");

//Module specific global variables
?>


body {
    color:  <? echo $baseColor ?>;
}
h1,
h2,
h3,
h4,
h5,
h6 {
    color: <? echo $primary ?>;
}
a {
    color: <? echo $primary ?>;
}
.subheading {
    color: <? echo $baseColor ?>;
}
.heading {
    color: <? echo $primary ?>;
}
.heading.alt {
    color: <? echo $secondary ?>;
}
.btn-primary {	
    color: <? echo $btnPColor ?>;
    background-image: linear-gradient(to right, <? echo $btnP1 ?> , <? echo $btnP2 ?>, <? echo $btnP2 ?>);
}
.btn-secondary {	
	color: <? echo $btnSColor ?>;
    background-image: linear-gradient(to right, <? echo $btnS1 ?> , <? echo $btnS2 ?> , <? echo $btnS2 ?>);
}

.topbar {
    background-color: <?php echo $topbarBG ?>;
}
.topbar .top-nav__announcement {
    background-color: <?php echo $announcementBG ?>;
}
.topbar .content .top-nav__phone a, 
.topbar .content .top-nav__drawer .top-nav li a {
    color: <? echo $topbarColor ?>;
}
.topbar .content .top-nav__drawer .top-nav li.btn a {
    color: <? echo $primary ?>;
}
.hamburger-button__bar--top,
.hamburger-button__bar--middle,
.hamburger-button__bar--bottom {
    color: <? echo $primary ?>;
    background-color: <? echo $primary ?>;
}
.main-nav__drawer .primary-nav > li a {
    color: <? echo $baseColor ?>;
}
.main-nav .main-nav__wrapper .main-nav__drawer .primary-nav > li.main a {
    color: <? echo $primary ?>;
}
.main-nav__drawer .primary-nav > li.current-menu-item > a,
.main-nav__drawer .primary-nav > li.current-menu-ancestor > a {
    color: <? echo $primary ?>;
    border-bottom: 2px solid <? echo $primary ?>;
}
@media only screen and (min-width: 768px) {
    .main-nav__drawer .primary-nav .sub-menu {
        background-color: <? echo $secondary ?>;
    }
    .main-nav__drawer .primary-nav .sub-menu .current-menu-item > a {
        color: <? echo $primary ?>;
    }
}

.footer {
    background-color: <? echo $footerBg ?>;
}
.footer .menu-container .footer-nav li.btn {
    background-color: <? echo $tertiary ?>;
}
.footer .menu-container .footer-nav-1 li.btn a, 
.footer .menu-container .footer-nav-2 li.btn a {
    color: <? echo $primary ?>;
}

.slick-slider .slick-dots li button:before {
    color: <? echo $secondary ?>;
}
.slick-slider .slick-dots li.slick-active button:before {
    color: <? echo $primary ?>;
}

.main--archive .category li a,
.main--single .category li a,
.main--single .btn-back {
    color: <? echo $primary ?>;
}

.section--anchors .anchor-slider .anchor-box {
    border-color: <? echo $primary ?>;
}

.section--bloom .two-col col:first-child .title,
.section--bloom-small .two-col col:first-child .title {
    color:  <? echo $tertiary ?>;
}

.section--contact-form {
    background-color: <? echo $lightGray ?>;
}
.section--contact-form .two-col .col:first-child .content-wrapper,
.section--contact-form .two-col .col:first-child .content-wrapper::before  {
    background-color:  <? echo $quinary ?>;
}
.section--contact-form.longform .two-col .col:first-child .content-wrapper,
.section--contact-form.longform .two-col .col:first-child .content-wrapper::before  {
    background-color:  <? echo $lightGray ?>;
}

.section--hero-location .panels .panel h4 {
    color:  <? echo $secondary ?>;
}

.section--faqs .two-col .col:nth-child .faqs-wrapper .faq {
     background-color: <? echo $senary ?>;
}
.section--faqs .two-col .col:nth-child .faqs-wrapper .faq #button {
     background-color: <? echo $quinary ?>;
}

.section--featured-blogs .featured-blogs-slider .blog .content .date::after {
    background-color:  <? echo $tertiary ?>;
}

.section--featured-services .featured-services-slider .service .content .text-wrapper {
    background-color: <? echo $quinary ?>;
}

.section--levels .levels-slider .level-box::after {
    background-color: <? echo $gray ?>;
}
.section--levels .levels-slider .level-box .number {
    color: <? echo $tertiary ?>;
}

.section--list ul li::before {
    background-color: <? echo $primary ?>;
}
.section--list ul li ul li::before {
    background-color: <? echo $quinary ?>;
}

.section--panels .panels-slider .panel.border {
    border-color: <? echo $primary ?>;
}
.section--panels .panels-slider .panel .content .title::after {
    background-color: <? echo $tertiary ?>;
}

.section--programs .programs-slider .program .content .title::after {
    background-color: <? echo $tertiary ?>;
}

.section--services .service .heading {
    border-bottom: 0.2em solid <? echo $tertiary ?>;
}

.section--side-by-side .two-col .col:nth-child .list.only li::before {
    background-color: <? echo $primary ?>;
}
.section--featured-side-by-side .two-col .col:first-child {
    background-color:  <? echo $quinary ?>;
}
.section--featured-side-by-side .two-col .col:nth-child(2) {
    background-color: <? echo $lightGray ?>;
}

.section--tiles .tiles-slider .tile {
    border-color: <? echo $primary ?>;
}
.section--tiles .tiles-slider .tile.link:hover {
    border-color: <? echo $tertiary ?>;
}

.section--team-members .team-slider .slide .image-wrapper::after {
    border-color:  <? echo $quinary ?>;
}
.section--team-members .team-slider-2 .slick-current .image-wrapper::after {
    border-color:  <? echo $tertiary ?>;
}

.section--team-member .single .image-wrapper::after {
    border-color:  <? echo $quinary ?>;
}

.main-wrapper .section--contact-info .btn-wrapper a.btn {
    color: <? echo $secondary ?>;
}

.main-wrapper .section--contact-info .title {
    color: <? echo $secondary ?>;
}
.main-wrapper .section--contact-info .title.dark {
    color: <? echo $baseColor ?>;
}

@media only screen and (min-width: 768px) {
    .section--featured-side-by-side .two-col .col:nth-child(2)::after {
        background-color: <? echo $lightGray ?>;
    }
}