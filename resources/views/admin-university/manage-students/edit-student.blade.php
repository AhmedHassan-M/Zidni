@extends('layouts.admin-master')

@section('title', 'Zidni University Add Student')


@section('links')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css" rel="stylesheet">

<style>
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    @media (max-width: 670px) {
        .card-header {
            flex-direction: column;
        }
    }
    .card-header::after {
        display: none;
    }
    .add_student_input {
        border: 1px solid #ced4da;
        width: 100%;
        outline: none;
        background-color: #FFF;
        padding: 5px 15px;
        border-radius: 4px;
        transition: all .15s linear;
    }
    .add_student_input:hover, .add_student_input:focus, .select2-selection:hover, .select2-selection:focus {
        border-color: #01273f;
    }
    .add_student_input.title {
        border: 1px solid transparent;
        text-align: center;
        border-bottom: 1px solid;
        max-width: 400px;
        border-radius: 0;
    }
    .add_student_input.title:hover, .add_student_input.title:focus {
        border-color: transparent;
        border-bottom: 1px solid #01273f;
    }
    .birthday_add {
        display: flex;
        flex-wrap: wrap;
    }
    .form-group {
        margin-bottom: 10px;
    }
    .has_form_group {
        padding-bottom: 10px !important;
    }

    .applicant-profile-card .card-block td.text-left, .applicant-activity-log .card-block td.text-left {
        font-size: 16px;
    }

    /* SELECT2 STYLE */

    .select2-selection {
        height: 33px !important;
        transition: all .15s linear;
        outline: none !important;
    }
    .select2-selection__rendered {
        line-height: 31px !important;
    }
    .select2-selection__arrow {
        height: 31px !important;
    }
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #01273f;
    }
</style>


@endsection



@section('content')



<!-- START MAIN CONTENT -->


<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h2 class="content-header-title">Manage Zidni University Add Student</h2>
                <p>This board show you the Add Student for Zidni University</p>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/university/home">University Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/all-user">Manage Zidni University Add Student</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">


            <!-- HTML Markup -->
            <section id="html-markup" class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Zidni University Add Student</h4>
                    <!-- <a class="btn p-btn-secondary" href="#">Edit Student Data</a> -->
                </div>
                <div class="card-body collapse in">

                    <div class="container-fluid">

                        <div class="col-12">


                            

                            <div class="card applicant-profile-card">

                                    
                                <div class="load-card-box"></div>

                                <img class="card-img-top" src="{{asset('images/university.jpg')}}" width="100%"
                                    height="150">

                                <div class="applicant-profile-img">


                                    <img class="" src="{{asset('images/user.png')}}">



                                </div>


                                <div class="card-block">
                                    <h4 class="card-title">
                                        <input type="text" class="add_student_input title" name="student_name" placeholder="John Doe" value="Ahmed Hassan" required>
                                    </h4>

                                    <table class="table-fill">
                                        <tbody class="table-hover">


                                            <th colspan="2" scope="colgroup">Student Status</th>

                                            <tr>
                                                <td class="text-left">Update Student Status</td>
                                                <td class="text-left">
                                                    <select name="studentStatus" class="form-control form-select-active" placeholder="Select Student Status">
                                                        <option></option>
                                                        <option value="active">Active</option>
                                                        <option value="freeze">Freeze</option>
                                                    </select> 
                                                </td>
                                            </tr>

                                            <th colspan="2" scope="colgroup">Contact Information</th>


                                            <tr>
                                                <td class="text-left">E-Mail</td>
                                                <td class="text-left">
                                                    <input type="text" class="add_student_input" name="student_name" placeholder="johndoe@domain.com" value="ahmahmedhassan@gmail.com" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Phone Number</td>
                                                <td class="text-left">
                                                    <input type="text" class="add_student_input" name="student_name" placeholder="+20 1062117782" value="+20 1062117782" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">TimeZone</td>
                                                <td class="text-left has_form_group">
                                                    <div class="form-group selectbox-container">
                                                        <select id="studentTimeZone" name="studentTimeZone" class="form-control add_student_input form-select-active" placeholder="Select TimeZone">
                                                            <option></option>
                                                            <option value="2">GMT-12:00 Eniwetok, Kwajalein</option>
                                                            <option value="3">GMT-11:00 Midway Island, Samoa</option>
                                                            <option value="4">GMT-10:00 Hawaii</option>
                                                            <option value="5">GMT-09:00 Alaska</option>
                                                            <option value="6">GMT-08:00 Pacific Time (US &amp; Canada)</option>
                                                            <option value="7">GMT-07:00 Mountain Time (US &amp; Canada)</option>
                                                            <option value="8">GMT-06:00 Central Time (US &amp; Canada), Mexico City</option>
                                                            <option value="9">GMT-05:00 Eastern Time (US &amp; Canada), Bogota, Lima, Quito</option>
                                                            <option value="10">GMT-04:00 Atlantic Time (Canada), Caracas, La Paz</option>
                                                            <option value="11">GMT-03:30 Newfoundland</option>
                                                            <option value="12">GMT-03:00 Brazil, Buenos Aires, Georgetown</option>
                                                            <option value="13">GMT-02:00 Mid-Atlantic</option>
                                                            <option value="14">GMT-01:00 Azores, Cape Verde Islands</option>
                                                            <option value="15">GMT+00.00 Western Europe Time, London, Lisbon, Casablanca, Monrovia</option>
                                                            <option value="16">GMT+01:00 Central Europe Time, Brussels, Copenhagen, Madrid, Paris</option>
                                                            <option value="17" selected>GMT+02:00 Eastern Europe Time, Kaliningrad, South Africa</option>
                                                            <option value="18">GMT+03:00 Baghdad, Kuwait, Riyadh, Moscow, Nairobi</option>
                                                            <option value="19">GMT+03:30 Tehran</option>
                                                            <option value="20">GMT+04:00 Abu Dhabi, Muscat, Baku, Tbilisi</option>
                                                            <option value="21">GMT+04:30 Kabul</option>
                                                            <option value="22">GMT+05:00 Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                                                            <option value="23">GMT+05:30 Bombay, Calcutta, Madras, New Delhi</option>
                                                            <option value="24">GMT+06:00 Almaty, Dhaka, Colombo</option>
                                                            <option value="25">GMT+07:00 Bangkok, Jakarta, Yogyakarta, Hanoi</option>
                                                            <option value="26">GMT+08:00 Kuala Lumpur, Singapore, Sulawesi, Beijing, Perth, Hong Kong</option>
                                                            <option value="27">GMT+09:00 Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                                                            <option value="28">GMT+09:30 Adelaide, Darwin</option>
                                                            <option value="29">GMT+10:00 East Australian Standard, Papua New Guinea, Vladivostok</option>
                                                            <option value="30">GMT+11:00 Magadan, Solomon Islands, New Caledonia</option>
                                                            <option value="31">GMT+12:00 Auckland, Wellington, Fiji, Kamchatka, Marshall Island</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>


                                            <th colspan="2" scope="colgroup">Personal Information</th>


                                            <tr>
                                                <td class="text-left">Passport Number</td>
                                                <td class="text-left">
                                                    <input type="text" class="add_student_input" name="student_name" placeholder="5468768465498468" value="5468768465498468" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Full Name In Latin</td>
                                                <td class="text-left">
                                                    <input type="text" class="add_student_input" name="student_name" placeholder="John Doe" value="Ahmed Hassan Mahmoud" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Full Name In Arabic</td>
                                                <td class="text-left">
                                                    <input type="text" class="add_student_input" name="student_name" placeholder="إسم مجهول" value="أحمد حسن محمود" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">BrithDay</td>
                                                <td class="text-left has_form_group">
                                                    <div class="birthday_add">
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <select name="studentBrithDay" class="form-control form-select-active" id="studentBrithDay" placeholder="Select Day">
                                                                <option></option>
                                                                <?php 
                                                                $start_date = 1;
                                                                $end_date   = 31;
                                                                for( $j=$start_date; $j<=$end_date; $j++ ) {
                                                                    if ($j === 6) {
                                                                    echo '<option value='.$j.' selected>'.$j.'</option>';
                                                                    } else { 
                                                                    echo '<option value='.$j.'>'.$j.'</option>';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <select name="studentBrithMonth" class="form-control form-select-active" id="studentBrithMonth" placeholder="Select Month">
                                                                <option></option>
                                                                <?php for( $m=1; $m<=12; ++$m ) { 
                                                                $month_label = date('F', mktime(0, 0, 0, $m, 1));
                                                                ?>
                                                                <?php if ($month_label === 'December') { ?>
                                                                <option value="<?php echo $month_label; ?>" selected><?php echo $month_label; ?></option>
                                                                <?php } else { ?>
                                                                <option value="<?php echo $month_label; ?>"><?php echo $month_label; ?></option>
                                                                <?php } ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <select name="studentBrithYear" class="form-control form-select-active" id="studentBrithYear" placeholder="Select Year">
                                                                <option></option>
                                                                <?php 
                                                                $year = date('Y');
                                                                $min = $year - 70;
                                                                $max = $year;
                                                                for( $i=$max; $i>=$min; $i-- ) {
                                                                    if ($i === 1995) {
                                                                        echo '<option value='.$i.' selected>'.$i.'</option>';
                                                                    } else {
                                                                        echo '<option value='.$i.'>'.$i.'</option>';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-left">Citizenship</td>
                                                <td class="text-left">
                                                    <select id="studentCitizenship" name="studentCitizenship" class="form-control form-select-active" placeholder="Select Citizenship">
                                                        <option></option>
                                                        @include('university.components.countries')
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-left">Marital Status</td>
                                                <td class="text-left">
                                                    <select name="studentMaritalStatus" class="form-control form-select-active" id="studentMaritalStatus" placeholder="Select Marital Status">
                                                        <option></option>
                                                        <option value="married">Married</option>
                                                        <option value="single">Single</option>
                                                    </select> 
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-left">Gender</td>
                                                <td class="text-left">
                                                    <select name="studentGender" class="form-control form-select-active" id="studentGender" placeholder="Select Gender">
                                                        <option></option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select> 
                                                </td>
                                            </tr>


                                            <tr>
                                                <td class="text-left">Country</td>
                                                <td class="text-left">
                                                    <select id="studentCountry" name="studentCountry" class="form-control form-select-active" placeholder="Select Country">
                                                        <option></option>
                                                        @include('university.components.countries')
                                                    </select>
                                                </td>
                                            </tr>

                                            <th colspan="2" scope="colgroup">Occupation & Education</th>



                                            <tr>
                                                <td class="text-left">Current Employment</td>
                                                <td class="text-left">
                                                    <select name="studentCurrentEmployment" class="form-control form-select-active" placeholder="Select Employment">
                                                        <option></option>
                                                        <option value="not-working">Not Working</option>
                                                        <option value="employee">Employee</option>
                                                        <option value="student" selected>Student</option>
                                                        <option value="free-businees">Free Businees</option>
                                                        <option value="retired">Retired</option>
                                                        <option value="house-wife">House Wife</option>
                                                    </select> 
                                                </td>
                                            </tr>


                                            <tr>
                                                <td class="text-left">Certificate Name</td>
                                                <td class="text-left">
                                                    <input type="text" class="add_student_input" name="studentCertificate" placeholder="Certificate Name" required>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td class="text-left">Graduation Year</td>
                                                <td class="text-left">
                                                    <select name="studentGraduationYear" class="form-control form-select-active" placeholder="Select Graduation Year">
                                                        <option></option>
                                                        <?php 
                                                        $year = date('Y');
                                                        $min = $year - 70;
                                                        $max = $year;
                                                        for( $i=$max; $i>=$min; $i-- ) {
                                                            if ($i === 2018) {
                                                                echo '<option value='.$i.' selected>'.$i.'</option>';
                                                            } else {
                                                                echo '<option value='.$i.'>'.$i.'</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td class="text-left">Specialization</td>
                                                <td class="text-left">
                                                    <select name="studentSpecialization" class="form-control form-select-active" placeholder="Select Specialization">
                                                        <option></option>
                                                        @for ($i = 0; $i < 3; $i++)
                                                        <option value="{{$i}}">Specialization Name</option>
                                                        @endfor
                                                    </select>
                                                </td>
                                            </tr>

                                            <th colspan="2" scope="colgroup">Applicant Documents</th>

                                            <tr>
                                                <td class="text-left">Upload Documents</td>
                                                <td class="text-center">
                                                    <input type="file" class="filepond" name="online_documents[]">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-left">Upload Documents</td>
                                                <td class="text-center">
                                                    <input type="file" class="filepond" name="online_documents[]">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="text-left">Upload Documents</td>
                                                <td class="text-center">
                                                    <input type="file" class="filepond" name="online_documents[]">
                                                </td>
                                            </tr>

                                            <th colspan="2" scope="colgroup">Payment Status</th>

                                            <tr>
                                                <td class="text-left">Payment Status</td>
                                                <td class="text-left">Completed</td>
                                            </tr>



                                        </tbody>
                                    </table>

                                </div>

                                <div class="form-submit"><button type="submit" class="btn btn-secondary btn-lg btn-block">Update Student Data</button></div>

                            </div>


                        </div>

                    </div>



                </div>
            </section>
            <!--/ HTML Markup -->
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<!-- END MAIN CONTENT -->




@endsection




@section('scripts')

<script src="https://intl-tel-input.com/node_modules/intl-tel-input/build/js/intlTelInput.js?60"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

<!-- include FilePond library -->
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>


<script>


$(document).ready(function() {

    FilePond.registerPlugin(FilePondPluginFileValidateSize);
    FilePond.registerPlugin(FilePondPluginFileValidateType);
    FilePond.registerPlugin(FilePondPluginFileEncode);
    FilePond.registerPlugin(FilePondPluginFilePoster);



    // const inputElement = document.querySelector('input[type="file"]');

    $('input[type=file]').each(function(index){

        let inputElement = this;

        const pond = FilePond.create(inputElement, {
        allowFilePoster : true,
        files: [
            {
                // the server file reference
                source: '12345',
                // set type to local to indicate an already uploaded file
                options: {
                    type: 'local',

                    // stub file information
                    file: {
                        name: `${index}.png`,
                        size: 3001025,
                        type: 'image/png'
                    },

                    // pass poster property
                    metadata: {
                        poster: './poster-image/file.png'
                    }
                }
            }
        ],
        maxFiles: 1,
        allowBrowse: true,
        required: false,
        allowFileTypeValidation: true,
        maxFileSize: "5MB",
        allowFileTypeValidation: true,
        acceptedFileTypes: [
            "image/png",
            "image/jpeg",
            "image/jpg",
            "text/plain",
            "application/pdf",
            "application/doc",
            "application/xlsx",
            "application/rtf",
            "application/x-iwork-pages-sffpages"
        ],
        labelIdle: `<i class="fas fa-cloud-upload-alt"></i>Drag & Drop your passport copy, personal photo, educational certificate or <span class="filepond--label-action">Browse</span>`,
        fileValidateTypeLabelExpectedTypes	 : 'File of invalid type',
        allowFileEncode: true,
        instantUpload: true,
        allowRevert :false

    });


    // Post Req

    pond.setOptions({
        server: "http://httpbin.org/post"
    });

    pond.on("addfile", (error, file) => {
        console.log(file);
    });


    })
    


});


</script>


<script type="text/javascript" src="{{asset('admin/js/pages-university/manage-student/add-student.js')}}"></script>


@endsection