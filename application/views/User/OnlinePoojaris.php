<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Festival</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

</head>

<body>

    <header>
        <!-- Navbar -->
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>


    <main>
        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

        <div class="container">

            <!-- seach section  -->
            <div class="row my-4">
                <div class="col-12 col-md-6 d-flex gap-3 align-items-center">
                    <select class="form-select w-auto shadow-none" aria-label="Filter by experience"
                        id="experienceFilter" onchange="filterCards()">
                        <option selected value=""><?php echo $this->lang->line('Experience') ?></option>
                        <option value="1"> <?php echo $this->lang->line('Experience_0_2') ?></option>
                        <option value="2"><?php echo $this->lang->line('Experience_3_5') ?></option>
                        <option value="3"><?php echo $this->lang->line('Experience_6_8') ?></option>
                        <option value="4"><?php echo $this->lang->line('Experience_9_plus') ?></option>
                    </select>

                </div>

                <div class="col-12 col-md-6">
                    <div class="input-group w-100 text-center mx-auto">
                        <input id="searchInput" type="search" class="form-control shadow-none"
                            placeholder=    "<?php echo $this->lang->line('search_astrologer') ?>" onkeyup="filterCards()">

                    </div>
                </div>
            </div>

            <?php if (!empty($showpuja_info_response)) : ?>
    <?php foreach ($showpuja_info_response as $service) : ?>
        <div class="card mb-4 shadow-sm border-0">
            <div class="row g-0 align-items-center">
                <div class="col-md-3 text-center">
                    <img src="<?php echo base_url('uploads/services/' . $service['image']); ?>"
                         alt="<?php echo $service['name']; ?>"
                         class="img-fluid rounded-circle m-3"
                         style="width: 100px; height: 100px; object-fit: cover;"
                         onerror="this.onerror=null; this.src='<?php echo base_url('assets/images/BookPooja/MahaRudrabhishekpooja.png'); ?>';">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="fw-bold"><?php echo $service['name']; ?></h5>
                        <p class="text-muted">
                            <?php
                              
                                echo $service['description'];
                            ?>
                        </p>
                        <p class="fw-semibold text-success">₹ <?php echo number_format($service['price'], 2); ?></p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <a href="<?php echo base_url('bookpooja'); ?>"
                       class="btn btn-outline-primary rounded-pill px-4">
                       <?php echo $this->lang->line('ViewMore') ?>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-muted"><?php echo $this->lang->line('no_services_found') ?></p>
<?php endif; ?>


            <!-- cards -->
            <div class="row my-4 cardContainer">

                <!-- <div class="row my-4" class="cardContainer"> -->

                <?php if ($showpujari): ?>

                    <?php foreach ($showpujari as $pujaridata): ?>

                        <div class="col-12 col-md-6 col-lg-3 card-item mb-3">
                            <div class="card shadow rounded-3 h-100 position-relative" style="border: 2px solid var(--red); ">
                                <!-- Featured Badge -->

                                <div class="card-body p-3">
                                    <!-- Profile Section -->
                                    <div class="d-flex align-items-center mb-2">
                                        <a
                                            href="<?php echo base_url('PoojarViewMore/' . $pujaridata["pujari_id_"] . "/" . $pujaridata["service_id"]); ?>">
                                            <div class="position-relative">
                                                <!-- echo base_url('assets/images/astrologer.png'); -->



                                                <img src="<?php echo !empty($pujaridata['profile_pic']) ? base_url('uploads/pujari/profile/' . $pujaridata['profile_pic']) : base_url('assets/images/astrologerimg.png'); ?>"
                                                    alt="image" class="rounded-circle"
                                                    style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);"
                                                    onerror="this.onerror=null; this.src='<?php echo base_url('assets/images/astrologerimg.png'); ?>';">

                                                <span class="position-absolute bottom-0 end-0 badge rounded-circle p-1"
                                                    style="background-color: #28a745;">
                                                    <i class="bi bi-check-circle-fill small"></i>
                                                </span>
                                            </div>
                                        </a>
                                        <div class="ms-2">
                                            <a href="<?php echo base_url('PoojarViewMore/' . $pujaridata["pujari_id_"] . "/" . $pujaridata["service_id"]); ?>"
                                                class="text-decoration-none">
                                                <h6 class="card-title fw-bold mb-0" style="color: var(--red);">
                                                    <?php echo $pujaridata["pujariname"] ?>
                                                </h6>
                                            </a>
                                            <div class="d-flex align-items-center gap-1 ">
                                                <i class="bi bi-star-fill small" style="color: #ffd700;"></i>
                                                <span class="small text-muted mt-1"><?php echo $pujaridata["average_rating"] ?>
                                                    (<?php echo $pujaridata["completed_puja_count"] ?>
                                                    +<?php echo $this->lang->line('poojas') ?> )</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Details Section -->
                                    <div class="d-flex flex-column gap-1 mb-2">
                                        <!-- <div class="d-flex align-items-center small">
                                        <i class="bi bi-bookmark-star-fill me-2" style="color: var(--red);"></i>
                                        <span class="card-expertise">Vastu Expert, Vedic Scholar</span>
                                    </div> -->
                                        <div class="row g-1">
                                            <div class="col-12">
                                                <div class="d-flex align-items-center small">
                                                    <i class="bi bi-calendar2-check me-1 text-success"></i>
                                                    <span class="card-experience"><?php echo $pujaridata["experience"] ?>
                                                        + <?php echo $this->lang->line('Year') ?></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-flex align-items-center small">
                                            <i class="bi bi-translate me-2 text-dark"></i>
                                            <span class="card-language"> <?php echo $pujaridata["languages"] ?></span>
                                        </div>
                                        <div class="d-flex align-items-center small fw-bold">
                                            <i class="bi bi-currency-rupee me-1"></i>
                                            <span class="fs-6"> <?php echo $pujaridata["puja_charges"] ?></span>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="d-flex gap-2">
                                        <?php if ($this->session->userdata("user_id")): ?>
                                            <!-- <button class="btn btn-sm w-100 rounded-3" style="background-color: var(--yellow);"
                                                data-bs-toggle="modal" data-bs-target="#bookpooja">
                                                Book Pooja
                                            </button> -->

                                            <button class="btn btn-sm w-100 rounded-3" style="background-color: var(--yellow);"
                                                data-bs-toggle="modal"
                                                data-bs-target="#bookpooja<?php echo $pujaridata["pujari_id_"]; ?>">
                                                <?php echo $this->lang->line('Book_Pooja') ?>
                                            </button>

                                        <?php else: ?>

                                            <button class="btn btn-sm w-100 rounded-3" style="background-color: var(--yellow);"
                                                onclick="Showlogin()">
                                                <?php echo $this->lang->line('Book_Pooja') ?>
                                            </button>

                                        <?php endif ?>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="bookpooja<?php echo $pujaridata["pujari_id_"]; ?>" tabindex="-1"
                            aria-labelledby="bookpoojaLabel<?php echo $pujaridata["pujari_id_"]; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <form class="pujadata">
                                    <div class="modal-content">
                                        <div class="d-flex justify-content-between align-items-center p-3">
                                            <h1 class="modal-title fs-5"
                                                id="bookpoojaLabel<?php echo $pujaridata["pujari_id_"]; ?>">
                                                <?php echo $this->lang->line('Book_Your_Pooja'); ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-3">

                                                <!-- Email -->
                                                <div class="col-12">
                                                    <label class="form-label fw-bold">
                                                        <?php echo $this->lang->line('User_Email') ?></label>
                                                    <input type="email" name="useremail" class="form-control shadow-none"
                                                        required>
                                                </div>

                                                <!-- Preferred Date -->
                                                <div class="col-12">
                                                    <label
                                                        class="form-label fw-bold"><?php echo $this->lang->line('Preferred_Date') ?></label>
                                                    <input type="date" name="pujadate" class="form-control shadow-none"
                                                        min="<?php echo date('Y-m-d'); ?>" required>
                                                </div>

                                                <!-- Preferred Time -->
                                                <div class="col-12">
                                                    <label
                                                        class="form-label fw-bold"><?php echo $this->lang->line('Preferred_Time') ?></label>
                                                    <input type="time" name="pujatime" class="form-control shadow-none"
                                                        required>
                                                </div>

                                                <!-- Hidden Fields -->
                                                <input type="hidden" name="pujari_id"
                                                    value="<?php echo $pujaridata["pujari_id_"]; ?>">
                                                <input type="hidden" name="service_id"
                                                    value="<?php echo $pujaridata["service_id"]; ?>">
                                                <input type="hidden" name="puja_image"
                                                    value="<?php echo $pujaridata["image"]; ?>">

                                                <input type="hidden" name="puja_mode" value="Online">
                                                <input type="hidden" name="user_id"
                                                    value="<?php echo $this->session->userdata("user_id") ?? null; ?>">
                                                <input type="hidden" name="pujari_charges"
                                                    value="<?php echo $pujaridata["puja_charges"]; ?>">

                                            </div>
                                        </div>
                                        <div class="p-3 d-flex justify-content-center align-items-center gap-3">
                                            <button type="submit" class="btn text-dark"
                                                style="background-color: var(--yellow);">
                                                <?php echo $this->lang->line('Confirm_Booking') ?>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- <div class="col-12">
                                    <label class="form-label fw-bold">Address</label>
                                    <textarea class="form-control shadow-none" rows="3"
                                        placeholder="Enter your complete address" required
                                        oninput="(function(element) { element.value = element.value.replace(/[^a-zA-Z0-9\s]/g, ''); })(this)"
                                        pattern="^[A-Za-z0-9À-ž\s]+$"
                                        title="Enter Alphabets and Numbers Only"></textarea>
                                </div> -->

                        <!-- <div class="modal fade" id="bookpooja" tabindex="-1" aria-labelledby="bookpoojaLabel"
                            aria-hidden="true">
                            <div class="modal-dialog ">
                                <form class="pujadata">
                                    <div class="modal-content">
                                        <div class="d-flex justify-content-between align-items-center p-3">
                                            <h1 class="modal-title fs-5" id="bookpoojaLabel">Book Your Pooja</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row g-3">
                                               

                                                <div class="col-12">
                                                    <label class="form-label fw-bold">User Email</label>
                                                    <input type="user_email" name="useremail" class="form-control shadow-none"
                                                        required>
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label fw-bold">Preferred Date</label>
                                                    <input type="date" name="pujadate" class="form-control shadow-none"
                                                        min="<?php echo date('Y-m-d'); ?>" required>
                                                </div>




                                                <input type="text" value="<?php echo $pujaridata["pujari_id_"] ?>"
                                                    name="pujari_id" hidden>
                                                <input type="text" value="<?php echo $pujaridata["service_id"] ?>"
                                                    name="service_id" hidden>

                                                <input type="text" value="<?php echo "Online" ?>" name="puja_mode" hidden>

                                                <input type="text"
                                                    value="<?php echo $this->session->userdata("user_id") ?? null; ?>"
                                                    name="user_id" hidden>

                                                <input type="text" value="<?php echo $pujaridata["puja_charges"]; ?>"
                                                    name="pujari_charges" hidden>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold">Preferred Time</label>
                                                    <input type="time" name="pujatime" class="form-control shadow-none"
                                                        required>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="p-3 d-flex justify-content-center align-items-center gap-3">

                                            <button type="submit" class="btn text-dark"
                                                style="background-color: var(--yellow);">
                                                Confirm Booking
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> -->

                    <?php endforeach ?>
                <?php else: ?>

                    <p>There is no pujari available right now</p>

                <?php endif ?>

            </div>
        </div>

        <!-- Modal -->

        <script>
            function filterCards() {
                const query = document.getElementById("searchInput").value.trim().toLowerCase();
                const expCode = document.getElementById("experienceFilter").value;

                document.querySelectorAll(".card-item").forEach(card => {
                    // ‑‑ pull text safely (use optional chaining + fallback) ‑‑
                    const title = card.querySelector(".card-title")?.textContent.toLowerCase() || "";
                    const lang = card.querySelector(".card-language")?.textContent.toLowerCase() || "";
                    const expertise = card.querySelector(".card-expertise")?.textContent.toLowerCase() || "";
                    const yearsText = card.querySelector(".card-experience")?.textContent || "0";
                    const years = parseInt(yearsText.match(/\d+/)?.[0] ?? 0, 10);   // first number

                    /* ------- search logic ------- */
                    const matchesQuery = !query || [title, lang, expertise].some(t => t.includes(query));
                    const matchesYears =
                        !expCode ||
                        (expCode === "1" && years <= 2) ||
                        (expCode === "2" && years >= 3 && years <= 5) ||
                        (expCode === "3" && years >= 6 && years <= 8) ||
                        (expCode === "4" && years >= 9);

                    // Bootstrap helper: d-none = display:none
                    card.classList.toggle("d-none", !(matchesQuery && matchesYears));
                });
            }

            /*  events */
            document.addEventListener("DOMContentLoaded", () => {
                filterCards();   // run once on load
                document.getElementById("searchInput").addEventListener("input", filterCards);
                document.getElementById("experienceFilter").addEventListener("change", filterCards);
            });
        </script>

        <!-- 
        <script>
            function filterCards() {
                const input = document.getElementById("searchInput").value.toLowerCase();
                const experienceFilter = document.getElementById("experienceFilter").value;
                const cards = document.querySelectorAll(".card-item");

                cards.forEach(card => {
                    const title = card.querySelector(".card-title").textContent.toLowerCase();
                    const expertise = card.querySelector(".card-expertise").textContent.toLowerCase();
                    const language = card.querySelector(".card-language").textContent.toLowerCase();
                    const experienceText = card.querySelector(".card-experience").textContent.toLowerCase();
                    const experience = parseInt(experienceText.split(' ')[0]); // Extract the number of years

                    const matchesSearch = title.includes(input) || expertise.includes(input) || language.includes(input);
                    const matchesExperience = experienceFilter === "" ||
                        (experienceFilter === "1" && experience <= 2) ||
                        (experienceFilter === "2" && experience > 2 && experience <= 5) ||
                        (experienceFilter === "3" && experience > 5 && experience <= 8) ||
                        (experienceFilter === "4" && experience > 8);

                    if (matchesSearch && matchesExperience) {
                        card.closest('.card-item').style.display = "block";
                    } else {
                        card.closest('.card-item').style.display = "none";
                    }
                });
            }

            // Add event listener for search input
            document.getElementById("searchInput").addEventListener("input", filterCards);
            document.getElementById("experienceFilter").addEventListener("change", filterCards);
        </script> -->

        <script>
            function Showlogin() {


                Swal.fire({
                    title: "Login Required",
                    text: "Please login to access this service",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Login",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "<?php echo base_url('Login'); ?>";
                    }
                });
            }

        </script>

        <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
        <!-- <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll("form.pujadata").forEach(form => {



                    form.addEventListener("submit", function (event) {
                        event.preventDefault();

                        let formdata = new FormData(form);
                        console.log(form);


                        fetch("<?php echo base_url('User_Api_Controller/send_request_to_pujari'); ?>", {
                            method: "POST",
                            body: formdata,
                        })
                            .then(response => response.json())
                            .then(data => {

                                if (data["status"] == "success") {

                                    Swal.fire({
                                        title: "Success",
                                        text: "Requested sended successfully",
                                        icon: "success",

                                    });
                                }
                                else if (data["status"] == "warning") {
                                    Swal.fire({
                                        title: "warning",
                                        text: "Pujari already booked",
                                        icon: "warning",

                                    });
                                }



                            })
                            .catch(error => {

                                Swal.fire({
                                    title: "error",
                                    text: "Request not sended successfully",
                                    icon: "warning",

                                });
                                console.error("Error:", error);

                            });
                    });
                });
            });
        </script> -->

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll("form.pujadata").forEach(form => {
                    form.addEventListener("submit", function (event) {
                        event.preventDefault();

                        let formdata = new FormData(form);
                        const modal = form.closest(".modal");

                        fetch("<?php echo base_url('User_Api_Controller/send_request_to_pujari'); ?>", {
                            method: "POST",
                            body: formdata,
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data["status"] == "success") {
                                    Swal.fire({
                                        title: "Success",
                                        text: "Request sent successfully",
                                        icon: "success",
                                    }).then(() => {
                                        // ✅ Close modal
                                        const modalInstance = bootstrap.Modal.getInstance(modal);
                                        if (modalInstance) {
                                            modalInstance.hide();
                                        }

                                        // ✅ Reset form
                                        form.reset();
                                    });
                                }
                                else if (data["status"] == "pujawarning") {
                                    Swal.fire({
                                        title: "warning",
                                        text: "The start time must be within 4 hours",
                                        icon: "warning",

                                    });
                                }
                                else if (data["status"] == "warning") {
                                    Swal.fire({
                                        title: "Warning",
                                        text: "Pujari already booked",
                                        icon: "warning",
                                    });
                                }
                            })
                            .catch(error => {
                                Swal.fire({
                                    title: "Error",
                                    text: "Request not sent successfully",
                                    icon: "error",
                                });
                                console.error("Error:", error);
                            });
                    });
                });
            });

        </script>

        <!-- <script>

            document.addEventListener("DOMContentLoaded", function () {

                document.querySelectorAll("form.pujadata").forEach(form => {


                    console.log("hello word");
                    let formdata = new FormData(this);

                    form.addEventListener("submit", function (event) {
                        event.preventDefault();
                        fetch("<?php echo base_url("User_Api_Controller/send_request_to_pujari") ?>", {
                            method: "POST",
                            body: formdata,
                        });

                    });
                })

            });

        </script> -->



    </main>

    <footer>
        <!-- footer -->
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>

</body>

</html>