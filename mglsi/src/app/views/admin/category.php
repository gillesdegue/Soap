<div class="row">
<h2>Gestion des articles </h2>
 <div class="col-sm-6">
        <div class="page-header">
            <h3>Liste d'article categoriser</h3>
        </div>
        <form method="post" id="hl_form">
        
            <input type="hidden" id="form_name" name="form_name" value="add_user" />
			<input type="hidden" id="edit_id" name="edit_id" value="0" />
            <span class="text-success" hidden="hidden"><strong> Success ! </strong> Data saved successfully.</span>
            <span class="text-danger" hidden="hidden"><strong> Note !</strong> Data saving failed. </span>
            <div class="form-group">
                <label for="formGroupExampleInput">Libelle</label><span class="text-danger">*</span></label>
                <input type="text" name="libelle" class="form-control"  id="libelle" placeholder="Sport">

            </div>
  <button type="submit" class="btn btn-primary btn-submit">Submit</button>

</div>
   <script>

$(document).ready(function(e){
	 $(document).on('click', '.btn-submit', function(ev){
			ev.preventDefault();
			var btn_button = $(this);
                var data = $("#hl_form").serialize();
				btn_button.html(' <i class="fa fa fa-spinner fa-spin"></i> Processing...');
				btn_button.attr("disabled",true);
				$.post('/admin/categorie/create', data, function(data,status){
					console.log("Data: " + data + "\nStatus: " + status);
					if( data == "1"){
						alert("Data: " + data + "\nStatus: " + status);
						$(".alert-danger").hide();
						$(".alert-success").fadeIn(800);
						btn_button.html('<i class="fa fa fa-check-circle"></i> Done');
						setTimeout(function(){  location.reload(); }, 2000);
                        }
					 else{
                       
						alert("Data: " + data + "\nStatus: " + status);
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
			  url: '/admin/categorie/show', // url where to submit the request
			  type : "GET", // type of action POST || GET
			  dataType : 'json', // data type
			  data : {tbl_id: tbl_id }, // post data || get data
			  success : function(result) {
				btn_button.html(' <i class="fa fa-edit"></i> ');
				console.log(result);
				$("#form_name").val("edit_user");
				$("#edit_id").val(result['id']);
				$("#libelle").val(result['libelle']);
				
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
			
			$.post('/admin/categorie/delete', { form_name: "del_user", tbl_id: tbl_id }, function(data,status){
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
 <div class="col-sm-6">
  <div class="page-header">
            <h3>Liste d'article categoriser</h3>
    </div>
    <table id="sample-table" class="table table-hover table-bordered tablesorter">
                                    <thead>
                                        <tr>
                                            <th>ID_CAT</th>
                                            <th>LIBELLE_CAT</th>
                                            <th class="td-actions">REQUEST</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($categories as $categorie) : ?>
                                        <tr>
                                            <td><?= $categorie->id ?></td>
                                            <td><?= $categorie->libelle ?></td>
                                            <td class="td-actions">
                                                <button type="button" class="btn btn-small btn-info btn-edit" id="<?= $categorie->id ?>" title="Update details" >
                                                <i class="fa fa-edit"></i>
													</button>
                                                <button type="button" class="btn btn-small btn-danger btn-delete" id="<?= $categorie->id ?>"  title="Delete details" data-toggle="modal" data-target="#confirmModal" >
                                                <i class="fa fa-remove"></i>
													</button>
                                            </td>
                                        </tr>

                                     <?php endforeach; ?>
                                    </tbody>
                                </table>
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