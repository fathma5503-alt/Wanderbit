<!-- /*
* Template Name: Tour
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
<script src="https://cdn.jsdelivr.net/npm/moment/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/font/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/stylecss.css') }}">

<style>

.pack {
    display: flex;
    width: 100%;
    align-items: center;
    gap: 35px;
    justify-content: space-evenly;
    padding-left: 50px;
    padding-right: 50px;
    padding-bottom: 50px;
}
.d1 {
    color: #d4af37;
}
h4.d2 {
    color: #6ad8b6;
}
.pro {
    display: flex;
    padding: 20px;
    justify-content: space-between;
}
.cat{
    width: 300px;
	padding: 40px;
}
.untree_co-section.testimonial-section.mt-5 {
    background: linear-gradient(135deg, #1E1E1E  0%, #2A2A2A 50%, #0B6E4F 100%);
}
.text-center {
    text-align: center !important;
    color: white;
}
.alert-info {
    color: #0c5460;
    border-color: #bee5eb;
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
}
.search {
    background: linear-gradient(135deg, #0b6c4e 0%, #2A2A2A 50%, #0B6E4F 100%);
    padding: 50px;
}
.pro {
    display: flex;
    padding: 20px;
    justify-content: space-around;
    align-content: space-between;
}
        /* body {
            background: linear-gradient(135deg, #1f263e, #2f3b66);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        } */
     .auth-card {
    width: 100%;
    max-width: 700px;
    border-radius: 12px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, .2);
}
.other-images-grid {
    display: flex;
    justify-content: space-evenly;
}
.card-body.p-4 {
    /* -ms-flex: 1 1 auto; */
    /* flex: 1 1 auto; */
    /* min-height: 1px; */
    color: #6AD8B6;
    /* display: flex; */
    padding: 1.25rem;
    background-color: #3e3e3e;
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
    width: 728px;
}

a.book {
    padding: 5px !important;
    color: var(--primary-gold) !important;
    text-decoration: none !important;
    background: linear-gradient(135deg, #0b6e4f 0%, #2A2A2A 50%, #0b6e4f 100%) !important;
    display: flex !important;
    width: 100px !important;
    height: 30px !important;
    justify-content: space-around !important;
    border-radius: 10px !important;
}
.col-12 {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
    color: #6AD8B6;
    padding-top: 85px;
}
.booking-search-wrapper {
    background: #fff;
    padding: 25px;
    border-radius: 18px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    margin-top: -60px;
}

.fancy-input {
    height: 55px;
    border-radius: 30px;
    padding: 0 20px;
    border: 1px solid #e5e7eb;
    font-size: 15px;
}

.fancy-input:focus {
    border-color: #1faa59;
    box-shadow: 0 0 0 0.15rem rgba(31,170,89,.25);
}

.book-btn {
    height: 55px;
    border-radius: 30px;
    font-weight: 600;
    background: linear-gradient(135deg, #1faa59, #0e7c3a);
    color: #fff;
    border: none;
}

.book-btn:hover {
    background: linear-gradient(135deg, #0e7c3a, #1faa59);
}

.save-text {
    color: #1faa59;
    font-size: 14px;
    font-weight: 500;
}

.p-3 {
    padding: 1rem !important;
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
}
.card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
    background-color: white !important;
}
.bg-info {
    background-color: #17a2b8 !important;
    color: white;
}
.bg-warning {
    background-color: #ffc107 !important;
    color: white;
}
.bg-danger {
    background-color: #dc3545 !important;
    color: white;
}
.card-footer:last-child {
    border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);
    display: flex;
    /* align-content: space-between; */
    justify-content: space-around;
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
}
.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    color: #6AD8B6;
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
}
.testimonial .name {
    font-size: 18px;
    color: #d4af37;
}
button.btn.btn-link.logout {
    background: none;
    border: none;
    color: #f5c542;
    font-weight: 600;
    padding-left: 22px;
}
.hero .slides {
    background: #ffffff;
    max-width: 800px;
    left: -100px;
    position: static;
    z-index: 0;
    border-radius: 200px;
    -webkit-box-shadow: 0 25px 50px -10px rgba(26, 55, 77, 0.4);
    box-shadow: 0 25px 50px -10px rgba(26, 55, 77, 0.4);
    height: 608px;
    margin-bottom: -200px;
}
h1.dis {
    display: flex;
    /* align-content: flex-end; */
    justify-content: space-around;
    padding: 20px;
}
.owl-next {
    width: 100px;
}
.owl-prev {
    width: 100px;
}
.pros {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    align-items: center;
    justify-content: space-evenly;
}
.im{
    width: 375px;
    height: 512px;
}
    .log_out{
            border: none;
    }
    .icon-support:before {
    content: "\f1cd";
    color: #d4af37;
}
.icon-user:before {
    content: "\f007";
    color: #d4af37;
}
.icon-tag:before {
    content: "\f02b";
    color: #d4af37;
}
.icon-paper-plane:before {
    content: "\f1d8";
    color: #d4af37;
}
.media-1 h3 a {
    color: #d4af37;
}
.table-hover {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    border: solid !important;
}
.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
    color: #d4af37 !important;
    border-color: #d4af37;
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
}
button.btn.btn-primary.btn-lg.w-100 {
    border: solid;
    border-width: 1px;
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    color: #6AD8B6;
    padding: 1.25rem;
    background-color: #3e3e3e;
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
}
.justify-content-center {
    -ms-flex-pack: center!important;
    justify-content: center !important;
    padding-top: 50px;
}
p {
    margin-top: 0;
    margin-bottom: 1rem;
    color: #6ad8b6;
}

element.style {
}
.h5, h5 {
    font-size: 1.25rem;
    color: #6ad8b6;
}

.package-card {
    border-radius: 30px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.package-card h5 {
    font-size: 18px;
    font-weight: 600;
}

:root {
    --bg-main: #1E1E1E;        /* Main Background */
    --bg-card: #2A2A2A;        /* Cards */
    --primary-gold: #D4AF37;   /* Luxury Gold */
    --emerald: #0B6E4F;        /* Buttons */
    --ivory: #F5F5F5;          /* Headings */
    --text-light: #CCCCCC;     /* Paragraphs */
    --border-soft: #3A3A3A;
}
body {
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
    color: var(--text-light);
    font-family: 'Poppins', sans-serif;
}

a {
    color: var(--primary-gold);
    text-decoration: none;
}

a:hover {
    color: var(--emerald);
}
.site-footer .widget .links li a:hover {
    color: #d4af37;
    text-decoration: underline;
}
.hero {
    background: linear-gradient(
        135deg,
        #1E1E1E 0%,
        #2A2A2A 50%,
        #0B6E4F 100%
    );
    padding: 80px 0;
}
.site-footer .widget .social li a:hover {
    background-color: #6ad8b6;
}
.hero h1 {
    color: var(--ivory);
    font-weight: 700;
}
.site-footer .widget .social li a {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #D4AF37;
    display: inline-block;
    position: relative;
    color: #ffffff;
    -webkit-box-shadow: 0 5px 10px -2px rgba(0, 0, 0, 0.2);
    box-shadow: 0 5px 10px -2px rgba(0, 0, 0, 0.2);
}
.site-footer .inner.dark {
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
    border-top: 1px solid rgba(255,255,255,0.05);
}
.site-footer .inner {
    padding-top: 0px;
    padding-bottom: 70px;
}
.site-footer .inner.first {
    padding-top: 80px;
    background: linear-gradient(135deg, #0B6E4F 0%, #2A2A2A 50%, #1E1E1E 100%) !important;
}
p.inn {
    display: flex;
    justify-content: center;
    color: black;
}
.hero.hero-inner {
    padding: 9rem 0 7rem 0;
    margin-bottom: auto;
        background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);

}
.site-footer .inner.dark p {
    color: #888;
    font-size: 15px;
    padding: 10px;
}
.site-footer a {
    transition: all 0.3s ease;
    color: #d4af37;
}
.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
    color: #d4af37 !important;
    border-color: #d4af37;
}
.site-footer .widget h3 {
    font-size: 14px;
    margin-bottom: 20px;
    color: white;
    font-family: "Inter", sans-serif;
}
.site-footer .inner.dark p {
    color: #888;
    font-size: 15px;
    padding-top: 81px;
}
.site-footer .widget .links li a {
    color: #6ad8b6;
}
.link-highlight {
    color: var(--lux-gold);
    font-weight: 500;
}
.quick-info li {
    margin-bottom: 10px;
}

.cta-section {
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
}

.site-footer a {
    color: var(--lux-text);
    transition: all 0.3s ease;
}

.site-footer a:hover {
    color: var(--lux-gold);
}
.site-footer .heading {
    color: var(--lux-white);
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 20px;
    position: relative;
}

.site-footer .heading::after {
    content: "";
    width: 40px;
    height: 2px;
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
    position: absolute;
    bottom: -8px;
    left: 0;
}

.site-footer {
    color: var(--lux-text);
    font-size: 15px;
}
.section-title:before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 30px;
    height: 2px;
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
}
.testimonial-section {
    padding-top: 5rem !important;
    padding-bottom: 7rem !important;
    background: linear-gradient(135deg, #0B6E4F 0%, #2A2A2A 50%,  #1E1E1E 100%);
}
.site-footer .social li a {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color: var(--lux-gold);
    transition: all 0.35s ease;
}

.site-footer .social li a:hover {
    background: var(--lux-gold);
    color: #000;
    transform: translateY(-4px);
}

.quick-info a {
    color: var(--lux-text);
}

.quick-info a:hover {
    color: var(--lux-gold);
}
.site-footer ul.quick-info li.email:before {
    content: "\f0e0";
    color: #d4af37;
}
.site-footer ul.quick-info li.phone:before {
    content: "\f095";
    color: #d4af37;
}
.site-footer ul.quick-info li.address:before {
    content: "\e8b4";
    color: #d4af37;
}
.video-play-button:before {
    content: "";
    position: absolute;
    z-index: 0;
    left: 50%;
    top: 50%;
    -webkit-transform: translateX(-50%) translateY(-50%);
    -ms-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
    display: block;
    width: 80px;
    height: 80px;
    background: #d4af37;
    border-radius: 50%;
    -webkit-animation: pulse-border 1500ms ease-out infinite;
    animation: pulse-border 1500ms ease-out infinite;
}
.two-col li:before {
    content: "";
    position: absolute;
    width: 7px;
    height: 7px;
    border: 1px solid #d4af37;
    left: 0;
    top: 7px;
    border-radius: 50%;
}
.two-col li {
    display: inline-block;
    width: 48%;
    position: relative;
    padding-left: 30px;
    margin-bottom: 10px;
    vertical-align: text-top;
    float: left;
    color: #6ad8b6;
}
.video-play-button:after {
    content: "";
    position: absolute;
    z-index: 1;
    left: 50%;
    top: 50%;
    -webkit-transform: translateX(-50%) translateY(-50%);
    -ms-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
    display: block;
    width: 80px;
    height: 80px;
    background: #d4af37;
    border-radius: 50%;
    -webkit-transition: all 200ms;
    -o-transition: all 200ms;
    transition: all 200ms;
}
.hero h1 span {
    color: var(--primary-gold);
}
.package-card,
.category-box {
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid var(--border-soft);
    transition: all 0.35s ease;
}
.btn.btn-primary {
    background: #6ad8b6;
    border-color: #1A374D;
}
.text-muted {
    color: #6ad8b6 !important;
}

.package-card:hover,
.category-box:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 40px rgba(0, 0, 0, 0.6);
    border-color: var(--primary-gold);
}
.package-card img,
.category-box img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    filter: brightness(0.9);
    transition: all 0.4s ease;
}

.package-card:hover img {
    filter: brightness(1);
}
.untree_co-section.count-numbers.py-5 {
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%) !important;
}
.btn-primary {
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%) !important;
    color: #fff;
    border: none;
    padding: 12px 28px;
    border-radius: 30px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.counter-wrap .counter span {
    color: white;
}
.untree_co-section {
    padding: 70px 0;
    background: linear-gradient(135deg,  #0B6E4F  0%, #2A2A2A 50%,#1E1E1E 100%);
}
.mb-0, .my-0 {
    margin-bottom: 0 !important;
    color: #6ad8b6;
}
.feature-1 {
    padding: 30px;
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
    border-radius: 20px;
    min-height: calc(50% - 15px);
    top: 0;
    margin-bottom: 30px !important;
}
h5{
	color: #ffffff;
}
#ico{
	    color: #d4af37;
}
.flaticon-house:before {
    content: "\f105";
    color: #d4af37;
}
.flaticon-mail:before {
    content: "\f103";
    color: #d4af37;
}
.flaticon-restaurant:before {
    content: "\f100";
    color: #d4af37;
}
.flaticon-phone-call:before {
    content: "\f104";
    color: #d4af37;
}
h1, .h1, h2, .h2, h3, .h3, h4, .h4 {
    font-family: "Source Serif Pro", serif;
    color: white;
}
.counter-wrap .caption {
    color: #6ad8b6;
    font-weight: bold;
}
.btn-primary:hover {
    background-color: var(--primary-gold);
    color:#d4af37;
    transform: translateY(-2px);
}
select.form-control {
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
    color: var(--ivory);
    border: 1px solid var(--border-soft);
    border-radius: 10px;
}

select.form-control:focus {
    border-color: var(--primary-gold);
    box-shadow: none;
}
.section-title {
    color: var(--ivory);
    font-weight: 700;
    letter-spacing: 1px;
}

.section-title::after {
    content: "";
    display: block;
    width: 80px;
    height: 3px;
    background: var(--primary-gold);
    margin: 10px auto;
}
.price-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: var(--primary-gold);
    color: #000;
    padding: 6px 14px;
    border-radius: 20px;
    font-weight: 600;
}
.owl-nav button {
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%) !important;
    color: var(--primary-gold) !important;
    border-radius: 50%;
    width: 42px;
    height: 42px;
}

.owl-nav button:hover {
    background: var(--primary-gold) !important;
    color: #000 !important;
}
footer {
    background: linear-gradient(135deg, #1E1E1E 0%, #2A2A2A 50%, #0B6E4F 100%);
    color: var(--text-light);
}

footer a {
    color: var(--primary-gold);
}
span.text {
    color: #d4af37;
}

</style>
	<title></title>
</head>
