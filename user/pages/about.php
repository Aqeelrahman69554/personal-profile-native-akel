<?php
$item = [];
while ($row = mysqli_fetch_assoc($qaboutItems)) {
    $item[] = $row;
}
?>

<section id="about" class="about section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?= $aboutData['title'] ?></h2>
        <p style="text-align: justify;"><?= $aboutData['desctitle'] ?></p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">
            <div class="col-lg-4">
                <img src="<?= $base_url ?>public/about/<?= $aboutData["image"] ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 content">
                <h2><?= $aboutData['subtitle'] ?></h2>
                <p class="fst-italic py-3">
                    <?= $aboutData['descsubtitle'] ?>
                </p>
                <div class="row">
                    <div class="col-lg-12">
                        <ul style="column-count: 2; column-gap: 20px; list-style: none; padding: 0;">
                            <?php foreach ($item as $items) : ?>
                                <li><i class="bi bi-chevron-right"></i><strong><?= $items['list'] ?>:</strong> <span><?= $items['sublist'] ?></span></li>
                            <?php endforeach ?>
                        </ul>
                    </div>

                </div>
                <p class="py-3">
                    <?= $aboutData['closingdesc'] ?>
                </p>
            </div>
        </div>

    </div>

</section><!-- /About Section -->