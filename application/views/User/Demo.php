<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Home</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">




</head>

<body>


    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>
    <!-- kundli matching -->
    <div class="container p-3 my-4 rounded-3" style="background-color: #fff7b8;  ">
        <h3 class="text-center mb-4">Kundli/Birth Chart</h3>
        <form action="">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h5>Boy's Details</h5>


                    <input type="text" name="name" id="name" placeholder="Name" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">


                    <div class="row">
                        <div class="col-12 col-md-4">
                            <input type="number" name="day" id="day" placeholder="Day" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="month" id="month" placeholder="Month" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="year" id="year" placeholder="Year" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="hour" id="hour" placeholder="Hour" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="minute" id="minute" placeholder="Minute" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="second" id="second" placeholder="Second" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                    </div>

                    <input type="text" name="birthPlace" id="birthPlace" placeholder="Birth Place" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                </div>
                <div class="col-12 col-md-6">
                    <h5>Girl's Details</h5>


                    <input type="text" name="name" id="name" placeholder="Name" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">



                    <div class="row">
                        <div class="col-12 col-md-4">
                            <input type="number" name="day" id="day" placeholder="Day" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="month" id="month" placeholder="Month" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="year" id="year" placeholder="Year" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="hour" id="hour" placeholder="Hour" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="minute" id="minute" placeholder="Minute" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="second" id="second" placeholder="Second" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                    </div>

                    <input type="text" name="birthPlace" id="birthPlace" placeholder="Birth Place" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">

                   
                </div>

            </div>
        </form>
    </div>


    <!-- Horoscope Matching | Kundali Matching | Kundli Match for Marriage -->
   

    </ul>
    </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

   


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzDO9Jq/Uy1p1Lw2jG/q04FH04EZoQUlBgDkfiC9UvN0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyl2nq2K9KVDL9VkUsRxKSh3zO7lHcKrCdP4I3ZeGIDc9HrT2yztVR" crossorigin="anonymous"></script>

</body>

</html>