@extends('layouts.adminApp')

@section('title', 'Gym Management System - User Edit')

@section('content')
    <style>
        /* Same styles reused */
        .form-wrapper {
            box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;
            padding: 5rem 3rem;
        }

        .form-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 1rem;
            margin-top: 2rem;
        }

        .form {
            padding: 120px 0;
        }

        .select2-container--default {
            width: 100% !important;
        }

        .select2-selection--single {
            height: 38px !important;
        }

        .select2-selection__rendered {
            padding: 6px 12px !important;
        }
    </style>

    <section class="form">
        <div class="container">
            <form class="row g-3 form-wrapper" method="POST" action="{{ route('admin.users.update', $user->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" id="userTpeField" name="user_type" value="{{ old('user_type', $user->user_type) }}">

                <div class="col-md-6 mb-3">
                    <label for="inputState" class="form-label">Type</label>
                    <select id="inputState" class="form-select" readonly onchange="toggleForms()">
                        <option value="">Select your type</option>
                        <option value="student" {{ $user->user_type == 'student' ? 'selected' : '' }}>Student</option>
                        <option value="teacher" {{ $user->user_type == 'teacher' ? 'selected' : '' }}>Teacher/Officer/Staff
                        </option>
                        <option value="staffFamily" {{ $user->user_type == 'staffFamily' ? 'selected' : '' }}>
                            Teacher/Officer/Staff(family)</option>
                        <option value="other" {{ $user->user_type == 'other' ? 'selected' : '' }}>Others</option>
                    </select>
                </div>

                {{-- Repeat same fields but prefilled --}}
                <div id="nameDiv" class="col-md-6">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                </div>

                <div id="fatherNameDiv" class="col-md-6">
                    <label for="father_name" class="form-label">Father Name:</label>
                    <input type="text" class="form-control" name="father_name"
                        value="{{ old('father_name', $user->father_name) }}">
                </div>

                <div id="motherNameDiv" class="col-md-6">
                    <label for="mother_name" class="form-label">Mother Name:</label>
                    <input type="text" class="form-control" name="mother_name"
                        value="{{ old('mother_name', $user->mother_name) }}">
                </div>

                <div id="departmentDiv" class="col-md-6">
                    <label for="department" class="form-label">Department:</label>
                    <select id="department" class="select2 form-select" name="department">
                        <option value="">Select your department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->department_code }}"
                                {{ $user->department == $department->department_code ? 'selected' : '' }}>
                                {{ $department->department_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div id="designationDiv" class="col-md-6">
                    <label for="designation" class="form-label">Designation:</label>
                    <input type="text" class="form-control" name="designation"
                        value="{{ old('designation', $user->designation) }}">
                </div>

                <div id="rollDiv" class="col-md-6">
                    <label for="roll_no" class="form-label">Roll No:</label>
                    <input type="text" class="form-control" name="roll_no" value="{{ old('roll_no', $user->roll_no) }}">
                </div>

                <div id="sessionDiv" class="col-md-6">
                    <label for="session" class="form-label">Session:</label>
                    <select id="session" name="session" class="select2 form-select">
                        <option value="">Select your session</option>
                        @for ($year = 2014; $year <= 2024; $year++)
                            <option value="{{ $year }}" {{ $user->session == $year ? 'selected' : '' }}>
                                {{ $year }}</option>
                        @endfor
                    </select>
                </div>

                <div id="employeeNameDiv" class="col-md-6">
                    <label for="employee_name" class="form-label">University Employee Name:</label>
                    <input type="text" class="form-control" name="employee_name"
                        value="{{ old('employee_name', $user->employee_name) }}">
                </div>

                <div id="employeeDesignationDiv" class="col-md-6">
                    <label for="employee_designation" class="form-label">University Employee Designation:</label>
                    <input type="text" class="form-control" name="employee_designation"
                        value="{{ old('employee_designation', $user->employee_designation) }}">
                </div>

                <div id="instituteNameDiv" class="col-md-6">
                    <label for="institute_name" class="form-label">Institute Name:</label>
                    <input type="text" class="form-control" name="institute_name"
                        value="{{ old('institute_name', $user->institute_name) }}">
                </div>

                <div id="presentAddressDiv" class="col-md-6">
                    <label for="presentaddress" class="form-label">Present Address:</label>
                    <input type="text" class="form-control" name="present_address"
                        value="{{ old('present_address', $user->present_address) }}">
                </div>

                <div id="permanentAddress" class="col-md-6">
                    <label for="permanentaddress" class="form-label">Permanent Address:</label>
                    <input type="text" class="form-control" name="permanent_address"
                        value="{{ old('permanent_address', $user->permanent_address) }}">
                </div>

                <div id="relationshipDiv" class="col-md-6">
                    <label for="relationship" class="form-label">Relationship:</label>
                    <input type="text" class="form-control" name="relationship"
                        value="{{ old('relationship', $user->relationship) }}">
                </div>

                <div class="col-md-6">
                    <label for="mobile" class="form-label">Mobile No:</label>
                    <input type="text" class="form-control" name="mobile"
                        value="{{ old('mobile', $user->mobile) }}">
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                </div>

                <div class="col-md-6">
                    <label for="profile_photo" class="form-label">Profile Photo (optional):</label>
                    <div class="mb-2">
                        <img id="previewProfilePhoto" src="{{ asset($user->profile_photo) }}" alt="Profile Photo"
                            class="img-thumbnail" width="120">
                    </div>
                    <input class="form-control" type="file" name="profile_photo" id="profile_photo"
                        accept="image/*">
                </div>


                <div class="col-md-6">
                    <label for="id_card_photo" class="form-label">ID Card Photo (optional):</label>
                    <div class="mb-2">
                        <img id="previewIDCardPhoto" src="{{ asset($user->id_card_photo) }}" alt="ID Card Photo"
                            class="img-thumbnail" width="120">
                    </div>
                    <input class="form-control" type="file" name="id_card_photo" id="id_card_photo"
                        accept="image/*">
                </div>



                <div class="col-12 form-btn">
                    <button type="submit" class="btn btn-success w-25">Update</button>
                    <p>Go back to <a href="{{ route('admin.manageUsers') }}">User List</a></p>
                </div>
            </form>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            toggleForms(); // Call initially to show fields based on user_type
        });

        function toggleForms() {
            const viewFieldInfo = [{
                    id: "student",
                    field: ["nameDiv", "fatherNameDiv", "motherNameDiv", "departmentDiv", "sessionDiv", "rollDiv"]
                },
                {
                    id: "teacher",
                    field: ["nameDiv", "designationDiv", "departmentDiv"]
                },
                {
                    id: "staffFamily",
                    field: ["nameDiv", "employeeNameDiv", "designationDiv", "relationshipDiv"]
                },
                {
                    id: "other",
                    field: ["nameDiv", "fatherNameDiv", "instituteNameDiv", "designationDiv", "presentAddressDiv",
                        "permanentAddress"
                    ]
                }
            ];

            const selectedType = $('#inputState').val();
            const specificFieldList = viewFieldInfo.find(d => d.id === selectedType);

            $('#userTpeField').val(selectedType);

            const allFields = [
                "nameDiv", "fatherNameDiv", "motherNameDiv", "departmentDiv", "sessionDiv", "rollDiv",
                "designationDiv", "employeeDesignationDiv", "instituteNameDiv", "relationshipDiv",
                "employeeNameDiv", "presentAddressDiv", "permanentAddress"
            ];

            allFields.forEach(id => {
                $('#' + id).hide();
            });

            if (specificFieldList) {
                specificFieldList.field.forEach(id => {
                    $('#' + id).show();
                });
            }
        }
    </script>
    <script>
        document.getElementById('profile_photo').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('previewProfilePhoto').src = reader.result;
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        });

        document.getElementById('id_card_photo').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('previewIDCardPhoto').src = reader.result;
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        });
    </script>
@endsection
