<section class="new__student__container">


        <div class="container">

            @if(session()->has('failure'))
                <div class="alert alert-danger">
                    {{ session()->get('failure') }}
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            
            <form id="new__student__form" action="" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-title">

                    <h4><i class="fas fa-phone"></i>Contact Information</h4>

                </div>


                <div class="form-group-container form-group-two">

                        <div class="form-group">
                            <label for="studentName">FULL NAME</label>
                            <input name="studentName" type="text" class="form-control" id="studentName" aria-describedby="studentNameHelp" name="studentFullname" value="{{Auth::user()->full_name}}" placeholder="Enter Your Full Name" disabled>
                        </div>
            
            
                        <div class="form-group">
                            <label for="studentEmail">E-Mail address</label>
                            <input name="studentEmail" type="email" class="form-control" id="studentEmail" aria-describedby="studentEmailHelp" name="studentEmail" value="{{Auth::user()->email}}" disabled>
                        </div>


                </div>
                            



                <div class="form-group-container form-group-two">

                    <div class="form-group student__phone__number">
                        <label for="studentPhone">Phone Number</label>
                        <input name="studentPhone" type="tel" id="studentPhone" class="form-control" placeholder="Enter Your Phone Number" value="@if(isset($application)){{$application->full_phone}}@endif">
                    </div>
        



                    <div class="form-group selectbox-container">
                        <label for="studentTimeZone">TimeZone</label>

                        <select id="studentTimeZone" name="studentTimeZone" class="form-control select-int">
                            <option value="">Select Your TimeZone</option>
                            <option value="2" @if(isset($application))@if($application->timezone == 2){{'selected="selected"'}}@endif @endif >GMT-12:00 Eniwetok, Kwajalein</option>
                            <option value="3" @if(isset($application))@if($application->timezone == 3){{'selected="selected"'}}@endif @endif>GMT-11:00 Midway Island, Samoa</option>
                            <option value="4" @if(isset($application))@if($application->timezone == 4){{'selected="selected"'}}@endif @endif>GMT-10:00 Hawaii</option>
                            <option value="5" @if(isset($application))@if($application->timezone == 5){{'selected="selected"'}}@endif @endif>GMT-09:00 Alaska</option>
                            <option value="6" @if(isset($application))@if($application->timezone == 6){{'selected="selected"'}}@endif @endif>GMT-08:00 Pacific Time (US &amp; Canada)</option>
                            <option value="7" @if(isset($application))@if($application->timezone == 7){{'selected="selected"'}}@endif @endif>GMT-07:00 Mountain Time (US &amp; Canada)</option>
                            <option value="8" @if(isset($application))@if($application->timezone == 8){{'selected="selected"'}}@endif @endif>GMT-06:00 Central Time (US &amp; Canada), Mexico City</option>
                            <option value="9" @if(isset($application))@if($application->timezone == 9){{'selected="selected"'}}@endif @endif>GMT-05:00 Eastern Time (US &amp; Canada), Bogota, Lima, Quito</option>
                            <option value="10" @if(isset($application))@if($application->timezone == 10){{'selected="selected"'}}@endif @endif>GMT-04:00 Atlantic Time (Canada), Caracas, La Paz</option>
                            <option value="11" @if(isset($application))@if($application->timezone == 11){{'selected="selected"'}}@endif @endif>GMT-03:30 Newfoundland</option>
                            <option value="12" @if(isset($application))@if($application->timezone == 12){{'selected="selected"'}}@endif @endif>GMT-03:00 Brazil, Buenos Aires, Georgetown</option>
                            <option value="13" @if(isset($application))@if($application->timezone == 13){{'selected="selected"'}}@endif @endif>GMT-02:00 Mid-Atlantic</option>
                            <option value="14" @if(isset($application))@if($application->timezone == 14){{'selected="selected"'}}@endif @endif>GMT-01:00 Azores, Cape Verde Islands</option>
                            <option value="15" @if(isset($application))@if($application->timezone == 15){{'selected="selected"'}}@endif @endif>GMT+00.00 Western Europe Time, London, Lisbon, Casablanca, Monrovia</option>
                            <option value="16" @if(isset($application))@if($application->timezone == 16){{'selected="selected"'}}@endif @endif>GMT+01:00 Central Europe Time, Brussels, Copenhagen, Madrid, Paris</option>
                            <option value="17" @if(isset($application))@if($application->timezone == 17){{'selected="selected"'}}@endif @endif>GMT+02:00 Eastern Europe Time, Kaliningrad, South Africa</option>
                            <option value="18" @if(isset($application))@if($application->timezone == 18){{'selected="selected"'}}@endif @endif>GMT+03:00 Baghdad, Kuwait, Riyadh, Moscow, Nairobi</option>
                            <option value="19" @if(isset($application))@if($application->timezone == 19){{'selected="selected"'}}@endif @endif>GMT+03:30 Tehran</option>
                            <option value="20" @if(isset($application))@if($application->timezone == 20){{'selected="selected"'}}@endif @endif>GMT+04:00 Abu Dhabi, Muscat, Baku, Tbilisi</option>
                            <option value="21" @if(isset($application))@if($application->timezone == 21){{'selected="selected"'}}@endif @endif>GMT+04:30 Kabul</option>
                            <option value="22" @if(isset($application))@if($application->timezone == 22){{'selected="selected"'}}@endif @endif>GMT+05:00 Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                            <option value="23" @if(isset($application))@if($application->timezone == 23){{'selected="selected"'}}@endif @endif>GMT+05:30 Bombay, Calcutta, Madras, New Delhi</option>
                            <option value="24" @if(isset($application))@if($application->timezone == 24){{'selected="selected"'}}@endif @endif>GMT+06:00 Almaty, Dhaka, Colombo</option>
                            <option value="25" @if(isset($application))@if($application->timezone == 25){{'selected="selected"'}}@endif @endif>GMT+07:00 Bangkok, Jakarta, Yogyakarta, Hanoi</option>
                            <option value="26" @if(isset($application))@if($application->timezone == 26){{'selected="selected"'}}@endif @endif>GMT+08:00 Kuala Lumpur, Singapore, Sulawesi, Beijing, Perth, Hong Kong</option>
                            <option value="27" @if(isset($application))@if($application->timezone == 27){{'selected="selected"'}}@endif @endif>GMT+09:00 Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                            <option value="28" @if(isset($application))@if($application->timezone == 28){{'selected="selected"'}}@endif @endif>GMT+09:30 Adelaide, Darwin</option>
                            <option value="29" @if(isset($application))@if($application->timezone == 29){{'selected="selected"'}}@endif @endif>GMT+10:00 East Australian Standard, Papua New Guinea, Vladivostok</option>
                            <option value="30" @if(isset($application))@if($application->timezone == 30){{'selected="selected"'}}@endif @endif>GMT+11:00 Magadan, Solomon Islands, New Caledonia</option>
                            <option value="31" @if(isset($application))@if($application->timezone == 31){{'selected="selected"'}}@endif @endif>GMT+12:00 Auckland, Wellington, Fiji, Kamchatka, Marshall Island</option>
                        </select>

                    </div>


                </div>



                <div class="form-title">

                <h4><i class="fas fa-id-card"></i>Personal Information</h4>

                </div>



                <div class="form-group-container form-group-one">
                        <div class="form-group">

                    <label for="studentPassport">Passport Number</label>
                    <input name="studentPassport" type="text" class="form-control" id="studentPassport" placeholder="Enter Your Passport Number" value="@if(isset($application)){{$application->passport}}@endif">


                        </div>
                </div>




                <div class="form-group-container form-group-two">

                    <div class="form-group">
                        <label for="studentPassportNameEn">Full Name In Latin Characters As In Passport</label>
                        <input name="studentPassportNameEn" type="text" class="form-control" id="studentPassportNameEn" placeholder="Full Name English" value="@if(isset($application)){{$application->passport_name}}@endif">
                    </div>
        
        
                    <div class="form-group">
                        <label for="studentNameAr">Full Name In Arabic</label>
                        <input name="studentNameAr" type="text" class="form-control" id="studentNameAr" placeholder="Full Name In Arabic" value="@if(isset($application)){{$application->name_ar}}@endif">
                    </div>


                </div>





                <div class="form-group-container form-group-three">

                    <div class="form-group">
                        <label for="studentBrithDay">Birth Day</label>
                        <?php if(isset($application)) $birthDate = explode(" ", $application->birth_date); ?>
                        <select name="studentBrithDay" class="form-control select-int" id="studentBrithDay" name="studentBrithDay">
                            <option value="">Select BirthDay</option>

                            <?php 
                            $start_date = 1;
                            $end_date   = 31;
                            ?>
                            @for( $j=$start_date; $j<=$end_date; $j++ ) 
                                    <option value="{{$j}}" @if(isset($application))@if($j == $birthDate[0]){{'selected="selected"'}}@endif @endif>{{$j}}</option>
                            @endfor
                        </select> 


                    </div>

                    <div class="form-group">
                        <label for="studentBrithMonth">Birth Month</label>

                        <select name="studentBrithMonth" class="form-control select-int" id="studentBrithMonth" name="studentBrithMonth">
                            <option value="">Select BirthMonth</option>

                            <?php for( $m=1; $m<=12; ++$m ) { 
                            $month_label = date('F', mktime(0, 0, 0, $m, 1));
                            ?>
                                
                            <option value="{{$month_label}}" @if(isset($application))@if($month_label == $birthDate[1]){{'selected="selected"'}}@endif @endif>{{$month_label}}</option>
                            <?php } ?>
                        </select> 


                    </div>

                    <div class="form-group">
                        <label for="studentBrithYear">Birth Year</label>

                        <select name="studentBrithYear" class="form-control select-int" id="studentBrithYear" name="studentBrithYear">
                            <option value="">Select BirthYear</option>

                            <?php 
                            $year = date('Y');
                            $min = $year - 70;
                            $max = $year;
                            ?>
                            @for( $i=$max; $i>=$min; $i-- ) 
                                <option value="{{$i}}" @if(isset($application))@if($i == $birthDate[2]){{'selected="selected"'}}@endif @endif>{{$i}}</option>
                            @endfor
                            
                        </select> 


                    </div>
                    
                
                </div>



                

                <div class="form-group-container">

                                        <div class="form-group selectbox-container">

                    <label for="studentCitizenship">Citizenship</label>

                    <select id="studentCitizenship" name="studentCitizenship" class="form-control select-int">

                            <option value="">Select Your Citizenship</option>

                            @if(isset($application))
                                <option value="{{$application->citizenship}}" selected="selected">{{ucwords($application->country)}}</option>
                            @endif

                            @include('university.components.countries')


                    </select>

                                        </div>

                </div>


                <div class="form-group-container form-group-two">

                    <div class="form-group selectbox-container">
                        <label for="studentMaritalStatus">Marital Status</label>

                        <select name="studentMaritalStatus" class="form-control select-int-nosearch" id="studentMaritalStatus" name="studentMaritalStatus">
                            <option value="">Select Your Marital Status</option>
                            <option value="married" @if(isset($application))@if($application->marital_status == 'married'){{'selected="selected"'}}@endif @endif>Married</option>
                            <option value="single" @if(isset($application))@if($application->marital_status == 'single'){{'selected="selected"'}}@endif @endif>Single</option>

                        </select> 


                    </div>



                    <div class="form-group selectbox-container">
                        <label for="studentGender">Gender</label>

                        <select name="studentGender" class="form-control select-int-nosearch" id="studentGender" name="studentGender">
                            <option value="">Select Your Gender</option>
                            <option value="male" @if(isset($application))@if($application->gender == 'male'){{'selected="selected"'}}@endif @endif>Male</option>
                            <option value="female" @if(isset($application))@if($application->gender == 'female'){{'selected="selected"'}}@endif @endif>Female</option>

                        </select> 


                    </div>

                    
                    
                </div>

                


                <div class="form-group-container">


                        <div class="form-group selectbox-container">

                            <label for="studentCountry">Country</label>

                            <select id="studentCountry" name="studentCountry" class="form-control select-int">
                                <option value="">Select Your Country</option>

                                @if(isset($application))
                                    <option value="{{$application->country}}" selected="selected">{{ucwords($application->country)}}</option>
                                @endif

                                @include('university.components.countries')

                                
                            </select>

                        </div>

                </div>



                <div class="form-title">

                    <h4><i class="fas fa-book-open"></i>Occupation & Education</h4>
    
                </div>

                

                <div class="form-group-container">
                    <label for="studentCurrentEmployment">Current Employment</label>

                    <div class="radio-group-buttons">

                        <label class="radio-inline"><input type="radio" name="studentCurrentEmployment" value="not-working" @if(isset($application))@if($application->employment == 'not-working'){{'checked'}}@endif @endif>Not Working</label>

                        <label class="radio-inline"><input type="radio" name="studentCurrentEmployment" value="employee" @if(isset($application))@if($application->employment == 'employee'){{'checked'}}@endif @endif>Employee</label>

                        
                        <label class="radio-inline"><input type="radio" name="studentCurrentEmployment" value="student" @if(isset($application))@if($application->employment == 'student'){{'checked'}}@endif @endif>Student</label>

                        <label class="radio-inline"><input type="radio" name="studentCurrentEmployment" value="free-businees" @if(isset($application))@if($application->employment == 'free-businees'){{'checked'}}@endif @endif>Free Businees</label>

                        
                        <label class="radio-inline"><input type="radio" name="studentCurrentEmployment" value="retired" @if(isset($application))@if($application->employment == 'retired'){{'checked'}}@endif @endif>Retired</label>


                        <label class="radio-inline"><input type="radio" name="studentCurrentEmployment" value="house-wife" @if(isset($application))@if($application->employment == 'house-wife'){{'checked'}}@endif @endif>House Wife</label>
                        
                    </div>



                </div>




                <div class="form-group-container form-group-two">

                    <div class="form-group">
                        <label for="studentCertificate">Certificate Name</label>
                        <input name="studentCertificate" type="text" class="form-control" id="studentCertificate" placeholder="Your Certificate Name" value="@if(isset($application)){{$application->certificate}}@endif">
                    </div>
        

                    <div class="form-group">
                        <label for="studentGraduationYear">Graduation Year</label>

                        <select name="studentGraduationYear" class="form-control select-int" id="studentGraduationYear">
                            <option value="">Select Graduation Year</option>

                            <?php 
                            $year = date('Y');
                            $min = $year - 70;
                            $max = $year;
                            ?>
                            @for( $i=$max; $i>=$min; $i-- ) 
                                @if(isset($application))
                                    <option value='{{$i}}' @if(isset($application))@if($application->graduate_year == $i){{'selected="selected"'}}@endif @endif>{{$i}}</option>  
                                @else
                                    <option value='{{$i}}'>{{$i}}</option> 
                                @endif
                                
                            @endfor
                            
                        </select> 


                    </div>
                    



                </div>



                <div class="form-group-container form-group-one">


                        <div class="form-group">
                            <label for="studentSpecialization">What do you want to learn ?</label>
    
                            <select name="studentSpecialization" class="form-control select-int" id="studentSpecialization">
                                <option value="">Select Specialization</option>
                                @foreach($specializations as $specialization)
                                    <option value="{{$specialization->id}}" @if(isset($application))@if($application->specialization_id == $specialization->id){{'selected = "selected"'}}@endif @endif>{{$specialization->name}}</option>
                                @endforeach
                            </select> 
    
    
                        </div>
                        
    
    
    
                    </div>



                <div class="form-submit">

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit Your Application</button>

                </div>


    
                </div>
                





            </form>
            
            

        </div>








</section>