        <style>
            .imgc{
                height: 250px;
                width: 100%;
                object-fit: cover;
            }
        </style>
        
        <section id="portfolio" class="portfolio section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2><?= $portoData['title'] ?></h2>
                <p><?= $portoData['desctitle'] ?></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-excel">Excel</li>
                        <li data-filter=".filter-webinar">Webinar</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul><!-- End Portfolio Filters -->

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                        <?php while ($item = mysqli_fetch_assoc($qPortfolioItems)) : ?>
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-<?= $item['category'] ?>">
                                <div class="portfolio-content h-100">
                                    <img src="public/sertifikat/<?= $item['image'] ?>" class="img-fluid imgc" alt="">

                                    <div class="portfolio-info">
                                        <h4><?= $item['tagline'] ?></h4>
                                        <p><?= $item['title_image'] ?></p>

                                        <a href="public/sertifikat/<?= $item['image'] ?>"
                                            title="<?= $item['tagline'] ?>"
                                            data-gallery="portfolio-gallery"
                                            class="glightbox preview-link">
                                            <i class="bi bi-zoom-in"></i>
                                        </a>

                                        <?php if (!empty($item['url'])) : ?>
                                            <a href="<?= $item['url'] ?>" class="details-link">
                                                <i class="bi bi-link-45deg"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    
                </div>

            </div>

        </section><!-- /Portfolio Section -->