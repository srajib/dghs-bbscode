<?php
/**
* @var $this View
*/
?>
<script type="text/javascript" src="<?php echo $this->base;?>/js/jquery-1.4.2.min.js"></script>
<style>
#siteWrapper #contentWrapper #mainContentWrapper {
    font-size: 12px;
    font-weight: bold;
    line-height: 1.4;
	}
#BbscodeDivision{
	margin-left:5px;
	}	
#BbscodeDistrict{
	margin-left:8px;
	}
</style>
<script>
function divReport(BbscodeDivision)
{
	if(BbscodeDivision)
		window.open('<?php echo $this->base; ?>/pages/divReport/'+escape(BbscodeDivision),'','scrollbars=yes,menubar=yes,height=925,width=800,resizable=no,toolbar=no,location=no,addressbar=no,status=no,dialog=yes');
		else {
		window.open('<?php echo $this->base; ?>/pages/divReport/','','scrollbars=yes,menubar=yes,height=925,width=800,resizable=no,toolbar=no,location=no,addressbar=no,status=no,dialog=yes');
		
		//alert('No Division selected');
		//window.open('<?php echo $this->base; ?>/pages/divReport/','','scrollbars=yes,menubar=yes,height=925,width=800,resizable=no,toolbar=no,location=no,addressbar=no,status=no,dialog=yes');
		}
	//else alert('No Division Selected');

}

function disReport(BbscodeDistrict)
{
	if(BbscodeDistrict)
		window.open('<?php echo $this->base; ?>/pages/disReport/'+escape(BbscodeDistrict),'','scrollbars=yes,menubar=yes,height=925,width=800,resizable=no,toolbar=no,location=no,addressbar=no,status=no,dialog=yes');
	else {
	alert('No District selected');
	//window.open('<?php echo $this->base; ?>/pages/disReport/','','scrollbars=yes,menubar=yes,height=925,width=800,resizable=no,toolbar=no,location=no,addressbar=no,status=no,dialog=yes');
		}
}


function upaReport(BbscodeUpazilla)
{
	if(BbscodeUpazilla)
		window.open('<?php echo $this->base; ?>/pages/upazillaReport/'+escape(BbscodeUpazilla),'','scrollbars=yes,menubar=yes,height=925,width=800,resizable=no,toolbar=no,location=no,addressbar=no,status=no,dialog=yes');
		else{
		alert('No Upazila selected');
		//window.open('<?php echo $this->base; ?>/pages/upazillaReport/','','scrollbars=yes,menubar=yes,height=925,width=800,resizable=no,toolbar=no,location=no,addressbar=no,status=no,dialog=yes');
		}
}

function uniReport(BbscodeUnion)
{
	if(BbscodeUnion)
		window.open('<?php echo $this->base; ?>/pages/unionReport/'+escape(BbscodeUnion),'','scrollbars=yes,menubar=yes,height=925,width=800,resizable=no,toolbar=no,location=no,addressbar=no,status=no,dialog=yes');
	else {
	window.open('<?php echo $this->base; ?>/pages/uniReport/','','scrollbars=yes,menubar=yes,height=925,width=800,resizable=no,toolbar=no,location=no,addressbar=no,status=no,dialog=yes');
	}
}

function search(BbscodeKeyword)
{
	if(BbscodeKeyword)
		window.open('<?php echo $this->base;?>/pages/keywordReport/'+escape(BbscodeKeyword),'','scrollbars=yes,menubar=yes,height=925,width=800,resizable=no,toolbar=no,location=no,addressbar=no,status=no,dialog=yes');
	else {
	window.open('<?php echo $this->base; ?>/pages/keywordReport/','','scrollbars=yes,menubar=yes,height=925,width=800,resizable=no,toolbar=no,location=no,addressbar=no,status=no,dialog=yes');
	}
}

	jQuery(document).ready(function(){
   validSubmit = false;
});
</script>
<?php
echo $this->Form->create('Bbscode', array('url' => array('controller' => 'pages','action'=>'search')));
?>
<div  style="text-align:center;"></div>
<div class="input select" style="text-align:center;margin-top:4px;margin-left:-80px;">
<?php
echo $this->Form->input('division',array('empty'=>'All','type'=>'select','options'=>$Division));

?>
<input type="button" name="report" value="Show" onClick="divReport(BbscodeDivision.value);" style=" display: inline;float: right;">
</div>

<div  style="text-align:center;"></div>
<div class="input select" style="text-align:center;margin-top:4px;margin-left:5px">
<?php
echo $this->Form->label('District');
echo $this->Form->select('district',$District,array('empty'=>false,'style'=>array('margin-left:10px;')));
?>
 <input type="button" name="report" value="Show" onClick="disReport(BbscodeDistrict.value);" style="display:inline;width:80px;margin-left:8px;margin-top:-50px;">
</div>

<div class="input select" style="text-align:center;margin-top:4px;">
<?php
echo $this->Form->label('Upazilla');
echo $this->Form->select('upazilla', $upazilla,array('empty'=>false, 'selected'=>'1','after'=>$this->Html->image('loader.gif', array('style'=>'display:none;margin-left:4px;'))));?>
<input type="button" name="report" value="Show" onClick="upaReport(BbscodeUpazilla.value);" style="display:inline;width:80px;margin-left:10px;">
</div>

<!--
<div class="input"  style="float:left;margin-left:2px;margin-top:3px;width:120px;">
<?php
echo $this->Form->label('Keyword');
echo $this->Form->input('keyword',array('label'=>'','style'=>'
    float: left;
	text-decoration:bold;
	border: 1px solid #009900;
    border-radius: 3px 3px 3px 3px;
    height: 20px;
    margin-left: 100px;
    margin-top: -18px;
    width: 120px;display:inline;'));
?>
</div>
<div  style="float:left;">
 <input type="button" name="report" value="Search" onClick="search(BbscodeKeyword.value);" style="margin:2px 0px 0px 54px;display:inline;width:80px;">
</div>
-->
<?php
/*
$this->Js->get('#BbscodeDivision')->event('change',
        $this->Js->request(array(
            'action' => 'getdistricts'), array(
                'before' => 'showLoader();',
                'success' => 'hideLoader();',
                'update' => '#BbscodeDistrict',
                'dataExpression'=>TRUE, 
                'method'=>'POST',
                'async'=>TRUE,
                'data' => $js->serializeForm(array('isForm' => FALSE, 'inline' => TRUE))  )));

$this->Js->get('#BbscodeDistrict')->event('change', 
        $this->Js->request(array(
            'action' => 'getupozila'), array(
                'before' => 'showLoader();',
                'success' => 'hideLoader();',
                'update' => '#BbscodeUpazilla',
                'dataExpression'=>TRUE, 
                'method'=>'POST',
                'data' => $js->serializeForm(array('isForm' => TRUE, 'inline' => TRUE))  )));

$this->Js->get('#BbscodeUpazilla')->event('change', 
        $this->Js->request(array(
            'action' => 'getunion'), array(
                'before' => 'showLoader();',
                'success' => 'hideLoader();',
                'update' => '#BbscodeName',
                'dataExpression'=>TRUE, 
                'method'=>'POST',
                'data' => $js->serializeForm(array('isForm' => TRUE, 'inline' => TRUE))  )));*/				
				?>

<script>
    $(function() {
        $('#BbscodeDivision').live('change', function(){
            var div_id  = $('#BbscodeDivision').val();

            $.ajax({
                url: "/bbscodenew/pages/getdistrictbydivid/" + div_id,
                type: "get",
                success: function(data) {
                    $('#BbscodeDistrict').html(data);


                }
            });
        });

        $('#BbscodeDistrict').live('change', function(){
            var district_id  = $('#BbscodeDistrict').val();

            $.ajax({
                url: "/bbscodenew/pages/getUpazilabydivid/" + district_id,
                type: "get",
                success: function(data) {
                    $('#BbscodeUpazilla').html(data);


                }
            });
        });
    });
</script>
				


