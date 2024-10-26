<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Death Certificate</title>
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
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Death Certificate</h1>
            <p>(Issued under Section 12/17 of the Registration of Births and Deaths Act, 1969 and Rule 8/13 of the Rajasthan Registration of Births and Deaths Rules, 2000)</p>
            <p>Form - A</p>
            <p>(See Rule-4)</p>
        </div>
        <div class="content">
            <div class="section">
                <p>Date Of Death: {{$deathcertificate->date_of_death ?? "NA" }}</p>
                <p>Name of the Deceased: {{$deathcertificate->deceased_name ?? "NA" }}</p>
                <p>UID No. of the deceased: {{$deathcertificate->deceased__uid_number ?? "NA" }}</p>
                <p>Mother's name: {{$deathcertificate->mother_name ?? "NA"}}</p>
            </div>
            <div class="section">
                <p>UID No. of the Mother: {{$deathcertificate->mother_uid_number ?? "NA"}}</p>
                <p>Father's name: {{$deathcertificate->father_name ?? "NA"}}</p>
                <p>UID No of the Father: {{$deathcertificate->father_uid_number ?? "NA"}}</p>
                <p>Name of Husband/Wife: {{$deathcertificate->spouse_names ?? "NA"}}</p>
            </div>
            <div class="section">
                <p>Spouse's UID No: {{$deathcertificate->spouse_uid_number ?? "NA"}}</p>
                <p>Age of the deceased: {{$deathcertificate->death_person_age ?? "NA"}}</p>
            </div>
            <div class="section">
                <p>Address of the deceased at the time of death: {{$deathcertificate->time_of_death_address ?? "NA"}}</p>
                <p>Permanent address of the deceased: {{$deathcertificate->address_of_death_person ?? "NA"}}</p>
                <p>Hospital/Institution: {{$deathcertificate->hospital_institution ?? "NA"}}</p>
                <p>Home Path: {{$deathcertificate->home_path ?? "NA"}}</p>
                <p>Other Location: {{$deathcertificate->another_location ?? "NA"}}</p>
                <p>Name of Informant: {{$deathcertificate->name_of_informant ?? "NA"}}</p>
                <p>Path: {{$deathcertificate->path ?? "NA"}}</p>
                <p>Mobile no: {{$deathcertificate->mobile_number ?? "NA"}}</p>
                <p>Email id: {{$deathcertificate->email_id ?? "NA"}}</p>
                <p>City/Village Name: {{$deathcertificate->city_or_village_name ?? "NA"}}</p>
                <p>Is it a city or a village: {{$deathcertificate->city_or_village ?? "NA"}}</p>
                <p>Religion: {{$deathcertificate->religion ?? "NA"}}</p>
                <p>Occupation of the deceased: {{$deathcertificate->occupation ?? "NA"}}</p>
                <p>Type of treatment received before death: {{$deathcertificate->received_treatment_before_death ?? "NA"}}</p>
                <p>Whether the cause of death was medically certified: {{$deathcertificate->medical_certified ?? "NA"}}</p>
                <p>Name of the disease or actual cause of death: {{$deathcertificate->disease_name ?? "NA"}}</p>
                <p>In case of female death, whether the death occurred during pregnancy, at the time of delivery or within 6 weeks after termination of pregnancy: {{$deathcertificate->female_death ?? "NA"}}</p>
                <p>If you were addicted to smoking, for how many: {{$deathcertificate->smoking_addicted ?? "NA"}}</p>
                <p>If you were addicted to chewing tobacco in any form then for how many years: {{$deathcertificate->chewing_tobacco ?? "NA"}}</p>
                <p>If you were addicted to chewing betel nut (including pan masala), then for how many years: {{$deathcertificate->chewing_betel_nut ?? "NA"}}</p>
                <p>If you were addicted to alcohol then for how many years: {{$deathcertificate->alchol_addicted ?? "NA"}}</p>
            </div>
        </div>
    </div>
</body>
</html>
