<?php
/**
 *
 */
class PagesController extends AppController
{

    public $name = 'Pages';
    public $helpers = array('Paginator');

    public function display() {
        ini_set('memory_limit','128M');
        set_time_limit(7000);

        $this->layout = "admin_layout";

        $this->loadModel('Upazilla');
        $this->loadModel('District');
        $this->loadModel('Division');
        $this->loadModel('Union');

        $AllCode=$this->Upazilla->query("SELECT  divi.name AS div_name, upa.div_code, upa.district_code, dis.name AS dis_name,uni.`union_name` , uni.`total_population` , uni.`union_code` ,upa.name AS upa_name,upa.upazilla_code
FROM `unions` AS uni
JOIN upazillas AS upa ON upa.`upazilla_code` = uni.upazilla_code
AND upa.div_code = uni.division_code
AND uni.district_code = upa.district_code
JOIN districts AS dis ON dis.district_code = upa.district_code
JOIN divisions AS divi ON divi.div_code = upa.div_code
	");
        $this->set('AllCode',$AllCode);
    }

    public function all() {
        set_time_limit(4000);
        $this->layout = "admin_layout";
        $this->loadModel('Bbscode');
        $this->paginate['limit'] = 100;
        $AllCode=$this->paginate('Bbscode');
        $this->set('AllCode',$AllCode);
    }


    public function division() {
        set_time_limit(4000);
        $this->layout = "admin_layout";
        $this->loadModel('Division');
        $this->paginate['limit'] = 100;
        $AllCode=$this->paginate('Division');
        $this->set('AllCode',$AllCode);
    }

    public function district() {
        set_time_limit(4000);
        $this->layout = "admin_layout";
        $this->loadModel('District');
        $this->paginate['limit'] = 100;
        $AllCode=$this->paginate('District');
        $this->set('AllCode',$AllCode);
    }

    public function geohierarchy() {
        $this->layout = "inner_layout";
    }

    public function import() {
        $this->layout = "admin_layout";
        $this->loadModel('Bbscode');
        $messages = $this->Bbscode->import('bbs.csv');
        $this->set('messages', $messages);

    }



    function importupload() {
        $messages = $this->Post->import('posts.csv');
        $this->set('messages', $messages);
    }

    public function search() {
        set_time_limit(4000);

        $this->layout = "inner_layout";
        $this->loadModel('Upazilla');
        $this->loadModel('District');
        $this->loadModel('Division');



        $AllCode=$this->Upazilla->query("SELECT upazillas. * , districts.`name` AS district, divisions.name AS division
                 FROM upazillas
                 JOIN districts ON districts.district_code = upazillas.`district_code` 
                 JOIN divisions ON districts.div_code = divisions.div_code");
        $this->set('AllCode',$AllCode);

        $Division = $this->Division->find('list');
        $this->set('Division',$Division);

        $District2 = $this->District->find('list');
        $this->set('District',$District2);

        $upazilla = $this->Upazilla->find('list');
        $this->set('upazilla',$upazilla);

    }

    function getdistricts(){
        $this->loadModel('District');

        $districts[NULL] = '--Select--';

        if($this->data) {
            $districts = $this->Bbscode->find('all', array('conditions'=>array('Bbscode.division'=>$this->data['Bbscode']['division']),'fields'=>array('DISTINCT(Bbscode.district) AS TDistrict'),'order'=>'Bbscode.district asc'));
            foreach($districts as $district)

                $distinct_district[$district['Bbscode']['TDistrict']] = $district['Bbscode']['TDistrict'];



            $this->set('districts', $distinct_district );
        }else
        {$districts[NULL] = '--Select--';
            $districts = $this->Bbscode->find('all', array('fields'=>array('DISTINCT(Bbscode.district) AS TDistrict'),'order'=>'Bbscode.district asc'));
        }
        foreach($districts as $district)

            $distinct_district[$district['Bbscode']['TDistrict']] = $district['Bbscode']['TDistrict'];

        $this->set('districts', $distinct_district );

    }


    function getupozila(){

        $this->loadModel('Bbscode');
        $upozilas[NULL] = '--Select--';
        $upozilas += $this->Bbscode->find('list',array('conditions'=>array('Bbscode.district'=>  $this->data['Bbscode']['district']),'fields'=>array('Bbscode.upazilla','Bbscode.upazilla'),'order' => array('Bbscode.upazilla ASC')));
        $this->set(compact('upozilas'));
    }

    function getunion()
    {
        $this->loadModel('Bbscode');
        $unions[NULL] = '--Select--';
        $unions += $this->Bbscode->find('list',array('conditions'=>array('Bbscode.upazilla'=>  $this->data['Bbscode']['upazilla']),'fields'=>array('Bbscode.name','Bbscode.name'),'order' => array('Bbscode.name ASC')));
        $this->set(compact('unions'));
    }


    /**
     * Return list of districts by Division Id
     *
     * @param $id
     * @return array
     */
    public function getdistrictbydivid($id)
    {
        $this->layout      = '';
        $distinct_district = array();

        $this->loadModel('District');
        $districts = $this->District->find('list', array('conditions' => array('div_code' => $id),
                                                         'fields'     => array('District.district_code', 'District.name')));
        $this->set('districts', $districts);
        $this->render('/pages/getdistricts');
    }

    /**
     * Return list of districts by District Id
     *
     * @param $id
     * @return array
     */
    public function getUpazilabydivid($id)
    {
        $this->layout = '';
        $upazilla     = array();

        $this->loadModel('Upazilla');
        $upazillas = $this->Upazilla->find('list', array('conditions' => array('district_code' => $id),
                                                         'fields'     => array('Upazilla.id', 'Upazilla.name')));
        $this->set('upozilas', $upazillas);
        $this->render('/pages/getupozila');
    }


    function divReport($BbscodeDivision=null)
    {
        set_time_limit(4000);

        $this->layout="report_layout";
        $this->loadModel('District');
        $this->loadModel('Division');
        $this->loadModel('Upazilla');
        $this->set('AllCode','');

        if(!empty($BbscodeDivision)){

            $AllCode=$this->Upazilla->query("SELECT divi.name AS div_name, upa.div_code, upa.district_code,
				dis.name AS dis_name,uni.`union_name` , uni.`total_population` , uni.`union_code` ,
				upa.name AS upa_name,upa.upazilla_code
				FROM `unions` AS uni
				JOIN upazillas AS upa ON upa.`upazilla_code` = uni.upazilla_code
				AND upa.div_code = uni.division_code
				AND uni.district_code = upa.district_code
				JOIN districts AS dis ON dis.district_code = upa.district_code
				JOIN divisions AS divi ON divi.div_code = upa.div_code
				WHERE uni.division_code = '$BbscodeDivision'
				 ");

            // echo "<pre>";
            // print_r( $AllCode);

            $districtCount=$this->Upazilla->query("SELECT districts.name
                  FROM districts
				  WHERE districts.div_code = '$BbscodeDivision'
				 ");

            $upazillaCount=$this->Upazilla->query("SELECT upazillas.name
                 FROM upazillas
				  WHERE upazillas.div_code = '$BbscodeDivision'
				 ");

            /*$unionCount=$this->Upazilla->query("SELECT union.name
                FROM upazillas
                 WHERE upazillas.div_code = '$BbscodeDivision'
                ");
               */

            $this->set('districtCount',count($districtCount));
            $this->set('upazillaCount',count($upazillaCount));
            $this->set('unionCount',count($AllCode));
            $this->set('AllCode',$AllCode);
        }else{
            $AllCode=$this->Upazilla->query("SELECT divi.name AS div_name, upa.div_code, upa.district_code,
				dis.name AS dis_name,uni.`union_name` , uni.`total_population` , uni.`union_code` ,
				upa.name AS upa_name,upa.upazilla_code
				FROM `unions` AS uni
				JOIN upazillas AS upa ON upa.`upazilla_code` = uni.upazilla_code
				AND upa.div_code = uni.division_code
				AND uni.district_code = upa.district_code
				JOIN districts AS dis ON dis.district_code = upa.district_code
				JOIN divisions AS divi ON divi.div_code = upa.div_code			 
				 ");
            $districtCount=$this->Upazilla->query("SELECT districts.name
                  FROM districts
				 ");

            $upazillaCount=$this->Upazilla->query("SELECT upazillas.name
                 FROM upazillas
				 ");
            $this->set('AllCode',$AllCode);
            $this->set('unionCount',count($AllCode));
            $this->set('districtCount',count($districtCount));
            $this->set('upazillaCount',count($upazillaCount));
        }
    }

    function disReport($BbscodeDistrict=null)
    {
        set_time_limit(4000);

        $this->layout="report_layout";
        $this->set('AllCode','');
        $this->loadModel('District');
        $this->loadModel('Division');
        $this->loadModel('Upazilla');
        $this->set('AllCode','');

        if(!empty($BbscodeDistrict)){

            $AllCode=$this->Upazilla->query("SELECT divi.name AS div_name, upa.div_code, upa.district_code,
				dis.name AS dis_name,uni.`union_name` , uni.`total_population` , uni.`union_code` ,
				upa.name AS upa_name,upa.upazilla_code
				FROM `unions` AS uni
				JOIN upazillas AS upa ON upa.`upazilla_code` = uni.upazilla_code
				AND upa.div_code = uni.division_code
				AND uni.district_code = upa.district_code
				JOIN districts AS dis ON dis.district_code = upa.district_code
				JOIN divisions AS divi ON divi.div_code = upa.div_code
				WHERE uni.district_code = '$BbscodeDistrict'");



            $districtCount=$this->Upazilla->query("SELECT districts.name
                 FROM districts
				  WHERE districts.district_code = '$BbscodeDistrict'
				  
				 ");

            $upazillaCount=$this->Upazilla->query("SELECT upazillas.name
                 FROM upazillas
				  WHERE upazillas.district_code = '$BbscodeDistrict'
				 ");


            $this->set('districtCount',count($districtCount));
            $this->set('upazillaCount',count($upazillaCount));
            $this->set('unionCount',count($AllCode));
            $this->set('AllCode',$AllCode);


        }else
        {

            $AllCode=$this->Upazilla->query("SELECT upazillas. * , districts.`name` AS district, divisions.name AS division
                 FROM upazillas
                 JOIN districts ON districts.district_code = upazillas.`district_code` 
                 JOIN divisions ON districts.div_code = divisions.div_code
				  
				 ");

            $this->set('AllCode',$AllCode);
        }
    }

    function upazillaReport($BbscodeUpazilla=null)
    {
        set_time_limit(4000);

        $this->layout="report_layout";
        $this->loadModel('District');
        $this->loadModel('Division');
        $this->loadModel('Upazilla');
        $this->set('AllCode','');

        if(!empty($BbscodeUpazilla)){

            /* $AllCode=$this->Upazilla->query("SELECT upazillas. * , districts.`name` AS district, divisions.name AS division
                FROM upazillas
                JOIN districts ON districts.district_code = upazillas.`district_code`
                JOIN divisions ON districts.div_code = divisions.div_code
                WHERE upazillas.id = '$BbscodeUpazilla'");*/

            $AllCode=$this->Upazilla->query("SELECT divi.name AS div_name, upa.div_code, upa.district_code,
				dis.name AS dis_name,uni.`union_name` , uni.`total_population` , uni.`union_code` ,
				upa.name AS upa_name,upa.upazilla_code
				FROM `unions` AS uni
				JOIN upazillas AS upa ON upa.`upazilla_code` = uni.upazilla_code
				AND upa.div_code = uni.division_code
				AND uni.district_code = upa.district_code
				JOIN districts AS dis ON dis.district_code = upa.district_code
				JOIN divisions AS divi ON divi.div_code = upa.div_code
				WHERE upa.id = '$BbscodeUpazilla'");

            $this->set('unionCount',count($AllCode));
            $this->set('AllCode',$AllCode);

        }else{
            $AllCode=$this->Upazilla->query("SELECT divi.name AS div_name, upa.div_code, upa.district_code,
				dis.name AS dis_name,uni.`union_name` , uni.`total_population` , uni.`union_code` ,
				upa.name AS upa_name,upa.upazilla_code
				FROM `unions` AS uni
				JOIN upazillas AS upa ON upa.`upazilla_code` = uni.upazilla_code
				AND upa.div_code = uni.division_code
				AND uni.district_code = upa.district_code
				JOIN districts AS dis ON dis.district_code = upa.district_code
				JOIN divisions AS divi ON divi.div_code = upa.div_code");

            $this->set('AllCode',$AllCode);

        }
    }


    function unionReport($BbscodeUnion=null)
    {
        set_time_limit(4000);

        $this->layout="report_layout";
        $this->loadModel('Bbscode');
        $this->set('AllCode','');

        if(!empty($BbscodeUnion)){

            $AllCode=$this->Bbscode->query("SELECT * FROM bbscode WHERE name='$BbscodeUnion'");

            $this->set('AllCode',$AllCode);


        }
    }


    public function keywordReport($BbscodeKeyword) {
        set_time_limit(4000);

        $this->layout="report_layout";
        $this->loadModel('District');
        $this->loadModel('Division');
        $this->loadModel('Upazilla');

        if(!empty($BbscodeKeyword)){

            //$AllCode=$this->Bbscode->query("SELECT * FROM bbscode WHERE division LIKE '$BbscodeKeyword%' OR district LIKE '%$BbscodeKeyword%' OR upazilla LIKE '$BbscodeKeyword%' OR name LIKE '$BbscodeKeyword%'");

            /*$AllCode=$this->Upazilla->query("SELECT upazillas. * , districts.`name` AS district, divisions.name AS division
                     FROM upazillas
                     JOIN districts ON districts.district_code = upazillas.`district_code`
                     JOIN divisions ON districts.div_code = divisions.div_code WHERE divisions.name LIKE '%$BbscodeKeyword%' OR districts.name LIKE '%$BbscodeKeyword%' OR upazillas.name LIKE '%$BbscodeKeyword%'");
            */

            $AllCode=$this->Upazilla->query("
				SELECT divi.name AS div_name, upa.div_code, upa.district_code, 
				dis.name AS dis_name,uni.`union_name` , uni.`total_population` , uni.`union_code` ,
				upa.name AS upa_name,upa.upazilla_code
				FROM `unions` AS uni
				JOIN upazillas AS upa ON upa.`upazilla_code` = uni.upazilla_code
				AND upa.div_code = uni.division_code
				AND uni.district_code = upa.district_code
				JOIN districts AS dis ON dis.district_code = upa.district_code
				JOIN divisions AS divi ON divi.div_code = upa.div_code
				WHERE divi.name LIKE '%$BbscodeKeyword%' OR dis.name LIKE '%$BbscodeKeyword%' OR upa.name LIKE '%$BbscodeKeyword%' OR uni.union_name LIKE '%$BbscodeKeyword%'");

            $this->set('AllCode',$AllCode);

        }

    }


}

?>