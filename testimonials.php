<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Testimonial Slider</title>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <style>
    .testimonial {
        position: relative;
    }

    .testimonial .image {
        margin-top: 10px;
        height: 9rem;
        width: 20%;
        object-fit: contain;
        border-radius: 20%;
    }

    .testimonial .p1 {
        width: 40%;
        margin: 0 auto;
        justify-content: center;
        align-items: center;
        font-size: 3rem;
        text-align: justify;
    }

    .p2 {
        text-align: justify;
    }


    @media (max-width: 980px) {
        .testimonial .p1 {
            width: 70%;
            top: -1%;
            left: 25%;
            position: absolute;
            margin: 0;
            font-size: 4rem;
            text-align: justify;
        }

        .p2 {
            font-size: 2rem;
        }



    }

    @media (max-width: 768px) {
        .testimonial .p1 {
            width: 70%;
            top: -1%;
            left: 30%;
            position: absolute;
            margin: auto;
            font-size: 3rem;
        }

        .p2 {
            font-size: 2rem;
        }
    }

    @media (max-width: 450px) {
        .testimonial .p1 {
            width: 80%;
            top: 1%;
            left: 10%;
            position: absolute;
            margin: auto;
            font-size: 2rem;
            text-align: center;
        }

        .p2 {
            font-size: 1rem;
        }

    }
    </style>
</head>


<section class="container">
    <div class="testimonial mySwiper">
        <p class="p1">Cars of the month</p>
        <div class="testi-content swiper-wrapper">

            <div class="slide swiper-slide">
                <img src="images/categ/audi1.png" alt="" class="image" />
                <img src="cars/audi/audi-a1-sportback/S_Bva/main.png" alt="" style="width:35%;" />
                <p class="p2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam,
                    saepe provident dolorem a quaerat quo error facere nihil deleniti
                    eligendi ipsum adipisci, fugit, architecto amet asperiores
                    doloremque deserunt eum nemo.
                </p>

                <i class="bx bxs-quote-alt-left quote-icon"></i>

                <div class="details">
                    <span class="name">Youssef Jouini</span>
                    <span class="job">Ceo </span>
                </div>
            </div>
            <div class="slide swiper-slide">
                <img src="images/categ/bmw.png" alt="" class="image" />
                <img src="images/categ/bmw1.png" alt="" style="width:35%;" />
                <p class="p2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam,
                    saepe provident dolorem a quaerat quo error facere nihil deleniti
                    eligendi ipsum adipisci, fugit, architecto amet asperiores
                    doloremque deserunt eum nemo.
                </p>

                <i class="bx bxs-quote-alt-left quote-icon"></i>

                <div class="details">
                    <span class="name">Youssef Jouini</span>
                    <span class="job">Ceo </span>
                </div>
            </div>
            <div class="slide swiper-slide">
                <img src="images/categ/audi1.png" alt="" class="image" />
                <img src="cars/audi/audi-a5-sportback/main2.png" alt="" style="width:35%;" />
                <p class="p2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam,
                    saepe provident dolorem a quaerat quo error facere nihil deleniti
                    eligendi ipsum adipisci, fugit, architecto amet asperiores
                    doloremque deserunt eum nemo.
                </p>

                <i class="bx bxs-quote-alt-left quote-icon"></i>

                <div class="details">
                    <span class="name">Youssef Jouini</span>
                    <span class="job">Ceo </span>
                </div>
            </div>
            <div class="slide swiper-slide">
                <img src="images/categ/mercedes.png" alt="" class="image" />
                <img src="images/categ/mercedes1.png" alt="" style="width:35%;" />
                <p class="p2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam,
                    saepe provident dolorem a quaerat quo error facere nihil deleniti
                    eligendi ipsum adipisci, fugit, architecto amet asperiores
                    doloremque deserunt eum nemo.
                </p>

                <i class="bx bxs-quote-alt-left quote-icon"></i>

                <div class="details">
                    <span class="name">John James</span>
                    <span class="job">Co-founder</span>
                </div>
            </div>
            <div class="slide swiper-slide">
                <img src="images/categ/porsche.png" alt="" class="image" />
                <img src="images/categ/porsche1.png" alt="" style="width:35%;" />
                <p class="p2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam,
                    saepe provident dolorem a quaerat quo error facere nihil deleniti
                    eligendi ipsum adipisci, fugit, architecto amet asperiores
                    doloremque deserunt eum nemo.
                </p>

                <i class="bx bxs-quote-alt-left quote-icon"></i>

                <div class="details">
                    <span class="name">John James</span>
                    <span class="job">Co-founder </span>
                </div>
            </div>
        </div>
        <div class="swiper-button-next nav-btn"></div>
        <div class="swiper-button-prev nav-btn"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- Swiper JS -->
<script src="js/swiper-bundle.min.js"></script>

<!-- JavaScript -->
<script src="js/script.js"></script>


</html>