<div id="form" class="col-lg-7">
    <?php if (isset($_SESSION['success'])): ?>
        <div id="success-alert" class="alert alert-success text-center">
            PESAN BERHASIL DIKIRIM TERIMA KASIH!
        </div>

        <script>
            setTimeout(() => {
                const alertBox = document.getElementById('success-alert');
                if (alertBox) alertBox.style.display = 'none';
            }, 5000);
        </script>
    <?php
        unset($_SESSION['success']);
    endif;
    ?>
    <form method="POST" action="index.php#form" class="p-4 border rounded" data-aos="fade-up" data-aos-delay="200">
        <h1 style="text-align: center; color:darkblue">FORM</h1>
        <br>

        <div class="row gy-4">

            <div class="col-md-6">
                <label for="name" class="pb-2">Your Name</label>

                <input type="text" name="name" id="name" class="form-control" required />
            </div>

            <div class="col-md-6">
                <label for="email" class="pb-2">Your Email</label>
                <input type="email" class="form-control" name="email" id="email" required />
            </div>

            <div class="col-md-12">
                <label for="subject" class="pb-2">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required />
            </div>

            <div class="col-md-12">
                <label for="message" class="pb-2">Message</label>
                <textarea class="form-control" name="message" rows="10" id="message" required></textarea>
            </div>

            <div class="col-md-12 text-center">
                <!-- <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div> -->

                <button type="submit">Send Message</button>

            </div>

        </div>
    </form>
</div><!-- End Contact Form -->