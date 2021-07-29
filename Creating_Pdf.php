<?php

require('fpdf.php');

$server_Name = 'localhost';
$user_Name = 'root';
$user_Pass = '';
$db_name = 'piaic_db';

$setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);

$query = "SELECT * FROM std_registrations WHERE std_Cnic_No = '$_GET[inputStudentCnic]'";
$running_query = mysqli_query($setting_connection,$query);

$query2 ="SELECT std_Program FROM std_registrations where std_Cnic_No = '$_GET[inputStudentCnic]'";
$running_query2 = mysqli_query($setting_connection,$query);


if($_GET['fees_paid_options'] == 'Dues'){
    if($running_query->num_rows > 0){


        $fetchingData = mysqli_fetch_array($running_query);
        $fetchingData2 = mysqli_fetch_array($running_query2);
        
      
        if($fetchingData2['std_Program'] != "Artificial Intelligence" && $fetchingData2['std_Program'] != "Cloud Computing" && $fetchingData2['std_Program'] != "Block Chain")
        {
            ob_end_clean();
            $pdf = new FPDF('P','mm','A4');
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            // $pdf->Cell(40,10,'Hello World!');
            $pdf->ln();
            $pdf->SetY(60);
            $pdf->SetX(70);
            $pdf->SetTextColor(207, 0, 15);
            $pdf->cell(1,1,'Allowing you today but not after today',0,0,'C');

            $pdf->SetY(10);
            $pdf->cell(192,129,'',1,1,'C');
            $pdf->Image('favicon.png',20,20,30,30);
            $pdf->SetFont('Arial','B',35);
            $pdf->SetY(34);
            $pdf->SetX(8);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->Cell(0,0,'ID Card',0,0,'C');
            
            $pdf->SetY(70);
            $pdf->SetFont('Arial','B',15);
            $pdf->SetTextColor(30, 130, 76);
            
            $pdf->SetX(29.5);
            $pdf->cell(1,1,'Roll No:',0,0,'C');
            $pdf->SetX(42);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['id'],0,0,'C');
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->SetY(25);
            $pdf->SetX(24);
            $pdf->Image($fetchingData['std_image'],160,20,30,30);
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->Image('signature.png',140,80,50,30);
            $pdf->Image('signature.png',140,80,50,30);
            $pdf->Image('signature.png',140,80,50,30);
            
            
            $pdf->Image('signature.png',140,220,50,30);
            $pdf->Image('signature.png',140,220,50,30);
            $pdf->Image('signature.png',140,220,50,30);
            
            
            
            $pdf->SetY(80);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'Full Name: ',0,0,'L');
            $pdf->SetX(47);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_Name'],0,0,'L');
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->SetY(90);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'Course:',0,0,'L');
            $pdf->SetX(40);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_Program'],0,0,'L');
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->SetY(100);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'Distance Learning:',0,0,'L'); 
            $pdf->SetX(67);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['distance_Learning'],0,0,'L');  
            $pdf->Ln(); 
            
            
            $pdf->SetY(110);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'City: ',0,0,'L'); 
            $pdf->SetX(32);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_city'],0,0,'L');  
            $pdf->Ln(); 
            
            
            $pdf->SetY(120);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'CNIC No: ',0,0,'L');
            $pdf->SetX(44);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_Cnic_No'],0,0,'L');  
            $pdf->Ln();
            $pdf->Ln();
            
            $pdf->SetY(130);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'Test Timings: ',0,0,'L');
            $pdf->SetX(54);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_test_Timings'],0,0,'L');  
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetY(110);
            $pdf->SetX(130);
            $pdf->cell(1,1,'_____________________',0,0,'L');
            
            
            $pdf->SetY(120);
            $pdf->SetX(134);
            $pdf->cell(1,1,'Authorized Signature.',0,0,'L');
            
            
            /////////////////////////////////////////////////////////////////////////
            // Admit Card //////////////////////////////////////////////
            
            
            
            $pdf->ln();
            $pdf->SetY(200);
            $pdf->SetX(68);
            $pdf->SetTextColor(207, 0, 15);
            $pdf->cell(1,1,'Allowing you today but not after today',0,0,'C');
            $pdf->SetY(144);
            $pdf->cell(190,132,'',1,1,'C');
            $pdf->Image('favicon.png',20,160,30,30);
            $pdf->SetFont('Arial','B',35);
            $pdf->SetY(175);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->Cell(0,0,'Admit Card',0,0,'C');
            
            
            $pdf->SetY(208);
            $pdf->SetFont('Arial','B',15);
            $pdf->SetTextColor(30, 130, 76);
            
            $pdf->SetX(29.5);
            $pdf->cell(1,1,'Roll No:',0,0,'C');
            $pdf->SetX(42);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['id'],0,0,'C');
            $pdf->Ln();
            $pdf->Ln();
            
            
            // $pdf->SetY(25);
            $pdf->SetX(24);
            $pdf->Image($fetchingData['std_image'],160,160,30,30);
            $pdf->Ln();
            $pdf->Ln();
            
            
            
            $pdf->SetY(218);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'Full Name: ',0,0,'L');
            $pdf->SetX(47);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_Name'],0,0,'L');
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->SetY(227);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'Course:',0,0,'L');
            $pdf->SetX(40);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_Program'],0,0,'L');
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->SetY(236);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'Distance Learning:',0,0,'L'); 
            $pdf->SetX(67);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['distance_Learning'],0,0,'L');  
            $pdf->Ln(); 
            
            
            $pdf->SetY(245);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'City: ',0,0,'L'); 
            $pdf->SetX(32);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_city'],0,0,'L');  
            $pdf->Ln(); 
            
            
            $pdf->SetY(254);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'CNIC No: ',0,0,'L');
            $pdf->SetX(44);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_Cnic_No'],0,0,'L');  
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->SetY(263);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'Test Timings: ',0,0,'L');
            $pdf->SetX(54);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_test_Timings'],0,0,'L');  
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetY(250);
            $pdf->SetX(130);
            $pdf->cell(1,1,'_____________________',0,0,'L');
            
            
            $pdf->SetY(260);
            $pdf->SetX(134);
            $pdf->cell(1,1,'Authorized Signature.',0,0,'L');
            
            
            
            $pdf->Output();
            
        }
        
        
        
        
        
        
        
        
        
        
        // For Artificial Intelligence //////////
        
        
        if ($fetchingData2['std_Program'] == "Artificial Intelligence") {
        
        ob_end_clean();
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        // $pdf->Cell(40,10,'Hello World!');
        $pdf->ln();
        $pdf->SetY(60);
        $pdf->SetX(70);
        $pdf->SetTextColor(207, 0, 15);
        $pdf->cell(1,1,'Allowing you today but not after today',0,0,'C');
        $pdf->SetY(10);
        $pdf->cell(192,129,'',1,1,'C');
        $pdf->Image('favicon.png',20,20,30,30);
        $pdf->SetFont('Arial','B',35);
        $pdf->SetY(34);
        $pdf->SetX(8);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->Cell(0,0,'ID Card',0,0,'C');
        
        $pdf->SetY(70);
        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(30, 130, 76);
        
        $pdf->SetX(29.5);
        $pdf->cell(1,1,'Roll No:',0,0,'C');
        $pdf->SetX(47);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['id'],0,0,'C');
        $pdf->SetX(43);
        $pdf->cell(1,1,'AI',0,0,'C');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(25);
        $pdf->SetX(24);
        $pdf->Image($fetchingData['std_image'],160,20,30,30);
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        
        
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        
        
        
        $pdf->SetY(80);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Full Name: ',0,0,'L');
        $pdf->SetX(47);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Name'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(90);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Course:',0,0,'L');
        $pdf->SetX(40);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Program'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(100);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Distance Learning:',0,0,'L'); 
        $pdf->SetX(67);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['distance_Learning'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(110);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'City: ',0,0,'L'); 
        $pdf->SetX(32);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_city'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(120);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'CNIC No: ',0,0,'L');
        $pdf->SetX(44);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Cnic_No'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        $pdf->SetY(130);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Test Timings: ',0,0,'L');
        $pdf->SetX(54);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_test_Timings'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetY(110);
        $pdf->SetX(130);
        $pdf->cell(1,1,'_____________________',0,0,'L');
        
        
        $pdf->SetY(120);
        $pdf->SetX(134);
        $pdf->cell(1,1,'Authorized Signature.',0,0,'L');
        
        
        /////////////////////////////////////////////////////////////////////////
        // Admit Card //////////////////////////////////////////////
        
        
        
        $pdf->ln();
        $pdf->ln();
        $pdf->SetY(200);
        $pdf->SetX(68);
        $pdf->SetTextColor(207, 0, 15);
        $pdf->cell(1,1,'Allowing you today but not after today',0,0,'C');
        $pdf->SetY(144);
        $pdf->cell(190,132,'',1,1,'C');
        $pdf->Image('favicon.png',20,160,30,30);
        $pdf->SetFont('Arial','B',35);
        $pdf->SetY(175);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->Cell(0,0,'Admit Card',0,0,'C');
        
        
        $pdf->SetY(208);
        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(30, 130, 76);
        
        $pdf->SetX(29.5);
        $pdf->cell(1,1,'Roll No:',0,0,'C');
        $pdf->SetX(47);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['id'],0,0,'C');
        $pdf->SetX(43);
        $pdf->cell(1,1,'AI',0,0,'C');
        $pdf->Ln();
        $pdf->Ln();
        
        
        // $pdf->SetY(25);
        $pdf->SetX(24);
        $pdf->Image($fetchingData['std_image'],160,160,30,30);
        $pdf->Ln();
        $pdf->Ln();
        
        
        
        $pdf->SetY(218);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Full Name: ',0,0,'L');
        $pdf->SetX(47);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Name'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(227);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Course:',0,0,'L');
        $pdf->SetX(40);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Program'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(236);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Distance Learning:',0,0,'L'); 
        $pdf->SetX(67);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['distance_Learning'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(245);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'City: ',0,0,'L'); 
        $pdf->SetX(32);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_city'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(254);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'CNIC No: ',0,0,'L');
        $pdf->SetX(44);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Cnic_No'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(263);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Test Timings: ',0,0,'L');
        $pdf->SetX(54);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_test_Timings'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetY(250);
        $pdf->SetX(130);
        $pdf->cell(1,1,'_____________________',0,0,'L');
        
        
        $pdf->SetY(260);
        $pdf->SetX(134);
        $pdf->cell(1,1,'Authorized Signature.',0,0,'L');
        
        
        
        $pdf->Output();
        
        }
        
        
        
        
        
        ////////////////// Now For Cloud Computing //////////////////
        
            
        
        if ($fetchingData2['std_Program'] == "Cloud Computing") {
        
        ob_end_clean();
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        // $pdf->Cell(40,10,'Hello World!');
        $pdf->ln();
        $pdf->SetY(60);
        $pdf->SetX(70);
        $pdf->SetTextColor(207, 0, 15);
        $pdf->cell(1,1,'Allowing you today but not after today',0,0,'C');
        $pdf->SetY(10);
        $pdf->cell(190,125,'',1,1,'C');
        $pdf->Image('favicon.png',20,20,30,30);
        $pdf->SetFont('Arial','B',35);
        $pdf->SetY(34);
        $pdf->SetX(8);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->Cell(0,0,'ID Card',0,0,'C');
        
        $pdf->SetY(70);
        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(30, 130, 76);
        
        $pdf->SetX(29.5);
        $pdf->cell(1,1,'Roll No:',0,0,'C');
        $pdf->SetX(49);
        $pdf->SetTextColor(1, 50, 67);
        
        
        $pdf->cell(1,1,$fetchingData['id'],0,0,'C');
        $pdf->SetX(44);
        $pdf->cell(1,1,'CC',0,0,'C');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(25);
        $pdf->SetX(24);
        $pdf->Image($fetchingData['std_image'],160,20,30,30);
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        
        
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        
        
        
        $pdf->SetY(80);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Full Name: ',0,0,'L');
        $pdf->SetX(47);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Name'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(90);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Course:',0,0,'L');
        $pdf->SetX(40);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Program'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(100);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Distance Learning:',0,0,'L'); 
        $pdf->SetX(67);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['distance_Learning'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(110);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'City: ',0,0,'L'); 
        $pdf->SetX(32);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_city'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(120);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'CNIC No: ',0,0,'L');
        $pdf->SetX(44);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Cnic_No'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        $pdf->SetY(130);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Test Timings: ',0,0,'L');
        $pdf->SetX(54);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_test_Timings'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetY(110);
        $pdf->SetX(130);
        $pdf->cell(1,1,'_____________________',0,0,'L');
        
        
        $pdf->SetY(120);
        $pdf->SetX(134);
        $pdf->cell(1,1,'Authorized Signature.',0,0,'L');
        
        
        /////////////////////////////////////////////////////////////////////////
        // Admit Card //////////////////////////////////////////////
        
        $pdf->ln();
        $pdf->ln();
        $pdf->SetY(200);
        $pdf->SetX(68);
        $pdf->SetTextColor(207, 0, 15);
        $pdf->cell(1,1,'Allowing you today but not after today',0,0,'C');
        $pdf->SetY(150);
        $pdf->cell(190,125,'',1,1,'C');
        $pdf->Image('favicon.png',20,160,30,30);
        $pdf->SetFont('Arial','B',35);
        $pdf->SetY(175);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->Cell(0,0,'Admit Card',0,0,'C');
        
        
        $pdf->SetY(210);
        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(30, 130, 76);
        
        $pdf->SetX(29.5);
        $pdf->cell(1,1,'Roll No:',0,0,'C');
        $pdf->SetX(49);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['id'],0,0,'C');
        $pdf->SetX(44);
        $pdf->cell(1,1,'CC',0,0,'C');
        $pdf->Ln();
        $pdf->Ln();
        
        
        // $pdf->SetY(25);
        $pdf->SetX(24);
        $pdf->Image($fetchingData['std_image'],160,160,30,30);
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        
        
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        
        
        
        $pdf->SetY(220);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Full Name: ',0,0,'L');
        $pdf->SetX(47);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Name'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(230);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Course:',0,0,'L');
        $pdf->SetX(40);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Program'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(240);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Distance Learning:',0,0,'L'); 
        $pdf->SetX(67);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['distance_Learning'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(250);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'City: ',0,0,'L'); 
        $pdf->SetX(32);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_city'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(260);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'CNIC No: ',0,0,'L');
        $pdf->SetX(44);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Cnic_No'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(269);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Test Timings: ',0,0,'L');
        $pdf->SetX(54);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_test_Timings'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetY(250);
        $pdf->SetX(130);
        $pdf->cell(1,1,'_____________________',0,0,'L');
        
        
        $pdf->SetY(260);
        $pdf->SetX(134);
        $pdf->cell(1,1,'Authorized Signature.',0,0,'L');
        
        
        
        $pdf->Output();
        
        }
        
        
        
        ///////////// Now For BlockChain /////////////
        
        
        if ($fetchingData2['std_Program'] == "Block Chain") {
        
        ob_end_clean();
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        // $pdf->Cell(40,10,'Hello World!');
        $pdf->SetY(60);
        $pdf->SetX(70);
        $pdf->SetTextColor(207, 0, 15);
        $pdf->cell(1,1,'Allowing you today but not after today',0,0,'C');
        $pdf->ln();
        $pdf->SetY(10);
        $pdf->cell(190,125,'',1,1,'C');
        $pdf->Image('favicon.png',20,20,30,30);
        $pdf->SetFont('Arial','B',35);
        $pdf->SetY(34);
        $pdf->SetX(8);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->Cell(0,0,'ID Card',0,0,'C');
        
        $pdf->SetY(70);
        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(30, 130, 76);
        
        $pdf->SetX(29.5);
        $pdf->cell(1,1,'Roll No:',0,0,'C');
        $pdf->SetX(49);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['id'],0,0,'C');
        $pdf->SetX(44);
        $pdf->cell(1,1,'BC',0,0,'C');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(25);
        $pdf->SetX(24);
        $pdf->Image($fetchingData['std_image'],160,20,30,30);
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        
        
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        
        
        
        $pdf->SetY(80);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Full Name: ',0,0,'L');
        $pdf->SetX(47);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Name'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(90);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Course:',0,0,'L');
        $pdf->SetX(40);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Program'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(100);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Distance Learning:',0,0,'L'); 
        $pdf->SetX(67);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['distance_Learning'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(110);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'City: ',0,0,'L'); 
        $pdf->SetX(32);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_city'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(120);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'CNIC No: ',0,0,'L');
        $pdf->SetX(44);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Cnic_No'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(130);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Test Timings: ',0,0,'L');
        $pdf->SetX(54);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_test_Timings'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetY(110);
        $pdf->SetX(130);
        $pdf->cell(1,1,'_____________________',0,0,'L');
        
        
        $pdf->SetY(120);
        $pdf->SetX(134);
        $pdf->cell(1,1,'Authorized Signature.',0,0,'L');
        
        
        /////////////////////////////////////////////////////////////////////////
        // Admit Card //////////////////////////////////////////////
        
        $pdf->ln();
        $pdf->ln();
        $pdf->SetY(200);
        $pdf->SetX(68);
        $pdf->SetTextColor(207, 0, 15);
        $pdf->cell(1,1,'Allowing you today but not after today',0,0,'C');
        $pdf->SetY(150);
        $pdf->cell(190,125,'',1,1,'C');
        $pdf->Image('favicon.png',20,160,30,30);
        $pdf->SetFont('Arial','B',35);
        $pdf->SetY(175);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->Cell(0,0,'Admit Card',0,0,'C');
        
        
        $pdf->SetY(210);
        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(30, 130, 76);
        
        $pdf->SetX(29.5);
        $pdf->cell(1,1,'Roll No:',0,0,'C');
        $pdf->SetX(49);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['id'],0,0,'C');
        $pdf->SetX(44);
        $pdf->cell(1,1,'BC',0,0,'C');
        $pdf->Ln();
        $pdf->Ln();
        
        
        // $pdf->SetY(25);
        $pdf->SetX(24);
        $pdf->Image($fetchingData['std_image'],160,160,30,30);
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        
        
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        
        
        
        
        $pdf->SetY(220);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Full Name: ',0,0,'L');
        $pdf->SetX(47);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Name'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(230);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Course:',0,0,'L');
        $pdf->SetX(40);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Program'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(240);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Distance Learning:',0,0,'L'); 
        $pdf->SetX(67);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['distance_Learning'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(250);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'City: ',0,0,'L'); 
        $pdf->SetX(32);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_city'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(260);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'CNIC No: ',0,0,'L');
        $pdf->SetX(44);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Cnic_No'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(269);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Test Timings: ',0,0,'L');
        $pdf->SetX(54);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_test_Timings'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetY(250);
        $pdf->SetX(130);
        $pdf->cell(1,1,'_____________________',0,0,'L');
        
        
        $pdf->SetY(260);
        $pdf->SetX(134);
        $pdf->cell(1,1,'Authorized Signature.',0,0,'L');
        
        
        $pdf->Output();
        
        }
        
        
        
        }
        
        else{    
            echo "<script>alert('Please Insert Correct CNIC Numbers'); window.location = 'Print_Card.php'</script>";
        }
}








else{

    if($running_query->num_rows > 0){


        $fetchingData = mysqli_fetch_array($running_query);
        $fetchingData2 = mysqli_fetch_array($running_query2);
        
        
        
        
        if($fetchingData2['std_Program'] != "Artificial Intelligence" && $fetchingData2['std_Program'] != "Cloud Computing" && $fetchingData2['std_Program'] != "Block Chain")
        {
            ob_end_clean();
            $pdf = new FPDF('P','mm','A4');
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            // $pdf->Cell(40,10,'Hello World!');
            $pdf->ln();
            $pdf->SetY(10);
            $pdf->cell(192,129,'',1,1,'C');
            $pdf->Image('favicon.png',20,20,30,30);
            $pdf->SetFont('Arial','B',35);
            $pdf->SetY(34);
            $pdf->SetX(8);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->Cell(0,0,'ID Card',0,0,'C');
            
            $pdf->SetY(70);
            $pdf->SetFont('Arial','B',15);
            $pdf->SetTextColor(30, 130, 76);
            
            $pdf->SetX(29.5);
            $pdf->cell(1,1,'Roll No:',0,0,'C');
            $pdf->SetX(42);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['id'],0,0,'C');
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->SetY(25);
            $pdf->SetX(24);
            $pdf->Image($fetchingData['std_image'],160,20,30,30);
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->Image('signature.png',140,80,50,30);
            $pdf->Image('signature.png',140,80,50,30);
            $pdf->Image('signature.png',140,80,50,30);
            
            
            $pdf->Image('signature.png',140,220,50,30);
            $pdf->Image('signature.png',140,220,50,30);
            $pdf->Image('signature.png',140,220,50,30);
            
            
            
            $pdf->SetY(80);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'Full Name: ',0,0,'L');
            $pdf->SetX(47);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_Name'],0,0,'L');
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->SetY(90);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'Course:',0,0,'L');
            $pdf->SetX(40);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_Program'],0,0,'L');
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->SetY(100);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'Distance Learning:',0,0,'L'); 
            $pdf->SetX(67);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['distance_Learning'],0,0,'L');  
            $pdf->Ln(); 
            
            
            $pdf->SetY(110);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'City: ',0,0,'L'); 
            $pdf->SetX(32);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_city'],0,0,'L');  
            $pdf->Ln(); 
            
            
            $pdf->SetY(120);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'CNIC No: ',0,0,'L');
            $pdf->SetX(44);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_Cnic_No'],0,0,'L');  
            $pdf->Ln();
            $pdf->Ln();
            
            $pdf->SetY(130);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'Test Timings: ',0,0,'L');
            $pdf->SetX(54);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_test_Timings'],0,0,'L');  
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetY(110);
            $pdf->SetX(130);
            $pdf->cell(1,1,'_____________________',0,0,'L');
            
            
            $pdf->SetY(120);
            $pdf->SetX(134);
            $pdf->cell(1,1,'Authorized Signature.',0,0,'L');
            
            
            /////////////////////////////////////////////////////////////////////////
            // Admit Card //////////////////////////////////////////////
            
            
            
            $pdf->ln();
            $pdf->SetY(144);
            $pdf->cell(190,132,'',1,1,'C');
            $pdf->Image('favicon.png',20,160,30,30);
            $pdf->SetFont('Arial','B',35);
            $pdf->SetY(175);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->Cell(0,0,'Admit Card',0,0,'C');
            
            
            $pdf->SetY(208);
            $pdf->SetFont('Arial','B',15);
            $pdf->SetTextColor(30, 130, 76);
            
            $pdf->SetX(29.5);
            $pdf->cell(1,1,'Roll No:',0,0,'C');
            $pdf->SetX(42);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['id'],0,0,'C');
            $pdf->Ln();
            $pdf->Ln();
            
            
            // $pdf->SetY(25);
            $pdf->SetX(24);
            $pdf->Image($fetchingData['std_image'],160,160,30,30);
            $pdf->Ln();
            $pdf->Ln();
            
            
            
            $pdf->SetY(218);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'Full Name: ',0,0,'L');
            $pdf->SetX(47);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_Name'],0,0,'L');
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->SetY(227);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'Course:',0,0,'L');
            $pdf->SetX(40);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_Program'],0,0,'L');
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->SetY(236);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'Distance Learning:',0,0,'L'); 
            $pdf->SetX(67);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['distance_Learning'],0,0,'L');  
            $pdf->Ln(); 
            
            
            $pdf->SetY(245);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'City: ',0,0,'L'); 
            $pdf->SetX(32);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_city'],0,0,'L');  
            $pdf->Ln(); 
            
            
            $pdf->SetY(254);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'CNIC No: ',0,0,'L');
            $pdf->SetX(44);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_Cnic_No'],0,0,'L');  
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->SetY(263);
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetX(18.3);
            $pdf->cell(1,1,'Test Timings: ',0,0,'L');
            $pdf->SetX(54);
            $pdf->SetTextColor(1, 50, 67);
            $pdf->cell(1,1,$fetchingData['std_test_Timings'],0,0,'L');  
            $pdf->Ln();
            $pdf->Ln();
            
            
            $pdf->SetTextColor(30, 130, 76);
            $pdf->SetY(250);
            $pdf->SetX(130);
            $pdf->cell(1,1,'_____________________',0,0,'L');
            
            
            $pdf->SetY(260);
            $pdf->SetX(134);
            $pdf->cell(1,1,'Authorized Signature.',0,0,'L');
            
            
            
            $pdf->Output();
            
        }
        
        
        
        
        
        
        
        
        
        
        // For Artificial Intelligence //////////
        
        
        if ($fetchingData2['std_Program'] == "Artificial Intelligence") {
        
        ob_end_clean();
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        // $pdf->Cell(40,10,'Hello World!');
        $pdf->ln();
        $pdf->SetY(10);
        $pdf->cell(192,129,'',1,1,'C');
        $pdf->Image('favicon.png',20,20,30,30);
        $pdf->SetFont('Arial','B',35);
        $pdf->SetY(34);
        $pdf->SetX(8);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->Cell(0,0,'ID Card',0,0,'C');
        
        $pdf->SetY(70);
        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(30, 130, 76);
        
        $pdf->SetX(29.5);
        $pdf->cell(1,1,'Roll No:',0,0,'C');
        $pdf->SetX(47);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['id'],0,0,'C');
        $pdf->SetX(43);
        $pdf->cell(1,1,'AI',0,0,'C');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(25);
        $pdf->SetX(24);
        $pdf->Image($fetchingData['std_image'],160,20,30,30);
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        
        
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        
        
        
        $pdf->SetY(80);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Full Name: ',0,0,'L');
        $pdf->SetX(47);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Name'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(90);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Course:',0,0,'L');
        $pdf->SetX(40);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Program'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(100);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Distance Learning:',0,0,'L'); 
        $pdf->SetX(67);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['distance_Learning'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(110);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'City: ',0,0,'L'); 
        $pdf->SetX(32);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_city'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(120);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'CNIC No: ',0,0,'L');
        $pdf->SetX(44);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Cnic_No'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        $pdf->SetY(130);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Test Timings: ',0,0,'L');
        $pdf->SetX(54);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_test_Timings'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetY(110);
        $pdf->SetX(130);
        $pdf->cell(1,1,'_____________________',0,0,'L');
        
        
        $pdf->SetY(120);
        $pdf->SetX(134);
        $pdf->cell(1,1,'Authorized Signature.',0,0,'L');
        
        
        /////////////////////////////////////////////////////////////////////////
        // Admit Card //////////////////////////////////////////////
        
        
        
        $pdf->ln();
        $pdf->SetY(144);
        $pdf->cell(190,132,'',1,1,'C');
        $pdf->Image('favicon.png',20,160,30,30);
        $pdf->SetFont('Arial','B',35);
        $pdf->SetY(175);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->Cell(0,0,'Admit Card',0,0,'C');
        
        
        $pdf->SetY(208);
        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(30, 130, 76);
        
        $pdf->SetX(29.5);
        $pdf->cell(1,1,'Roll No:',0,0,'C');
        $pdf->SetX(47);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['id'],0,0,'C');
        $pdf->SetX(43);
        $pdf->cell(1,1,'AI',0,0,'C');
        $pdf->Ln();
        $pdf->Ln();
        
        
        // $pdf->SetY(25);
        $pdf->SetX(24);
        $pdf->Image($fetchingData['std_image'],160,160,30,30);
        $pdf->Ln();
        $pdf->Ln();
        
        
        
        $pdf->SetY(218);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Full Name: ',0,0,'L');
        $pdf->SetX(47);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Name'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(227);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Course:',0,0,'L');
        $pdf->SetX(40);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Program'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(236);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Distance Learning:',0,0,'L'); 
        $pdf->SetX(67);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['distance_Learning'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(245);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'City: ',0,0,'L'); 
        $pdf->SetX(32);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_city'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(254);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'CNIC No: ',0,0,'L');
        $pdf->SetX(44);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Cnic_No'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(263);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Test Timings: ',0,0,'L');
        $pdf->SetX(54);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_test_Timings'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetY(250);
        $pdf->SetX(130);
        $pdf->cell(1,1,'_____________________',0,0,'L');
        
        
        $pdf->SetY(260);
        $pdf->SetX(134);
        $pdf->cell(1,1,'Authorized Signature.',0,0,'L');
        
        
        
        $pdf->Output();
        
        }
        
        
        
        
        
        ////////////////// Now For Cloud Computing //////////////////
        
            
        
        if ($fetchingData2['std_Program'] == "Cloud Computing") {
        
        ob_end_clean();
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        // $pdf->Cell(40,10,'Hello World!');
        $pdf->ln();
        $pdf->SetY(10);
        $pdf->cell(190,125,'',1,1,'C');
        $pdf->Image('favicon.png',20,20,30,30);
        $pdf->SetFont('Arial','B',35);
        $pdf->SetY(34);
        $pdf->SetX(8);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->Cell(0,0,'ID Card',0,0,'C');
        
        $pdf->SetY(70);
        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(30, 130, 76);
        
        $pdf->SetX(29.5);
        $pdf->cell(1,1,'Roll No:',0,0,'C');
        $pdf->SetX(49);
        $pdf->SetTextColor(1, 50, 67);
        
        
        $pdf->cell(1,1,$fetchingData['id'],0,0,'C');
        $pdf->SetX(44);
        $pdf->cell(1,1,'CC',0,0,'C');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(25);
        $pdf->SetX(24);
        $pdf->Image($fetchingData['std_image'],160,20,30,30);
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        
        
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        
        
        
        $pdf->SetY(80);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Full Name: ',0,0,'L');
        $pdf->SetX(47);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Name'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(90);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Course:',0,0,'L');
        $pdf->SetX(40);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Program'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(100);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Distance Learning:',0,0,'L'); 
        $pdf->SetX(67);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['distance_Learning'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(110);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'City: ',0,0,'L'); 
        $pdf->SetX(32);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_city'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(120);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'CNIC No: ',0,0,'L');
        $pdf->SetX(44);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Cnic_No'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        $pdf->SetY(130);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Test Timings: ',0,0,'L');
        $pdf->SetX(54);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_test_Timings'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetY(110);
        $pdf->SetX(130);
        $pdf->cell(1,1,'_____________________',0,0,'L');
        
        
        $pdf->SetY(120);
        $pdf->SetX(134);
        $pdf->cell(1,1,'Authorized Signature.',0,0,'L');
        
        
        /////////////////////////////////////////////////////////////////////////
        // Admit Card //////////////////////////////////////////////
        
        $pdf->ln();
        $pdf->SetY(150);
        $pdf->cell(190,125,'',1,1,'C');
        $pdf->Image('favicon.png',20,160,30,30);
        $pdf->SetFont('Arial','B',35);
        $pdf->SetY(175);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->Cell(0,0,'Admit Card',0,0,'C');
        
        
        $pdf->SetY(210);
        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(30, 130, 76);
        
        $pdf->SetX(29.5);
        $pdf->cell(1,1,'Roll No:',0,0,'C');
        $pdf->SetX(49);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['id'],0,0,'C');
        $pdf->SetX(44);
        $pdf->cell(1,1,'CC',0,0,'C');
        $pdf->Ln();
        $pdf->Ln();
        
        
        // $pdf->SetY(25);
        $pdf->SetX(24);
        $pdf->Image($fetchingData['std_image'],160,160,30,30);
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        
        
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        
        
        
        $pdf->SetY(220);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Full Name: ',0,0,'L');
        $pdf->SetX(47);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Name'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(230);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Course:',0,0,'L');
        $pdf->SetX(40);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Program'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(240);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Distance Learning:',0,0,'L'); 
        $pdf->SetX(67);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['distance_Learning'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(250);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'City: ',0,0,'L'); 
        $pdf->SetX(32);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_city'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(260);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'CNIC No: ',0,0,'L');
        $pdf->SetX(44);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Cnic_No'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(269);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Test Timings: ',0,0,'L');
        $pdf->SetX(54);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_test_Timings'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetY(250);
        $pdf->SetX(130);
        $pdf->cell(1,1,'_____________________',0,0,'L');
        
        
        $pdf->SetY(260);
        $pdf->SetX(134);
        $pdf->cell(1,1,'Authorized Signature.',0,0,'L');
        
        
        
        $pdf->Output();
        
        }
        
        
        
        ///////////// Now For BlockChain /////////////
        
        
        if ($fetchingData2['std_Program'] == "Block Chain") {
        
        ob_end_clean();
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        // $pdf->Cell(40,10,'Hello World!');
        $pdf->ln();
        $pdf->SetY(10);
        $pdf->cell(190,125,'',1,1,'C');
        $pdf->Image('favicon.png',20,20,30,30);
        $pdf->SetFont('Arial','B',35);
        $pdf->SetY(34);
        $pdf->SetX(8);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->Cell(0,0,'ID Card',0,0,'C');
        
        $pdf->SetY(70);
        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(30, 130, 76);
        
        $pdf->SetX(29.5);
        $pdf->cell(1,1,'Roll No:',0,0,'C');
        $pdf->SetX(49);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['id'],0,0,'C');
        $pdf->SetX(44);
        $pdf->cell(1,1,'BC',0,0,'C');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(25);
        $pdf->SetX(24);
        $pdf->Image($fetchingData['std_image'],160,20,30,30);
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        
        
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        
        
        
        $pdf->SetY(80);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Full Name: ',0,0,'L');
        $pdf->SetX(47);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Name'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(90);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Course:',0,0,'L');
        $pdf->SetX(40);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Program'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(100);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Distance Learning:',0,0,'L'); 
        $pdf->SetX(67);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['distance_Learning'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(110);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'City: ',0,0,'L'); 
        $pdf->SetX(32);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_city'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(120);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'CNIC No: ',0,0,'L');
        $pdf->SetX(44);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Cnic_No'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(130);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Test Timings: ',0,0,'L');
        $pdf->SetX(54);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_test_Timings'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetY(110);
        $pdf->SetX(130);
        $pdf->cell(1,1,'_____________________',0,0,'L');
        
        
        $pdf->SetY(120);
        $pdf->SetX(134);
        $pdf->cell(1,1,'Authorized Signature.',0,0,'L');
        
        
        /////////////////////////////////////////////////////////////////////////
        // Admit Card //////////////////////////////////////////////
        
        $pdf->ln();
        $pdf->SetY(150);
        $pdf->cell(190,125,'',1,1,'C');
        $pdf->Image('favicon.png',20,160,30,30);
        $pdf->SetFont('Arial','B',35);
        $pdf->SetY(175);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->Cell(0,0,'Admit Card',0,0,'C');
        
        
        $pdf->SetY(210);
        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(30, 130, 76);
        
        $pdf->SetX(29.5);
        $pdf->cell(1,1,'Roll No:',0,0,'C');
        $pdf->SetX(49);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['id'],0,0,'C');
        $pdf->SetX(44);
        $pdf->cell(1,1,'BC',0,0,'C');
        $pdf->Ln();
        $pdf->Ln();
        
        
        // $pdf->SetY(25);
        $pdf->SetX(24);
        $pdf->Image($fetchingData['std_image'],160,160,30,30);
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        $pdf->Image('signature.png',140,80,50,30);
        
        
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        $pdf->Image('signature.png',140,220,50,30);
        
        
        
        
        $pdf->SetY(220);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Full Name: ',0,0,'L');
        $pdf->SetX(47);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Name'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(230);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Course:',0,0,'L');
        $pdf->SetX(40);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Program'],0,0,'L');
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(240);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Distance Learning:',0,0,'L'); 
        $pdf->SetX(67);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['distance_Learning'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(250);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'City: ',0,0,'L'); 
        $pdf->SetX(32);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_city'],0,0,'L');  
        $pdf->Ln(); 
        
        
        $pdf->SetY(260);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'CNIC No: ',0,0,'L');
        $pdf->SetX(44);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_Cnic_No'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetY(269);
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetX(18.3);
        $pdf->cell(1,1,'Test Timings: ',0,0,'L');
        $pdf->SetX(54);
        $pdf->SetTextColor(1, 50, 67);
        $pdf->cell(1,1,$fetchingData['std_test_Timings'],0,0,'L');  
        $pdf->Ln();
        $pdf->Ln();
        
        
        $pdf->SetTextColor(30, 130, 76);
        $pdf->SetY(250);
        $pdf->SetX(130);
        $pdf->cell(1,1,'_____________________',0,0,'L');
        
        
        $pdf->SetY(260);
        $pdf->SetX(134);
        $pdf->cell(1,1,'Authorized Signature.',0,0,'L');
        
        
        $pdf->Output();
        
        }
        
        
        
        }
        
        else{    
            echo "<script>alert('Please Insert Correct CNIC Numbers'); window.location = 'Print_Card.php'</script>";
        }

}



?>