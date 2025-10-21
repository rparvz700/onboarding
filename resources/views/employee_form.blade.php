@extends('layouts.app')

@section('content')

@php
    $isReadOnly = ($mode === 'view');
    $isEdit = ($mode === 'edit');

@endphp

<div class="employee-form-wrapper">
    <div class="container">
        <!-- Header Section -->
        <div class="form-header">
            <div>
                <a class="navbar-brand logo-icon"> 
                    <img src="https://scommlife.summitcommunications.net/custom/img/logo.png" alt="" style="width:150px; position: relative; transform: translateY(-3px);">
                </a>
            </div>
            <div class="header-content">
                <h1 class="form-title">Employee Information Form</h1>
                <p class="form-subtitle">Please fill in all required information accurately</p>
            </div>
            <div class="progress-indicator">
                <div class="progress-bar">
                    <div class="progress-fill" id="progressFill"></div>
                </div>
                <span class="progress-text">0% Complete</span>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('progressFill').style.width = '100%';
                    document.querySelector('.progress-text').textContent = '100% Complete';
                });
            </script>
        @else
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <fieldset @if(!empty($isReadOnly)) disabled @endif>
                <form method="POST" action="{{ route('employee.store', ['code' => $form->code]) }}" class="employee-form" id="employeeForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="code" value="{{ $form->code }}">
                {{-- Personal Information --}}
                <div class="form-section" data-section="personal">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="section-title">
                            <h2>Personal Information</h2>
                            <p>Basic personal details and identification</p>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label required">Full Name</label>
                                <input type="text" class="form-input" name="name" value="{{ old('name', $employee->name ?? '') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Date of Birth</label>
                                <input type="date" class="form-input" name="dob" value="{{ old('dob', $employee->dob ?? '') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">SCB Account Number</label>
                                <input type="text" class="form-input" name="scb_account" value="{{ old('scb_account', $employee->scb_account ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Cell Number</label>
                                <input type="tel" class="form-input" name="cell_no" value="{{ old('cell_no', $employee->cell_no ?? '') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">E-TIN Number</label>
                                <input type="text" class="form-input" name="etin" value="{{ old('etin', $employee->etin ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Driving License Number</label>
                                <input type="text" class="form-input" name="driving_license" value="{{ old('driving_license', $employee->driving_license ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Marriage Date</label>
                                <input type="date" class="form-input" name="marriage_date" value="{{ old('marriage_date', $employee->marriage_date ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Place of Birth</label>
                                <input type="text" class="form-input" name="place_birth" value="{{ old('place_birth', $employee->place_birth ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Passport Number</label>
                                <input type="text" class="form-input" name="passport_no" value="{{ old('passport_no', $employee->passport_no ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Gender</label>
                                <select class="form-select" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{ (old('gender', $employee->gender ?? '') == 'Male') ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ (old('gender', $employee->gender ?? '') == 'Female') ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ (old('gender', $employee->gender ?? '') == 'Other') ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Passport Place of Issue</label>
                                <input type="text" class="form-input" name="passport_place_issue" value="{{ old('passport_place_issue', $employee->passport_place_issue ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Passport Expiry Date</label>
                                <input type="date" class="form-input" name="passport_expiry" value="{{ old('passport_expiry', $employee->passport_expiry ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Nationality</label>
                                <input type="text" class="form-input" name="nationality" value="{{ old('nationality', $employee->nationality ?? 'Bangladeshi') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Blood Group</label>
                                <select class="form-select" name="blood_group">
                                    <option value="">Select Blood Group</option>
                                    @php
                                        $bloodGroups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                                        $selectedBloodGroup = old('blood_group', $employee->blood_group ?? '');
                                    @endphp
                                    @foreach($bloodGroups as $group)
                                        <option value="{{ $group }}" {{ ($selectedBloodGroup == $group) ? 'selected' : '' }}>{{ $group }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Religion</label>
                                <input type="text" class="form-input" name="religion" value="{{ old('religion', $employee->religion ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Marital Status</label>
                                <select class="form-select" name="marital_status">
                                    <option value="">Select Status</option>
                                    @php
                                        $maritalStatuses = ['Single', 'Married', 'Divorced', 'Widowed'];
                                        $selectedMaritalStatus = old('marital_status', $employee->marital_status ?? '');
                                    @endphp
                                    @foreach($maritalStatuses as $status)
                                        <option value="{{ $status }}" {{ ($selectedMaritalStatus == $status) ? 'selected' : '' }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group required">
                                <label class="form-label required">National ID Card Number</label>
                                <input type="text" class="form-input" name="nid" value="{{ old('nid', $employee->nid ?? '') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">NID Place of Issue</label>
                                <input type="text" class="form-input" name="nid_place_issue" value="{{ old('nid_place_issue', $employee->nid_place_issue ?? '') }}">
                            </div>
                            
                          <!-- Passport Photo Upload -->
                            <div class="form-group passport-photo-upload">
                                <label class="form-label">Passport Size Photo</label>
                                <div class="file-upload-container">
                                    <div class="file-upload-wrapper">
                                        <input type="file" class="form-input" name="passport_photo" id="passport_photo" accept="image/*">
                                        <label for="passport_photo" class="file-upload-btn">
                                            <div class="file-upload-icon">
                                                <i class="fas fa-camera"></i>
                                            </div>
                                            <div class="file-upload-text">
                                                <span class="file-upload-main">Upload Passport Photo</span>
                                                <span class="file-upload-sub">Click to browse or drag and drop</span>
                                                <span class="file-upload-sub">JPG, PNG, or GIF (Max: 2MB)</span>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="file-preview" id="passport_photo_preview">
                                        <img class="file-preview-image" id="passport_photo_img" src="" alt="Preview" onclick="openImageModal(this.src, 'Passport Photo')">
                                        <div class="file-preview-info">
                                            <div class="file-preview-name" id="passport_photo_name"></div>
                                            <div class="file-preview-size" id="passport_photo_size"></div>
                                        </div>
                                        <div class="file-preview-actions">
                                            <button type="button" class="file-remove-btn" onclick="removeFile('passport_photo')">
                                                <i class="fas fa-trash"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                    <div class="upload-progress" id="passport_photo_progress">
                                        <div class="upload-progress-fill"></div>
                                    </div>
                                    <div class="file-error-message" id="passport_photo_error"></div>
                                </div>
                            </div>

                            <!-- Signature Upload -->
                            <div class="form-group signature-upload">
                                <label class="form-label">Signature</label>
                                <div class="file-upload-container">
                                    <div class="file-upload-wrapper">
                                        <input type="file" class="form-input" name="signature" id="signature" accept="image/*">
                                        <label for="signature" class="file-upload-btn">
                                            <div class="file-upload-icon">
                                                <i class="fas fa-signature"></i>
                                            </div>
                                            <div class="file-upload-text">
                                                <span class="file-upload-main">Upload Signature</span>
                                                <span class="file-upload-sub">Click to browse or drag and drop</span>
                                                <span class="file-upload-sub">JPG, PNG, or GIF (Max: 1MB)</span>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="file-preview" id="signature_preview">
                                        <img class="file-preview-image" id="signature_img" src="" alt="Preview" onclick="openImageModal(this.src, 'Signature')">
                                        <div class="file-preview-info">
                                            <div class="file-preview-name" id="signature_name"></div>
                                            <div class="file-preview-size" id="signature_size"></div>
                                        </div>
                                        <div class="file-preview-actions">
                                            <button type="button" class="file-remove-btn" onclick="removeFile('signature')">
                                                <i class="fas fa-trash"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                    <div class="upload-progress" id="signature_progress">
                                        <div class="upload-progress-fill"></div>
                                    </div>
                                    <div class="file-error-message" id="signature_error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Address Information --}}
                <div class="form-section" data-section="address">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="section-title">
                            <h2>Address Information</h2>
                            <p>Current and permanent address details</p>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="address-section">
                            <h3 class="subsection-title">Present Address</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label">House Number</label>
                                    <input type="text" class="form-input" name="present_house_no" value="{{ old('present_house_no', $employee->present_house_no ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Plot/Road Number</label>
                                    <input type="text" class="form-input" name="present_road_no" value="{{ old('present_road_no', $employee->present_road_no ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Apartment Number</label>
                                    <input type="text" class="form-input" name="present_apt_no" value="{{ old('present_apt_no', $employee->present_apt_no ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Building Name/Number</label>
                                    <input type="text" class="form-input" name="present_building" value="{{ old('present_building', $employee->present_building ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Area</label>
                                    <input type="text" class="form-input" name="present_area" value="{{ old('present_area', $employee->present_area ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">District</label>
                                    <input type="text" class="form-input" name="present_district" value="{{ old('present_district', $employee->present_district ?? '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="address-section">
                            <h3 class="subsection-title">Permanent Address</h3>
                            <div class="form-grid">
                                <div class="form-group full-width">
                                    <label class="form-label">Complete Address</label>
                                    <textarea class="form-textarea" name="permanent_address" rows="3" placeholder="Enter complete permanent address">{{ old('permanent_address', $employee->permanent_address ?? '') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Home District</label>
                                    <input type="text" class="form-input" name="home_district" value="{{ old('home_district', $employee->home_district ?? '') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Family Information --}}
                <div class="form-section" data-section="family">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="section-title">
                            <h2>Family Information</h2>
                            <p>Details about family members</p>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Father's Name</label>
                                <input type="text" class="form-input" name="father_name" value="{{ old('father_name', $employee->father_name ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mother's Name</label>
                                <input type="text" class="form-input" name="mother_name" value="{{ old('mother_name', $employee->mother_name ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Spouse Name</label>
                                <input type="text" class="form-input" name="spouse_name" value="{{ old('spouse_name', $employee->spouse_name ?? '') }}">
                            </div>
                        </div>
                        
                        <div class="dynamic-section">
                            <h3 class="subsection-title">Children Information</h3>
                            <div id="children-rows" class="dynamic-rows">
                                @if(isset($employee) && isset($employee->children) && count($employee->children) > 0)
                                    @foreach($employee->children as $index => $child)
                                        <div class="dynamic-row children-row">
                                            <div class="form-group">
                                                <label class="form-label">Child Name</label>
                                                <input type="text" class="form-input" name="children_name[]" value="{{ old('children_name.'.$index, $child->name ?? '') }}" placeholder="Enter child's name">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Date of Birth</label>
                                                <input type="date" class="form-input" name="children_dob[]" value="{{ old('children_dob.'.$index, $child->dob ?? '') }}">
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn-remove" onclick="removeChildRow(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="dynamic-row children-row">
                                        <div class="form-group">
                                            <label class="form-label">Child Name</label>
                                            <input type="text" class="form-input" name="children_name[]" placeholder="Enter child's name">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" class="form-input" name="children_dob[]">
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn-remove" onclick="removeChildRow(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn-add" onclick="addChildRow()">
                                <i class="fas fa-plus"></i> Add Child
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Educational Information --}}
                <div class="form-section" data-section="education">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="section-title">
                            <h2>Educational Information</h2>
                            <p>Academic qualifications and institutions</p>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="dynamic-section">
                            <div id="education-rows" class="dynamic-rows">
                                @if(isset($employee) && isset($employee->educations) && count($employee->educations) > 0)
                                    @foreach($employee->educations as $index => $education)
                                        <div class="dynamic-row education-row">
                                            <div class="form-group">
                                                <label class="form-label">Institution</label>
                                                <input type="text" class="form-input" name="edu_institute[]" value="{{ old('edu_institute.'.$index, $education->institute ?? '') }}" placeholder="School/College/University">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Degree</label>
                                                <input type="text" class="form-input" name="degree[]" value="{{ old('degree.'.$index, $education->degree ?? '') }}" placeholder="Degree/Certificate">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Group/Subject</label>
                                                <input type="text" class="form-input" name="group[]" value="{{ old('group.'.$index, $education->group ?? '') }}" placeholder="Major/Group">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Grade/Result</label>
                                                <input type="text" class="form-input" name="grade[]" value="{{ old('grade.'.$index, $education->grade ?? '') }}" placeholder="Grade/Division/Class">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Start Date</label>
                                                <input type="date" class="form-input" name="edu_start[]" value="{{ old('edu_start.'.$index, $education->start_date ?? '') }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">End Date</label>
                                                <input type="date" class="form-input" name="edu_end[]" value="{{ old('edu_end.'.$index, $education->end_date ?? '') }}">
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn-remove" onclick="removeEducationRow(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="dynamic-row education-row">
                                        <div class="form-group">
                                            <label class="form-label">Institution</label>
                                            <input type="text" class="form-input" name="edu_institute[]" placeholder="School/College/University">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Degree</label>
                                            <input type="text" class="form-input" name="degree[]" placeholder="Degree/Certificate">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Group/Subject</label>
                                            <input type="text" class="form-input" name="group[]" placeholder="Major/Group">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Grade/Result</label>
                                            <input type="text" class="form-input" name="grade[]" placeholder="Grade/Division/Class">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Start Date</label>
                                            <input type="date" class="form-input" name="edu_start[]">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">End Date</label>
                                            <input type="date" class="form-input" name="edu_end[]">
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn-remove" onclick="removeEducationRow(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn-add" onclick="addEducationRow()">
                                <i class="fas fa-plus"></i> Add Education
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Training & Courses --}}
                <div class="form-section" data-section="training">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="section-title">
                            <h2>Training & Courses</h2>
                            <p>Professional training and certifications</p>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="dynamic-section">
                            <div id="training-rows" class="dynamic-rows">
                                @if(isset($employee) && isset($employee->trainings) && count($employee->trainings) > 0)
                                    @foreach($employee->trainings as $index => $training)
                                        <div class="dynamic-row training-row">
                                            <div class="form-group">
                                                <label class="form-label">Institute</label>
                                                <input type="text" class="form-input" name="training_institute[]" value="{{ old('training_institute.'.$index, $training->institute ?? '') }}" placeholder="Training Institute">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Subject</label>
                                                <input type="text" class="form-input" name="training_subject[]" value="{{ old('training_subject.'.$index, $training->subject ?? '') }}" placeholder="Training Subject">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Duration</label>
                                                <input type="text" class="form-input" name="training_duration[]" value="{{ old('training_duration.'.$index, $training->duration ?? '') }}" placeholder="Duration">
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn-remove" onclick="removeTrainingRow(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="dynamic-row training-row">
                                        <div class="form-group">
                                            <label class="form-label">Institute</label>
                                            <input type="text" class="form-input" name="training_institute[]" placeholder="Training Institute">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Subject</label>
                                            <input type="text" class="form-input" name="training_subject[]" placeholder="Training Subject">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Duration</label>
                                            <input type="text" class="form-input" name="training_duration[]" placeholder="Duration">
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn-remove" onclick="removeTrainingRow(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn-add" onclick="addTrainingRow()">
                                <i class="fas fa-plus"></i> Add Training
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Professional Qualification --}}
                <div class="form-section" data-section="qualification">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="section-title">
                            <h2>Professional Qualification</h2>
                            <p>Professional certifications and memberships</p>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="dynamic-section">
                            <div id="qualification-rows" class="dynamic-rows">
                                @if(isset($employee) && isset($employee->qualifications) && count($employee->qualifications) > 0)
                                    @foreach($employee->qualifications as $index => $qualification)
                                        <div class="dynamic-row qualification-row">
                                            <div class="form-group">
                                                <label class="form-label">Professional Qualification</label>
                                                <input type="text" class="form-input" name="professional_qualification[]" value="{{ old('professional_qualification.'.$index, $qualification->professional_qualification ?? '') }}" placeholder="Qualification">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Technical Training</label>
                                                <input type="text" class="form-input" name="technical_training[]" value="{{ old('technical_training.'.$index, $qualification->technical_training ?? '') }}" placeholder="Technical/Specialized Training">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Professional Membership</label>
                                                <input type="text" class="form-input" name="membership[]" value="{{ old('membership.'.$index, $qualification->membership ?? '') }}" placeholder="Professional Bodies">
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn-remove" onclick="removeQualificationRow(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="dynamic-row qualification-row">
                                        <div class="form-group">
                                            <label class="form-label">Professional Qualification</label>
                                            <input type="text" class="form-input" name="professional_qualification[]" placeholder="Qualification">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Technical Training</label>
                                            <input type="text" class="form-input" name="technical_training[]" placeholder="Technical/Specialized Training">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Professional Membership</label>
                                            <input type="text" class="form-input" name="membership[]" placeholder="Professional Bodies">
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn-remove" onclick="removeQualificationRow(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn-add" onclick="addQualificationRow()">
                                <i class="fas fa-plus"></i> Add Qualification
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Emergency Contact --}}
                <div class="form-section" data-section="emergency">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="section-title">
                            <h2>Emergency Contact</h2>
                            <p>Person to contact in case of emergency</p>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label required">Name</label>
                                <input type="text" class="form-input" name="emergency_name" value="{{ old('emergency_name', $employee->emergency_name ?? '') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Relation</label>
                                <input type="text" class="form-input" name="emergency_relation" value="{{ old('emergency_relation', $employee->emergency_relation ?? '') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-input" name="emergency_address" value="{{ old('emergency_address', $employee->emergency_address ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Telephone Number</label>
                                <input type="tel" class="form-input" name="emergency_telephone" value="{{ old('emergency_telephone', $employee->emergency_telephone ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Mobile Number</label>
                                <input type="tel" class="form-input" name="emergency_mobile" value="{{ old('emergency_mobile', $employee->emergency_mobile ?? '') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Nominee Information --}}
                <div class="form-section" data-section="nominee">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="section-title">
                            <h2>Nominee Information</h2>
                            <p>Beneficiary information for company benefits</p>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="dynamic-section">
                            <div id="nominee-rows" class="dynamic-rows">
                                @if(isset($employee) && isset($employee->nominees) && count($employee->nominees) > 0)
                                    @foreach($employee->nominees as $index => $nominee)
                                        <div class="dynamic-row nominee-row">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-input" name="nominee_name[]" value="{{ old('nominee_name.'.$index, $nominee->name ?? '') }}" placeholder="Nominee Name">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Relation</label>
                                                <input type="text" class="form-input" name="nominee_relation[]" value="{{ old('nominee_relation.'.$index, $nominee->relation ?? '') }}" placeholder="Relation">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-input" name="nominee_address[]" value="{{ old('nominee_address.'.$index, $nominee->address ?? '') }}" placeholder="Address">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Telephone</label>
                                                <input type="tel" class="form-input" name="nominee_tel[]" value="{{ old('nominee_tel.'.$index, $nominee->telephone ?? '') }}" placeholder="Telephone">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Mobile</label>
                                                <input type="tel" class="form-input" name="nominee_mobile[]" value="{{ old('nominee_mobile.'.$index, $nominee->mobile ?? '') }}" placeholder="Mobile">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Percentage</label>
                                                <input type="number" class="form-input" name="nominee_percentage[]" value="{{ old('nominee_percentage.'.$index, $nominee->percentage ?? '') }}" placeholder="%" min="1" max="100">
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn-remove" onclick="removeNomineeRow(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="dynamic-row nominee-row">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-input" name="nominee_name[]" placeholder="Nominee Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Relation</label>
                                            <input type="text" class="form-input" name="nominee_relation[]" placeholder="Relation">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-input" name="nominee_address[]" placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Telephone</label>
                                            <input type="tel" class="form-input" name="nominee_tel[]" placeholder="Telephone">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Mobile</label>
                                            <input type="tel" class="form-input" name="nominee_mobile[]" placeholder="Mobile">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Percentage</label>
                                            <input type="number" class="form-input" name="nominee_percentage[]" placeholder="%" min="1" max="100">
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn-remove" onclick="removeNomineeRow(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn-add" onclick="addNomineeRow()">
                                <i class="fas fa-plus"></i> Add Nominee
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Reference --}}
                <div class="form-section" data-section="reference">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="section-title">
                            <h2>Reference</h2>
                            <p>Professional reference information</p>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Reference Name</label>
                                <input type="text" class="form-input" name="ref_name" value="{{ old('ref_name', $employee->ref_name ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Designation</label>
                                <input type="text" class="form-input" name="ref_designation" value="{{ old('ref_designation', $employee->ref_designation ?? '') }}">
                            </div>
                            <div class="form-group full-width">
                                <label class="form-label">Organization Name & Address</label>
                                <textarea class="form-textarea" name="ref_org" rows="3" placeholder="Organization name and complete address">{{ old('ref_org', $employee->ref_org ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Form Actions --}}
                <div class="form-actions-section">
                    <div class="form-actions-content">
                        <button type="button" class="btn-secondary" onclick="window.history.back()">
                            <i class="fas fa-arrow-left"></i> Back
                        </button>
                        <div class="form-actions-right">
                            <button type="button" class="btn-secondary" id="saveAsDraftBtn">
                                <i class="fas fa-save"></i> Save as Draft
                            </button>
                            <button type="submit" class="btn-primary">
                                <i class="fas fa-check"></i> Submit Form
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            </fieldset>
            
        @endif
    </div>
</div>

<!-- Image Preview Modal -->
<div id="imageModal" class="image-modal" onclick="closeImageModal()">
    <span class="modal-close">&times;</span>
    <div class="modal-content-wrapper">
        <img class="modal-content" id="modalImage">
        <div id="modalCaption"></div>
    </div>
</div>

<style>
/* Image Modal Styles */
.image-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.9);
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.modal-content-wrapper {
    position: relative;
    margin: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    padding: 40px 20px;
}

.modal-content {
    max-width: 90%;
    max-height: 85vh;
    object-fit: contain;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
    animation: zoomIn 0.3s ease-in-out;
}

@keyframes zoomIn {
    from { transform: scale(0.8); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

.modal-close {
    position: absolute;
    top: 20px;
    right: 35px;
    color: #fff;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
    transition: color 0.3s;
    z-index: 10000;
}

.modal-close:hover,
.modal-close:focus {
    color: #bbb;
}

#modalCaption {
    margin-top: 20px;
    text-align: center;
    color: #ccc;
    font-size: 18px;
    padding: 10px 20px;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 4px;
}

/* Add cursor pointer to preview images */
.file-preview-image {
    cursor: pointer;
    transition: transform 0.2s;
}

.file-preview-image:hover {
    transform: scale(1.05);
}
</style>
<style>
.form-actions-section {
    position: sticky;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: -100;
    transform: translateY(100%);
    opacity: 0;
    transition: transform 0.4s ease-in-out, opacity 0.4s ease-in-out, background 0.4s ease-in-out, z-index 0s 0.4s;
}

.form-actions-section.top {
    z-index: -100;
    transform: translateY(100%);
    opacity: 0;
    background: #cb1b1b75 !important;
}

.form-actions-section.scrolled {
    z-index: 100;
    transform: translateY(0);
    opacity: 1;
    background: #ffffff10 !important;
    box-shadow: 0 -4px 20px rgba(98, 98, 98, 0.95);
    transition: transform 0.4s ease-in-out, opacity 0.4s ease-in-out, background 0.4s ease-in-out, z-index 0s;
}

.form-actions-section.bottom {
    position: sticky;
    z-index: 100;
    transform: translateY(0);
    opacity: 1;
    background: #ffffffff !important;
    box-shadow: none;
    transition: transform 0.4s ease-in-out, opacity 0.4s ease-in-out, background 0.4s ease-in-out, z-index 0s;
}

.form-actions-content {
    background: #ffffff77 !important;
    padding: 10px 10px !important;
}
</style>
@push('scripts')
<script>
    // Employee data for JavaScript use
    const employeeData = @json($employee ?? null);
    
    // Dynamic row management functions
    function addChildRow() {
        const container = document.getElementById('children-rows');
        const row = document.createElement('div');
        row.className = 'dynamic-row children-row';
        row.innerHTML = `
            <div class="form-group">
                <label class="form-label">Child Name</label>
                <input type="text" class="form-input" name="children_name[]" placeholder="Enter child's name">
            </div>
            <div class="form-group">
                <label class="form-label">Date of Birth</label>
                <input type="date" class="form-input" name="children_dob[]">
            </div>
            <div class="form-actions">
                <button type="button" class="btn-remove" onclick="removeChildRow(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(row);
        updateProgress();
    }

    function removeChildRow(btn) {
        const row = btn.closest('.children-row');
        if (row) {
            row.remove();
            updateProgress();
        }
    }

    function addEducationRow() {
        const container = document.getElementById('education-rows');
        const row = document.createElement('div');
        row.className = 'dynamic-row education-row';
        row.innerHTML = `
            <div class="form-group">
                <label class="form-label">Institution</label>
                <input type="text" class="form-input" name="edu_institute[]" placeholder="School/College/University">
            </div>
            <div class="form-group">
                <label class="form-label">Degree</label>
                <input type="text" class="form-input" name="degree[]" placeholder="Degree/Certificate">
            </div>
            <div class="form-group">
                <label class="form-label">Group/Subject</label>
                <input type="text" class="form-input" name="group[]" placeholder="Major/Group">
            </div>
            <div class="form-group">
                <label class="form-label">Grade/Result</label>
                <input type="text" class="form-input" name="grade[]" placeholder="Grade/Division/Class">
            </div>
            <div class="form-group">
                <label class="form-label">Start Date</label>
                <input type="date" class="form-input" name="edu_start[]">
            </div>
            <div class="form-group">
                <label class="form-label">End Date</label>
                <input type="date" class="form-input" name="edu_end[]">
            </div>
            <div class="form-actions">
                <button type="button" class="btn-remove" onclick="removeEducationRow(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(row);
        updateProgress();
    }

    function removeEducationRow(btn) {
        const row = btn.closest('.education-row');
        if (row) {
            row.remove();
            updateProgress();
        }
    }

    function addTrainingRow() {
        const container = document.getElementById('training-rows');
        const row = document.createElement('div');
        row.className = 'dynamic-row training-row';
        row.innerHTML = `
            <div class="form-group">
                <label class="form-label">Institute</label>
                <input type="text" class="form-input" name="training_institute[]" placeholder="Training Institute">
            </div>
            <div class="form-group">
                <label class="form-label">Subject</label>
                <input type="text" class="form-input" name="training_subject[]" placeholder="Training Subject">
            </div>
            <div class="form-group">
                <label class="form-label">Duration</label>
                <input type="text" class="form-input" name="training_duration[]" placeholder="Duration">
            </div>
            <div class="form-actions">
                <button type="button" class="btn-remove" onclick="removeTrainingRow(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(row);
        updateProgress();
    }

    function removeTrainingRow(btn) {
        const row = btn.closest('.training-row');
        if (row) {
            row.remove();
            updateProgress();
        }
    }

    function addQualificationRow() {
        const container = document.getElementById('qualification-rows');
        const row = document.createElement('div');
        row.className = 'dynamic-row qualification-row';
        row.innerHTML = `
            <div class="form-group">
                <label class="form-label">Professional Qualification</label>
                <input type="text" class="form-input" name="professional_qualification[]" placeholder="Qualification">
            </div>
            <div class="form-group">
                <label class="form-label">Technical Training</label>
                <input type="text" class="form-input" name="technical_training[]" placeholder="Technical/Specialized Training">
            </div>
            <div class="form-group">
                <label class="form-label">Professional Membership</label>
                <input type="text" class="form-input" name="membership[]" placeholder="Professional Bodies">
            </div>
            <div class="form-actions">
                <button type="button" class="btn-remove" onclick="removeQualificationRow(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(row);
        updateProgress();
    }

    function removeQualificationRow(btn) {
        const row = btn.closest('.qualification-row');
        if (row) {
            row.remove();
            updateProgress();
        }
    }

    function addNomineeRow() {
        const container = document.getElementById('nominee-rows');
        const row = document.createElement('div');
        row.className = 'dynamic-row nominee-row';
        row.innerHTML = `
            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" class="form-input" name="nominee_name[]" placeholder="Nominee Name">
            </div>
            <div class="form-group">
                <label class="form-label">Relation</label>
                <input type="text" class="form-input" name="nominee_relation[]" placeholder="Relation">
            </div>
            <div class="form-group">
                <label class="form-label">Address</label>
                <input type="text" class="form-input" name="nominee_address[]" placeholder="Address">
            </div>
            <div class="form-group">
                <label class="form-label">Telephone</label>
                <input type="tel" class="form-input" name="nominee_tel[]" placeholder="Telephone">
            </div>
            <div class="form-group">
                <label class="form-label">Mobile</label>
                <input type="tel" class="form-input" name="nominee_mobile[]" placeholder="Mobile">
            </div>
            <div class="form-group">
                <label class="form-label">Percentage</label>
                <input type="number" class="form-input" name="nominee_percentage[]" placeholder="%" min="1" max="100">
            </div>
            <div class="form-actions">
                <button type="button" class="btn-remove" onclick="removeNomineeRow(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(row);
        updateProgress();
    }

    function removeNomineeRow(btn) {
        const row = btn.closest('.nominee-row');
        if (row) {
            row.remove();
            updateProgress();
        }
    }

    // Progress tracking
    function updateProgress() {
        const form = document.getElementById('employeeForm');
        const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
        const filled = Array.from(inputs).filter(input => input.value.trim() !== '').length;
        const percentage = Math.round((filled / inputs.length) * 100);
        
        const progressFill = document.getElementById('progressFill');
        const progressText = document.querySelector('.progress-text');
        
        progressFill.style.width = percentage + '%';
        progressText.textContent = percentage + '% Complete';
    }

    // Form validation
    function validateForm() {
        const form = document.getElementById('employeeForm');
        const requiredInputs = form.querySelectorAll('input[required], select[required], textarea[required]');
        let isValid = true;
        
        requiredInputs.forEach(input => {
            if (!input.value.trim()) {
                input.classList.add('error');
                isValid = false;
            } else {
                input.classList.remove('error');
            }
        });
        
        return isValid;
    }

    // Initialize existing file previews
    function initializeExistingFiles() {
        if (employeeData) {
            // Show existing passport photo
            if (employeeData.passport_photo) {
                showExistingFilePreview('passport_photo', employeeData.passport_photo);
            }
            
            // Show existing signature
            if (employeeData.signature) {
                showExistingFilePreview('signature', employeeData.signature);
            }
        }
    }

    function showExistingFilePreview(inputId, filePath) {
        const uploadBtn = document.querySelector(`label[for="${inputId}"]`);
        const preview = document.getElementById(inputId + '_preview');
        const img = document.getElementById(inputId + '_img');
        const nameEl = document.getElementById(inputId + '_name');
        const sizeEl = document.getElementById(inputId + '_size');

        // Set the image source to the file path with proper URL
        img.src = '{{ asset("storage") }}/' + filePath;
        nameEl.textContent = filePath.split('/').pop(); // Extract filename
        sizeEl.textContent = 'Existing file';
        
        // Show preview and mark as success
        preview.classList.add('show');
        uploadBtn.classList.add('success');
    }

    // Initialize form
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize existing file previews
        initializeExistingFiles();
        
        // Add event listeners for progress tracking
        const form = document.getElementById('employeeForm');
        form.addEventListener('input', updateProgress);
        form.addEventListener('change', updateProgress);
        
        // Form submission
        form.addEventListener('submit', function(e) {
            if (!validateForm()) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
        
        // Save as draft functionality
        document.getElementById('saveAsDraftBtn').addEventListener('click', function () {
            const form = document.querySelector('form');
            const formData = new FormData(form);
            const code = "{{ $form->code }}";

            fetch("{{ route('employee.save-draft', ['code' => $form->code]) }}", {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert(data.message); // "Draft saved successfully!"
                }
            })
            .catch(err => console.error(err));            
        });

        // Initial progress calculation
        updateProgress();
        
        // Smooth scrolling for form sections
        // const sections = document.querySelectorAll('.form-section');
        // sections.forEach(section => {
        //     section.addEventListener('click', function() {
        //         this.scrollIntoView({ behavior: 'smooth', block: 'start' });
        //     });
        // });
    });
</script>
<!-- JavaScript for File Upload Functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize file upload handlers
    initializeFileUpload('passport_photo', 2 * 1024 * 1024); // 2MB limit
    initializeFileUpload('signature', 1 * 1024 * 1024); // 1MB limit
});

function initializeFileUpload(inputId, maxSize) {
    const input = document.getElementById(inputId);
    const uploadBtn = input.nextElementSibling;
    const preview = document.getElementById(inputId + '_preview');
    const progress = document.getElementById(inputId + '_progress');
    const errorMsg = document.getElementById(inputId + '_error');

    // File input change handler
    input.addEventListener('change', function(e) {
        handleFileSelect(e.target.files[0], inputId, maxSize);
    });

    // Drag and drop handlers
    uploadBtn.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadBtn.classList.add('dragover');
    });

    uploadBtn.addEventListener('dragleave', function(e) {
        e.preventDefault();
        uploadBtn.classList.remove('dragover');
    });

    uploadBtn.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadBtn.classList.remove('dragover');
        const file = e.dataTransfer.files[0];
        handleFileSelect(file, inputId, maxSize);
        
        // Update the input element
        const dt = new DataTransfer();
        dt.items.add(file);
        input.files = dt.files;
    });
}

function handleFileSelect(file, inputId, maxSize) {
    const uploadBtn = document.querySelector(`label[for="${inputId}"]`);
    const preview = document.getElementById(inputId + '_preview');
    const progress = document.getElementById(inputId + '_progress');
    const errorMsg = document.getElementById(inputId + '_error');

    // Hide previous error
    errorMsg.classList.remove('show');
    uploadBtn.classList.remove('error', 'success');

    if (!file) return;

    // Validate file type
    if (!file.type.startsWith('image/')) {
        showError(errorMsg, 'Please select a valid image file.');
        uploadBtn.classList.add('error');
        return;
    }

    // Validate file size
    if (file.size > maxSize) {
        const maxSizeMB = (maxSize / (1024 * 1024)).toFixed(1);
        showError(errorMsg, `File size must be less than ${maxSizeMB}MB.`);
        uploadBtn.classList.add('error');
        return;
    }

    // Show upload progress
    uploadBtn.classList.add('uploading');
    progress.classList.add('show');

    // Simulate upload progress (replace with actual upload logic)
    simulateUpload(progress, function() {
        uploadBtn.classList.remove('uploading');
        uploadBtn.classList.add('success');
        progress.classList.remove('show');
        showPreview(file, inputId);
    });
}

function showPreview(file, inputId) {
    const preview = document.getElementById(inputId + '_preview');
    const img = document.getElementById(inputId + '_img');
    const nameEl = document.getElementById(inputId + '_name');
    const sizeEl = document.getElementById(inputId + '_size');

    // Show file preview
    const reader = new FileReader();
    reader.onload = function(e) {
        img.src = e.target.result;
        nameEl.textContent = file.name;
        sizeEl.textContent = formatFileSize(file.size);
        preview.classList.add('show');
    };
    reader.readAsDataURL(file);
}

function removeFile(inputId) {
    const input = document.getElementById(inputId);
    const uploadBtn = document.querySelector(`label[for="${inputId}"]`);
    const preview = document.getElementById(inputId + '_preview');
    const errorMsg = document.getElementById(inputId + '_error');

    // Clear input
    input.value = '';
    
    // Hide preview
    preview.classList.remove('show');
    
    // Reset button state
    uploadBtn.classList.remove('success', 'error', 'uploading');
    
    // Hide error message
    errorMsg.classList.remove('show');
}

function showError(errorEl, message) {
    errorEl.textContent = message;
    errorEl.classList.add('show');
}

function simulateUpload(progressEl, callback) {
    const progressFill = progressEl.querySelector('.upload-progress-fill');
    let progress = 0;
    
    const interval = setInterval(() => {
        progress += Math.random() * 15;
        if (progress >= 100) {
            progress = 100;
            clearInterval(interval);
            setTimeout(callback, 300);
        }
        progressFill.style.width = progress + '%';
    }, 100);
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

// Image Modal Functions
function openImageModal(imageSrc, caption) {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const modalCaption = document.getElementById('modalCaption');
    
    modal.style.display = 'block';
    modalImg.src = imageSrc;
    modalCaption.textContent = caption;
    
    // Prevent body scrolling when modal is open
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.style.display = 'none';
    
    // Re-enable body scrolling
    document.body.style.overflow = 'auto';
}

// Close modal on Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeImageModal();
    }
});

</script>
<script>
let lastScrollY = window.scrollY;
let ticking = false;

function updateActionBar() {
    const actionSection = document.querySelector('.form-actions-section');
    const scrollY = window.scrollY;
    const scrollHeight = document.documentElement.scrollHeight;
    const windowHeight = window.innerHeight;
    const bottomThreshold = scrollHeight - windowHeight - 200;
    
    // Remove all classes first for clean transition
    actionSection.classList.remove('top', 'scrolled', 'bottom');
    
    // Force reflow to ensure transition works
    void actionSection.offsetWidth;
    
    if (scrollY < 500) {
        console.log("-----TOP------");
        actionSection.classList.add('top');
    } else if (scrollY >= 200 && scrollY < bottomThreshold) {
        console.log("-----SCROLL------");
        actionSection.classList.add('scrolled');
    } else {
        console.log("-----BOTTOM------");
        actionSection.classList.add('bottom');
    }
    
    ticking = false;
}

window.addEventListener('scroll', function() {
    lastScrollY = window.scrollY;
    
    if (!ticking) {
        window.requestAnimationFrame(function() {
            updateActionBar();
        });
        ticking = true;
    }
});

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    updateActionBar();
});
</script>
@endpush