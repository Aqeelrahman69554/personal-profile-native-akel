<?php
$item = [];
while ($row = mysqli_fetch_assoc($qserviceItems)) {
    $item[] = $row;
}
?>


<section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?= $serviceData['title-1'] ?></h2>
        <p><?= $serviceData['desctitle-1'] ?></p>
    </div><!-- End Section Title -->

    <div class="container" style="text-align: justify;">


        <div class="row gy-4">
            <?php foreach ($item as $items) : ?>
                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon flex-shrink-0"><i class="<?= $items['icon'] ?>"></i></div>
                    <div>
                        <h4 class="title"><a href="template/user/service-details.html" class="stretched-link"><?= $items['subtitle-1'] ?></a></h4>
                        <p class="description"><?= $items['descsubtitle-1'] ?></p>
                    </div>
                </div>
                <!-- End Service Item -->
            <?php endforeach ?>
        </div>


    </div>

</section><!-- /Services Section -->

<section id="testimonials" class="testimonials section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?= $serviceData['title-2'] ?></h2>
        <p><?= $serviceData['desctitle-2'] ?></p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "breakpoints": {
                        "320": {
                            "slidesPerView": 1,
                            "spaceBetween": 40
                        },
                        "1200": {
                            "slidesPerView": 3,
                            "spaceBetween": 1
                        }
                    }
                }
            </script>
            <div class="swiper-wrapper">
                <?php foreach ($item as $items): ?>
                    <?php if(!empty($items['coment'])): ?>
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span><?= $items['coment'] ?></span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <img src="public/servi/<?= $items['image-coment'] ?>" class="testimonial-img" alt="">
                            <h3><?= $items['name'] ?></h3>
                            <h4><?= $items['status'] ?></h4>
                        </div>
                    </div><!-- End testimonial item -->
                    <?php endif ?>
                <?php endforeach ?>




            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section><!-- /Testimonials Section -->