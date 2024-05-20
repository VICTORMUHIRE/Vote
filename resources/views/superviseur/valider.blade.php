<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-control:focus {
        outline: none;
        box-shadow: none;
        }

    </style>


    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- ---- datatable--- --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <link rel="stylesheet" href="{{asset('style.css')}}">
    <title>@yield('title') | Administration</title>
</head>
<body class="body">
    <div class="header">
        <div class="logo d-flex align-items-center justify-center">
            <div class="logoImg">
                <img src="/static/logo.png" alt="">
            </div>
            <p>Admin</p>
        </div>
        <div class="adminInfo">
            <div class="notifification">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="path" d="M12 6.44V9.77" stroke="#757575" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                    <path class="path" d="M12.0199 2C8.3399 2 5.3599 4.98 5.3599 8.66V10.76C5.3599 11.44 5.0799 12.46 4.7299 13.04L3.4599 15.16C2.6799 16.47 3.2199 17.93 4.6599 18.41C9.4399 20 14.6099 20 19.3899 18.41C20.7399 17.96 21.3199 16.38 20.5899 15.16L19.3199 13.04C18.9699 12.46 18.6899 11.43 18.6899 10.76V8.66C18.6799 5 15.6799 2 12.0199 2Z" stroke="#757575" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                    <path class="path" d="M15.3299 18.82C15.3299 20.65 13.8299 22.15 11.9999 22.15C11.0899 22.15 10.2499 21.77 9.64992 21.17C9.04992 20.57 8.66992 19.73 8.66992 18.82" stroke="#757575" stroke-width="1.5" stroke-miterlimit="10"/>
                </svg>
            </div>

            <div class="adminName"><span>John</span></div>
            <div class="adminImage">
                <img src="/static/admin.png" alt="">
            </div>
            <div class="drop">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="path" d="M19.9201 8.95001L13.4001 15.47C12.6301 16.24 11.3701 16.24 10.6001 15.47L4.08008 8.95001" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="bodyContainer">
        @include('shared.menus')

        <div class="container1">
            <div class="containter-child">
                @if (session('success'))
                    <div class="alert alert-success text-success">
                        {{session('success')}}
                    </div>
                @endif

                <div class="filter d-flex form-group">
                    <div class="d-flex">
                        <select id="roleFilter" class="form-control">
                            <option value="etudiant">Électeur</option>
                            <option value="candidat">Candidat</option>
                        </select>
                        <div class="filter-icon role-icon" style="background-color: #0066FF">
                            <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.98927 16.0088C14.6005 16.0088 18.5418 16.7075 18.5418 19.4988C18.5418 22.29 14.6268 23.0088 9.98927 23.0088C5.37677 23.0088 1.43677 22.3163 1.43677 19.5238C1.43677 16.7313 5.35052 16.0088 9.98927 16.0088Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.98934 12.025C6.96184 12.025 4.50684 9.57125 4.50684 6.54375C4.50684 3.51625 6.96184 1.0625 9.98934 1.0625C13.0156 1.0625 15.4706 3.51625 15.4706 6.54375C15.4818 9.56 13.0443 12.0138 10.0281 12.025H9.98934Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18.6038 10.6026C20.605 10.3213 22.1463 8.60383 22.15 6.52508C22.15 4.47633 20.6563 2.77633 18.6975 2.45508" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21.2441 15.415C23.1829 15.7038 24.5366 16.3838 24.5366 17.7838C24.5366 18.7475 23.8991 19.3725 22.8691 19.7638" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                    <div class="d-flex">
                        <select id="typeFilter" class="form-control" style="display: none;">
                            <option value="">Select Type</option>
                            <option value="prefac">PREFAC</option>
                            <option value="cp">CP</option>
                        </select>
                        <div class="filter-icon type-icon" style="display: none; background-color: #0066FF">
                            <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.98927 16.0088C14.6005 16.0088 18.5418 16.7075 18.5418 19.4988C18.5418 22.29 14.6268 23.0088 9.98927 23.0088C5.37677 23.0088 1.43677 22.3163 1.43677 19.5238C1.43677 16.7313 5.35052 16.0088 9.98927 16.0088Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.98934 12.025C6.96184 12.025 4.50684 9.57125 4.50684 6.54375C4.50684 3.51625 6.96184 1.0625 9.98934 1.0625C13.0156 1.0625 15.4706 3.51625 15.4706 6.54375C15.4818 9.56 13.0443 12.0138 10.0281 12.025H9.98934Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18.6038 10.6026C20.605 10.3213 22.1463 8.60383 22.15 6.52508C22.15 4.47633 20.6563 2.77633 18.6975 2.45508" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21.2441 15.415C23.1829 15.7038 24.5366 16.3838 24.5366 17.7838C24.5366 18.7475 23.8991 19.3725 22.8691 19.7638" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                    <div class="d-flex">
                        <select id="promotionFilter" style="display: none;">
                            <option value="">Select Promotion</option>
                            <option value="G1">G1</option>
                            <option value="G2">G2</option>
                            <!-- Add more options as needed -->
                        </select>
                        <div class="filter-icon promotion-icon" style="display: none; background-color: #0066FF">
                            <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.98927 16.0088C14.6005 16.0088 18.5418 16.7075 18.5418 19.4988C18.5418 22.29 14.6268 23.0088 9.98927 23.0088C5.37677 23.0088 1.43677 22.3163 1.43677 19.5238C1.43677 16.7313 5.35052 16.0088 9.98927 16.0088Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.98934 12.025C6.96184 12.025 4.50684 9.57125 4.50684 6.54375C4.50684 3.51625 6.96184 1.0625 9.98934 1.0625C13.0156 1.0625 15.4706 3.51625 15.4706 6.54375C15.4818 9.56 13.0443 12.0138 10.0281 12.025H9.98934Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18.6038 10.6026C20.605 10.3213 22.1463 8.60383 22.15 6.52508C22.15 4.47633 20.6563 2.77633 18.6975 2.45508" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21.2441 15.415C23.1829 15.7038 24.5366 16.3838 24.5366 17.7838C24.5366 18.7475 23.8991 19.3725 22.8691 19.7638" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <br>
                <table id="myTable" class="display table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("superviseur.users.data") }}',
                    data: function (d) {
                        d.role = $('#roleFilter').val();
                        d.type = $('#typeFilter').val();
                        d.promotion = $('#promotionFilter').val();
                    }
                },
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'role' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });

            $('#roleFilter, #typeFilter, #promotionFilter').change(function() {
                table.draw();
            });

            // Handle delete user
            $('#myTable').on('click', '.delete-user', function() {
                var userId = $(this).data('id');
                if (confirm('Are you sure you want to delete this user?')) {
                    $.ajax({
                        url: '/users/' + userId,
                        type: 'DELETE',
                        success: function(result) {
                            table.draw();
                            alert(result.success || result.error);
                        }
                    });
                }
            });

            // Handle validate user
            $('#myTable').on('click', '.validate-user', function() {
                var userId = $(this).data('id');
                $.ajax({
                    url: '/users/' + userId + '/validate',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result) {
                        table.draw();
                        alert(result.success || result.error);
                    }
                });
            });
        });
    </script>


    {{-- ----filter---- --}}

    <script>
        $('#roleFilter').change(function() {
            var selectedRole = $(this).val();
            if (selectedRole == 'candidat') {
                $('#typeFilter').show();
                $('.type-icon').show();
            } else {
                $('#typeFilter').hide();
                $('.type-icon').hide();
                $('#promotionFilter').hide();
                $('.promotion-icon').hide();
                $('#typeFilter').val('');
                $('#promotionFilter').val('');
            }
        });

        $('#typeFilter').change(function() {
            var selectedType = $(this).val();
            if (selectedType == 'CP') {
                $('#promotionFilter').show();
                $('.promotion-icon').show();
            } else {
                $('#promotionFilter').hide();
                $('.promotion-icon').hide();
                $('#promotionFilter').val('');
            }
        });
    </script>
</body>
</html>
