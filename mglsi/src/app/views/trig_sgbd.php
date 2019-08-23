<div class="span12 ">
                        <div class="box pattern pattern-sandstone ">
                            <div class="box-header">
                                <i class="icon-table"></i>
                                <h5>
                                    Table
                                </h5>
                            </div>
                            <div class="box-content box-table ">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter">
                                    <thead>
                                        <tr>
                                            <th>ID_SGBD</th>
                                            <th>LIBELLE_SGBD</th>
                                            <th>UserName</th>
                                            <th class="td-actions">Heure</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($app as $appli):?>
                                        <tr>
                                            <td><?= $appli['ID_SGBD'] ?></td>
                                            <td><?= $appli['LIBELLE_SGBD'] ?></td>
                                            <td><?= $appli['USERNAME'] ?></td>
                                            <td class="td-actions">
                                            <?= $appli['HEURE'] ?> 
                                            </td>
                                        </tr>

                                     <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>