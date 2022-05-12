@extends('main')
@section('content')
    <div class="main">
        <div class="grid wide">
            @include('breadcumb')
            @include('alert')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4 bg-light
                    ">
                        <div class="card-body text-center">
                            <h1 class="pic-label">Profile picture</h1>
                            <form id="avatarForm" enctype="multipart/form-data">
                                @csrf
                                <div class="pic">
                                    <img src="{{ !empty(Auth::user()->avatar) ? url('/storage/images/users/300/' . Auth::user()->avatar) : asset('/template/img/user_default.png') }}"
                                        alt="" class="avatar-profile img-fluid">
                                    <input type="file" id="upload" name="upload"
                                        style="visibility: hidden; width: 1px; height: 1px" accept="image/*" multiple />
                                    <input type="text" name="url">
                                    <a class="picSub" href=""
                                        onclick="document.getElementById('upload').click(); return false"><i
                                            class=" fas fa-camera-retro"></i>&nbsp;&nbsp;Change your profile
                                        picture.</a>
                                </div>
                                <div class="submitUpdateAvatar mt-4 mb-4">
                                    <button class="button btn-success-profile">Submit</button>
                                    <input type="submit" class="button btn-cancel-profile" value="Cancel">
                                </div>
                            </form>
                            <h5 class="h3 fullName my-3">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            </h5>
                            <p class="birthDay mb-4">
                                {{ \Carbon\Carbon::parse(Auth::user()->birthDay)->format('d/m/Y') }}</p>
                            <p class="address mb-4">{{ Auth::user()->address }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">First Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="d-flex justify-content-between">
                                        <p class="text-muted mb-0">{{ Auth::user()->first_name }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Last Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="d-flex justify-content-between">
                                        <p class="text-muted mb-0">{{ Auth::user()->last_name }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="d-flex justify-content-between">
                                        <p class="text-muted mb-0">{{ Auth::user()->address }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Date of birth</p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="d-flex justify-content-between">
                                        <p class="text-muted mb-0">{{ Auth::user()->birthDay }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="d-flex justify-content-between">
                                        <p class="text-muted mb-0">{{ Auth::user()->phone }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse ">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfile">
                            Edit Profile
                        </button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mr-3" data-toggle="modal"
                            data-target="#changePassword">
                            Change Password
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal change password -->
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="changePasswordForm" method="POST" action="{{ route('user.changePassword') }}">
                        @csrf
                        <div class="form-group">
                            <input type="password" name="oldPassword" id="oldPassword" class="form-control"
                                placeholder="Old Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" id="newPassword" name="newPassword" class="form-control"
                                placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control"
                                placeholder=" Confirm Password" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal edit profile -->
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('users.update') }}">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstName">First Name</label>
                                <input type="text" name="first_name" class="form-control" id="firstName"
                                    value="{{ Auth::user()->first_name }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">Last Name</label>
                                <input type="text" name="last_name" class="form-control" id="lastName"
                                    value="{{ Auth::user()->last_name }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address"
                                value="{{ Auth::user()->address }}" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phoneNumber">Phone</label>
                                <input type="text" class="form-control" id="phoneNumber" name="phone"
                                    value="{{ Auth::user()->phone }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>BirthDay</label>
                                <input type="date" class="form-control" id="birthDay" name="birthDay"
                                    value="{{ Auth::user()->birthDay }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}"
                                disabled required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $('input[name="upload"]').change(function(event) {
            if ($(this).val() == '') {
                return false;
            }
            const form = new FormData();
            form.append("file", $('input[name="upload"]')[0].files[0]);
            // const fileUpload = event.target.files;
            // console.log(fileUpload);
            console.log(form);
            $.ajax({
                processData: false,
                contentType: false,
                type: "POST",
                datatype: "JSON",
                data: form,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/upload/services",
                success: function(results) {
                    if (results.error == true) {
                        alert("Upload file error!!");
                    } else {
                        $('input[name="url"]').val(results.url);
                        $('.avatar-profile').attr('src', 'storage/images/users/300/' + results.url);
                    }
                },
            });
            $('.submitUpdateAvatar').css("display", "block");
        })
        $('.btn-cancel').click(function(e) {
            e.preventDefault();
            $('.submitUpdateAvatar').css("display", "none");
            var image = $('input[name="upload"]')[0].files[0].name;
            $.ajax({
                'method': "POST",
                'data': {
                    image: image
                },
                'url': '/upload/remove',
                'dataType': 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(results) {
                    if (results.error == true) {
                        console.log("Upload file error!!");
                    } else {
                        $('input[name="upload"]').val('');
                        $('.avatar-profile').attr('src', results.url);
                    }
                }

            });
        })
        $('#avatarForm').on('submit', function(e) {
            e.preventDefault();
            var img = $('input[name="url"]').val();
            $.ajax({
                url: "/user/updateAvatar",
                type: "POST",
                data: {
                    img: img,
                    "_token": "{{ csrf_token() }}",

                },
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.error == false) {
                        $('.submitUpdateAvatar').css("display", "none");
                        alert(data.msg);

                    } else {
                        console.log('error');
                        console.log(data.msg);
                    }
                }
            });
        })
    </script>
@endsection
