@extends('include.main')
@section('content')
    <style>
        .container {
            width: 800px;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 20px;
        }

        .header {
            text-align: center;
        }

        .header img {
            max-width: 100px;
        }

        .content {
            margin-top: 20px;
        }

        .content p {
            margin: 5px 0;
        }

        .content .section {
            margin-top: 20px;
        }

        .footer {
            margin-top: 20px;
            font-size: 0.8em;
        }
    </style>
    <div class="container">
        <div class="header">
            <img src="{{ asset('admin-assets/images/logo.png') }}">
            <h1>Birth Certificate</h1>
            <p>(Issued under Section 12/17 of the Registration of Births and Deaths Act, 1969 and Rule 8/13 of the Rajasthan
                Registration of Births and Deaths Rules, 2000)</p>
            <p>Form - A</p>
            <p>(See Rule-4)</p>
        </div>
        <div class="content">
            <p>This is to certify that the following information has been taken from the original record of birth which is
                the register for (local area/local body) ................................ of Tehsil/Block
                ............................ of District ............................ of State/Union Territory
                ......................</p>
            <div class="section">
                <p>Name: {{ $birthcertificate->name }}</p>
                <p>Gender: {{ $birthcertificate->gender }}</p>
                <p>Date of Birth: {{ $birthcertificate->date_of_birth }}</p>
                <p>Place of Birth: {{ $birthcertificate->place_of_birth }}</p>
            </div>
            <div class="section">
                <p>Name of Mother: {{ $birthcertificate->name_of_mother }}</p>
                <p>Name of Father: {{ $birthcertificate->name_of_father }}</p>
                <p>Mobile Number: {{ $birthcertificate->mobile_number }}</p>
                <p>Address: {{ $birthcertificate->address }}</p>
            </div>
            <div class="section">
                <p>Address of parents at the time of birth of the Child: {{ $birthcertificate->address_parent_child }}</p>
                <p>Permanent Address of the Parents: {{ $birthcertificate->permanent_address }}</p>
            </div>
            <div class="section">
                <p>Email Id: {{ $birthcertificate->email_id }}</p>
                <p>Name of the village or town where the mother resides: {{ $birthcertificate->mother_resides_place }}</p>
                <p>family tradition: {{ $birthcertificate->family_tradition }}</p>
                <p>father's educational level: {{ $birthcertificate->father_educational_level }}</p>
                <p>Mother's educational level: {{ $birthcertificate->mother_educational_level }}</p>
                <p>father's business: {{ $birthcertificate->father_business }}</p>
                <p>Mother's age at marriage: {{ $birthcertificate->mother_age_at_marriage }}</p>
                <p>at the time of this child's birth: {{ $birthcertificate->time_of_child_birth }}</p>
                <p>Write the number of uninhabited people this year of Mother:
                    {{ $birthcertificate->uninhabited_people_this_year_of_mother }}</p>
                <p>Under what auspices did the delivery take place:
                    {{ $birthcertificate->Under_auspices_delivery_take_place }}</p>
                <p>time of conception: {{ $birthcertificate->time_of_conception }}</p>
                <p>weight at birth: {{ $birthcertificate->weight_at_birth }}</p>
                <input type="hidden" id="id" value="{{ $birthcertificate->id }}">
            </div>
        </div>
        <div class="footer">
            <p>नोट: "बच्चे के जन्म के समय माता पिता का पता" एवं "माता पिता का स्थायी पता" के कॉलमों के सम्बन्ध में सूचना
                01/01/2007 से पूर्व लागू नहीं थी।</p>
            <p>Note: Information in respect of the columns "Present address of parents at the time of birth of the child"
                and "Permanent address of parents" were not applicable before 01/01/2007</p>
            <p>राश्ट्रिय सांख्यिकी एवं कार्यक्रम क्रियान्वयन मंत्रालय द्वारा परिपत्र संख्या फ13/1/39/वीएस/डीईएस/2013/22519
                दिनांक 02.06.2015 के द्वारा जन्म एवं मृत्यु प्रमाण पत्र जारी किये हेतु इलेक्ट्रॉनिक हस्ताक्षर के उपयोग की
                मान्यता दी गयी है।</p>
            <p>Use of Digital Signature for issuing birth and death certificate is recognized by Economics and Statistics
                Department, Government of Rajasthan vide circular number F13/1/39/VS/DES/2013/22519 Dated 02.06.2015.</p>
            <p>Software Courtesy National Informatics Center (NIC), Rajasthan</p>
        </div>


    </div>
    <div class="lg:flex lg:flex-row md:flex md:flex-row flex flex-col items-center justify-center mt-5 gap-5">
        <a href="{{ route('birth.certificate.pdf', ['id' => $birthcertificate->id]) }}"><button type="submit"
                id="download"
                class="w-[250px] h-[70px] text-center rounded-[100px] bg-[#F26F00] text-[#FFFFFF] font-semibold text-[18px] leading-[30px]">Download</button></a>
    </div>
@endsection
