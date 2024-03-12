<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Startups;

class ExcelImport implements ToModel,WithHeadingRow
{
    public function model(array $row){
       $startupname= $row['nameoftheorganisation'];
        $slug = strtolower(str_replace(' ', '-', $startupname));
         $pdfFileName = $row['availabledocuments'];
        $pdfPath = public_path('uploads/startups_doc/' . $pdfFileName);

        // Move the uploaded PDF file to the storage directory
        if (file_exists($pdfPath)) {
            Storage::putFileAs('uploads/startups_doc', $pdfPath, $pdfFileName);
        }
        
           
        $overview_of_the_company=$row['overviewofthecompany'];
        $stage=$row['stage'];
        $sector=$row['sector'];
        $registered_as=$row['registeredas'];
        $excelDateValue = $row['registrationdate'];
        
        // $unixTimestamp = ($excelDateValue - 25569) * 86400; 

        // // Format the Unix timestamp as a date in your desired format
        // $formattedDate = date('d-m-Y', $unixTimestamp);

        //$registration_date=$row['registrationdate'];
        $no_of_end_users=$row['detailsaboutemployeesnoofendusers'];
        $no_of_active_years=$row['noofactiveyears'];
        $no_of_employees=$row['noofemployees'];
        $male=$row['male'];
        $female=$row['female'];
        $trans=$row['trans'];
        $number_of_countries=$row['numberofcountries'];
        $number_of_states=$row['numbersofstates'];
        $service_area=$row['servicearea'];
        $website=$row['website'];
        $address=$row['address'];
        $email_id=$row['emailid'];
        $phone_no=$row['phoneno'];
        $facebook_id=$row['facebookid'];
        $linkedin=$row['linkedin'];
        $twitter=$row['twitter'];
        $instagram=$row['instagram'];
        $annual_revenue=$row['annualrevenue'];
        $percentage_of_revenue=$row['percentageofrevenue'];
        $name_of_countries=$row['nameofcountries'];
        $category=$row['category'];
        $primary_target=$row['primarytarget'];
        $lives_of_smallholder=$row['aretheidentifiedsolutionsenhancingthelivesofsmallholderfarmers'];
        $signed_agreements=$row['signedagreementswithanyorganisations'];
        $international_expansion_opportunities=$row['teamworkingoninternationalexpansionopportunities'];
       
        return new Startups([
            
            'startup_name'     => $row['nameoftheorganisation'],
            'overview_of_the_company'    =>$overview_of_the_company,
            'stage'     => $stage,
            'sector'    => $sector,
            'registered_as'     =>$registered_as ,
            'registration_date'    => $excelDateValue,
            'no_of_end_users'     => $no_of_end_users,
            'no_of_active_years'    => $no_of_active_years,
            'no_of_employees'     =>$no_of_employees,
            'male'    => $male,
            'female'     => $female,
            'trans'    => $trans,
            'number_of_countries'     =>$number_of_countries,
            'number_of_states'    => $number_of_states,
            'service_area'     => $service_area,
            'available_documents'    =>'uploads/startups_doc/' . $pdfFileName,
            'website'     => $website,
            'address'    => $address,
            'email_id'     =>$email_id ,
            'phone_no'    => $phone_no,
            'facebook_id'     => $facebook_id,
            'linkedin'    => $linkedin,
            'twitter'     => $twitter,
            'instagram'    => $instagram,
            'annual_revenue'     => $annual_revenue,
            'percentage_of_revenue'    =>$percentage_of_revenue ,
            'name_of_countries'     => $name_of_countries,
            'category'    => $category,
            'primary_target'     => $primary_target,
            'lives_of_smallholder'    =>$lives_of_smallholder ,
            'signed_agreements'     => $signed_agreements,
            'international_expansion_opportunities'    =>$international_expansion_opportunities,
            'status'     =>'A',
            'slug'      =>$slug,
            //'logo' =>$row['logos'],
            'created_at' =>now(),
            
        ]);
    }
}
