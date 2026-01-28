<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?= $contactData['title'] ?></h2>
        <p><?= $contactData['desc'] ?></p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-5">

                <div class="info-wrap">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3><?= $qcontactItems['address'] ?></h3>
                             <p><?= $qcontactItems['descaddress'] ?></p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3><?= $qcontactItems['callus'] ?></h3>
                            <p><?= $qcontactItems['desccall'] ?></p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3><?= $qcontactItems['email'] ?></h3>
                            <p><?= $qcontactItems['descemail'] ?>></p>
                        </div>
                    </div><!-- End Info Item -->

                    <iframe
                        src="https://www.google.com/maps?q=<?= urlencode($qcontactItems['gmaps']) ?>&hl=es;z=14&output=embed"
                        frameborder="0"
                        style="border:0; width: 100%; height: 270px;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <?php include "user/pages/form.php" ?>

        </div>

    </div>

</section><!-- /Contact Section -->