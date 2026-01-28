<?php

$item = [];
while ($row = mysqli_fetch_assoc($qresumItems)) {
    $item[] = $row;
}

?>

<section id="resume" class="resume section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?= $resumData['resume'] ?></h2>
        <p><?= $resumData['descresume'] ?></p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row">

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h3 class="resume-title"><?= $resumData['title-1'] ?></h3>

                <div class="resume-item pb-0">
                    <h4><?= $resumData['subtitle-1'] ?></h4>
                    <p><?= $resumData['year-1'] ?></p>
                    <p><em><?= $resumData['descsubtitle-1'] ?></em></p>
                    <ul>
                        <?php foreach ($item as $items) : ?>
                            <?php if (!empty($items['listsubtitle-1'])): ?>
                            <li><?= $items['listsubtitle-1'] ?></li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </div><!-- Edn Resume Item -->

                <h3 class="resume-title"><?= $resumData['title-2'] ?></h3>
                <div class="resume-item">
                    <h4><?= $resumData['subtitle-2'] ?></h4>
                    <h5><?= $resumData['year-2'] ?></h5>
                    <p><em><?= $resumData['descsubtitle-2'] ?></em></p>
                    <ul>
                        <?php foreach ($item as $items): ?>
                            <?php if (!empty($items['listsubtitle-2'])) : ?>
                            <li><?= $items['listsubtitle-2'] ?></li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </div><!-- Edn Resume Item -->
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <h3 class="resume-title"><?= $resumData['title-3'] ?></h3>
                <div class="resume-item">
                    <h4><?= $resumData['subtitle-3'] ?></h4>
                    <h5><?= $resumData['year-3'] ?></h5>
                    <p style="text-align: justify;"><em><?= $resumData['descsubtitle-3'] ?> </em></p>
                    <ul>
                        <?php foreach ($item as $items): ?>
                            <?php if (!empty($items['listsubtitle-3'])): ?>
                            <li><?= $items['listsubtitle-3'] ?></li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </div><!-- Edn Resume Item -->

                <div class="resume-item">
                    <h4><?= $resumData['subtitle-4'] ?></h4>
                    <h5><?= $resumData['year-4'] ?></h5>
                    <p style="text-align: justify;"><em><?= $resumData['descsubtitle-4'] ?></em></p>

                    <ul>
                        <?php foreach ($item as $items) : ?>
                            <?php if (!empty($items['listsubtitle-4'])) : ?>
                            <li><?= $items['listsubtitle-4'] ?></li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </div><!-- Edn Resume Item -->

            </div>

        </div>

    </div>

</section><!-- /Resume Section -->