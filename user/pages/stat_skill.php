<section id="skills" class="skills section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?= $skillsData['title'] ?></h2>
        <p><?= $skillsData['description'] ?></p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row skills-content skills-animation">

            <div class="row skills-content skills-animation">

                <!-- KOLOM KIRI -->
                <div class="col-lg-6">
                    <?php for ($i = 0; $i < 3 && $i < $total; $i++) : ?>
                        <div class="progress">
                            <span class="skill">
                                <span><?= $skillsTitles[$i] ?></span>
                                <i class="val"><?= $percentages[$i] ?>%</i>
                            </span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar"
                                    role="progressbar"
                                    aria-valuenow="<?= $percentages[$i] ?>"
                                    aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>

                <!-- KOLOM KANAN -->
                <div class="col-lg-6">
                    <?php for ($i = 3; $i < 6 && $i < $total; $i++) : ?>
                        <div class="progress">
                            <span class="skill">
                                <span><?= $skillsTitles[$i] ?></span>
                                <i class="val"><?= $percentages[$i] ?>%</i>
                            </span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar"
                                    role="progressbar"
                                    aria-valuenow="<?= $percentages[$i] ?>"
                                    aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>

            </div>



        </div>

    </div>

    </div>

</section><!-- /Skills Section -->

<!-- Stats Section -->
<section id="stats" class="stats section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <?php for ($i = 0; $i < $totalStats; $i++) : ?>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item">

                        <?= $icons[$i] ?>

                        <span
                            data-purecounter-start="0"
                            data-purecounter-end="<?= $iconNumbers[$i] ?>"
                            data-purecounter-duration="1"
                            class="purecounter">
                        </span>

                        <p><?= $iconDescriptions[$i] ?></p>

                    </div>
                </div>
            <?php endfor; ?>

        </div>

    </div>

</section>