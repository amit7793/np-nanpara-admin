<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #000;
            box-sizing: border-box;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
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
<h1>Birth Certificate</h1>
<p>(Issued under Section 12/17 of the Registration of Births and Deaths Act, 1969 and Rule 8/13 of the Rajasthan Registration of Births and Deaths Rules, 2000)</p>
<p>Form - A</p>
<p>(See Rule-4)</p>
</div>
<div class="content">
<p>This is to certify that the following information has been taken from the original record of birth which is the register for (local area/local body) ................................ of Tehsil/Block ............................ of District ............................ of State/Union Territory ......................</p>
<div class="section">
<p>Name: {{$birthcertificate->name ?? "NA"}}</p>
<p>Gender: {{$birthcertificate->gender ?? "NA"}}</p>
<p>Date of Birth: {{$birthcertificate->date_of_birth ?? "NA"}}</p>
<p>Place of Birth: {{$birthcertificate->place_of_birth ?? "NA"}}</p>
</div>
<div class="section">
<p>Name of Mother: {{$birthcertificate->name_of_mother ?? "NA"}}</p>
<p>Name of Father: {{$birthcertificate->name_of_father ?? "NA"}}</p>
<p>Mobile Number: {{$birthcertificate->mobile_number ?? "NA"}}</p>
<p>Address: {{$birthcertificate->address ?? "NA"}}</p>
</div>
<div class="section">
<p>Address of parents at the time of birth of the Child: {{$birthcertificate->address_parent_child ?? "NA"}}</p>
<p>Permanent Address of the Parents: {{$birthcertificate->permanent_address ?? "NA"}}</p>
</div>
<div class="section">
<p>Email Id: {{$birthcertificate->email_id ?? "NA"}}</p>
<p>Name of the village or town where the mother resides: {{$birthcertificate->mother_resides_place ?? "NA"}}</p>
<p>family tradition: {{$birthcertificate->family_tradition ?? "NA"}}</p>
<p>father's educational level: {{$birthcertificate->father_educational_level ?? "NA"}}</p>
<p>Mother's educational level: {{$birthcertificate->mother_educational_level ?? "NA"}}</p>
<p>father's business: {{$birthcertificate->father_business ?? "NA"}}</p>
<p>Mother's age at marriage: {{$birthcertificate->mother_age_at_marriage ?? "NA"}}</p>
<p>at the time of this child's birth: {{$birthcertificate->time_of_child_birth ?? "NA"}}</p>
<p>Write the number of uninhabited people this year of Mother: {{$birthcertificate->uninhabited_people_this_year_of_mother ?? "NA"}}</p>
<p>Under what auspices did the delivery take place: {{$birthcertificate->Under_auspices_delivery_take_place ?? "NA"}}</p>
<p>time of conception: {{$birthcertificate->time_of_conception ?? "NA"}}</p>
<p>weight at birth: {{$birthcertificate->weight_at_birth ?? "NA"}}</p>
</div>
</div>
<div class="footer">
<p>Note: Information in respect of the columns "Present address of parents at the time of birth of the child" and "Permanent address of parents" were not applicable before 01/01/2007</p>
<p>Use of Digital Signature for issuing birth and death certificate is recognized by Economics and Statistics Department, Government of Rajasthan vide circular number F13/1/39/VS/DES/2013/22519 Dated 02.06.2015.</p>
<p>Software Courtesy National Informatics Center (NIC), Rajasthan</p>
</div>
</div>
</body>
</html>