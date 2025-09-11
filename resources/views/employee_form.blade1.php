@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Employee Information Form</h1>
    <form method="POST" action="{{ route('employee.store') }}">
        @csrf
        <!-- Personal Information -->
        <div class="card mb-4">
            <div class="card-header fw-bold">Personal Information</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Division</label>
                        <input type="text" class="form-control" name="division">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">SCB A/C No.</label>
                        <input type="text" class="form-control" name="scb_account">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Cell No.</label>
                        <input type="text" class="form-control" name="cell_no">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">E-TIN Number</label>
                        <input type="text" class="form-control" name="etin">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="dob">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Marriage Date</label>
                        <input type="date" class="form-control" name="marriage_date">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Place of Birth</label>
                        <input type="text" class="form-control" name="place_birth">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Passport No.</label>
                        <input type="text" class="form-control" name="passport_no">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select class="form-select" name="gender">
                            <option value="">Select</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Passport Place of Issue</label>
                        <input type="text" class="form-control" name="passport_place_issue">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Passport Date of Expiry</label>
                        <input type="date" class="form-control" name="passport_expiry">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nationality</label>
                        <input type="text" class="form-control" name="nationality">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Blood Group</label>
                        <input type="text" class="form-control" name="blood_group">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Religion</label>
                        <input type="text" class="form-control" name="religion">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Marital Status</label>
                        <input type="text" class="form-control" name="marital_status">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">National ID Card No.</label>
                        <input type="text" class="form-control" name="nid">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NID Place of Issue</label>
                        <input type="text" class="form-control" name="nid_place_issue">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Driving License No.</label>
                        <input type="text" class="form-control" name="driving_license">
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </div>
        <!-- Address -->
        <div class="card mb-4">
            <div class="card-header fw-bold">Address</div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="p-3 mb-3 border border-primary rounded bg-light-subtle">
                        <label class="form-label fw-bold">Present Address</label>
                        <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="form-label">House No.</label>
                            <input type="text" class="form-control" name="present_house_no">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Plot/Road No.</label>
                            <input type="text" class="form-control" name="present_road_no">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Apt. No.</label>
                            <input type="text" class="form-control" name="present_apt_no">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Building Name / No.</label>
                            <input type="text" class="form-control" name="present_building">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Area</label>
                            <input type="text" class="form-control" name="present_area">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">District</label>
                            <input type="text" class="form-control" name="present_district">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="p-3 mb-3 border border-success rounded bg-light-subtle">
                        <label class="form-label fw-bold">Permanent Address</label>
                        <textarea class="form-control mb-3" name="permanent_address"></textarea>
                        <div class="mb-2">
                            <label class="form-label">Home District</label>
                            <input type="text" class="form-control" name="home_district">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <!-- Home District moved inside Permanent Address above -->
            </div>
        </div>
        <!-- Family Information -->
        <div class="card mb-4">
            <div class=" family-information">
            <div class="card-header fw-bold">Family Information</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Father’s Name</label>
                        <input type="text" class="form-control" name="father_name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mother’s Name</label>
                        <input type="text" class="form-control" name="mother_name">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Spouse Name</label>
                        <input type="text" class="form-control" name="spouse_name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Children</label>
                        <div id="children-rows">
                            <div class="row g-2 mb-2 children-row">
                                <div class="col-7">
                                    <input type="text" class="form-control" name="children_name[]" placeholder="Child Name">
                                </div>
                                <div class="col-4">
                                    <input type="date" class="form-control" name="children_dob[]" placeholder="Date of Birth">
                                </div>
                                <div class="col-1 d-flex align-items-center">
                                    <button type="button" class="btn btn-danger btn-sm remove-child" onclick="removeChildRow(this)">&times;</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary btn-sm" onclick="addChildRow()">Add Child</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
                    
</body>
<script>
function addChildRow() {
    const container = document.getElementById('children-rows');
    const row = document.createElement('div');
    row.className = 'row g-2 mb-2 children-row';
    row.innerHTML = `
        <div class="col-7">
            <input type="text" class="form-control" name="children_name[]" placeholder="Child Name">
        </div>
        <div class="col-4">
            <input type="date" class="form-control" name="children_dob[]" placeholder="Date of Birth">
        </div>
        <div class="col-1 d-flex align-items-center">
            <button type="button" class="btn btn-danger btn-sm remove-child" onclick="removeChildRow(this)">&times;</button>
        </div>
    `;
    container.appendChild(row);
}
function removeChildRow(btn) {
    const row = btn.closest('.children-row');
    if (row) row.remove();
}
</script>
                </div>
            </div>
        </div>
        <!-- Educational Information -->
        <div class="card mb-4">
            <div class="card-header fw-bold">Educational Information</div>
            <div class="card-body">
                <div id="education-rows">
                    <div class="row g-2 mb-2 education-row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="edu_institute[]" placeholder="School/College/University">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="degree[]" placeholder="Degree">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="group[]" placeholder="Group">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="grade[]" placeholder="Grade/Division/Class">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="passing_year[]" placeholder="Year of Passing">
                        </div>
                        <div class="col-md-1 d-flex align-items-center">
                            <button type="button" class="btn btn-danger btn-sm remove-education" onclick="removeEducationRow(this)">&times;</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary btn-sm" onclick="addEducationRow()">Add Education</button>
            </div>
        </div>
function addEducationRow() {
    const container = document.getElementById('education-rows');
    const row = document.createElement('div');
    row.className = 'row g-2 mb-2 education-row';
    row.innerHTML = `
        <div class="col-md-3">
            <input type="text" class="form-control" name="edu_institute[]" placeholder="School/College/University">
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" name="degree[]" placeholder="Degree">
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" name="group[]" placeholder="Group">
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" name="grade[]" placeholder="Grade/Division/Class">
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" name="passing_year[]" placeholder="Year of Passing">
        </div>
        <div class="col-md-1 d-flex align-items-center">
            <button type="button" class="btn btn-danger btn-sm remove-education" onclick="removeEducationRow(this)">&times;</button>
        </div>
    `;
    container.appendChild(row);
}
function removeEducationRow(btn) {
    const row = btn.closest('.education-row');
    if (row) row.remove();
}
        <!-- Training & Courses -->
        <div class="card mb-4">
            <div class="card-header fw-bold">Training & Courses</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Institute</label>
                        <input type="text" class="form-control" name="training_institute">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Subject</label>
                        <input type="text" class="form-control" name="training_subject">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Duration</label>
                        <input type="text" class="form-control" name="training_duration">
                    </div>
                </div>
            </div>
        </div>
        <!-- Professional Qualification -->
        <div class="card mb-4">
            <div class="card-header fw-bold">Professional Qualification</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Professional Qualification</label>
                    <textarea class="form-control" name="professional_qualification"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Technical / Specialized Training</label>
                    <textarea class="form-control" name="technical_training"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Membership in Professional Bodies</label>
                    <textarea class="form-control" name="membership"></textarea>
                </div>
            </div>
        </div>
        <!-- Emergency Contact -->
        <div class="card mb-4">
            <div class="card-header fw-bold">Emergency Contact</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="emergency_name">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Relation</label>
                        <input type="text" class="form-control" name="emergency_relation">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="emergency_address">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Telephone No.</label>
                        <input type="text" class="form-control" name="emergency_telephone">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mobile No.</label>
                        <input type="text" class="form-control" name="emergency_mobile">
                    </div>
                </div>
            </div>
        </div>
        <!-- Nominee Information -->
        <div class="card mb-4">
            <div class="card-header fw-bold">Nominee Information</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="nominee_name">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Relation</label>
                        <input type="text" class="form-control" name="nominee_relation">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="nominee_address">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Telephone No.</label>
                        <input type="text" class="form-control" name="nominee_tel">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mobile No.</label>
                        <input type="text" class="form-control" name="nominee_mobile">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Percentage</label>
                    <input type="text" class="form-control" name="nominee_percentage">
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
    function addChildRow() {
        const container = document.getElementById('children-rows');
        const row = document.createElement('div');
        row.className = 'row g-2 mb-2 children-row';
        row.innerHTML = `
            <div class="col-7">
                <input type="text" class="form-control" name="children_name[]" placeholder="Child Name">
            </div>
            <div class="col-4">
                <input type="date" class="form-control" name="children_dob[]" placeholder="Date of Birth">
            </div>
            <div class="col-1 d-flex align-items-center">
                <button type="button" class="btn btn-danger btn-sm remove-child" onclick="removeChildRow(this)">&times;</button>
            </div>
        `;
        container.appendChild(row);
    }
    function removeChildRow(btn) {
        const row = btn.closest('.children-row');
        if (row) row.remove();
    }
    function addEducationRow() {
        const container = document.getElementById('education-rows');
        const row = document.createElement('div');
        row.className = 'row g-2 mb-2 education-row';
        row.innerHTML = `
            <div class="col-md-3">
                <input type="text" class="form-control" name="edu_institute[]" placeholder="School/College/University">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="degree[]" placeholder="Degree">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="group[]" placeholder="Group">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="grade[]" placeholder="Grade/Division/Class">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="passing_year[]" placeholder="Year of Passing">
            </div>
            <div class="col-md-1 d-flex align-items-center">
                <button type="button" class="btn btn-danger btn-sm remove-education" onclick="removeEducationRow(this)">&times;</button>
            </div>
        `;
        container.appendChild(row);
    }
    function removeEducationRow(btn) {
        const row = btn.closest('.education-row');
        if (row) row.remove();
    }
    </script>
    @endpush
        <!-- Reference -->
        <div class="card mb-4">
            <div class="card-header fw-bold">Reference</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="ref_name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Designation</label>
                        <input type="text" class="form-control" name="ref_designation">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Organization Name & Address</label>
                    <textarea class="form-control" name="ref_org"></textarea>
                </div>
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
