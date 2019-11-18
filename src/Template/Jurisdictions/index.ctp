<?php
$urlToRestApi = $this->Url->build('/api/jurisdictions', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Jurisdictions/index', ['block' => 'scriptBottom']);
?>

<div class="container">
    <div class="row">
        <div class="panel panel-default jurisdictions-content">
            <div class="panel-heading">Jurisdictions <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add Jurisdictions</h2>
                <form class="form" id="jurisdictionAddForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" location="location" id="location"/>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="jurisdictionAction('add')">Add Jurisdiction</a>
                    <!-- input type="submit" class="btn btn-success" id="addButton" value="Add Jurisdiction" -->
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Jurisdiction</h2>
                <form class="form" id="jurisdictionEditForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" location="location" id="locationEdit"/>
                    </div>
                    <input type="hidden" class="form-control" location="id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="jurisdictionAction('edit')">Update Jurisdiction</a>
                     <!--input type="submit" class="btn btn-success" id="editButton" value="Update jurisdiction"-->
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="jurisdictionData">
                    <?php
                    $count = 0;
                    foreach ($jurisdictions as $jurisdiction): $count++;
                        ?>
                        <tr>
                            <td><?php echo '#' . $count; ?></td>
                            <td><?php echo $jurisdiction['location']; ?></td>
                            <td>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editJurisdiction('<?php echo $jurisdiction['id']; ?>')"></a>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? jurisdictionAction('delete', '<?php echo $jurisdiction['id']; ?>') : false;"></a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

