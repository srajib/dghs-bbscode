<?php

function reportError()
{
    die('Report has not been found.');
}

$doIt = 'allCode';

if (empty($doIt)) {

    reportError();

} else {

    function xlsBOF()
    {
        echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    }

    function xlsEOF()
    {
        echo pack("ss", 0x0A, 0x00);
    }

    function xlsWriteNumber($Row, $Col, $Value)
    {
        echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
        echo pack("d", $Value);
    }

    function xlsWriteLabel($Row, $Col, $Value)
    {
        $L = strlen($Value);
        echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
        echo $Value;
    }

    function setXlsHeaders()
    {
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Transfer-Encoding: binary ");
    }

    include ('conn.php');

    ini_set('max_execution_time', 10 * 60);

    if ($doIt === 'get-found-report') {

        $result = mysql_query("
            SELECT * from bbscode
            ORDER BY division ASC, district ASC, upazilla ASC, `name` ASC") OR die('Query does not run');

        if (($row = mysql_fetch_array($result))) {

            setXlsHeaders();
            header("Content-Disposition: attachment;filename=All-Code.xls");

            xlsBOF();

            $xlsHeaders = array(
              "Division", "Division Code","District","District Code", "Upazilla","Upazilla Code",
                "Union", "Union code",
            );

            foreach($xlsHeaders AS $key => $header) {
                xlsWriteLabel(0, $key, $header);
            }

            $xlsRow = 1;
            do {
                $count = 0;
                xlsWriteLabel($xlsRow, $count++, $row['division']);
                xlsWriteLabel($xlsRow, $count++, $row['district']);
                xlsWriteLabel($xlsRow, $count++, $row['upazilla']);
                xlsWriteLabel($xlsRow, $count++, $row['name']);
                $xlsRow++;

            } while (($row = mysql_fetch_array($result)));

            xlsEOF();
        } else {
            reportError();
        }

    }
	
	}
?>