<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, maximum-scale=0.8">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />


    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <title><?php echo $nama ?></title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="container nav-wrapper">
                <a href="<?= site_url('admin/login') ?>" class="logo">Miftahul<span>Huda III</span></a>
                <div class="menu-wrapper">
                    <ul class="menu">
                        <li class="menu-item"><a href="https://www.instagram.com/ppmh3_/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" target="_blank" class="menu-link active">Dokumentasi</a></li>
                        <li class="menu-item"><a href="https://wa.me/+6285808228865" target="_blank" class="menu-link">Contact</a></li>
                        <a href="<?= site_url('cek') ?>" class="btn-member">Cek Data</a>
                    </ul>
                    <a href="<?= site_url('daftar') ?>"  class="btn-member">Daftar</a>
                </div>
                <div class="menu-toggle bx bxs-grid-alt">
                </div>
            </div>
        </nav>

        <section class="home" id="home">
            <div class="container home-wrapper">
                <div class="content-left" data-aos="fade-right">
                    <h1 class="heading">Ayo Mondok, Ingat Tujuan Dari Rumah</h1>
                    <p class="subheading">"Lulusan pesantren tidak cuma bisa jadi guru ngaji ataupun kyai! Tapi, juga bisa menjadi kalangan berdasi dan pengusaha yang mandiri."</p>
                    <div class="box-wrapper">
                        <div class="box">
                        </div>
                    </div>
                    <div class="form-panel">
                        <div class="title-form">
                            <a href="<?php echo base_url().'daftar/download'?>"  class="btn-member">Download aplikasi ibadah</a>
                        </div>
                        <div class="doa">
                            <p>"Ketika teknologi bertemu keimanan, kekuatan ibadah tak lagi terbatas. Aplikasi ini menjembatani ruang antara hati dan kehadiran-Nya."</p>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
                <div class="content-right" data-aos="fade-left">
                    <div class="img-wrapper">
                        <img src="assets/img/hero-tavel.png" alt="">
                        <p>KH.Abdul Wahab</p>
                    </div>

                </div>

            </div>
        </section>
    </header>
