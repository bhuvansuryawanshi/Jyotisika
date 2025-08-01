<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Home</title>

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

<style>
    .suggestion {
        padding: 10px;
        cursor: pointer;
    }

    .suggestion:hover {
        background-color: #f1f1f1;
    }
</style>

<body>

    <!-- Navbar -->
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


    <!-- kundli matching -->
    <div class="container rounded p-4 my-4 shadow" style="background-color: #fff7b8; ">
        <h3 class="text-center mb-4"><?php echo $this->lang->line('Kundli_Birth_Chart'); ?></h3>
        <form id="matchForm">
            <div class="row ">

                <div class="col-12 col-md-6">

                    <h5><?php echo $this->lang->line('Boy_Details'); ?></h5>


                    <input type="text" name="boy_name" id="boy_name" placeholder="Name" autocomplete="off"
                        class="form-control shadow-none my-2 p-2 rounded-1" required
                        oninput="(function(element) { element.value = element.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1'); })(this)"
                        pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only">


                    <div class="row">
                        <div class="col-4">
                            <label><?php echo $this->lang->line('Birth_Day'); ?></label>
                            <select id="boy_day" class="form-control my-2 p-2 rounded-1" required></select>
                        </div>
                        <div class="col-6 col-lg-4">
                            <label><?php echo $this->lang->line('Birth_Month'); ?></label>
                            <select id="boy_month" class="form-control my-2 p-2 rounded-1" required></select>
                        </div>
                        <div class="col-6 col-lg-4">
                            <label><?php echo $this->lang->line('Birth_Year'); ?></label>
                            <select id="boy_year" class="form-control my-2 p-2 rounded-1" required></select>
                        </div>
                        <div class="col-6 col-lg-4">
                            <label><?php echo $this->lang->line('Birth_Hour'); ?></label>
                            <select id="boy_hour" class="form-control my-2 p-2 rounded-1" required></select>
                        </div>
                        <div class="col-6 col-lg-4">
                            <label><?php echo $this->lang->line('Birth_Minute'); ?></label>
                            <select id="boy_minute" class="form-control my-2 p-2 rounded-1" required></select>
                        </div>
                        <div class="col-6 col-lg-4">
                            <label><?php echo $this->lang->line('Birth_Second'); ?></label>
                            <select id="boy_second" class="form-control my-2 p-2 rounded-1" required></select>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-12 col-md-4">
                            <input type="number" name="boy_day" id="boy_day" placeholder="Day" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="1" max="31">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="boy_month" id="boy_month" placeholder="Month" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="1" max="12">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="boy_year" id="boy_year" placeholder="Year" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="1900" max="2024">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="boy_hour" id="boy_hour" placeholder="Hour" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="0" max="23">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="boy_minute" id="boy_minute" placeholder="Minute"
                                autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1" required min="0"
                                max="59">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="boy_second" id="boy_second" placeholder="Second"
                                autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1" required min="0"
                                max="59">
                        </div>
                    </div> -->

                    <!-- <input type="text" name="birthPlace" id="birthPlace" placeholder="Birth Place" autocomplete="off"
                        class="form-control shadow-none my-2 p-2 rounded-1" required pattern="^[a-zA-Z\s\-\.',]+$"
                        title="Please enter a valid city name"
                        oninput="this.value = this.value.replace(/[^a-zA-Z\s\-\.',]/g, '')"> -->

                    <label for="boy_birthPlace"><?php echo $this->lang->line('Boy_Birth_Place'); ?></label>
                    <!-- <input type="text" id="boy_birthPlace" class="form-control shadow-none my-2 p-2 rounded-1"
                            placeholder="Birth Place" required
                            oninput="(function(element) { element.value = element.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1'); })(this)"
                            pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only" /> -->

                    <input type="text" id="boy_birthPlace" class="form-control shadow-none my-2 p-2 rounded-1"
                        placeholder="Birth Place" autocomplete="off" required />
                    <input type="hidden" id="boy_lat">
                    <input type="hidden" id="boy_lon">
                    <div id="suggestions" class="border rounded bg-white shadow-sm"
                        style="position: absolute; z-index: 1000;"></div>

                </div>

                <div class="col-12 col-md-6">
                    <h5><?php echo $this->lang->line('Girl_Details'); ?></h5>


                    <input type="text" name="girl_name" id="girl_name" placeholder="Name" autocomplete="off"
                     oninput="(function(element) { element.value = element.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1'); })(this)"
                        pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only"
                        class="form-control shadow-none my-2 p-2 rounded-1">

                    <div class="row">
                        <div class="col-6 col-lg-4">
                            <label><?php echo $this->lang->line('Birth_Day'); ?></label>
                            <select id="girl_day" class="form-control my-2 p-2 rounded-1" required></select>
                        </div>
                        <div class="col-6 col-lg-4">
                            <label><?php echo $this->lang->line('Birth_Month'); ?></label>
                            <select id="girl_month" class="form-control my-2 p-2 rounded-1" required></select>
                        </div>
                        <div class="col-6 col-lg-4">
                            <label><?php echo $this->lang->line('Birth_Year'); ?></label>
                            <select id="girl_year" class="form-control my-2 p-2 rounded-1" required></select>
                        </div>
                        <div class="col-6 col-lg-4">
                            <label><?php echo $this->lang->line('Birth_Hour'); ?></label>
                            <select id="girl_hour" class="form-control my-2 p-2 rounded-1" required></select>
                        </div>
                        <div class="col-6 col-lg-4">
                            <label><?php echo $this->lang->line('Birth_Minute'); ?></label>
                            <select id="girl_minute" class="form-control my-2 p-2 rounded-1" required></select>
                        </div>
                        <div class="col-6 col-lg-4">
                            <label><?php echo $this->lang->line('Birth_Seconds'); ?></label>
                            <select id="girl_second" class="form-control my-2 p-2 rounded-1" required></select>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-12 col-md-4">
                            <input type="number" name="girl_day" id="girl_day" placeholder="Day" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="1" max="31">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="girl_month" id="girl_month" placeholder="Month"
                                autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1" required min="1"
                                max="12">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="girl_year" id="girl_year" placeholder="Year" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="1900" max="2024">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="girl_hour" id="girl_hour" placeholder="Hour" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="0" max="23">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="girl_minute" id="girl_minute" placeholder="Minute"
                                autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1" required min="0"
                                max="59">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="girl_second" id="girl_second" placeholder="Second"
                                autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1" required min="0"
                                max="59">
                        </div>
                    </div> -->

                    <!-- <input type="text" name="birthPlace" id="birthPlace" placeholder="Birth Place" autocomplete="off"
                        class="form-control shadow-none my-2 p-2 rounded-1" required pattern="^[a-zA-Z\s\-\.',]+$"
                        title="Please enter a valid city name"
                        oninput="this.value = this.value.replace(/[^a-zA-Z\s\-\.',]/g, '')"> -->


                   
                        <label for="girl_birthPlace"><?php echo $this->lang->line('Girl_Birth_Place'); ?></label>
                    <!-- <input type="text" id="girl_birthPlace" class="form-control shadow-none my-2 p-2 rounded-1"
                            placeholder="Birth Place" required
                            oninput="(function(element) { element.value = element.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1'); })(this)"
                            pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only" /> -->

                    <input type="text" id="girl_birthPlace" class="form-control shadow-none my-2 p-2 rounded-1"
                        placeholder="Birth Place" autocomplete="off" required />
                    <input type="hidden" id="girl_lat">
                    <input type="hidden" id="girl_lon">
                    <div id="suggestionsgirl" class="border rounded bg-white shadow-sm"
                        style="position: absolute; z-index: 1000;"></div>

                </div>

                <div class="col-12 col-md-6 my-2">
                    <label for="language">Select Language</label>
                    <select id="language" class="form-control shadow-none my-2 p-2 rounded-1" required>
                        <option value="" disabled selected>Select Language</option>
                        <option value="en">English</option>
                        <option value="hi">Hindi</option>
                        <option value="bn">Bengali</option>
                        <option value="ma">Marathi</option>
                        <option value="tm">Tamil</option>
                        <option value="tl">Telugu</option>
                        <option value="ml">Malayalam</option>
                        <option value="kn">Kannada</option>
                    </select>
                </div>

                <div class="col-12 col-md-6 my-2">
                    <label for="astro_feature">Select Feature</label>
                    <select id="astro_feature" class="form-control shadow-none  my-2 p-2 rounded-1">
                        <option value="horoscope">Horoscope</option>
                        <option value="ashtakoot">Ashtakoot</option>
                        <option value="dashakoot">Dashakoot</option>
                        <option value="manglik">Manglik</option>
                    </select>
                </div>

                <div class="col-12 d-flex gap-2 justify-content-center mt-3">
                    <button type="submit" class="btn" style="background-color: var(--yellow); color: black;">
                        <?php echo $this->lang->line('Submit'); ?>
                    </button>
                    <!-- <button type="button" class="btn" style="background-color: var(--yellow); color: black;">
                        Reset
                    </button> -->

                    <button type="button" class="btn" style="background-color: var(--yellow); color: black;"
                        onclick="document.getElementById('matchForm').reset(); document.getElementById('chartResult').innerHTML = '';">
                        <?php echo $this->lang->line('Reset'); ?>
                    </button>


                </div>
            </div>
        </form>
    </div>

    <div class="container my-4" id="chartResult"></div>



    <!-- Horoscope Matching | Kundali Matching | Kundli Match for Marriage -->
    <div class="container my-4">
        <div class="row">
            <h4 class="text-center my-4" style="color: var(--red); "><?php echo $this->lang->line('Horoscope_Matching_Title'); ?></h4>
            <p style="text-align: justify;"><?php echo $this->lang->line('Horoscope_Matching_Info'); ?></p>
        </div>
    </div>

    <!-- Guna Milan -->
    <div class="container">
        <div class="row">
            <h4 class="text-center my-4" style="color: var(--red); "><?php echo $this->lang->line('Guna_Milan'); ?></h4>
            <p><?php echo $this->lang->line('Ashta_Koot_Intro'); ?></p>
            <ul>
                <li><?php echo $this->lang->line('Koot_Varna'); ?></li>
                <li><?php echo $this->lang->line('Koot_Vashya'); ?></li>
                <li><?php echo $this->lang->line('Koot_Tara'); ?></li>
                <li><?php echo $this->lang->line('Koot_Yoni'); ?></li>
            </ul>
        </div>
        <div class="row">
            <p><?php echo $this->lang->line('Guna_Explanation'); ?></p>
            <ul>
                <li><?php echo $this->lang->line('Koot_Nadi'); ?></li>
                <li><?php echo $this->lang->line('Koot_Bhakoot'); ?></li>
                <li><?php echo $this->lang->line('Koot_Gana'); ?></li>
                <li><?php echo $this->lang->line('Koot_Maitri'); ?></li>
                <li><?php echo $this->lang->line('Koot_Yoni'); ?></li>
                <li><?php echo $this->lang->line('Koot_Tara'); ?></li>
                <li><?php echo $this->lang->line('Koot_Vasya'); ?></li>
                <li><?php echo $this->lang->line('Koot_Varna'); ?></li>
            </ul>

        </div>
    </div>

    <!-- Importance Of Guna Milan< -->
    <div class="container mb-4">
        <div class="row">
            <h4 class="text-center my-4" style="color: var(--red); "><?php echo $this->lang->line('Guna_Importance_Title'); ?></h4>
            <p><?php echo $this->lang->line('Guna_Importance_Desc'); ?></p>
            <ul>
                <li><?php echo $this->lang->line('Guna_18_25'); ?></li>
                <li><?php echo $this->lang->line('Guna_26_32'); ?></li>
                <li><?php echo $this->lang->line('Guna_32_plus'); ?></li>
            </ul>
        </div>
    </div>

    <script>
        function populateSelect(id, start, end, pad = false) {
            const select = document.getElementById(id);
            select.innerHTML = '<option value="">Select</option>';
            for (let i = start; i <= end; i++) {
                const val = pad ? String(i).padStart(2, '0') : i;
                select.innerHTML += `<option value="${val}">${val}</option>`;
            }
        }

        function populateMonth(id) {
            const months = ['January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
            const select = document.getElementById(id);
            select.innerHTML = '<option value="">Select</option>';
            months.forEach((month, i) => {
                select.innerHTML += `<option value="${i + 1}">${month}</option>`;
            });
        }

        // Populate all dropdowns on load
        document.addEventListener("DOMContentLoaded", function() {
            ['boy_day', 'girl_day'].forEach(id => populateSelect(id, 1, 31, true));
            ['boy_month', 'girl_month'].forEach(id => populateMonth(id));
            ['boy_year', 'girl_year'].forEach(id => populateSelect(id, 1980, new Date().getFullYear()));
            ['boy_hour', 'girl_hour'].forEach(id => populateSelect(id, 0, 23, true));
            ['boy_minute', 'girl_minute', 'boy_second', 'girl_second'].forEach(id => populateSelect(id, 0, 59, true));
        });

        // Form validation
        document.getElementById("matchForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const requiredFields = [
                'boy_name', 'boy_day', 'boy_month', 'boy_year', 'boy_hour', 'boy_minute', 'boy_second', 'boy_birthPlace',
                'girl_name', 'girl_day', 'girl_month', 'girl_year', 'girl_hour', 'girl_minute', 'girl_second', 'girl_birthPlace',
                'language'
            ];

            const isValid = requiredFields.every(id => document.getElementById(id)?.value?.trim() !== "");

            if (!isValid) {
                Swal.fire({
                    icon: 'error',
                    title: 'Missing Information',
                    text: 'Please fill all required fields.',
                    confirmButtonColor: '#3085d6',
                });
                return;
            }

            Swal.fire({
                icon: 'success',
                title: 'All Set!',
                text: 'All fields are properly filled.',
                confirmButtonColor: '#3085d6',
            });
        });
    </script>
    <script>
        const input = document.getElementById("boy_birthPlace");
        const suggestionBox = document.getElementById("suggestions");
        let debounceTimer = null;

        input.addEventListener("input", function() {
            const query = input.value.trim();
            if (debounceTimer) clearTimeout(debounceTimer);
            if (query.length < 2) {
                suggestionBox.innerHTML = '';
                return;
            }

            debounceTimer = setTimeout(() => {
                fetch(`<?= base_url('User_Api_Controller/search_city?q=') ?>${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        suggestionBox.innerHTML = "";

                        if (data.length === 0) {
                            suggestionBox.innerHTML = '<div class="suggestion">No results found</div>';
                            return;
                        }

                        data.forEach(item => {
                            const div = document.createElement('div');
                            div.className = 'suggestion';
                            div.textContent = item.display_name;
                            div.addEventListener('click', () => {
                                input.value = item.display_name;
                                document.getElementById("boy_lat").value = item.lat;
                                document.getElementById("boy_lon").value = item.lon;
                                suggestionBox.innerHTML = '';
                            });
                            suggestionBox.appendChild(div);
                        });
                    })
                    .catch(err => {
                        suggestionBox.innerHTML = '<div class="suggestion">Error fetching results</div>';
                        console.error(err);
                    });
            }, 300);
        });

        // Hide suggestions when clicking outside
        document.addEventListener("click", function(e) {
            if (!suggestionBox.contains(e.target) && e.target !== input) {
                suggestionBox.innerHTML = "";
            }
        });
    </script>


    <script>
        const inputgirl = document.getElementById("girl_birthPlace");
        const suggestionBoxgirl = document.getElementById("suggestionsgirl");
        let debounceTimergirl = null;

        inputgirl.addEventListener("input", function() {
            const querygirl = inputgirl.value.trim();
            if (debounceTimergirl) clearTimeout(debounceTimergirl);
            if (querygirl.length < 2) {
                suggestionBoxgirl.innerHTML = '';
                return;
            }

            debounceTimergirl = setTimeout(() => {
                fetch(`<?= base_url('User_Api_Controller/search_city?q=') ?>${encodeURIComponent(querygirl)}`)
                    .then(res => res.json())
                    .then(data => {
                        suggestionBoxgirl.innerHTML = "";

                        if (data.length === 0) {
                            suggestionBoxgirl.innerHTML = '<div class="suggestion">No results found</div>';
                            return;
                        }

                        data.forEach(item => {
                            const div = document.createElement('div');
                            div.className = 'suggestion';
                            div.textContent = item.display_name;
                            div.addEventListener('click', () => {
                                inputgirl.value = item.display_name;
                                document.getElementById("girl_lat").value = item.lat;
                                document.getElementById("girl_lon").value = item.lon;
                                suggestionBoxgirl.innerHTML = '';
                            });
                            suggestionBoxgirl.appendChild(div);
                        });
                    })
                    .catch(err => {
                        suggestionBoxgirl.innerHTML = '<div class="suggestion">Error fetching results</div>';
                        console.error(err);
                    });
            }, 300);
        });

        // Hide suggestions when clicking outside
        document.addEventListener("click", function(e) {
            if (!suggestionBoxgirl.contains(e.target) && e.target !== input) {
                suggestionBoxgirl.innerHTML = "";
            }
        });
    </script>



    <script>
        document.getElementById("matchForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const formData = {
                boy_name: document.getElementById("boy_name").value,
                boy_day: document.getElementById("boy_day").value,
                boy_month: document.getElementById("boy_month").value,
                boy_year: document.getElementById("boy_year").value,
                boy_hour: document.getElementById("boy_hour").value,
                boy_minute: document.getElementById("boy_minute").value,
                boy_second: document.getElementById("boy_second").value,
                boy_birthPlace: document.getElementById("boy_birthPlace").value || "New Delhi",
                boy_lat: document.getElementById('boy_lat').value || "28.7041",
                boy_lon: document.getElementById('boy_lon').value || "77.1025",

                girl_name: document.getElementById("girl_name")?.value || "",
                girl_day: document.getElementById("girl_day")?.value || "",
                girl_month: document.getElementById("girl_month")?.value || "",
                girl_year: document.getElementById("girl_year")?.value || "",
                girl_hour: document.getElementById("girl_hour")?.value || "",
                girl_minute: document.getElementById("girl_minute")?.value || "",
                girl_second: document.getElementById("girl_second")?.value || "",
                girl_birthPlace: document.getElementById("girl_birthPlace")?.value || "New Delhi",
                girl_lat: document.getElementById('girl_lat')?.value || "28.7041",
                girl_lon: document.getElementById('girl_lon')?.value || "77.1025",
                lan: document.getElementById('language').value || "en",
            };

            const selectedFeature = document.getElementById('astro_feature').value;
            let apiUrl = "";

            switch (selectedFeature) {
                case "manglik":
                    apiUrl = "<?= base_url('User_Api_Controller/ManglikDoshakudalimatch'); ?>";
                    break;
                case "dashakoot":
                    apiUrl = "<?= base_url('User_Api_Controller/Dashakoot'); ?>";
                    break;
                case "ashtakoot":
                    apiUrl = "<?= base_url('User_Api_Controller/ashtakoot'); ?>";
                    break;
                case "horoscope":
                default:
                    apiUrl = "<?= base_url('User_Api_Controller/match_kundli'); ?>";
                    break;
            }

            fetch(apiUrl, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(formData)
                })
                .then(res => {
                    if (selectedFeature === 'horoscope') {
                        return res.text(); // For horoscope, get raw HTML/text
                    } else {
                        return res.json(); // For all other APIs
                    }
                })
                .then(data => {
                    if (selectedFeature === 'horoscope') {
                        document.getElementById("chartResult").innerHTML = data;
                    } else if (selectedFeature === 'ashtakoot') {

                        console.log(data);
                        const ak = data.data.data.ashtakoot_milan;
                        const result = data.data.data.ashtakoot_milan_result;

                        let html = `<div class="alert alert-success">Ashtakoot Milan (Compatibility Matching) Loaded</div>`;
                        html += `<div class="bg-light p-3 rounded">`;

                        for (const key in ak) {
                            const section = ak[key];
                            html += `
            <div class="border-bottom pb-2 mb-3">
                <h6 class="text-success text-capitalize">${key.replace(/_/g, ' ')}</h6>
                <p><strong>Person 1:</strong> ${section.p1}</p>
                <p><strong>Person 2:</strong> ${section.p2}</p>
                <p><strong>Points Obtained:</strong> ${section.points_obtained} / ${section.max_ponits}</p>
                <p><strong>Area of Life:</strong> ${section.area_of_life}</p>
                <p><strong>Description:</strong> ${section.description}</p>
            </div>
        `;
                        }

                        html += `</div>`;

                        // Show result summary
                        if (result) {
                            html += `
            <div class="mt-3 p-3 border rounded bg-white">
                <h5 class="text-primary">Total Score: ${result.points_obtained} / ${result.max_ponits}</h5>
                <p><strong>Compatible:</strong> ${result.is_compatible === "true" ? "Yes" : "No"}</p>
                <p>${result.content}</p>
            </div>
        `;
                        }

                        document.getElementById("chartResult").innerHTML = html;
                    } else if (selectedFeature === 'dashakoot') {
                        const dk = data.data.data.dashakoot_milan;
                        const result = data.data.data.dashakoot_milan_result;

                        let html = `<div class="alert alert-success">Dashakoot Milan Data Loaded</div>`;
                        html += `<div class="bg-light p-3 rounded">`;

                        for (const key in dk) {
                            const section = dk[key];
                            html += `
            <div class="border-bottom pb-2 mb-3">
                <h6 class="text-success text-capitalize">${key.replace(/_/g, ' ')}</h6>
                <p><strong>Person 1:</strong> ${section.p1}</p>
                <p><strong>Person 2:</strong> ${section.p2}</p>
                <p><strong>Result:</strong> ${section.result}</p>
                <p><strong>Points Obtained:</strong> ${section.points_obtained} / ${section.max_ponits}</p>
                <p><strong>Area of Life:</strong> ${section.area_of_life || 'N/A'}</p>
            </div>
        `;
                        }

                        html += `</div>`;

                        // Show result summary
                        if (result) {
                            html += `
            <div class="mt-3 p-3 border rounded bg-white">
                <h5 class="text-primary">Total Score: ${result.points_obtained} / ${result.max_ponits}</h5>
                <p><strong>Compatible:</strong> ${result.is_compatible === "true" ? "Yes" : "No"}</p>
                <p>${result.content}</p>
            </div>
        `;
                        }

                        document.getElementById("chartResult").innerHTML = html;
                    } else if (selectedFeature === 'manglik') {
                        const manglikData = data.data.data;

                        const p1 = manglikData.p1;
                        const p2 = manglikData.p2;
                        const content = manglikData.content || '';

                        const html = `
        <div class="alert alert-success">Manglik Dosha Analysis Loaded</div>
        <div class="bg-light p-3 rounded">
            <h5 class="text-primary">Partner 1</h5>
            <p><strong>Manglik:</strong> ${p1.manglik_dosha || 'N/A'}</p>
            <p><strong>Strength:</strong> ${p1.strength || 'N/A'}</p>
            <p><strong>Percentage:</strong> ${p1.percentage || 0}%</p>
            ${p1.remedies?.length ? `<p><strong>Remedies:</strong><ul>${p1.remedies.map(r => `<li>${r}</li>`).join('')}</ul></p>` : ''}

            <hr>

            <h5 class="text-primary">Partner 2</h5>
            <p><strong>Manglik:</strong> ${p2.manglik_dosha || 'N/A'}</p>
            <p><strong>Strength:</strong> ${p2.strength || 'N/A'}</p>
            <p><strong>Percentage:</strong> ${p2.percentage || 0}%</p>
            ${p2.remedies?.length ? `<p><strong>Remedies:</strong><ul>${p2.remedies.map(r => `<li>${r}</li>`).join('')}</ul></p>` : ''}

            <hr>

            <p class="mt-3"><strong>Conclusion:</strong> ${content}</p>
        </div>
    `;

                        document.getElementById("chartResult").innerHTML = html;
                    } else {
                        document.getElementById("chartResult").innerHTML = `
                        <div class="alert alert-success">Data Loaded Successfully</div>
                        <pre class="bg-light p-2 rounded">${data}</pre>
                    `;
                    }
                })
                .catch(err => {
                    console.error(err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong!',
                        confirmButtonColor: '#d33',
                    });
                });
        });
    </script>








    <!-- footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>


</body>

</html>