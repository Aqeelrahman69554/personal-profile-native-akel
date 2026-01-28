<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

    <!-- <img src="<?= $base_url ?>public/img/<?= $homeData["image"] ?>" alt="my photo" data-aos="fade-in" class=""> -->
    <img src="<?= $base_url ?>public/home/<?= $homeData['image'] ?>"data-aos="fade-in"class="">

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h2><?= $homeData['title'] ?></h2>
        <p>I'm <span class="typed" data-typed-items="<?= $homeData['job'] ?>"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
    </div>

</section><!-- /Hero Section -->