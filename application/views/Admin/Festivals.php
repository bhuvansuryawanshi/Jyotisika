<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Festivals</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets\css\style.css' ?>">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

        .page-item.active .page-link {
            background-color: #0c768a !important;
            border-color: #0c768a !important;
            color: white !important;
        }

        .page-link {
            color: #0c768a !important;
        }

        .page-link:hover {
            background-color: #0c768a !important;
            color: white !important;
        }

        /* Modal styling */
        .modal-content {
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            border-bottom: 1px solid #dee2e6;
        }

        .modal-footer {
            border-top: 1px solid #dee2e6;
        }

        /* Image preview styling */
        .image-preview {
            width: 100%;
            height: 200px;
            background-color: #f8f9fa;
            border: 1px dashed #ced4da;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>
        <!-- SIDEBAR END -->

        <!-- Main Component -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>
            <!-- Navbar End -->

            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <h3 class="text-center">Festival List</h3>
                        <div class="d-flex justify-content-end mb-5">
                            <button class="btn fixed-right-btn" style="background-color: #0c768a; color: white;" data-bs-toggle="modal" data-bs-target="#addModal">Add Festival</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
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
                const festivals = [{
                        id: 1,
                        title: "Diwali",
                        description: "The festival of lights",
                        image: "https://picsum.photos/32"
                    },
                    {
                        id: 2,
                        title: "Holi",
                        description: "The festival of colors sdasdasdas dasdasdasd asdsad asds dsa dsa das",
                        image: "https://picsum.photos/33"
                    },
                    {
                        id: 3,
                        title: "Navratri",
                        description: "The festival of nine nights",
                        image: "https://picsum.photos/34"
                    },
                    {
                        id: 4,
                        title: "Eid",
                        description: "The festival of breaking the fast",
                        image: "https://picsum.photos/35"
                    },
                    {
                        id: 5,
                        title: "Christmas",
                        description: "The festival of joy and giving",
                        image: "https://picsum.photos/36"
                    },
                    {
                        id: 6,
                        title: "New Year",
                        description: "The celebration of the new year",
                        image: "https://picsum.photos/37"
                    },
                    {
                        id: 7,
                        title: "Pongal",
                        description: "The harvest festival",
                        image: "https://picsum.photos/38"
                    },
                    {
                        id: 8,
                        title: "Onam",
                        description: "The festival of Kerala",
                        image: "https://picsum.photos/39"
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
                            <td class="text-center d-flex justify-content-center">
                                <a href="#" class="text-primary me-2" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editFestival(${festival.id})">
                                    <i class="bi bi-pencil-square fs-5"></i>
                                </a>
                                <a href="#" class="text-danger ms-2" onclick="deleteFestival(${festival.id})">
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

                // Edit Festival
                function editFestival(id) {
                    const festival = festivals.find(f => f.id === id);
                    if (festival) {
                        document.getElementById("editTitle").value = festival.title;
                        document.getElementById("editDescription").value = festival.description;
                        document.getElementById("editImagePreview").innerHTML = `<img src="${festival.image}" class="img-fluid" alt="${festival.title}">`;
                        document.getElementById("editFestivalId").value = id;
                    }
                }

                // Delete Festival
                function deleteFestival(id) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            festivals.splice(festivals.findIndex(f => f.id === id), 1);
                            renderTable(currentPage);
                            renderPagination();
                            Swal.fire(
                                'Deleted!',
                                'Your festival has been deleted.',
                                'success'
                            );
                        }
                    });
                }

                // Add Festival
                document.getElementById("addFestivalForm").addEventListener("submit", function(event) {
                    event.preventDefault();
                    const title = document.getElementById("addTitle").value;
                    const description = document.getElementById("addDescription").value;
                    const image = document.getElementById("addImage").files[0];

                    if (title && description && image) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const newFestival = {
                                id: festivals.length + 1,
                                title: title,
                                description: description,
                                image: e.target.result
                            };
                            festivals.push(newFestival);
                            renderTable(currentPage);
                            renderPagination();
                            Swal.fire(
                                'Added!',
                                'Your festival has been added.',
                                'success'
                            );
                            document.getElementById("addFestivalForm").reset();
                            document.getElementById("addImagePreview").innerHTML = "";
                        };
                        reader.readAsDataURL(image);
                    }
                });

                // Edit Festival Form Submission
                document.getElementById("editFestivalForm").addEventListener("submit", function(event) {
                    event.preventDefault();
                    const id = parseInt(document.getElementById("editFestivalId").value);
                    const title = document.getElementById("editTitle").value;
                    const description = document.getElementById("editDescription").value;
                    const image = document.getElementById("editImage").files[0];

                    const festivalIndex = festivals.findIndex(f => f.id === id);
                    if (festivalIndex !== -1) {
                        if (image) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                festivals[festivalIndex] = {
                                    id: id,
                                    title: title,
                                    description: description,
                                    image: e.target.result
                                };
                                renderTable(currentPage);
                                renderPagination();
                                Swal.fire(
                                    'Updated!',
                                    'Your festival has been updated.',
                                    'success'
                                );
                            };
                            reader.readAsDataURL(image);
                        } else {
                            festivals[festivalIndex] = {
                                id: id,
                                title: title,
                                description: description,
                                image: festivals[festivalIndex].image
                            };
                            renderTable(currentPage);
                            renderPagination();
                            Swal.fire(
                                'Updated!',
                                'Your festival has been updated.',
                                'success'
                            );
                        }
                    }
                });

                // Image Preview for Add Modal
                document.getElementById("addImage").addEventListener("change", function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById("addImagePreview").innerHTML = `<img src="${e.target.result}" class="img-fluid" alt="Preview">`;
                        };
                        reader.readAsDataURL(file);
                    }
                });

                // Image Preview for Edit Modal
                document.getElementById("editImage").addEventListener("change", function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById("editImagePreview").innerHTML = `<img src="${e.target.result}" class="img-fluid" alt="Preview">`;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            </script>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Festival</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editFestivalForm">
                                <input type="hidden" id="editFestivalId">
                                <div class="mb-3">
                                    <label for="editTitle" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="editTitle" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="editDescription" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="editImage" class="form-label">Upload Image</label>
                                    <input type="file" class="form-control" id="editImage" accept="image/*">
                                    <div class="image-preview" id="editImagePreview"></div>
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
                            <h5 class="modal-title" id="addModalLabel">Add Festival</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addFestivalForm">
                                <div class="mb-3">
                                    <label for="addTitle" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="addTitle" required>
                                </div>
                                <div class="mb-3">
                                    <label for="addDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="addDescription" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="addImage" class="form-label">Upload Image</label>
                                    <input type="file" class="form-control" id="addImage" accept="image/*" required>
                                    <div class="image-preview" id="addImagePreview"></div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="background-color: #0c768a; color: white;">Add</button>
                            </form>
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
</body>

</html>
