@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5 small">
    <h1 class="mb-5 text-center">Employee Information Form</h1>

    <form method="POST" action="{{ route('employee.store') }}" class="small">
        @csrf

        {{-- Personal Information --}}
        <div class="card mb-4 shadow-sm">
<div class="card-header bg-dark text-white fw-bold fs-5">Personal Information</div>
            <div class="card-body bg-light">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
<input type="text" class="form-control form-control-sm" name="name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Division</label>
<input type="text" class="form-control form-control-sm" name="division">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">SCB A/C No.</label>
<input type="text" class="form-control form-control-sm" name="scb_account">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Cell No.</label>
<input type="text" class="form-control form-control-sm" name="cell_no">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">E-TIN Number</label>
<input type="text" class="form-control form-control-sm" name="etin">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date of Birth</label>
<input type="date" class="form-control form-control-sm" name="dob">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Marriage Date</label>
<input type="date" class="form-control form-control-sm" name="marriage_date">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Place of Birth</label>
<input type="text" class="form-control form-control-sm" name="place_birth">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Passport No.</label>
<input type="text" class="form-control form-control-sm" name="passport_no">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
<select class="form-select form-select-sm" name="gender">
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
<input type="text" class="form-control form-control-sm" name="passport_place_issue">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Passport Date of Expiry</label>
<input type="date" class="form-control form-control-sm" name="passport_expiry">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nationality</label>
<input type="text" class="form-control form-control-sm" name="nationality">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Blood Group</label>
<input type="text" class="form-control form-control-sm" name="blood_group">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Religion</label>
<input type="text" class="form-control form-control-sm" name="religion">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Marital Status</label>
<input type="text" class="form-control form-control-sm" name="marital_status">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">National ID Card No.</label>
<input type="text" class="form-control form-control-sm" name="nid">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NID Place of Issue</label>
<input type="text" class="form-control form-control-sm" name="nid_place_issue">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Driving License No.</label>
<input type="text" class="form-control form-control-sm" name="driving_license">
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </div>

        {{-- Address --}}
        <div class="card mb-4 shadow-sm">
<div class="card-header bg-dark text-white fw-bold fs-5">Address</div>
            <div class="card-body bg-light">
                <div class="p-3 border rounded mb-3">
<h6 class="fw-normal mb-2">Present Address</h6>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label">House No.</label>
<input type="text" class="form-control form-control-sm" name="present_house_no">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Plot/Road No.</label>
<input type="text" class="form-control form-control-sm" name="present_road_no">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label">Apt. No.</label>
<input type="text" class="form-control form-control-sm" name="present_apt_no">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Building Name / No.</label>
<input type="text" class="form-control form-control-sm" name="present_building">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label">Area</label>
<input type="text" class="form-control form-control-sm" name="present_area">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">District</label>
<input type="text" class="form-control form-control-sm" name="present_district">
                        </div>
                    </div>
                </div>

                <div class="p-3 border rounded">
<h6 class="fw-normal mb-2">Permanent Address</h6>
<textarea class="form-control form-control-sm mb-3" name="permanent_address" placeholder="Address"></textarea>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Home District</label>
<input type="text" class="form-control form-control-sm" name="home_district">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Family Information --}}
        <div class="card mb-4 shadow-sm">
<div class="card-header bg-dark text-white fw-bold fs-5">Family Information</div>
            <div class="card-body bg-light">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Father’s Name</label>
<input type="text" class="form-control form-control-sm" name="father_name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mother’s Name</label>
<input type="text" class="form-control form-control-sm" name="mother_name">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Spouse Name</label>
<input type="text" class="form-control form-control-sm" name="spouse_name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Children</label>
                        <div id="children-rows">
                            <div class="row g-2 mb-2 children-row">
                                <div class="col-7">
<input type="text" class="form-control form-control-sm" name="children_name[]" placeholder="Child Name">
                                </div>
                                <div class="col-4">
<input type="date" class="form-control form-control-sm" name="children_dob[]" placeholder="Date of Birth">
                                </div>
                                <div class="col-1 d-flex align-items-center">
                                    <button type="button" class="btn btn-danger btn-sm remove-child" onclick="removeChildRow(this)">&times;</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="addChildRow()">Add Child</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Educational Information --}}
        <div class="card mb-4 shadow-sm">
<div class="card-header bg-dark text-white fw-bold fs-5">Educational Information</div>
            <div class="card-body bg-light">
                <div id="education-rows">
                    <div class="row g-2 mb-2 education-row">
                        <div class="col-lg-3 col-md-4">
<input type="text" class="form-control form-control-sm" name="edu_institute[]" placeholder="School/College/University">
                        </div>
                        <div class="col-lg-2 col-md-2">
<input type="text" class="form-control form-control-sm" name="degree[]" placeholder="Degree">
                        </div>
                        <div class="col-lg-2 col-md-2">
<input type="text" class="form-control form-control-sm" name="group[]" placeholder="Group">
                        </div>
                        <div class="col-lg-2 col-md-2">
<input type="text" class="form-control form-control-sm" name="grade[]" placeholder="Grade/Division/Class">
                        </div>
                        <div class="col-lg-2 col-md-2">
<input type="date" class="form-control form-control-sm" name="edu_start[]" placeholder="Start Date">
<div class="form-text text-muted small">Start Year</div>
                        </div>
                        <div class="col-lg-2 col-md-2">
<input type="date" class="form-control form-control-sm" name="edu_end[]" placeholder="End Date">
<div class="form-text text-muted small">Completion Year</div>
                        </div>
                        <div class="col-lg-1 col-md-1 d-flex align-items-center">
                            <button type="button" class="btn btn-danger btn-sm remove-education" onclick="removeEducationRow(this)">&times;</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="addEducationRow()">Add Education</button>
            </div>
        </div>

        {{-- Training & Courses --}}
        <div class="card mb-4 shadow-sm">
<div class="card-header bg-dark text-white fw-bold fs-5">Training & Courses</div>
            <div class="card-body bg-light">
                <div id="training-rows">
                    <div class="row g-2 mb-2 training-row">
                        <div class="col-lg-4 col-md-4">
                            <input type="text" class="form-control form-control-sm" name="training_institute[]" placeholder="Institute">
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <input type="text" class="form-control form-control-sm" name="training_subject[]" placeholder="Subject">
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <input type="text" class="form-control form-control-sm" name="training_duration[]" placeholder="Duration">
                        </div>
                        <div class="col-lg-1 col-md-1 d-flex align-items-center">
                            <button type="button" class="btn btn-danger btn-sm remove-training" onclick="removeTrainingRow(this)">&times;</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="addTrainingRow()">Add Training</button>
            </div>
        </div>

        {{-- Professional Qualification --}}
        <div class="card mb-4 shadow-sm">
<div class="card-header bg-dark text-white fw-bold fs-5">Professional Qualification</div>
            <div class="card-body bg-light">
                <div id="qualification-rows">
                    <div class="row g-2 mb-2 qualification-row">
                        <div class="col-lg-4 col-md-4">
                            <input type="text" class="form-control form-control-sm" name="professional_qualification[]" placeholder="Professional Qualification">
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <input type="text" class="form-control form-control-sm" name="technical_training[]" placeholder="Technical / Specialized Training">
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <input type="text" class="form-control form-control-sm" name="membership[]" placeholder="Membership in Professional Bodies">
                        </div>
                        <div class="col-lg-1 col-md-1 d-flex align-items-center">
                            <button type="button" class="btn btn-danger btn-sm remove-qualification" onclick="removeQualificationRow(this)">&times;</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="addQualificationRow()">Add Qualification</button>
            </div>
        </div>

        {{-- Emergency Contact --}}
        <div class="card mb-4 shadow-sm">
<div class="card-header bg-dark text-white fw-bold fs-5">Emergency Contact</div>
            <div class="card-body bg-light">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Name</label>
<input type="text" class="form-control form-control-sm" name="emergency_name">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Relation</label>
<input type="text" class="form-control form-control-sm" name="emergency_relation">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Address</label>
<input type="text" class="form-control form-control-sm" name="emergency_address">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Telephone No.</label>
<input type="text" class="form-control form-control-sm" name="emergency_telephone">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mobile No.</label>
<input type="text" class="form-control form-control-sm" name="emergency_mobile">
                    </div>
                </div>
            </div>
        </div>

        {{-- Nominee Information --}}
        <div class="card mb-4 shadow-sm">
<div class="card-header bg-dark text-white fw-bold fs-5">Nominee Information</div>
            <div class="card-body bg-light">
                <div id="nominee-rows">
                    <div class="row g-2 mb-2 nominee-row">
                        <div class="col-lg-2 col-md-3">
                            <input type="text" class="form-control form-control-sm" name="nominee_name[]" placeholder="Name">
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <input type="text" class="form-control form-control-sm" name="nominee_relation[]" placeholder="Relation">
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <input type="text" class="form-control form-control-sm" name="nominee_address[]" placeholder="Address">
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <input type="text" class="form-control form-control-sm" name="nominee_tel[]" placeholder="Telephone No.">
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <input type="text" class="form-control form-control-sm" name="nominee_mobile[]" placeholder="Mobile No.">
                        </div>
                        <div class="col-lg-1 col-md-2">
                            <input type="text" class="form-control form-control-sm" name="nominee_percentage[]" placeholder="Percentage">
                        </div>
                        <div class="col-lg-1 col-md-1 d-flex align-items-center">
                            <button type="button" class="btn btn-danger btn-sm remove-nominee" onclick="removeNomineeRow(this)">&times;</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="addNomineeRow()">Add Nominee</button>
            </div>
        </div>

        {{-- Reference --}}
        <div class="card mb-4 shadow-sm">
<div class="card-header bg-dark text-white fw-bold fs-5">Reference</div>
            <div class="card-body bg-light">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
<input type="text" class="form-control form-control-sm" name="ref_name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Designation</label>
<input type="text" class="form-control form-control-sm" name="ref_designation">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Organization Name & Address</label>
<textarea class="form-control form-control-sm" name="ref_org"></textarea>
                </div>
            </div>
        </div>

        <div class="text-end mb-5">
            <button type="submit" class="btn btn-dark btn-lg">Submit</button>
        </div>
    </form>
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
            <div class="col-lg-3 col-md-4">
                <input type="text" class="form-control form-control-sm" name="edu_institute[]" placeholder="School/College/University">
            </div>
            <div class="col-lg-2 col-md-2">
                <input type="text" class="form-control form-control-sm" name="degree[]" placeholder="Degree">
            </div>
            <div class="col-lg-2 col-md-2">
                <input type="text" class="form-control form-control-sm" name="group[]" placeholder="Group">
            </div>
            <div class="col-lg-2 col-md-2">
                <input type="text" class="form-control form-control-sm" name="grade[]" placeholder="Grade/Division/Class">
            </div>
            <div class="col-lg-2 col-md-2">
                <input type="date" class="form-control form-control-sm" name="edu_start[]" placeholder="Start Date">
                <div class="form-text text-muted small">Start Year</div>
            </div>
            <div class="col-lg-2 col-md-2">
                <input type="date" class="form-control form-control-sm" name="edu_end[]" placeholder="End Date">
                <div class="form-text text-muted small">Completion Year</div>
            </div>
            <div class="col-lg-1 col-md-1 d-flex align-items-center">
                <button type="button" class="btn btn-danger btn-sm remove-education" onclick="removeEducationRow(this)">&times;</button>
            </div>
        `;
        container.appendChild(row);
    }

    function removeEducationRow(btn) {
        const row = btn.closest('.education-row');
        if (row) row.remove();
    }
    function addTrainingRow() {
        const container = document.getElementById('training-rows');
        const row = document.createElement('div');
        row.className = 'row g-2 mb-2 training-row';
        row.innerHTML = `
            <div class="col-lg-4 col-md-4">
                <input type="text" class="form-control form-control-sm" name="training_institute[]" placeholder="Institute">
            </div>
            <div class="col-lg-4 col-md-4">
                <input type="text" class="form-control form-control-sm" name="training_subject[]" placeholder="Subject">
            </div>
            <div class="col-lg-3 col-md-3">
                <input type="text" class="form-control form-control-sm" name="training_duration[]" placeholder="Duration">
            </div>
            <div class="col-lg-1 col-md-1 d-flex align-items-center">
                <button type="button" class="btn btn-danger btn-sm remove-training" onclick="removeTrainingRow(this)">&times;</button>
            </div>
        `;
        container.appendChild(row);
    }

    function removeTrainingRow(btn) {
        const row = btn.closest('.training-row');
        if (row) row.remove();
    }

    function addQualificationRow() {
        const container = document.getElementById('qualification-rows');
        const row = document.createElement('div');
        row.className = 'row g-2 mb-2 qualification-row';
        row.innerHTML = `
            <div class="col-lg-4 col-md-4">
                <input type="text" class="form-control form-control-sm" name="professional_qualification[]" placeholder="Professional Qualification">
            </div>
            <div class="col-lg-4 col-md-4">
                <input type="text" class="form-control form-control-sm" name="technical_training[]" placeholder="Technical / Specialized Training">
            </div>
            <div class="col-lg-3 col-md-3">
                <input type="text" class="form-control form-control-sm" name="membership[]" placeholder="Membership in Professional Bodies">
            </div>
            <div class="col-lg-1 col-md-1 d-flex align-items-center">
                <button type="button" class="btn btn-danger btn-sm remove-qualification" onclick="removeQualificationRow(this)">&times;</button>
            </div>
        `;
        container.appendChild(row);
    }

    function removeQualificationRow(btn) {
        const row = btn.closest('.qualification-row');
        if (row) row.remove();
    }
</script>
<script>
    function addNomineeRow() {
        const container = document.getElementById('nominee-rows');
        const row = document.createElement('div');
        row.className = 'row g-2 mb-2 nominee-row';
        row.innerHTML = `
            <div class="col-lg-2 col-md-3">
                <input type="text" class="form-control form-control-sm" name="nominee_name[]" placeholder="Name">
            </div>
            <div class="col-lg-2 col-md-3">
                <input type="text" class="form-control form-control-sm" name="nominee_relation[]" placeholder="Relation">
            </div>
            <div class="col-lg-2 col-md-3">
                <input type="text" class="form-control form-control-sm" name="nominee_address[]" placeholder="Address">
            </div>
            <div class="col-lg-2 col-md-3">
                <input type="text" class="form-control form-control-sm" name="nominee_tel[]" placeholder="Telephone No.">
            </div>
            <div class="col-lg-2 col-md-3">
                <input type="text" class="form-control form-control-sm" name="nominee_mobile[]" placeholder="Mobile No.">
            </div>
            <div class="col-lg-1 col-md-2">
                <input type="text" class="form-control form-control-sm" name="nominee_percentage[]" placeholder="Percentage">
            </div>
            <div class="col-lg-1 col-md-1 d-flex align-items-center">
                <button type="button" class="btn btn-danger btn-sm remove-nominee" onclick="removeNomineeRow(this)">&times;</button>
            </div>
        `;
        container.appendChild(row);
    }

    function removeNomineeRow(btn) {
        const row = btn.closest('.nominee-row');
        if (row) row.remove();
    }
</script>
@endpush
