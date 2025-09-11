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
                                <input type="text" class="form-input" name="name" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Date of Birth</label>
                                <input type="date" class="form-input" name="dob" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">SCB Account Number</label>
                                <input type="text" class="form-input" name="scb_account">
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Cell Number</label>
                                <input type="tel" class="form-input" name="cell_no" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">E-TIN Number</label>
                                <input type="text" class="form-input" name="etin">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Driving License Number</label>
                                <input type="text" class="form-input" name="driving_license">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Marriage Date</label>
                                <input type="date" class="form-input" name="marriage_date">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Place of Birth</label>
                                <input type="text" class="form-input" name="place_birth">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Passport Number</label>
                                <input type="text" class="form-input" name="passport_no">
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Gender</label>
                                <select class="form-select" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Passport Place of Issue</label>
                                <input type="text" class="form-input" name="passport_place_issue">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Passport Expiry Date</label>
                                <input type="date" class="form-input" name="passport_expiry">
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Nationality</label>
                                <input type="text" class="form-input" name="nationality" value="Bangladeshi" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Blood Group</label>
                                <select class="form-select" name="blood_group">
                                    <option value="">Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Religion</label>
                                <input type="text" class="form-input" name="religion">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Marital Status</label>
                                <select class="form-select" name="marital_status">
                                    <option value="">Select Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                            </div>
                            <div class="form-group required">
                                <label class="form-label required">National ID Card Number</label>
                                <input type="text" class="form-input" name="nid" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">NID Place of Issue</label>
                                <input type="text" class="form-input" name="nid_place_issue">
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
                                        <img class="file-preview-image" id="passport_photo_img" src="" alt="Preview">
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
                                        <img class="file-preview-image" id="signature_img" src="" alt="Preview">
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
                                    <input type="text" class="form-input" name="present_house_no">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Plot/Road Number</label>
                                    <input type="text" class="form-input" name="present_road_no">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Apartment Number</label>
                                    <input type="text" class="form-input" name="present_apt_no">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Building Name/Number</label>
                                    <input type="text" class="form-input" name="present_building">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Area</label>
                                    <input type="text" class="form-input" name="present_area">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">District</label>
                                    <input type="text" class="form-input" name="present_district">
                                </div>
                            </div>
                        </div>
                        <div class="address-section">
                            <h3 class="subsection-title">Permanent Address</h3>
                            <div class="form-grid">
                                <div class="form-group full-width">
                                    <label class="form-label">Complete Address</label>
                                    <textarea class="form-textarea" name="permanent_address" rows="3" placeholder="Enter complete permanent address"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Home District</label>
                                    <input type="text" class="form-input" name="home_district">
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
                                <input type="text" class="form-input" name="father_name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mother's Name</label>
                                <input type="text" class="form-input" name="mother_name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Spouse Name</label>
                                <input type="text" class="form-input" name="spouse_name">
                            </div>
                        </div>
                        
                        <div class="dynamic-section">
                            <h3 class="subsection-title">Children Information</h3>
                            <div id="children-rows" class="dynamic-rows">
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
                                <input type="text" class="form-input" name="emergency_name" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Relation</label>
                                <input type="text" class="form-input" name="emergency_relation" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-input" name="emergency_address">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Telephone Number</label>
                                <input type="tel" class="form-input" name="emergency_telephone">
                            </div>
                            <div class="form-group">
                                <label class="form-label required">Mobile Number</label>
                                <input type="tel" class="form-input" name="emergency_mobile" required>
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
                                <input type="text" class="form-input" name="ref_name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Designation</label>
                                <input type="text" class="form-input" name="ref_designation">
                            </div>
                            <div class="form-group full-width">
                                <label class="form-label">Organization Name & Address</label>
                                <textarea class="form-textarea" name="ref_org" rows="3" placeholder="Organization name and complete address"></textarea>
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

@push('scripts')
<script>
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

    // Initialize form
    document.addEventListener('DOMContentLoaded', function() {
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
        const sections = document.querySelectorAll('.form-section');
        sections.forEach(section => {
            section.addEventListener('click', function() {
                this.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        });
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
</script>

@endpush