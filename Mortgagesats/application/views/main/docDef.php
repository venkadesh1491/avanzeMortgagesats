<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<style type="text/css">
.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    padding: 0 10px!important;
    min-width: 100px;
}
a{
  cursor: pointer;
} 

.label_class{
  color: #333;
  margin-bottom: 0px;
}
.form-control .input-sm{
  margin-top: 0px;
}
form .form-group {
    margin: 0px 0 0;
}
select:disabled {
  background: #ccc;
}
.btn{
  font-weight: bold;
}
</style>
<div id="divToReload_WithDAta" style="">

<div class="row" id="loadcontent" style="margin-top: 20px;background: #fff;">
  <div class="col-md-12 col-sm-12 center" style="display: block;">
    <form class="form" id="fupForm"  enctype="multipart/form-data" method="post" action="<?php echo base_url();?>main/import" >
      
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <div class="input-group input-file" name="file">
              <input type="text" class="form-control" name="file"  placeholder='Select Json File' required="true" />     
              <span class="input-group-btn">
                <button type="submit" class="btn btn-space btn-social btn-color btn-twitter single_submit" value="1" id="upload" style=" background: #f44336 !important;">Upload<div class="ripple-container"></div></button>
              </span>
            </div>
          </div>  

        <div class="col-md-8 col-sm-8" style="display: block;">
          <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add Document</button>
        </div>
      </div>
    </form>
  </div>

  
	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="docDef_table">
			<thead>
				<th>Sl No.</th>
				<th>Document Type</th>
				<th>Edit</th>
        <th>Delete</th>
			</thead>
			<tbody>
				<?php if ($DocumentType){
					$row=1;
					foreach ($DocumentType as $c){ ?>
						<tr>
              <input type="hidden" value="<?php echo $c['DocumentTypeUID'];?>" name="DocumentTypeUID" id="DocumentTypeUID">
							<td><a  class="edit"><?php echo $row;?></a></td>
							<td><a  class="edit"><?php echo $c['DocumentTypeName'];?></a></td>
							<td ><a  class="edit" data-id="<?php echo $c['DocumentTypeUID'];?>"><i class="fa fa-edit"></i></a></td>
              <td ><a id="<?php echo $c['DocumentTypeUID'];?>" class="delete"><i class="fa fa-trash"></i></a></td>
						</tr>
					<?php $row++; } 
				} ?>
			</tbody>
		</table>
	</div>
</div>


  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="    max-width: 70%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add/Edit Keywords</h4>
      </div>
      <div class="modal-body" >
          <form role="form" id="modal_form">
           <input type="hidden" name="docdef_id" id="docdef_id" value="">
              <div class="row">
                  <div class="col-xs-4 col-sm-4 col-md-4">
                    <label class="label_class">Document Type:</label>

                    <div class="form-group">
                      
                      <select name="ocrDocType" id="ocrDocType" class="form-control input-sm" title="Select Doc Type" disabled>

                        <option value="">Select Doc Type</option>
                        <?php foreach ($DocumentType as $c): ?>
                          <option value="<?php echo $c['DocumentTypeUID'];?>"><?php echo $c['DocumentTypeName'];?></option>
                        <?php endforeach ?>
                       
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-4 col-sm-4 col-md-4">
                    <label class="label_class">Document Type UID:</label>
                    
                    <div class="form-group">
                       
                      <input type="text" name="docTypeUID" id="docTypeUID" class="form-control input-sm" placeholder="Document Type UID" title="Document Type UID" readonly="true">
                    </div>
                  </div>
                   <div class="col-xs-4 col-sm-4 col-md-4">
                    <label class="label_class">Header Length:</label>
                    <div class="form-group">

                      <input type="text" name="header_length" id="header_length" class="form-control input-sm" placeholder="Header Length" title="Header Length">
                    </div>
                  </div>

                </div>
                                <div class="row">
                  
                  <div class="col-xs-3 col-sm-3 col-md-3">
                    <label class="label_class">Footer Length:</label>
                    <div class="form-group">
                      <input type="text" name="footer_length" id="footer_length" class="form-control input-sm" placeholder="Footer Length" title="Footer Length">
                    </div>
                  </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                      <label class="label_class">Min Confidence:</label>
                    <div class="form-group">
                      <input type="text" name="min_confidence" id="min_confidence" class="form-control input-sm" placeholder="Min Confidence" title="Min Confidence">
                    </div>
                  </div>
                  <div class="col-xs-3 col-sm-3 col-md-3">
                    <label class="label_class">KeyWord CutOff:</label>
                    <div class="form-group">
                      <input type="text" name="KeyWordCutOff" id="KeyWordCutOff" class="form-control input-sm" placeholder="KeyWord CutOff" title="Key Word CutOff">
                    </div>
                  </div>

                  <div class="col-xs-3 col-sm-3 col-md-3">
                    <label class="label_class">LowerCase Search:</label>
                    <div class="form-group">
                      <input type="text" name="LowerCaseSearch" id="LowerCaseSearch" class="form-control input-sm" placeholder="LowerCase Search" title="Lower Case Search">
                    </div>
                  </div>
                </div>

<h4 class="modal-title">Mandatory Keywords</h4>
                <div class="row">
                  <input type="hidden" name="is_mandatory" id="is_mandatory-0" value="1">
                  <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                      <select id="0" name="headerTypes" class="form-control input-sm" title="Mandatory Keyword Type">
                        <option value="">Type</option>
                        <option value="Header">Header</option>
                        <option value="Body">Body</option>
                        <option value="Footer">Footer</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control input-sm" id="Dockeywords-0" name="Dockeywords" value="" placeholder="Enter Keywords" title="Mandatory Keywords">
                        <div class="input-group-btn">
                            <button class="btn btn-success" type="button"  onclick="append_newmand_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                          </div>
                      </div>
                    </div>
                  </div>
                 
                </div>
<div id="append_mand_fields"></div>
 <div id="append_newmand_fields"></div>


 <h4 class="modal-title">Keywords</h4>
                <div class="row">
                  <input type="hidden" name="is_mandatory" id="is_mandatory-headerTypes-0" value="0">
                  <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                      <select id="headerTypes-0" name="headerTypes" class="form-control input-sm" title="Keywords Type">
                        <option value="">Type</option>
                        <option value="Header">Header</option>
                        <option value="Body">Body</option>
                        <option value="Footer">Footer</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control input-sm" id="Dockeywords-headerTypes-0" name="Dockeywords1" value="" placeholder="Enter Keywords" title="Keywords">
                        <div class="input-group-btn">
                            <button class="btn btn-success" type="button"  onclick="append_newkey_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                          </div>
                      </div>
                    </div>
                  </div>
                 
                </div>
<div id="append_key_fields"></div>
 <div id="append_newkey_fields"></div>

                <input type="button" value="Update" id="update" class="btn btn-info btn-block">
              
              </form>
      </div>
     
    </div>

  </div>
</div>
  
</div>

<!-- Modal -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Document Type</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="modal_form">
          
          <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8">
              
              <div class="form-group">
                <input type="text" name="DocumentTypeName" id="DocumentTypeName" class="form-control" placeholder="Enter Document name">
              </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
               <input type="button" value="Save" id="save" class="btn btn-info btn-block">
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#docDef_table").DataTable();
  })
</script>

<script type="text/javascript">
  var keyword = 0;
  $("#ocrDocType").change(function(){
    var DocumentTypeUID = $('#ocrDocType :selected').val();
    $("#docTypeUID").val(DocumentTypeUID);
  })

  $(".edit").on('click',function(){
    var DocumentTypeUID = $(this).attr('data-id');
    $("#modal_form")[0].reset();

    if($("#docTypeUID").val() != 0){
      $("#ocrDocType").attr("disabled", true);
    }else{
      $("#ocrDocType").attr("disabled", false);
    }

    $("#append_mand_fields").empty('');
    $("#append_key_fields").empty('');
    $("#docTypeUID").val(DocumentTypeUID);
    var ocrDocType=$("#DocumentTypeUID").val();
    //var DocumentTypeUID = $('#ocrDocType :selected').val();
    
    $("#ocrDocType1").val(ocrDocType);
    $("#myModal").modal('show');
    //var DocumentTypeUID=$("#DocumentTypeUID").val();;

		$("#ocrDocType1").val(DocumentTypeUID);
		$("#myModal").modal('show');
		// $("#ocrDocType > option").each(function(){     
		// 	if($(this).val()==DocumentTypeUID){ // EDITED THIS LINE
		// 		//console.log($(this).val()+"fhfh"+DocumentTypeUID);
		// 			$(this).attr("selected","selected");    
		// 	}    
		// });

    $("#ocrDocType").val(DocumentTypeUID);
		$.ajax({
			type:'post',
			url:'<?php echo base_url();?>main/getDocDef',
			dataType:'json',
			data:{'docTypeUID':DocumentTypeUID},
      success:function(data){
      	console.log(data)
        if (data) {
          //if (data.docdef.length >0 ) {
            $("#docdef_id").val(data.docdef.DocDefUID);
          // }else{
          //   $("#docdef_id").val('');
          // }
          $("#docTypeUID").val(data.docdef.DocTypeUID);
          $("#min_confidence").val(data.docdef.MinConfidence*100);
          $("#header_length").val(data.docdef.HeaderLen);
          $("#footer_length").val(data.docdef.FooterLen);
          $("#KeyWordCutOff").val(data.docdef.KeyWordCutOff);
          $("#LowerCaseSearch").val(data.docdef.LowerCaseSearch);
          
          // $("#divToReload_WithDAta").load(location.href + " #divToReload_WithDAta"); 
          
          for (var i = 0; i < data.keywords.length; i++) {
            var elements='';
            for (var j = 0; j < data.types.length; j++) {
              if (data.types[j].SectionName==data.keywords[i].KeyType) {
                elements+='<option value="'+data.types[j].SectionName+'" selected>'+data.types[j].SectionName+'</option>';
              }else{
               elements+='<option value="'+data.types[j].SectionName+'">'+data.types[j].SectionName+'</option>';
              }
          }
            keyword=data.keywords[i].KeywordUID;
            if (data.keywords[i].IsMandatory == 1) {
            var objTo = document.getElementById('append_mand_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "row removeclass"+keyword);
            var rdiv = 'removeclass'+keyword;
            divtest.innerHTML = '<input type="hidden" name="is_mandatory" id="is_mandatory-'+keyword+'" value="1"><div class="col-sm-4 nopadding"><div class="form-group"><select class="form-control" id="'+keyword+'" name="headerTypes"></select></div></div><div class="col-sm-8 nopadding"><div class="form-group"><div class="input-group">  <input type="text" class="form-control" id="Dockeywords-'+keyword+'" name="Dockeywords" value="'+data.keywords[i].Keywords+'" placeholder="Enter Keywords"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_mand_fields('+ keyword +');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';
            objTo.appendChild(divtest)
            $("#"+keyword).html(elements);
            }

            if (data.keywords[i].IsMandatory == 0) {
            var objTo = document.getElementById('append_key_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "row removeclass"+keyword);
            var rdiv = 'removeclass'+keyword;
            divtest.innerHTML = '<input type="hidden" name="is_mandatory" id="is_mandatory-headerTypes-'+keyword+'" value="0"><div class="col-sm-4 nopadding"><div class="form-group"><select class="form-control" id="headerTypes-'+keyword+'" name="headerTypes"></select></div></div><div class="col-sm-8 nopadding"><div class="form-group"><div class="input-group">  <input type="text" class="form-control" id="Dockeywords-headerTypes-'+keyword+'" name="Dockeywords" value="'+data.keywords[i].Keywords+'" placeholder="Enter Keywords"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_mand_fields('+ keyword +');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';
         
          objTo.appendChild(divtest)
           $("#headerTypes-"+keyword).html(elements);
          }
          }
          
          //console.log(keyword)
        }else{
          $("#docdef_id").val('');
        }
      },
      error:function(error,errorThrown){
        console.log(error)
      }
    })
  })


function append_newmand_fields() {
  keyword++;
  var objTo = document.getElementById('append_newmand_fields')
  var divtest = document.createElement("div");
  divtest.setAttribute("class", "row removeclass"+keyword);
  var rdiv = 'removeclass'+keyword;
  divtest.innerHTML = '<input type="hidden" name="is_mandatory" id="is_mandatory-'+keyword+'" value="1"><div class="col-sm-4 nopadding"><div class="form-group"><select class="form-control" id="'+keyword+'" name="headerTypes"><option value="">Type</option><option value="Header">Header</option> <option value="Body">Body</option><option value="Footer">Footer</option></select></div></div><div class="col-sm-8 nopadding"><div class="form-group"><div class="input-group">  <input type="text" class="form-control" id="Dockeywords-'+keyword+'" name="Dockeywords" value="" placeholder="Enter Keywords"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_mand_fields('+ keyword +');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';

  if ($("#0").val()!='') {
    objTo.appendChild(divtest)
  }else{
    toastr.error("Please choose keyword type");
  }
}


function remove_mand_fields(rid) {
$('.removeclass'+rid).remove();
keyword--;
}


function append_newkey_fields() {
  keyword++;
  var objTo = document.getElementById('append_newkey_fields')
  var divtest = document.createElement("div");
  divtest.setAttribute("class", "row removeclass"+keyword);
  var rdiv = 'removeclass'+keyword;
  divtest.innerHTML = '<input type="hidden" name="is_mandatory" id="is_mandatory-headerTypes-'+keyword+'" value="0"><div class="col-sm-4 nopadding"><div class="form-group"><select class="form-control" id="headerTypes-'+keyword+'" name="headerTypes"><option value="">Type</option><option value="Header">Header</option> <option value="Body">Body</option><option value="Footer">Footer</option></select></div></div><div class="col-sm-8 nopadding"><div class="form-group"><div class="input-group">  <input type="text" class="form-control" id="Dockeywords-headerTypes-'+keyword+'" name="Dockeywords" value="" placeholder="Enter Keywords"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_key_fields('+ keyword +');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';

  if ($("#headerTypes-0").val()!='') {
    objTo.appendChild(divtest)
  }else{
    toastr.error("Please choose keyword type");
  }
}

function remove_key_fields(rid) {
  $('.removeclass'+rid).remove();
  keyword--;
}

</script>

<script type="text/javascript">

  $("#update").on('click',function(){
    if ($("#docdef_id").val()!='') {
      var docdef_id=$("#docdef_id").val();
    }else{
      var docdef_id='';
    }

    var docTypeUID=$("#docTypeUID").val();
    var min_confidence=$("#min_confidence").val()/100;
    var header_length=$("#header_length").val();
    var footer_length=$("#footer_length").val(); 
    var KeyWordCutOff=$("#KeyWordCutOff").val();
    var LowerCaseSearch=$("#LowerCaseSearch").val();   
    var ocrDocType=$('#ocrDocType :selected').text();
    var Dockeywords='';
    var headerTypes='';
    var header_enum='';
    var body_enum='';
    var footer_enum='';
    var header_mand_enum='';
    var body_mand_enum='';
    var footer_mand_enum='';
    var header_key='';
    var footer_key='';
    var body_key='';
    var header_mand_key='';
    var body_mand_key='';
    var footer_mand_key='';
    var mand_key_array =0;
    var key_array =0;
    var header_mand_key_array =new Array();
    var header_key_array =[];
    var MandatoryKeywordsCount=0;
    var KeywordsCount=0;
    var words =[];
    var words1 =[];
    $("select[name=headerTypes]").each(function(){
      headerTypes= $(this).attr('id');

      if ($("#is_mandatory-"+headerTypes).val()==1) {
        if ($("#Dockeywords-"+headerTypes).val()!='') {
          var value = $("#Dockeywords-"+headerTypes).val().replace(" ", "");
          words = value.split(",");
          MandatoryKeywordsCount+=words.length;
        }
      }

      if ($("#is_mandatory-"+headerTypes).val()==0) {
        if ($("#Dockeywords-"+headerTypes).val()!='') {
          var value1 = $("#Dockeywords-"+headerTypes).val().replace(" ", "");
          words1 = value1.split(",");
          KeywordsCount+=words1.length;
        }
      }
    });

    $.ajax({
      type:'post',
      url:'<?php echo base_url();?>main/addDocDef',
      dataType:'json',
      data:{'docdef_id':docdef_id,'docType':ocrDocType,'min_confidence':min_confidence,'docTypeUID':docTypeUID,'header_length':header_length,'footer_length':footer_length,'KeyWordCutOff':KeyWordCutOff,'LowerCaseSearch':LowerCaseSearch,'MandatoryKeywordsCount':MandatoryKeywordsCount,'KeywordsCount':KeywordsCount,'is_active':1},
      success:function(data){
        if (data) {
          $("select[name=headerTypes]").each(function(){
            headerTypes= $(this).attr('id');
            if ($("#Dockeywords-"+headerTypes).val()!='') {
              
              $.ajax({
                type:'post',
                url:'<?php echo base_url();?>main/addDocDefKeywords',
                dataType:'json',
                data:{'docdef_id':data.docdef_id,'key_type':$("#"+headerTypes).val(),'keywords':$("#Dockeywords-"+headerTypes).val(),'is_mandatory':$("#is_mandatory-"+headerTypes).val()},
                success:function(data){
                  if (data) {
                    //console.log(data)
                    $("#myModal").modal('hide');
                    $('#modal_form').trigger("reset");                 
                  }
                },
                error:function(error,errorThrown){
                  console.log(error)
                }
              })
            }
          });

        }
      },
      error:function(error,errorThrown){
        console.log(error)
      }
    })
  })
</script>

<script type="text/javascript">
  
  $(".delete").on('click',function(){
    var docTypeUID=($(this).attr('id'));
    if (confirm('Do you want to delete Document Type?')) {
      $.ajax({
        type:'post',
        url:'<?php echo base_url();?>main/deleteDocType',
        dataType:'json',
        data:{'docTypeUID':docTypeUID},
        success:function(data){
          if (data.validation_error==1) {
            toastr.error(data.message);              
          }else{
            $("#"+docTypeUID).closest('tr').remove();
            toastr.success(data.message);
          }
        },
        error:function(error,errorThrown){
          console.log(error)
        }
      })
           
    } else {
        toastr.error('Failed to delete');
    }
  });
</script>

<script type="text/javascript">
  
  $("#save").on('click',function(){
    var DocumentTypeName=$("#DocumentTypeName").val();
      if (DocumentTypeName == '') {
        toastr.error('Enter DocumentTypeName');
        $("#DocumentTypeName").focus();
      }else{
        $.ajax({
        type:'post',
        url:'<?php echo base_url();?>main/addDocumentType',
        dataType:'json',
        data:{'DocumentTypeName':DocumentTypeName},
        success:function(data){
          
            toastr.success(data.message);
            //$("#addModal").modal('hide');
            $("#DocumentTypeName").val('')
            //$("#divToReload_WithDAta").load(location.href + " #divToReload_WithDAta"); 
        },
        error:function(error,errorThrown){
          console.log(error)
        }
        });
  }
      
  });
</script>