<nav class="navbar navbar-expand-lg bg-body-tertiary px-md-2 sticky-top"
    style="background-color: var(--yellow) !important;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="<?php echo base_url('assets/images/new_logo.png'); ?>" alt="logo image"
                style="width: 60px; height: 60px; mix-blend-mode: multiply;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php
        $user_image = $this->session->userdata('user_image');
        $profile_image_path = !empty($user_image)
            ? base_url($user_image)
            : base_url('assets/images/profileimage.png');
        ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url('home'); ?>">
                        <?php echo $this->lang->line('home') ? $this->lang->line('home') : 'Home'; ?>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-black" href="<?php echo base_url('todayhoroscope'); ?>">
                        <?php echo $this->lang->line('Horoscope') ? $this->lang->line('Horoscope') : 'Horoscope'; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="<?php echo base_url('astrologers'); ?>">
                        <?php echo $this->lang->line('Astrologers') ? $this->lang->line('Astrologers') : 'Astrologers'; ?>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link text-black" href="<?php echo base_url('WhyUs') ?>">
                        <?php echo $this->lang->line('WhyUs') ? $this->lang->line('WhyUs') : 'Why Us'; ?>
                    </a>
                </li> -->
            </ul>




            <div class="d-flex gap-2">

                <a href="<?php echo base_url('wallet'); ?>"
                    class="btn border-1 btn-sm rounded-1 d-flex align-items-center gap-2 mb-2 mb-xl-0">
                    <i class="bi bi-wallet2"></i>
                    <span id="wallet-amount">₹ 0</span>
                </a>


                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        console.log("DOM fully loaded");

                        <?php if ($this->session->userdata('user_id')): ?>
                            fetchWalletBalance();
                        <?php endif; ?>
                    });

                    function fetchWalletBalance() {
                        let user_id = <?php echo $this->session->userdata('user_id') ?? 0; ?>;

                        fetch("<?php echo base_url('User_Api_Controller/getuser_info'); ?>", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: new URLSearchParams({
                                session_id: user_id
                            })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === "success") {
                                    let val = data.data.amount;
                                    document.getElementById("wallet-amount").textContent = "₹ " + val;
                                } else {
                                    console.error("Error fetching wallet balance:", data.message);
                                }
                            })
                            .catch(error => {
                                console.error("Fetch error:", error);
                            });
                    }
                </script>



                <div class="position-relative">
                    <i class="bi bi-translate position-absolute ps-2"
                        style="top: 50%; left: 0px; transform: translateY(-50%);"></i>

                    <select id="languageSwitcher" class="p-1 px-4 rounded-2">
                        <option value="english" <?php echo ($this->session->userdata('site_language') == 'english') ? 'selected' : ''; ?>>English</option>
                        <option value="marathi" <?php echo ($this->session->userdata('site_language') == 'marathi') ? 'selected' : ''; ?>>मराठी</option>
                        <option value="hindi" <?php echo ($this->session->userdata('site_language') == 'hindi') ? 'selected' : ''; ?>>हिन्दी</option>
                    </select>
                </div>

                <script>
                    document.getElementById('languageSwitcher').addEventListener('change', function () {
                        var selectedLang = this.value;
                        window.location.href = "<?php echo base_url('User/change_language/'); ?>" + selectedLang;
                    });
                </script>




                <?php if (!$this->session->userdata('user_id')): ?>
                    <a class="btn btn-primary border-0" href="<?php echo base_url('Login'); ?>"
                        style="background-color: var(--red);">
                        <?php echo $this->lang->line('Login_Button') ?: "Login"; ?>
                    </a>
                <?php endif; ?>


                <div class="dropdown">
                    <?php if ($this->session->userdata('user_id')): ?>

                        <a class="nav-link" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img id="dropdown-profile-image" src="<?php echo $profile_image_path; ?>" alt="User Profile"
                                style="width: 40px; height: 40px; border-radius: 50%;">



                        </a>

                    <?php else: ?>
                        <a class="nav-link" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img id="dropdown-profile-image" src="<?php echo base_url('assets/images/userProfile.png') ?>"
                                alt="User Profile" style="width: 40px; height: 40px; border-radius: 50%;">
                        </a>

                    <?php endif ?>




                    <?php if ($this->session->userdata('user_id')): ?>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown"
                            style="border-radius: 15px; box-shadow: 0 8px 16px rgba(0,0,0,0.15); border: none; min-width: 250px;">
                            <li class="text-center p-4">
                                <a href="<?php echo base_url('UserProfile') ?>" class="text-decoration-none">
                                    <div class="position-relative d-inline-block">
                                        <!-- Profile Image with ID for JS to update -->

                                        <img id="sidebar-profile-image" src=" <?php echo $profile_image_path; ?>"
                                            alt="Profile Image"
                                            style="width: 80px; height: 80px; border-radius: 50%; border: 3px solid var(--yellow); padding: 3px; transition: transform 0.3s;">


                                        <div class="position-absolute bottom-0 right-0 bg-success rounded-circle"
                                            style="width: 15px; height: 15px; right: 5px; border: 2px solid white;">
                                        </div>
                                    </div>

                                    <p class="mt-3 mb-0 text-dark" style="font-weight: 600; font-size: 1.1rem;">
                                        <?php
                                        echo !empty($this->session->userdata('user_name'))
                                            ? $this->session->userdata('user_name')
                                            : "Guest User";
                                        ?>
                                    </p>


                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider mx-3">
                            </li>





                            <li>
                                <a class="dropdown-item py-2 ps-4" href="<?php echo base_url('Notification'); ?>">
                                    <i class="bi bi-bell me-2"></i> Notifications
                                    <!-- <span class="badge bg-danger rounded-pill float-end me-2">3</span> -->
                                    <span id="notificationCount" class="badge bg-danger rounded-pill float-end me-2"
                                        style="display:none;">0</span>

                                </a>
                            </li>

                            <!-- Badge -->
                            <span id="notificationCount" class="badge bg-danger rounded-pill float-end me-2"
                                style="display:none;">0</span>

                            <script>
                                document.addEventListener('DOMContentLoaded', () => {
                                    // 1️⃣ Build FormData with the user_id from PHP session
                                    const formData = new FormData();
                                    formData.append('user_id', '<?php echo $this->session->userdata("user_id"); ?>');

                                    // 2️⃣ Send POST request
                                    fetch('<?php echo base_url("User_Api_Controller/show_notification_number"); ?>', {
                                        method: 'POST',
                                        body: formData
                                    })
                                        .then(res => res.json())
                                        .then(res => {
                                            if (res.status !== 'success') {
                                                console.error(res.message);
                                                return;
                                            }

                                            const count = parseInt(res.data, 10) || 0;
                                            const badge = document.getElementById('notificationCount');

                                            if (badge) {
                                                if (count > 0) {
                                                    badge.textContent = count;
                                                    badge.style.display = 'inline-block';
                                                } else {
                                                    badge.style.display = 'none';
                                                }
                                            }
                                        })
                                        .catch(err => console.error('Error fetching notification count:', err));
                                });
                            </script>





                            <li>
                                <a class="dropdown-item py-2 ps-4" href="<?php echo base_url('Orders'); ?>">
                                    <i class="bi bi-bag me-2"></i> My Orders
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 ps-4" href="<?php echo base_url('Following'); ?>">
                                    <i class="bi bi-heart me-2"></i> Following
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 ps-4" href="<?php echo base_url('CustomerSupport'); ?>">
                                    <i class="bi bi-gear me-2"></i>

                                    <?php echo $this->lang->line('Customer_Support') ? $this->lang->line('Customer_Support') : 'Customer_Support'; ?>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 ps-4"
                                    href="https://api.whatsapp.com/send?text=Check%20out%20this%20awesome%20website!%20https%3A%2F%2Fexample.com"
                                    target="_blank">
                                    <i class="bi bi-share me-2"></i> Refer to Friends
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider mx-3">
                            </li>
                            <li>
                                <a class="dropdown-item py-2 ps-4 text-danger" href="<?php echo base_url('Logout'); ?>">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </a>
                            </li>
                        </ul>
                    <?php else: ?>


                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown"
                            style="border-radius: 15px; box-shadow: 0 8px 16px rgba(0,0,0,0.15); border: none; min-width: 250px;">
                            <li class="text-center p-4" id="myprofilelink">
                                <div class="position-relative d-inline-block">
                                    <img src="<?php echo base_url('assets/images/userProfile.png') ?>" alt="Profile Image"
                                        style="width: 80px; height: 80px; border-radius: 50%; border: 3px solid var(--yellow); padding: 3px; transition: transform 0.3s;">
                                    <div class="position-absolute bottom-0 right-0 bg-success rounded-circle"
                                        style="width: 15px; height: 15px; right: 5px; border: 2px solid white;"></div>
                                </div>

                                <p class="mt-3 mb-0 text-dark" style="font-weight: 600; font-size: 1.1rem;">
                                    <?php echo $this->lang->line('Hello_User') ?: "Hello User"; ?>
                                </p>
                                <p id="myparaLink" class="mt-1 mb-0 text-dark" style="font-weight: 400; font-size: 1rem;">
                                    <?php echo $this->lang->line('Access_Account') ?: "To access your Jyotishika account, please log in."; ?>
                                </p>
                            </li>
                            <li>
                                <hr class="dropdown-divider mx-1">
                            </li>
                            <li>
                                <a class="dropdown-item py-2 ps-4" href="#" id="myOrdersLink">
                                    <i class="bi bi-bag me-2"></i>
                                    <?php echo $this->lang->line('My_Orders') ?: "My Orders"; ?>
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider mx-3">
                            </li>

                            <li>
                                <a class="dropdown-item py-2 ps-4 text-danger" href="<?php echo base_url('Login'); ?>">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    <?php echo $this->lang->line('Login') ?: "Log in"; ?>
                                </a>
                            </li>
                        </ul>


                    <?php endif ?>

                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Custom scrollbar styles */
    ::-webkit-scrollbar {
        width: 15px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background-color: var(--yellow);
        border-radius: 2px;
        border: 3px solid #f1f1f1;
    }
</style>


<script>



    document.addEventListener("DOMContentLoaded", function () {
        let myOrdersLink = document.getElementById("myOrdersLink");

        if (myOrdersLink) {
            myOrdersLink.addEventListener("click", function (event) {
                event.preventDefault();

                <?php if (!$this->session->userdata('user_id')): ?>
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
                <?php endif; ?>
            });
        }
    });
    document.addEventListener("DOMContentLoaded", function () {
        let myparaLink = document.getElementById("myparaLink");

        if (myparaLink) {
            myparaLink.addEventListener("click", function (event) {
                event.preventDefault();
                <?php if (!$this->session->userdata('user_id')): ?>
                    Swal.fire({
                        title: "Login Required",
                        text: "Please login to access this service",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Login",
                        cancelButtonText: "Cancel",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "<?php echo base_url('login'); ?>";
                        }
                    });
                <?php else: ?>
                    window.location.href = "<?php echo base_url('login'); ?>";
                <?php endif; ?>
            });
        }
    });







</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>