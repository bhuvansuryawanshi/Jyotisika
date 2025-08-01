<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:View More</title>

    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * Card Hover Effect */ .card-hover {
            transition: transform 0.3s ease-in;
        }

        .card-hover:hover {
            transform: scale(1.05);
            /* Slightly scales up on hover */
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* Show only 2 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>


</head>

<body>
    <!-- Navbar -->
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

    <section>
        <!-- <?php print_r($service_data) ?> -->
        <div class="container my-4">
            <h3 class="text-center mb-4 fw-bold" style="color: var(--red);">Free Horoscope and Astrology Services</h3>
            <div class="row g-4 justify-content-center">


                <?php

                foreach ($service_data as $service): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a href="<?php echo base_url('User/astrolgerservices/') . $service["id"] ?>"
                            class="text-decoration-none">
                            <div class="card service-card text-center shadow-sm rounded border-0 p-3 h-100 card-hover">
                                <div class="service-card-image-container">
                                    <img src="<?php echo base_url('uploads/services/' . $service['image']); ?>"
                                        alt="<?php echo $service['name']; ?>" class="mx-auto mb-3"
                                        style="width: 60px; height: 60px; object-fit: cover;"
                                        onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/askQuestion.png'); ?>';">
                                </div>
                                <div class="service-card-body">
                                    <h class="fw-bold text-dark"><?php echo $service['name']; ?></h>
                                    <?php if (!empty($service['description'])): ?>
                                        <small class="text-muted line-clamp-2"><?php echo $service['description']; ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


    </section>

    <script>
        function filterCards() {
            const input = document.getElementById("searchInput").value.toLowerCase();
            const cards = document.querySelectorAll(".card-item");

            cards.forEach(card => {
                const title = card.querySelector(".card-title").textContent.toLowerCase();
                if (title.includes(input)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        }
    </script>


    
    <!-- footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>