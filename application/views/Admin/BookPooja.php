<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:Book Puja</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets\css\style.css' ?>">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* Apply Inter font to the entire page */
        * {
            font-family: 'Inter', sans-serif !important;
        }

        /* Customize headers and table fonts for better readability */
        h1,
        h4 {
            font-weight: 700;
        }

        p,
        td,
        th {
            font-weight: 400;
            font-size: 1rem;
        }

        /* Enhance table header appearance */
        .table thead th {
            font-weight: 600;
            background-color: #f8f9fa;
        }

        /* Adjust buttons for better aesthetics */
        .btn {
            font-weight: 500;
            font-size: 0.9rem;
        }

        /* Mobile Responsiveness Improvements */
        @media (max-width: 768px) {
            .main {
                margin-top: 0 !important;
            }

            .card-dashboard {
                margin-bottom: 1rem;
            }

            .table-responsive {
                font-size: 0.8rem;
            }

            .table td,
            .table th {
                padding: 0.5rem;
            }

            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

            /* Responsive table */
            .table-responsive-stack tr {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                margin-bottom: 1rem;
                border-bottom: 1px solid #eee;
            }

            .table-responsive-stack td {
                display: block;
                text-align: right;
            }

            .table-responsive-stack td:before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
            }
        }

        /* Mobile-friendly See All button */
        @media (max-width: 768px) {
            .card-footer .btn {
                margin-top: 10px;
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }

        @media (min-width: 769px) {
            .card-footer .btn {
                max-width: 250px;
            }
        }

        .fixed-right-btn {
            position: fixed;
            right: 20px;
            z-index: 1;
        }

        @media (max-width: 768px) {
            .fixed-right-btn {
                width: 100%;
                position: initial;
            }
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table-responsive::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 4px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background-color: #999;
        }

        .fixed-right-btn {
            position: relative;
            /* Keeps button aligned */
        }

        @media (max-width: 768px) {
            .fixed-right-btn {
                position: relative;
                margin-left: 40px;
            }

            h3.text-center {
                font-size: 1.5rem;
            }
        }

    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>
        <!-- SIDEBAR END -->


        <!-- Main Component -->
        <div class="main ">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>
            <!-- Navbar End -->

            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <h3 class="text-center">Pooja List</h3>
                        <div class="d-flex justify-content-end mb-5">
                            <button class="btn btn-primary fixed-right-btn" style="background-color: #0c768a; color: white;" data-bs-toggle="modal" data-bs-target="#addModal">Add Pooja</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Pooja Mode</th>
                                        <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody id="festival-table-body">
                                    <!-- Dynamic Rows Here -->
                                </tbody>
                            </table>
                        </div>
                        <nav>
                            <ul class="pagination justify-content-center" id="pagination">
                                <!-- Dynamic Pagination Here -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <script>
                // Sample data
     // Sample data
     const festivals = [{
                        id: 1,
                        title: "Ganesh Pooja",
                        description: "The pooja of the remover of obstacles",
                        mode: "Online",
                        image: "https://picsum.photos/40",
                    },
                    {
                        id: 2,
                        title: "Satyanarayan Pooja",
                        description: "The pooja of the one with true knowledge",
                        mode: "Offline",
                        image: "https://picsum.photos/41",
                    },
                    {
                        id: 3,
                        title: "Lakshmi Pooja",
                        description: "The pooja of the goddess of wealth",
                        mode: "Mobile",
                        image: "https://picsum.photos/42",
                    },
                    {
                        id: 4,
                        title: "Durga Pooja",
                        description: "The pooja of the goddess of strength",
                        mode: "Online",
                        image: "https://picsum.photos/43",
                    },
                    {
                        id: 5,
                        title: "Hanuman Pooja",
                        description: "The pooja of the monkey god",
                        mode: "Offline",
                        image: "https://picsum.photos/44",
                    },
                    {
                        id: 6,
                        title: "Krishna Pooja",
                        description: "The pooja of the divine prince",
                        mode: "Mobile",
                        image: "https://picsum.photos/45",
                    },
                    {
                        id: 7,
                        title: "Shiva Pooja",
                        description: "The pooja of the destroyer",
                        mode: "Online",
                        image: "https://picsum.photos/46",
                    },
                    {
                        id: 8,
                        title: "Saraswati Pooja",
                        description: "The pooja of the goddess of knowledge",
                        mode: "Offline",
                        image: "https://picsum.photos/47",
                    }
                ];

                const recordsPerPage = 5;
                let currentPage = 1;

                // Utility function to truncate text
                function truncateText(text, maxLength) {
                    return text.length > maxLength ? text.substring(0, maxLength) + "..." : text;
                }

                function renderTable(page) {
                    const startIndex = (page - 1) * recordsPerPage;
                    const endIndex = startIndex + recordsPerPage;
                    const visibleFestivals = festivals.slice(startIndex, endIndex);

                    const tableBody = document.getElementById("festival-table-body");
                    tableBody.innerHTML = "";

                    visibleFestivals.forEach((festival, index) => {
                        tableBody.innerHTML += `
                    <tr>
                        <th scope="row">${startIndex + index + 1}</th>
                        <td>${festival.title}</td>
                        <td>${truncateText(festival.description, 50)}</td>
                        <td><img src="${festival.image}" class="img-fluid rounded" alt="${festival.title}"></td>
                        <td>${festival.mode}</td>
                        <td class="text-center d-flex justify-content-center">
                            <a href="#" class="text-primary me-2" data-bs-toggle="modal" data-bs-target="#editModal">
                                <i class="bi bi-pencil-square fs-5"></i>
                            </a>
                            <a href="#" class="text-danger ms-2">
                                <i class="bi bi-trash fs-5"></i>
                            </a>
                        </td>
                    </tr>

                `;
                    });
                }

                function renderPagination() {
                    const totalPages = Math.ceil(festivals.length / recordsPerPage);
                    const pagination = document.getElementById("pagination");
                    pagination.innerHTML = "";

                    for (let i = 1; i <= totalPages; i++) {
                        pagination.innerHTML += `
                    <li class="page-item ${i === currentPage ? "active" : ""}">
                        <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
                    </li>
                `;
                    }
                }

                function changePage(page) {
                    currentPage = page;
                    renderTable(page);
                    renderPagination();
                }

                // Initial render
                renderTable(currentPage);
                renderPagination();
            </script>



            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Pooja</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" required maxlength="50"
                                        oninput="(function(element) { element.value = element.value.replace(/^[ ]/g, '').replace(/[^a-zA-Z0-9\s]/g, '').replace(/(\..*)\./g, '$1'); })(this)"
                                        pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only">
                                    <div class="invalid-feedback">Please enter a valid title without spaces and special characters.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" aria-describedby="description" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="puja-mode" class="form-label">Puja Mode</label>
                                    <select class="form-select" id="puja-mode" aria-describedby="puja-mode" required>
                                        <option value="" disabled selected>Select Puja Mode</option>
                                        <option value="Online">Online</option>
                                        <option value="Offline">Offline</option>
                                        <option value="Mob">Mob</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a valid puja mode.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Upload Image</label>
                                    <input type="file" class="form-control" id="image" aria-describedby="image" accept="image/*" required>
                                    <div class="invalid-feedback">Please select a valid image file.</div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="background-color: #0c768a; color: white;">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Add Pooja</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form onsubmit="document.getElementById('addModal').dispatchEvent(new Event('close.bs.modal'));">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" required maxlength="50"
                                        oninput="(function(element) { element.value = element.value.replace(/^[ ]/g, '').replace(/[^a-zA-Z0-9\s]/g, '').replace(/(\..*)\./g, '$1'); })(this)"
                                        pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only">
                                    <div class="invalid-feedback">Please enter a valid title without spaces and special characters.</div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" aria-describedby="description" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="puja-mode" class="form-label">Puja Mode</label>
                                    <select class="form-select" id="puja-mode" aria-describedby="puja-mode" required>
                                        <option value="" disabled selected>Select Puja Mode</option>
                                        <option value="Online">Online</option>
                                        <option value="Offline">Offline</option>
                                        <option value="Mob">Mob</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a valid puja mode.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Upload Image</label>
                                    <input type="file" class="form-control" id="image" aria-describedby="image" accept="image/*" required>
                                    <div class="invalid-feedback">Please select a valid image file.</div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="background-color: #0c768a; color: white;">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>


    <!-- Script Toggle Sidebar -->
    <script>
        const toggler = document.querySelector(".toggler-btn");
        const closeBtn = document.querySelector(".close-sidebar");
        const sidebar = document.querySelector("#sidebar");

        toggler.addEventListener("click", function() {
            sidebar.classList.toggle("collapsed");
        });

        closeBtn.addEventListener("click", function() {
            sidebar.classList.remove("collapsed");
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>