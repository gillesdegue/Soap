<div class="span8">
                <div class="box">
                    <div class="box-header">
                        <i class="icon-book"></i>
                        <h5>Forms</h5>
                    </div>
                    <div class="box-content">
                        <form class="form-inline" id="hl_form">
                        <input type="hidden" id="form_name" name="form_name" value="add_user" />
				     	<input type="hidden" id="edit_id" name="edit_id" value="0" />
                            <p>Application</p>
                            <div class="alert icon-alert with-arrow alert-success form-alter" hidden="hidden" role="alert">
										<i class="fa fa-fw fa-check-circle"></i>
										<strong> Success ! </strong> Data saved successfully. 
									</div>
									<div class="alert icon-alert with-arrow alert-danger form-alter" hidden="hidden" role="alert">
										<i class="fa fa-fw fa-times-circle"></i>
										<strong> Note !</strong> Data saving failed. 
									</div>
                            <div class="form-inner">
                                <div class="control-group input-prepend">
                                    <label class="control-label">Libelle Application  <span class="required">*</span></label>
                                    <div class="controls">
                                    <span class="add-on" rel="tooltip" title="Ajout des libellé de application" data-placement="top"><i class="icon-edit"></i></span>
                                        <input id="sgbd" name="libelle_appli" class="span4" type="Text" autocomplete="false">
                                    </div>
                                </div>
                            
                            </div>
                            <div class="form-inner">
                                <div class="control-group input-prepend">
                                    <label class="control-label">Libelle sgbd  <span class="required">*</span></label>
                                    <div class="controls">
                                    <span class="add-on" rel="tooltip" title="Ajout des libellé de modele_données" data-placement="top"><i class="icon-edit"></i></span>
                                        <select id="modele" class="span4 selectpicker show-tick required" name="libelle_sgbd" data-live-search="true" required >
												<option value="">-- select --</option>
                                                <?php foreach($sgbd as $data):
                                                ?>
                                                <option value="<?= $data['ID_SGBD'] ?>"><?= $data['LIBELLE_SGBD']?></option>
                                                <?php endforeach;?>
											</select>
                                    </div>
                                </div>
                            
                            </div>
                        
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-submit">
                            <i class="icon-ok"></i>
                            Submit
                        </button>
                    </div>
                    </form>
                </div>
            </div>

            <script>

$(document).ready(function(e){
    $(document).on('click', '.btn-submit', function(ev){
			ev.preventDefault();
			var btn_button = $(this);
                var data = $("#hl_form").serialize();
				btn_button.html(' <i class="fa fa fa-spinner fa-spin"></i> Processing...');
				btn_button.attr("disabled",true);
				$.post('index.php?url=appli/create', data, function(data,status){
					console.log("Data: " + data + "\nStatus: " + status);
					if( data == "1"){
						//alert("Data: " + data + "\nStatus: " + status);
						$(".alert-danger").hide();
						$(".alert-success").fadeIn(800);
						btn_button.html('<i class="fa fa fa-check-circle"></i> Done');
						setTimeout(function(){  location.reload(); }, 2000);
                        }
					 else{
                       
						//alert("Data: " + data + "\nStatus: " + status);
						$(".alert-success").hide();
						$(".alert-danger").fadeIn(800);
						btn_button.html('Submit').attr("disabled",false);
					}
				});
		});

        $(document).on('click', '.btn-edit', function(ev){
			ev.preventDefault();
			var btn_button = $(this);
			btn_button.html(' <i class="icon-edit">chargement</i> ');
			var tbl_id = $(this).attr("id");
			$.ajax({
			  cache: false,
			  url: 'index.php?url=appli/show', // url where to submit the request
			  type : "GET", // type of action POST || GET
			  dataType : 'json', // data type
			  data : {tbl_id: tbl_id }, // post data || get data
			  success : function(result) {
				btn_button.html(' <i class="icon-edit"></i> ');
				console.log(result);
				$("#form_name").val("edit_user");
				$("#edit_id").val(result['ID_APPLI']);
				$("#sgbd").val(result['LIBELLE_APPLI']);
                $("#modele").val(result['ID_SGBD']).change();
				
			  },
			  error: function(xhr, resp, text) {
				console.log(xhr, resp, text);
			  }
			});
		});

        $(document).on('click', '.btn-confirm-delete', function(ev){
			ev.preventDefault();
			var btn_button = $(this);
			var tbl_id = $('.btn-confirm-delete').attr("id");
			$('#confirmModal').modal('hide');
			
			$.post('index.php?url=appli/delete', { form_name: "del_user", tbl_id: tbl_id }, function(data,status){
				console.log(data);
				if(data == "1"){
					btn_button.html('<i class="icon-remove "></i> Done');
					$('.warning-modal-message').html("Enregistrement supprimer avec success.");
					$('#warningModal').modal('show');
					setTimeout(function(){  location.reload(); }, 2000);
				}
				else if(data == "404-del"){
					$('.warning-modal-message').html("This details reflect in another record. So you can't delete !!!");
					$('#warningModal').modal('show');
				}
				else{
					$('.warning-modal-message').html("Data deletion failed.");
					btn_button.html('Yes');
				}
			});
		});
		
		$(document).on('click', '.btn-delete', function(ev){
			ev.preventDefault();
			$(".btn-confirm-delete").attr("id",$(this).attr('id'));
		});
		
		$(document).on('click', '.btn-confirm-close', function(ev){
			ev.preventDefault();
			$(".btn-confirm-delete").attr("id","0");
		});

    });



</script>

<div class="span8 ">
                        <div class="box pattern pattern-sandstone ">
                            <div class="box-header">
                                <i class="icon-table"></i>
                                <h5>
                                    Table
                                </h5>
								<span class="pull-right"><a href="/trig_appli" class ="btn-info"> voir modification</a></span>
                            </div>
                            <div class="box-content box-table ">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter">
                                    <thead>
                                        <tr>
                                            <th>ID_APPLI</th>
                                            <th>LIBELLE_APPLI</th>
                                            <th>LIBELLE_SGBD</th>
                                            <th class="td-actions">REQUEST</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($app as $appli):?>
                                        <tr>
                                            <td><?= $appli['ID_APPLI'] ?></td>
                                            <td><?= $appli['LIBELLE_APPLI'] ?></td>
                                            <td><?= $appli['LIBELLE_SGBD'] ?></td>
                                            <td class="td-actions">
                                                <button type="button" class="btn btn-small btn-info btn-edit" id="<?= $appli['ID_APPLI']  ?>" title="Delete details" >
                                                <i class="btn-icon-only icon-ok"></i>
													</button>
                                                <button type="button" class="btn btn-small btn-danger btn-delete" id="<?= $appli['ID_APPLI']  ?>"  title="Delete details" data-toggle="modal" data-target="#confirmModal" >
                                                <i class="btn-icon-only icon-remove"></i>
													</button>
                                            </td>
                                        </tr>

                                     <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

 <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content modal-col-danger">
				<div class="modal-header">
					<h4 class="modal-title" id="smallModalLabel">Confirmation:</h4>
				</div>
				<div class="modal-body">
					Vous voulez vraiment supprimer l'enregistrement ?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-confirm-delete">Confirmer</button>
					<button type="button" class="btn btn-default btn-confirm-close" data-dismiss="modal">Fermer</button>
				</div>
			</div>
		</div>
	</div>