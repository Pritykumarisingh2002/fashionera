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

    $sql = "SELECT MAX(Id) as id FROM application_form";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $row['id'];

    if ($id) {
        $sql = "SELECT * FROM application_form WHERE Id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $application = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($application) {
            $pdf->SetFont('helvetica', 'B', 20);
            $pdf->Cell(0, 10, 'FASHIONERA', 0, 1, 'C');
            $pdf->Cell(0, 10, 'FashionEra Application Form', 0, 1, 'C');
            $pdf->Ln(5);

            $fields = [
                'ID' => $application['Id'],
                'First Name' => $application['Fname'],
                'Middle Name' => $application['Mname'],
                'Last Name' => $application['Lname'],
                'College' => $application['College'],
                'Father\'s Name' => $application['Father'],
                'Gender' => $application['Gender'],
                'Email' => $application['Email'],
                'Contact' => $application['Con'],
                'Alternate Contact' => $application['Altcon'],
                'Address' => $application['Add1'] . ' ' . $application['Add2'],
                'City' => $application['City'],
                'State' => $application['State'],
                'Zip Code' => $application['Zip'],
                'Country' => $application['Country'],
                'Degree' => $application['Degree'],
                'Institute' => $application['Institute'],
                'Registration No.' => $application['Reg'],
                'University' => $application['Uni'],
                'Start Date' => $application['Sdate'],
                'End Date' => $application['Edate'],
                'Marks' => $application['Marks'],
                'Current Address' => $application['Cadd'],
                'Current City' => $application['Ccity'],
                'Current State' => $application['Cstate'],
                'Current Zip' => $application['Czip'],
                'Break in Studies' => $application['Q1'],
                'Pending Backlogs' => $application['Q2'],
                'Other Courses' => $application['Q3'],
            ];

            foreach ($fields as $label => $value) {
                $pdf->SetFont('helvetica', 'B', 12);
                $pdf->Cell(50, 10, $label . ':', 0, 0);
                $pdf->SetFont('helvetica', '', 12);
                $pdf->Cell(0, 10, $value ? $value : 'N/A', 0, 1);
            }

            $pdf->Ln(10);
        } else {
            $pdf->SetFont('helvetica', 'B', 16);
            $pdf->Cell(0, 10, 'No application form found for the maximum ID.', 0, 1, 'C');
        }
    } else {
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'No records found in the application_form table.', 0, 1, 'C');
    }

    $pdf->Output('Registration_Form.pdf', 'I');
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "General Error: " . $e->getMessage();
}
