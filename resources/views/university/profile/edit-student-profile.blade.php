@extends('layouts.university-profile-master')

@section('title', trans("user-university.edit-student-profile"))


@section('links')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet">


@endsection


@section('contant')



<div class="university-container">

<div class="container-fluid">


    <div class="row">


        <div class="col-md-3">


                <div class="card university-student-card ">


                                    
                        <div class="card-body">
                            <h5 class="card-title">{{ __('user-university.personal-information') }}</h5>
                    
                    
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span><a href="/university/view-student-profile/{{$locale = App::getLocale()}}">نموذج بيانات الطالب وتَعَهُّدُ الالتحاق</a></span></li>
                            </ul>
                    
                    
                            <h5 class="card-title">الوثائق والمستندات المطلوبة</h5>
                    
                    
                            <ul class="list-group list-group-flush">

                                    <li class="list-group-item" data-toggle="modal" data-target="#docModal_1" style="cursor:pointer"><span>رفع صورة شهادة الثانوية</span></li>
                                    <li class="list-group-item" data-toggle="modal" data-target="#docModal_2" style="cursor:pointer"><span>شهادة إجادة اللغة العربية</span></li>
                                    <li class="list-group-item" data-toggle="modal" data-target="#docModal_3" style="cursor:pointer"><span>رفع صورة جواز السفر</span></li>
                                    <li class="list-group-item" data-toggle="modal" data-target="#docModal_4" style="cursor:pointer"><span>رفع الصورة الشخصية</span></li>
                                    <li class="list-group-item" data-toggle="modal" data-target="#docModal_5" style="cursor:pointer"><span>رفع أصل السند البنكي (مختوم ) بايداع الرسوم الدراسية</span></li>
                                    <li class="list-group-item" data-toggle="modal" data-target="#docModal_6" style="cursor:pointer"><span>رفع نموذج رقم الارساليه الخاص بشركه البريد السريع الممتاز</span></li>
                                    <li class="list-group-item"><span>نموذج إرسال وثائق القبول يطبع من الموقع بعد اعلان نتيجة القبول</span></li>

                            </ul>
                                    
                        </div>
                    </div>
        </div>


        <div class="col-md-9">


            <div class="card university-page-container">

                <div class="university-page-header">

                    <h4>@yield('title')</h4>

                </div>


                <div class="university-page-container edit__student__form">


                    <div class="card university-student-card university-view-student-card">

                        <div class="university-student-card-header">
                            <img class="card-img-top lazyload" data-src="{{asset('images/university.jpg')}}"
                                src="{{asset('images/university.jpg')}}" alt="--" width="100%" height="150">

                            <div class="student-image-container">
                                <img class="student-image lazyload" data-src="{{asset('images/user.png')}}"
                                    src="{{asset('images/user.png')}}" alt="student image">
                            </div>

                        </div>



                        <form id="edit__student__form" action="" method="post" enctype="multipart/form-data">



                            <div class="card-body">
                                <h5 class="card-title">{{ __('user-university.contact-information') }}

                                        <a href="/university/view-student-profile/{{$locale = App::getLocale()}}">
                
                                            <i class="fas fa-address-card" data-toggle="tooltip" data-placement="top" title="{{ __('user-university.view-profile') }}"></i>
                        
                                        </a>


                                </h5>


                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        
                                        <span>{{ __('user-university.e-mail') }} :</span>

                                        <div class="form-group">
                                            <input name="studentEmail" type="email" class="form-control" id="studentEmail" aria-describedby="studentEmailHelp" name="studentEmail" value="{{Auth::user()->email}}" disabled>
                                        </div>
                    


                                        
                                        
                                        
                                        </li>
                                    <li class="list-group-item">
                                        
                                        <span>{{ __('user-university.phone-number') }} :</span>
                                        
                                        
                                        <div class="form-group student__phone__number">
                                            <input name="studentPhone" type="tel" id="studentPhone" class="form-control" value="+201157889868" >
                                        </div>


                                    
                                    </li>
                                    <li class="list-group-item"><span>{{ __('user-university.timing') }} :</span>
                                    
                                    
                                        <div class="form-group selectbox-container">
                                                <select id="studentTimeZone" name="studentTimeZone" class="form-control select-int">
                                                    <option value="">Select Your TimeZone</option>
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
                                                    <option value="17">GMT+02:00 Eastern Europe Time, Kaliningrad, South Africa</option>
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
                                    
                                    
                                    </li>
                                </ul>





                                {{-- Personal Information --}}




                                <h5 class="card-title">{{ __('user-university.personal-information') }} </h5>



                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span>{{ __('user-university.passport-number') }} :</span>
                                        
                                        
                                        <div class="form-group">
                                            <input name="studentPassport" type="text" class="form-control" id="studentPassport" placeholder="Enter Your Passport Number">                
                                        </div>                                    
                                    
                                    
                                    </li>
                                    <li class="list-group-item"><span>{{ __('user-university.name-ar') }} :
                                        </span>
                                    
                                    
                                    
                                        <div class="form-group">
                                            <input name="studentPassportNameEn" type="text" class="form-control" id="studentPassportNameEn" placeholder="Full Name English">
                                        </div>
                                    
                                    
                                    
                                    </li>
                                    <li class="list-group-item"><span>{{ __('user-university.name-en') }} :</span>
                                    
                                        <div class="form-group">
                                            <input name="studentNameAr" type="text" class="form-control" id="studentNameAr" placeholder="Full Name In Arabic">
                                        </div>

                                    </li>



                                    <li class="list-group-item"><span>{{ __('user-university.brith-year') }} :</span>
                                    


                                        <div class="form-group">                    
                                            <select name="studentBrithYear" class="form-control select-int" id="studentBrithYear" name="studentBrithYear">
                                                <option value="">Select BrithYear</option>
                    
                                                <?php 
                                                    $year = date('Y');
                                                    $min = $year - 70;
                                                    $max = $year;
                                                    for( $i=$max; $i>=$min; $i-- ) {
                                                        echo '<option value='.$i.'>'.$i.'</option>';
                                                    }
                                                ?>
                                            </select> 
                    
                    
                                        </div>


                                    
                                    </li>
                                    <li class="list-group-item"><span>{{ __('user-university.brith-monthe') }} :</span>
                                    
                                    
                                        <div class="form-group">
                        
                                                <select name="studentBrithMonth" class="form-control select-int" id="studentBrithMonth" name="studentBrithMonth">
                                                    <option value="">Select BrithMonth</option>
                        
                                                    <?php for( $m=1; $m<=12; ++$m ) { 
                                                      $month_label = date('F', mktime(0, 0, 0, $m, 1));
                                                    ?>
                                                      <option value="<?php echo $month_label; ?>"><?php echo $month_label; ?></option>
                                                    <?php } ?>
                                                </select> 
                        
                        
                                            </div>
                                    
                                    
                                    </li>



                                    <li class="list-group-item"><span>{{ __('user-university.brith-day') }} :</span>
                                    
                                    
                                        <div class="form-group">                    
                                                <select name="studentBrithDay" class="form-control select-int" id="studentBrithDay" name="studentBrithDay">
                                                    <option value="">Select BrithDay</option>
                        
                                                    <?php 
                                                        $start_date = 1;
                                                        $end_date   = 31;
                                                        for( $j=$start_date; $j<=$end_date; $j++ ) {
                                                        echo '<option value='.$j.'>'.$j.'</option>';
                                                        }
                                                    ?>
                                                </select> 
                        
                        
                                            </div>
                                    
                                    </li>
                                    <li class="list-group-item"><span>{{ __('user-university.marital-status') }} :</span>
                                    
                                    
                                        <div class="form-group selectbox-container">
                    
                                            <select name="studentMaritalStatus" class="form-control select-int-nosearch" id="studentMaritalStatus" name="studentMaritalStatus">
                                                <option value="">Select Your Marital Status</option>
                                                <option value="married">Married</option>
                                                <option value="single">Single</option>
                    
                                            </select> 
                    
                    
                                        </div>
                                    
                                    
                                    
                                    </li>
                                    <li class="list-group-item"><span>{{ __('user-university.gender') }} :</span>
                                    
                                    
                                        <div class="form-group selectbox-container">
                                            <select name="studentGender" class="form-control select-int-nosearch" id="studentGender" name="studentGender">
                                                <option value="">Select Your Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                    
                                            </select> 
                    
                    
                                        </div>
                                    
                                    
                                    </li>
                                    <li class="list-group-item"><span>{{ __('user-university.country-of-nationality') }} : </span>
                                    
                                    
                                        <div class="form-group selectbox-container">
                
                                            <select id="studentNationality" name="studentNationality" class="form-control select-int">
                                                <option value="">Select Your Nationality</option>
                
                                                @include('university.components.countries')
                
                                                
                                            </select>
                
                                        </div>
                                    
                                    
                                    
                                    </li>
                                </ul>

                                <h5 class="card-title">{{ __('user-university.post-address') }}</h5>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span>{{ __('user-university.street') }} :</span>
                                    
                                    

                                        <div class="form-group">
                                            <input name="studentStreetName" type="text" class="form-control" id="studentStreetName" placeholder="Street">
                                        </div>



                                    
                                    </li>
                                    <li class="list-group-item"><span>{{ __('user-university.mailbox') }} :</span>
                                    
                                        <div class="form-group">
                                            <input name="studentMailbox" type="text" class="form-control" id="studentMailbox" placeholder="Mailbox">
                                        </div>
                                    
                                    
                                    </li>
                                    <li class="list-group-item"><span>{{ __('user-university.postal-code') }} :</span>
                                    
                                    
                                        <div class="form-group">
                                            <input name="studentPostalCode" type="text" class="form-control" id="studentPostalCode" placeholder="Postal Code">
                                        </div>
                                        
                                    
                                    
                                    </li>
                                    <li class="list-group-item"><span>{{ __('user-university.neighborhood') }} :</span>
                                    
                                    
                                        <div class="form-group">
                                            <input name="studentNeighborhood" type="text" class="form-control" id="studentNeighborhood" placeholder="Neighborhood">
                                        </div>
                                    
                                    
                                    </li>
                                    <li class="list-group-item"><span>{{ __('user-university.city') }} :</span>
                                    
                                        <div class="form-group">
                                            <input name="studentCity" type="text" class="form-control" id="studentCity" placeholder="City">
                                        </div>
                                    
                                    
                                    </li>
                                    <li class="list-group-item"><span>{{ __('user-university.country') }} :</span>
                                    
                                    
                                    
                                        <div class="form-group selectbox-container">
                
                                            <select id="studentCountry" name="studentCountry" class="form-control select-int">
                                                <option value="">Select Your Country</option>
                
                                                @include('university.components.countries')
                
                                                
                                            </select>
                
                                        </div>
                                    
                                    
                                    
                                    
                                    </li>
                                </ul>

                                <h5 class="card-title">{{ __('user-university.educational-qualification') }}</h5>


                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span>{{ __('user-university.level') }} :</span>
                                    
                                    
                                        <div class="form-group selectbox-container">
                
                                            <select id="studentLevel" name="studentLevel" class="form-control select-int">
                                                <option value="">Select Your Level</option>
                                                <option value="2">Secondary Education</option>
                                                <option value="3">Diploma</option>
                                                <option value="4">Bachelor</option>
                                                <option value="5">Master</option>
                                                <option value="6">Doctorate</option>
                                                <option value="7">Other</option>                
                                                
                                            </select>
                
                                        </div>
                                    
                                    
                                    
                                    </li>
                                    <li class="list-group-item">
                                        <span>{{ __('user-university.general-rate-cumulative-average-of-subjects') }} :</span>
                                    
                                    
                                        <div class="form-group">
                                            <input name="studentRate" type="text" class="form-control" id="studentRate" placeholder="{{ __('user-university.general-rate-cumulative-average-of-subjects') }}">
                                        </div>
                                    
                                    
                                    </li>
                                    <li class="list-group-item"><span>{{ __('user-university.name-of-certificate') }} :</span>


                                        <div class="form-group">
                                            <input name="studentCertificateName" type="text" class="form-control" id="studentCertificateName" placeholder="{{ __('user-university.name-of-certificate') }}">
                                        </div>


                                    </li>
                                    <li class="list-group-item"><span>{{ __('user-university.study-specialization') }} :</span>



                                    <div class="form-group selectbox-container">
            
                                            <select id="studenStudySpecialization" name="studenStudySpecialization" class="form-control select-int">
                                                <option value="">Select Study Specialization</option>
                                                <option value="2">Applied Sciences</option>
                                                <option value="3">Arabic</option>
                                                <option value="4">Architecture</option>
                                                <option value="5">Civil Engineering</option>
                                                <option value="6">Communications Engineering</option>
                                                <option value="7">Computer Science</option>
                                                <option value="8">Education</option>
                                                <option value="9">Electrical Engineering</option>
                                                <option value="10">English</option>
                                                <option value="11">Financial & Administrative Sciences</option>
                                                <option value="12">Islamic Sciences</option>
                                                <option value="13">Law</option>
                                                <option value="14">Medical Sciences</option>
                                                <option value="15">Psychology</option>
                                                <option value="16">Sharia & Law</option>
                                                <option value="17">Social Science</option>
                                                <option value="18">Others</option>            
                                                
                                            </select>


                
                                        </div>



                                    </li>
                                    <li class="list-group-item"><span>{{ __('user-university.graduation-year') }} :
                                        </span>
                                    
                                    
                                        <select name="studentGraduationYear" class="form-control select-int" id="studentGraduationYear">
                                            <option value="">Select Graduation Year</option>
                
                                            <?php 
                                                $year = date('Y');
                                                $min = $year - 70;
                                                $max = $year;
                                                for( $i=$max; $i>=$min; $i-- ) {
                                                echo '<option value='.$i.'>'.$i.'</option>';
                                                }
                                            ?>
                                        </select> 
                                    
                                    
                                    
                                    </li>
                                </ul>


                                <h5 class="card-title">{{ __('user-university.practical-experience') }}</h5>


                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span>{{ __('user-university.current-job') }} :</span>
                                        
                                        
                                        <div class="form-group selectbox-container">
                
                                                <select id="studentCurrentJob" name="studentCurrentJob" class="form-control select-int">
                                                <option value="">Select Current Job</option>
                                                <option value="2">Not Working</option>
                                                <option value="3">Employee</option>
                                                <option value="4">Student</option>
                                                <option value="5">Free Businees</option>
                                                <option value="6">Retired</option>
                                                <option value="7">House Wife</option>                
                                                
                                            </select>
                
                                        </div>



                                    </li>
                                </ul>

                                <h5 class="card-title">{{ __('user-university.specialization') }}</h5>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span>{{ __('user-university.specialization') }} :</span>
                                    
                                    
                                        <div class="form-group selectbox-container">
                
                                                <select id="studentSpecialization" name="studentSpecialization" class="form-control select-int">
                                                <option value="">Select Current Job</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
              
                                                
                                            </select>
                
                                        </div>
                                    
                                    
                                    </li>
                                </ul>


                                <h5 class="card-title">{{ __('user-university.endorsement') }}</h5>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span>{{ __('user-university.endorsement') }} :</span>
                                    
                                    
                                        <div class="form-group">
                                            <textarea class="form-control" id="studentEndorsement"
                                                name="studentEndorsement" rows="5" placeholder="studentEndorsement"></textarea>
                                        </div>
                                    
                                    </li>
                                </ul>




                                    <div class="form-submit">

                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit Your Application</button>
                    
                                    </div>



                            </div>






                        </form>






                    </div>






                </div>

            </div>



        </div>





    </div>





</div>

</div>



{{-- DOC 1 --}}


<div class="modal fade student-document-container" id="docModal_1" tabindex="-1" role="dialog" aria-labelledby="docModal_1Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">رفع صورة شهادة الثانوية</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>


        <form id="student__document_form_1" class="student-document-form" action="" method="post" enctype="multipart/form-data">


            <div class="modal-body">

                    <div class="form-group">
                        <input type="file" id="studentDocument_1" name="studentDocument_1" class="dropify" data-height="300" data-max-file-size="1M" data-show-remove="true" data-errors-position="outside" data-allowed-file-extensions="jpg jpeg png" data-max-file-size-preview="1M">
                    </div>
            </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">حفظ المستندات</button>
            </div>

        </form>

    </div>
    </div>
</div>




{{-- DOC 2 --}}


<div class="modal fade student-document-container" id="docModal_2" tabindex="-1" role="dialog" aria-labelledby="docModal_2Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">شهادة إجادة اللغة العربية</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <form id="student__document_form_2" class="student-document-form" action="" method="post" enctype="multipart/form-data">


            <div class="modal-body">

                    <div class="form-group">
                        <input type="file" id="studentDocument_2" name="studentDocument_2" class="dropify" data-height="300" data-max-file-size="1M" data-show-remove="true" data-errors-position="outside" data-allowed-file-extensions="jpg jpeg png" data-max-file-size-preview="1M">
                    </div>
            </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">حفظ المستندات</button>
            </div>


        </form>


    </div>
    </div>
</div>
    


{{-- DOC 3 --}}


<div class="modal fade student-document-container" id="docModal_3" tabindex="-1" role="dialog" aria-labelledby="docModal_3Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">رفع صورة جواز السفر</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <form id="student__document_form_3" class="student-document-form" action="" method="post" enctype="multipart/form-data">


            <div class="modal-body">

                    <div class="form-group">
                        <input type="file" id="studentDocument_3" name="studentDocument_3" class="dropify" data-height="300" data-max-file-size="1M" data-show-remove="true" data-errors-position="outside" data-allowed-file-extensions="jpg jpeg png" data-max-file-size-preview="1M">
                    </div>
            </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">حفظ المستندات</button>
            </div>


        </form>


    </div>
    </div>
</div>
        



{{-- DOC 4 --}}


<div class="modal fade student-document-container" id="docModal_4" tabindex="-1" role="dialog" aria-labelledby="docModal_4Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">رفع الصورة الشخصية</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

            <form id="student__document_form_4" class="student-document-form" action="" method="post" enctype="multipart/form-data">


                <div class="modal-body">
        
                        <div class="form-group">
                            <input type="file" id="studentDocument_4" name="studentDocument_4" class="dropify" data-height="300" data-max-file-size="1M" data-show-remove="true" data-errors-position="outside" data-allowed-file-extensions="jpg jpeg png" data-max-file-size-preview="1M">
                        </div>
                </div>
        
        
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">حفظ المستندات</button>
                </div>
        
            </form>

        </div>
        </div>
    </div>




{{-- DOC 5 --}}


<div class="modal fade student-document-container" id="docModal_5" tabindex="-1" role="dialog" aria-labelledby="docModal_5Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">رفع أصل السند البنكي (مختوم ) بايداع الرسوم الدراسية</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

            <form id="student__document_form_5" class="student-document-form" action="" method="post" enctype="multipart/form-data">


                <div class="modal-body">
        
                        <div class="form-group">
                            <input type="file" id="studentDocument_5" name="studentDocument_5" class="dropify" data-height="300" data-max-file-size="1M" data-show-remove="true" data-errors-position="outside" data-allowed-file-extensions="jpg jpeg png" data-max-file-size-preview="1M">
                        </div>
                </div>
        
        
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">حفظ المستندات</button>
                </div>
    
            </form>

        </div>
        </div>
    </div>









{{-- DOC 6 --}}


<div class="modal fade student-document-container" id="docModal_6" tabindex="-1" role="dialog" aria-labelledby="docModal_6Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">رفع نموذج رقم الارساليه الخاص بشركه البريد السريع الممتاز</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

            <form id="student__document_form_6" class="student-document-form" action="" method="post" enctype="multipart/form-data">


                <div class="modal-body">
                        <div class="form-group">
                            <input type="file" id="studentDocument_6" name="studentDocument_6" class="dropify" data-height="300" data-max-file-size="1M" data-show-remove="true" data-errors-position="outside" data-allowed-file-extensions="jpg jpeg png" data-max-file-size-preview="1M">
                        </div>
                </div>
        
        
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">حفظ المستندات</button>
                </div>

                
            </form>

    
        </div>
        </div>
    </div>






@endsection


@section('scripts')

<script src="https://intl-tel-input.com/node_modules/intl-tel-input/build/js/intlTelInput.js?60"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>


<script type="text/javascript" src="{{asset('js/university.js')}}"></script>






@endsection