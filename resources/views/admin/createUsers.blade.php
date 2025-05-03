@extends('layouts.adminApp')

@section('title', 'Create New Users')

@section('content')
    <style>
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
            /* padding: 10px 12px; */

        }

        .select2-selection__rendered {

            padding: 6px 12px !important;

        }
    </style>
    <section class=" form">
        <div class="container">
            <div class="col-md-6 mb-5">
                <label for="inputState" class="form-label">Type</label>
                <select id="inputState" class="form-select" onchange="toggleForms()">
                    <option selected>Select your type</option>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher/Officer/Staff</option>
                    <option value="staffFamily">Teacher/Officer/Staff(family)</option>
                    <option value="other">Others</option>
                </select>
            </div>

            <!-- Registration Form -->
            <div id="form-wrapperDiv" class="form-wrapper" style="display: none">
                <form class="row g-3" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div id="student-form" style="display: none">
                        <input type="hidden" name="user_type" value="student">
                        <h3 class="text-center mb-3" style="font-size: 48px">Student</h3>
                    </div>


                    <div id="teacher-staff-form" style="display: none">
                        <input type="hidden" name="user_type" value="teacher">
                        <h3 class="text-center mb-3">Teacher/Officer/Staff</h3>
                    </div>


                    <div id="teacher-staff-family-form" style="display: none">
                        <input type="hidden" name="user_type" value="staffFamily">
                        <h3 class="text-center mb-3">Teacher/Officer/Staff(Family)</h3>
                    </div>

                    <div id="other-form" style="display: none">
                        <input type="hidden" name="user_type" value="other">
                        <h3 class="text-center mb-3">Others</h3>
                    </div>






                    <div id="nameDiv" class="col-md-6" style="display: none;">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>





                    <div id="fatherNameDiv" class="col-md-6" style="display: none;">
                        <label for="father_name" class="form-label">Father Name:</label>
                        <input type="text" class="form-control" name="father_name">
                    </div>


                    <div id="motherNameDiv" class="col-md-6" style="display: none;">
                        <label for="mother_name" class="form-label">Mother Name:</label>
                        <input type="text" class="form-control" name="mother_name">
                    </div>

                    <div id="departmentDiv" class="col-md-6" style="display: none;">
                        <label for="department" class="form-label">Department:</label> <br>
                        <select id="department" class="select2 form-select" name="department">
                            <option selected>Select your department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->department_code }}">{{ $department->department_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div id="designationDiv" class="col-md-6" style="display: none;">
                        <label for="designation" class="form-label">Designation:</label>
                        <input type="text" class="form-control" name="designation">
                    </div>


                    <div id="rollDiv" class="col-md-6" style="display: none;">
                        <label for="roll_no" class="form-label">Roll No:</label>
                        <input type="text" class="form-control" name="roll_no">
                    </div>


                    <div id="sessionDiv" class="col-md-6" style="display: none;">
                        <label for="session" class="form-label">Session:</label> <br>
                        <select id="session" class="select2 form-select">
                            <option selected>Select your session</option>

                            <option value="session">2016-2017</option>
                            <option value="session">2017-2018</option>
                            <option value="session">2018-2019</option>
                            <option value="session">2019-2020</option>
                            <option value="session">2020-2021</option>
                            <option value="session">2021-2022</option>
                            <option value="session">2022-2023</option>
                            <option value="session">2023-2024</option>
                        </select>
                    </div>

                    <div id="employeeNameDiv" class="col-md-6" style="display: none;">
                        <label for="employee_name" class="form-label">University Employee Name:</label>
                        <input type="text" class="form-control" name="employee_name">
                    </div>

                    <div id="employeeDesignationDiv" class="col-md-6" style="display: none;">
                        <label for="employee_designation" class="form-label">University Employee Designation:</label>
                        <input type="text" class="form-control" name="employee_designation">
                    </div>

                    <div id="instituteNameDiv" class="col-md-6" style="display: none">
                        <label for="institute_name" class="form-label">Institute Name:</label>
                        <input type="text" class="form-control" name="institute_name">
                    </div>

                    <div id="presentAddressDiv" class="col-md-6" style="display: none;">
                        <label for="presentaddress" class="form-label">Present Address:</label>
                        <input type="text" class="form-control" name="presentaddress">
                    </div>
                    <div id="permanentAddress" class="col-md-6" style="display: none;">
                        <label for="permanentaddress" class="form-label">Permanent Address:</label>
                        <input type="text" class="form-control" name="permanentaddress">
                    </div>

                    <div id="relationshipDiv" class="col-md-6" style="display: none;">
                        <label for="relationship" class="form-label">Relationship:</label>
                        <input type="text" class="form-control" name="relationship">
                    </div>

                    <div class="col-md-6">
                        <label for="mobile" class="form-label">Mobile No:</label>
                        <input type="text" class="form-control" name="mobile">
                    </div>


                    <div class="col-md-6">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>


                    <div class="col-md-6">
                        <label for="profile_photo" class="form-label">Profile Photo:</label>
                        <input class="form-control" type="file" name="profile_photo" accept="image/*">
                    </div>


                    <div class="col-md-6">
                        <label for="id_card_photo" class="form-label">ID Card Photo:</label>
                        <input class="form-control" type="file" name="id_card_photo" accept="image/*">
                    </div>


                    <div class="col-12 form-btn">
                        <button type="submit" class="btn btn-primary w-25">Registration</button>
                    </div>
            </div>
    </section>

    </form>
    </div>

    <script>
        new DataTable('#example');

        function toggleForms() {
            const viewFieldInfo = [{
                    id: "student",
                    field: ["form-wrapperDiv", "student-form", "nameDiv", "fatherNameDiv", "motherNameDiv",
                        "departmentDiv", "sessionDiv", "rollDiv"
                    ]
                },
                {
                    id: "teacher",
                    field: ["form-wrapperDiv", "teacher-staff-form", "nameDiv", "designationDiv", "departmentDiv"]
                },
                {
                    id: "staffFamily",
                    field: ["form-wrapperDiv", "teacher-staff-family-form", "nameDiv", "employeeNameDiv",
                        "designationDiv", "relationshipDiv"
                    ]
                },
                {
                    id: "other",
                    field: ["form-wrapperDiv", "other-form", "nameDiv", "fatherNameDiv", "instituteNameDiv",
                        "designationDiv", "presentAddressDiv", "permanentAddress"
                    ]
                }
            ];

            const selectedType = $('#inputState').val();
            const specificFieldList = viewFieldInfo.find(datum => datum.id === selectedType);

            if (specificFieldList) {
                // Hide all possible form sections before showing the correct ones
                $('#student-form, #teacher-staff-form, #teacher-staff-family-form,#other-form, #nameDiv, #fatherNameDiv, #motherNameDiv, #departmentDiv, #sessionDiv, #rollDiv, #designationDiv, #employeeDesignationDiv,#instituteNameDiv, #relationshipDiv')
                    .hide().attr('hidden', true);

                // Show only the specific fields for the selected type
                specificFieldList.field.forEach(element => {
                    $('#' + element).show().removeAttr('hidden');
                });
            }
        }
    </script>
@endsection
