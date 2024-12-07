<?php
require_once('tcpdf/tcpdf.php');

try {
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', true);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetFont('times', 'BI', 20);

    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydata";

    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $id = isset($_REQUEST['Id']) ? intval($_REQUEST['Id']) : 0;

    
    $sql = "SELECT * FROM application_form ";
    $stmt = $connection->prepare($sql);
    // $stmt->bindParam(":id", $id);
    $stmt->execute();

    // if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $pdf->SetFont('helvetica', 'B', 20);
        $pdf->Cell(0, 10, 'FASHIONERA', 0, 1, 'C');
        $pdf->Cell(0, 10, 'FashionEra Application Form', 0, 1, 'C');
        $pdf->Ln(5);

        $fields = [
            'ID' => $row['Id'],
            'First Name' => $row['Fname'],
            'Middle Name' => $row['Mname'],
            'Last Name' => $row['Lname'],
            'College' => $row['College'],
            'Father\'s Name' => $row['Father'],
            'Gender' => $row['Gender'],
            'Email' => $row['Email'],
            'Contact' => $row['Con'],
            'Alternate Contact' => $row['Altcon'],
            'Address' => $row['Add1'] . ' ' . $row['Add2'],
            'City' => $row['City'],
            'State' => $row['State'],
            'Zip Code' => $row['Zip'],
            'Country' => $row['Country'],
            'Degree' => $row['Degree'],
            'Institute' => $row['Institute'],
            'Registration No.' => $row['Reg'],
            'University' => $row['Uni'],
            'Start Date' => $row['Sdate'],
            'End Date' => $row['Edate'],
            'Marks' => $row['Marks'],
            'Current Address' => $row['Cadd'],
            'Current City' => $row['Ccity'],
            'Current State' => $row['Cstate'],
            'Current Zip' => $row['Czip'],
            'Break in Studies' => $row['Q1'],
            'Pending Backlogs' => $row['Q2'],
            'Other Courses' => $row['Q3'],
        ];

        foreach ($fields as $label => $value) {
            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Cell(50, 10, $label . ':', 0, 0);
            $pdf->SetFont('helvetica', '', 12);
            $pdf->Cell(0, 10, $value, 0, 1);
        }

        $pdf->Ln(10);
    // } else {
    //     $pdf->SetFont('helvetica', 'B', 16);
    //     $pdf->Cell(0, 10, 'No submitted record found for the provided ID.', 0, 1, 'C');
    // }

    $pdf->Output('Registration_Form.pdf', 'I');
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "General Error: " . $e->getMessage();
}
