@extends('layouts.app')
@section("title","Admission Form- RJIT")
@section('main')
<div class="set-full-height">
<!--   Creative Tim Branding   -->
<a href="#">
<div class="">
<div class="">

</div>
<div class="brand">

</div>
</div>
</a>

<!--  Made With Material Kit  -->
<a href="#" class="">

</a>

<!--   Big container   -->
<div class="container">
    @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div><br />
      @endif
<div class="row">
<div class="col-sm-8 col-sm-offset-2">
<!--      Wizard container        -->
<div class="wizard-container">
<div class="card wizard-card" data-color="green" id="wizardProfile">

<form action="/admission/{{$student->id}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<!--for put method-->   
{{ method_field('PUT')}}

<!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

<div class="wizard-header">
<h3 class="wizard-title">
REGISTRATION FORM
</h3>
<h5></h5>
</div>
<div class="wizard-navigation">
<ul>
<li><a href="#about" data-toggle="tab">Personal Details</a></li>
<li><a href="#account" data-toggle="tab">Education Details</a></li>
<li><a href="#other" data-toggle="tab">Other Details</a></li>
</ul>
</div>

<div class="tab-content">
<div class="tab-pane" id="about">
<div class="row" style="padding: 10px;">
    
    <div class="row">
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">First Name</label>
            <input type="text" value="{{ Auth::user()->fname }}" onkeyup="capfunc()" id="fname" name="first_name" class="form-control cap" required="value" readonly>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Last Name</label>
            <input type="text" value="{{ Auth::user()->lname }}" onkeyup="capfunc()" name="last_name" class="form-control cap" required="value" readonly>
        </div>
    </div>
    
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Email ID</label>
            <input type="email" value="{{ Auth::user()->email }}" onkeyup="capfunc()" name="email" class="form-control cap" required="value" readonly>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Mobile Number </label>
            <input type="text" value="{{ Auth::user()->mobile }}" name="mobile" pattern="^[6-9]\d{9}$" class="form-control" required="value" readonly>
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Gender</label>
            <select class="form-control" name="gender" id="gender" value="{{old('gender')}}" required>
                <option ></option>
                <option @if($student->gender=='MALE'){ selected='selected'} @endif value="MALE">Male</option>
                <option @if($student->gender=='FEMALE'){ selected='selected'} @endif value="FEMALE">Female</option>
            </select>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group image">
            <label class="control-label dob">Date Of Birth<small>(As per 10th Marksheet)</small></label>
            <input type="date" value="{{$student->date}}" name="date" min="1998-12-31" max="2002-12-31" class="form-control" required="value" >

        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Father's Name</label>
            <input type="text"  value="{{$student->father_name}}" name="father_name" onkeyup="capfunc()" class="form-control cap"  required="value" >
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Mother's Name</label>
            <input type="text"  value="{{$student->mother_name}}" name="mother_name" onkeyup="capfunc()"  class="form-control cap" required="value">
        </div>
    </div>
    
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Father's Email ID <small>(Optional)</small></label>
            <input type="email" value="{{$student->father_email}}" onkeyup="capfunc()"  class="form-control cap" name="father_email">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Father's Mobile Number</label>
            <input type="text" value="{{$student->father_phone}}" pattern="^[6-9]\d{9}$" class="form-control" name="father_phone" required="value">
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Aadhaar Number</label>
            <input type="text" value="{{$student->aadhar}}" pattern="^[0-9]{12}$" class=" form-control" name="aadhar" required="value">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Identification Mark <small>(Optional)</small></label>
            <input type="text"  value="{{$student->id_mark}}"  onkeyup="capfunc()" class="cap form-control"  name="identification">

        </div>
    </div>
    <div class="col-sm-10 col-sm-offset-1">
        <!-- <div class="form-group">
            <label class="control-label">Your Image</label>
            <input type="file" value="@yield('')" name="image" class="form-control" required="value">
        </div> -->
    </div>
</div>
<div class="row">
    
    <div class="col-sm-10 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Communication Address</label>
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">House No.</label>
            <input type="text" name="house_no" value="{{$student->house_no}}" onkeyup="capfunc()"  class="cap form-control" required="value">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Street Name</label>
            <input type="text" value="{{$student->street}}"  class="form-control cap" onkeyup="capfunc()" name="street_name" required="value">
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Landmark</label>
            <input type="text" name="landmark" value="{{$student->landmark}}" onkeyup="capfunc()"  class=" cap form-control" required="value">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">City</label>
            <input type="text" value="{{$student->city}}"  class="form-control cap" onkeyup="capfunc()" name="city" required="value">
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">State</label>
            <input type="text" value="{{$student->state}}"  class="form-control cap" onkeyup="capfunc()" name="state" required="value">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Pin</small></label>
            <input type="text" value="{{$student->pin}}" pattern="^[1-9][0-9]{5}$" class="form-control cap" onkeyup="capfunc()" name="pincode" required="value">
        </div>
    </div>
        <div class="col-sm-10 col-sm-offset-1">
        <div class="field-wrap same_add">
        <label>Same As Correspondence Address</label>
        <input type="checkbox" name="same_address" class="same_add" onclick="add_copy()">
    </div>
    </div>
    <div class="col-sm-10 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Permanent Address</label>
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">House No.</label>
            <input type="text" value="{{$student->pahouse_no}}"  class="form-control cap" onkeyup="capfunc()" name="pahouse_no" required="value">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Street Name</label>
            <input type="text" value="{{$student->pa_street}}"  class="form-control cap" onkeyup="capfunc()" name="pastreet_name" required="value">
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Landmark</label>
            <input type="text" value="{{$student->pa_landmark}}"  class="form-control cap" onkeyup="capfunc()" name="palandmark" required="value">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">City</label>
            <input type="text" value="{{$student->pa_city}}"  class="form-control cap" onkeyup="capfunc()" name="pacity" required="value">
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">State</label>
            <input type="text" value="{{$student->pa_state}}"  class="form-control cap" onkeyup="capfunc()" name="pastate" required="value">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Pincode</small></label>
            <input type="text" value="{{$student->pa_pin}}" onkeyup="capfunc()" class="cap form-control" pattern="^[1-9][0-9]{5}$" name="papincode" required="value">
        </div>
    </div>   

    </div>
</div>
</div>
<div class="tab-pane" id="account">
<div class="row" style="padding: 10px;">
    <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">10th Details</label>
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">School/College Name</label>
            <input type="text" value="{{$student->te_school}}"  class="form-control cap" onkeyup="capfunc()" name="ten_school" required="value">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Board</label>
            <input type="text" value="{{$student->te_board}}"  class="form-control" onkeyup="capfunc()"  name="ten_board" required="value">
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Subjects</label>
            <input type="text" value="{{$student->te_subject}}"  class="form-control cap" onkeyup="capfunc()" name="ten_subjects" required="value">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Year Of Passing</label>
            <input type="number" min="2015" max="2017" step="1" value="2017" value="{{$student->te_passing}}"  class="form-control" name="ten_passing" required="value">
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Roll No.<span style="color: red;">*</span></label>
            <input type="number" value="{{$student->te_rollno}}"  class="form-control" name="te_rollno" required="value">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">System type</label>
            <select name="system_type" class="form-control" id="system_type" onclick="checktentype(this.value)" value=""  required="value" >
                <option></option>
                <option value="Marking" @if($student->te_system=='Marking'){ selected='selected'} @endif>Marking</option>
                <option value="Grading" @if($student->te_system=='Grading'){ selected='selected'} @endif>Grading</option>    
            </select>
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Percentage</label>
            <input type="number" value="{{{$student->te_percentage}}}" step="0.01" min="1" max="100" pattern="^[0]*?(?<Percentage>[1-9][0-9]?|100)%?$"  class="form-control ten_score" name="ten_percentage">
        </div>
    </div>
    <div class="col-sm-5 ">
        <div class="form-group label-floating">
            <label class="control-label">CGPA</label>
            <input type="number" value="{{{$student->te_cgpa}}}" step="0.01" min="1" max="10" pattern="^[0]*?(?<Percentage>[1-9][0-9]?|10)%?$"  class="form-control ten_score" name="ten_cgpa">
        </div>
    </div>
    <div class="col-sm-5">
        <!-- <div class="image">
            <label class="">10th Marksheet</label>
            <input type="file" value="@yield('')" name="ten_marksheet"  class="form-control" required="value">
        </div> -->
    </div>
</div>
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">12th/Diploma Details</label>
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">School/College Name</label>
            <input type="text" value="{{$student->tw_school}}"  class="form-control cap" onkeyup="capfunc()" name="tw_school" required="value">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Board</label>
            <input type="text" value="{{$student->tw_board}}"  class="form-control cap" onkeyup="capfunc()" name="tw_board" required="value">
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Year Of Passing</label>
            <input type="number" value="{{$student->tw_passing}}" min="2017" max="2019" step="1" value="2019" class="form-control" required="value" name="tw_passing">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Result Status</label>
            <select name="tw_result" class="form-control" id="tw_result" onclick="resultstatus(this.value)" value=""  required="value" >
                <option></option>
                <option value="Pass" @if($student->tw_result=='Pass'){ selected='selected'} @endif>Pass</option>
                <option value="Awaited" @if($student->tw_result=='Awaited'){ selected='selected'} @endif>Awaited</option>    
            </select>
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">12th Roll No.</label>
            <input type="text"  pattern="^[0-9]+$" value="{{$student->tw_rollno}}" pattern="\d" name="tw_rollno" onkeyup="capfunc()" class="cap form-control" required="value">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">System type</label>
            <select name="twsystem_type" class="form-control" id="twsystem_type" onclick="twtype(this.value)" value=""  required="value" >
                <option></option>
                <option value="Marking" @if($student->tw_system=='Marking'){ selected='selected'} @endif>Marking</option>
                <option value="Grading" @if($student->tw_system=='Grading'){ selected='selected'} @endif>Grading</option>    
            </select>
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Percentage</label>
            <input type="number" step="0.01" min="1" max="100" pattern="^[0]*?(?<Percentage>[1-9][0-9]?|100)%?$" value="{{$student->tw_percentage}}" id="tw_perc" name="tw_percentage"  class="form-control tw_score">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">CGPA</label>
            <input type="number" step="0.01" min="1" max="10" pattern="^[0]*?(?<Percentage>[1-9][0-9]?|10)%?$" value="{{{$student->tw_cgpa}}}" id="tw_cgpa" name="tw_cgpa"  class="form-control tw_score">
        </div>
    </div>
    
    <div class="col-sm-5">
        <!-- <div class="image">
            <label class="">12th Admit card/ 12th Marksheet</label>
            <input type="file" value="@yield('')" name="tw_certificate"  class="form-control" required="value" >
        </div> -->
    </div>
    
    <div class="col-sm-10 col-sm-offset-1 ">
        <div class="form-group label-floating">
            <label class="control-label">Eligibility</label>
            <select class="form-control" name="eligibility" onclick="checkeligibility(this.value);" value="{{old('eligibility')}}" id="eligibility"  required="value">
            <option ></option>
            <option value="JEE" @if($student->eligibility=='JEE'){ selected='selected'} @endif>JEE Based</option>
            <option value="12th" @if($student->eligibility=='12th'){ selected='selected'} @endif>12th Based</option>
        </select>
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1 ">
        <div class="form-group label-floating">
            <label class="control-label">AIR Rank/JEE Percentile</label>
            <input type="number" value="{{$student->jee_rank}}" name="jee_rank" class="jeestatus form-control">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">JEE Main Roll No</label>
            <input type="text" pattern="^[0-9]+$" value="{{$student->jee_main_rollno}}" name="jee_main_rollno" class="jeestatus form-control">
        </div>
    </div>
    <div class="col-sm-10 col-sm-offset-1">
        <!-- <div class="">
            <label class="">JEE Marksheet/Admit Card </label>
            <input type="file" value="@yield('')" name="jee_certificate"  class="jeestatus form-control" required="value" style="margin-top: -25px;">
        </div> -->
    </div>
    
 </div>
</div>
</div>
<div class="tab-pane" id="other">
<div class="row" style="padding: 10px;">
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Nationality</label>
            <select class="form-control" name="nationality" value="{{old('nationality')}}" id="nationality" required>
            <option></option>
            <option value="Indian" @if($student->nationality=='Indian'){ selected='selected'} @endif>Indian</option>
            <option value="NRI" @if($student->nationality=='NRI'){ selected='selected'} @endif>NRI</option>
        </select>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Category</label>
            <select class="form-control" name="category" id="category" value="{{old('category')}}" required>
            <option ></option>
            <option value="GEN" @if($student->category=='GEN'){ selected='selected'} @endif>GEN</option>
            <option value="OBC" @if($student->category=='OBC'){ selected='selected'} @endif>OBC</option>
            <option value="SC" @if($student->category=='SC'){ selected='selected'} @endif>SC</option>
            <option value="ST" @if($student->category=='ST'){ selected='selected'} @endif>ST</option>
        </select>

        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Religion</label>
            <select class="form-control" onchange="checkreligion(this.value);" name="religion" id="religion" " required>
            <option></option>
            <option value="Hindu" @if($student->religion=='Hindu'){ selected='selected'} @endif>Hindu</option>
            <option value="Muslim" @if($student->religion=='Muslim'){ selected='selected'} @endif>Muslim</option>
            <option value="Sikh" @if($student->religion=='Sikh'){ selected='selected'} @endif>Sikh</option>
            <option value="Christian" @if($student->religion=='Christian'){ selected='selected'} @endif>Christian</option>
            <option value="Others" @if($student->religion=='Others'){ selected='selected'} @endif>Others</option>
        </select>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">Other Religion <small>(For Those Who Choose Other)</small></label>
            <input type="text" value="{{$student->otherrel}}" id="otherrel" onkeyup="capfunc()" name="otherrel"  class="form-control cap">
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">If Physically Hanidcapped(PWD)?</label>
            <select class="form-control" name="handicapped" id="handicapped" onclick="checkpwd(this.value)"  required="value">
            <option></option>
            <option value="Yes" @if($student->phy_hand=='Yes'){ selected='selected'} @endif>YES</option>
            <option value="No" @if($student->phy_hand=='No'){ selected='selected'} @endif>NO</option>
        </select>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group label-floating">
            <label class="control-label">If Yes,Enter PWD Details</label>
            <input type="text" value="{{$student->pwd}}" id="pwd" onkeyup="capfunc()" name="pwd" class="form-control cap">
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Are You A Resident Of J&K?</label>
            <select class="form-control" name="jkresident" id="jkresident" onclick="jkresident(this.value)"  required>
            <option></option>
            <option value="Yes" @if($student->jkresident=='Yes'){ selected='selected'} @endif>YES</option>
            <option value="No" @if($student->jkresident=='No'){ selected='selected'} @endif>NO</option>
        </select>       
    </div>
    </div>
        <div class="col-sm-5 ">
        <!-- <div class="image">
            <label class="">If Yes,Upload Domicile of J&K</label>
            <input type="file" value="@yield('')" name="jk_domicile" id="jk_domicile" class="form-control" required="value" style="margin-top: -25px;">
        </div> -->
    </div>
    <div class="col-sm-10 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Parents Organisation Details</label>
        </div>
    </div>

    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Organisation In Which Your Parent Belong</label>
            <select class="form-control" onclick="checkorg(this.value)" name="organisation" value="{{old('organisation')}}" id="organisation"  required="value">
            <option></option>
            <option value="BSF" @if($student->orga=='BSF'){ selected='selected'} @endif>BSF</option>
            <option value="CAPF" @if($student->orga=='CAPF'){ selected='selected'} @endif>CAPFs</option>
        </select>
        </div>
    </div>
    <div class="col-sm-5 org">
        <div class="form-group label-floating">
            <label class="control-label">Rank</label>
            <select class="form-control bsf" onclick="checkrank(this.value)" name="bsf_rank"  id="bsf_rank" required="value">
            <option></option>
            <option value="Officer" @if($student->bsf_rank=='Officer'){ selected='selected'} @endif">Officer's</option>
            <option value="SOs" @if($student->bsf_rank=='SOs'){ selected='selected'} @endif>SOs</option>
            <option value="ORs" @if($student->bsf_rank=='ORs'){ selected='selected'} @endif>ORs</option>
            <option value="Widow" @if($student->bsf_rank=='Widow'){ selected='selected'} @endif>Widow</option>
        </select>
    </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1 org">
        <div class="form-group label-floating">
            <label class="control-label">Unit Name</label>
            <input type="text" value="{{$student->unit}}" name="unit" onkeyup="capfunc()" class="cap form-control bsf">
        </div>
    </div>
    <div class="col-sm-5 org">
        <div class="form-group label-floating">
            <label class="control-label">Unit Address</label>
            <input type="text" value="{{$student->unitadd}}" name="unit_add" onkeyup="capfunc()" class="bsf form-control cap">
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1 org">
        <div class="form-group label-floating">
            <label class="control-label">Force In CAPF</label>
            <select class="form-control bsf" onclick="Calculatefees()" name="capf_org" onkeydown="validate()" value="{{old('capf_org')}}" id="exam_fee">
            <option></option>
            <option value="CRPF" @if($student->capf_org=='CAPF'){ selected='selected'} @endif>CRPF</option>
            <option value="CISF" @if($student->capf_org=='CISF'){ selected='selected'} @endif>CISF</option>
            <option value="ITBP" @if($student->capf_org=='ITBP'){ selected='selected'} @endif>ITBP</option>
            <option value="SSB" @if($student->capf_org=='SSB'){ selected='selected'} @endif>SSB</option>
            <option value="mp_police" @if($student->capf_org=='mp_police'){ selected='selected'} @endif>M.P POLICE</option>
        </select>
        </div>
    </div>
    <div class="col-sm-5">
        <!-- <div class="image">
            <label class="">Father Serving Certificate/Discharge Book/</label>
            <input type="file" value="@yield('')" name="ser_certificate" class="form-control" required="value">
        </div> -->
    </div>
    <div class="col-sm-10 col-sm-offset-1">
        <div class="form-group label-floating">
            <label class="control-label">Fees To Be Paid:</label>
            <input type="text" @if($student->bsf_rank=="Widow")
            value="200"
             @else 
            value="400"
            @endif  
            name="price" id="totalfees" readonly="readonly" class="form-control widow_fee" required="value">
        </div>
    </div>
    
</div>
</div>
</div>
<div class="wizard-footer">
<div class="pull-right">
<input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='submit' value='Next' />
<input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='submit' value='Finish' />
</div>
</ul>


<div class="pull-left">
<input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
</div>
<div class="clearfix"></div>

</div>
</form>
</div>
</div> <!-- wizard container -->
</div>
</div><!-- end row -->
</div> <!--  big container -->

</div>

<br>



@endsection