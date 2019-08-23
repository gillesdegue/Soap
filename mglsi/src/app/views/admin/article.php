<div class="row">
<h2>Gestion des articles </h2>
 <div class="col-sm-5">
        <div class="page-header">
            <h3>Ajout d'article</h3>
        </div>
        <form method="post" id="hl_form">
        
            <input type="hidden" id="form_name" name="form_name" value="add_user" />
			<input type="hidden" id="edit_id" name="edit_id" value="0" />
			<input type="hidden" id="auteur" name="auteur" value="<?= $_SESSION['user']['id'] ?>" />
            <span class="text-success alert-success" hidden="hidden"><strong> Success ! </strong> Data saved successfully.</span>
            <span class="text-danger alert-danger" hidden="hidden"><strong> Note !</strong> Data saving failed. </span>
            <div class="form-group">
                <label for="formGroupExampleInput">Titre</label><span class="text-danger">*</span></label>
                <input type="text" name="titre" class="form-control" autocomplete="true" id="titre" placeholder="Hassane" required>
            </div>
             <div class="form-group">
                <label for="formGroupExampleInput">Contenu</label><span class="text-danger">*</span></label>
                <textarea id="contenu" name="contenu" class="form-control">
                </textarea>
            </div>
            <div class="form-group">
            <label for="formGroupExampleInput">Categorie</label><span class="text-danger">*</span></label>
                    <select id="category" class="form-control" name="category" data-live-search="true" required >
							<option value="">-- select --</option>                  
                           <?php foreach ($categories as $data) : ?>
                            <option value="<?= $data->id ?>"><?= $data->libelle ?></option>
                            <?php endforeach; ?>         
					</select>
            </div>
  <button type="submit" class="btn btn-primary btn-submit">Submit</button>
  </from>
  </div>
<script>

$(document).ready(function(e){
	 $(document).on('click', '.btn-submit', function(ev){
			ev.preventDefault();
			var btn_button = $(this);
                var data = $("#hl_form").serialize();
				btn_button.html(' <i class="fa fa fa-spinner fa-spin"></i> Processing...');
				btn_button.attr("disabled",true);
				$.post('/admin/article/create', data, function(data,status){
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
			  url: '/admin/article/show', // url where to submit the request
			  type : "GET", // type of action POST || GET
			  dataType : 'json', // data type
			  data : {tbl_id: tbl_id }, // post data || get data
			  success : function(result) {
				btn_button.html(' <i class="fa fa-edit"></i> ');
				console.log(result);
				$("#form_name").val("edit_user");
				$("#edit_id").val(result['id']);
				$("#titre").val(result['titre']);
				$("#category").val(result['categorie']).change();
				$("#contenu").val(result['contenu']);
				
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
			
			$.post('/admin/article/delete', { form_name: "del_user", tbl_id: tbl_id }, function(data,status){
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
 <div class="col-sm-7">
  <div class="page-header">
            <h3>Liste des articles</h3>
    </div>
    <table id="sample-table" class="table table-hover table-bordered tablesorter">
                                    <thead>
                                        <tr>
                                            <th>ID_ARTICLE</th>
                                            <th>TITRE_ARTICLE</th>
                                            <th>CATEGORY</th>
                                            <th>AUTEUR</th>
                                            <th class="td-actions">REQUEST</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($articles as $article) : ?>
                                        <tr>
                                            <td><?= $article->id ?></td>
                                            <td><?= $article->titre ?></td>
                                            <td><?= $article->libelle ?></td>
                                            <td><?= $article->pseudo ?></td>
                                            <td class="td-actions">
                                                <button type="button" class="btn btn-small btn-info btn-edit" id="<?= $article->id ?>" title="Update details" >
                                                <i class="fa fa-edit"></i>
													</button>
                                                <button type="button" class="btn btn-small btn-danger btn-delete" id="<?= $article->id ?>"  title="Delete details" data-toggle="modal" data-target="#confirmModal" >
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