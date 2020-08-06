<div id="errorModal" class="modal fade" role="dialog">
    <div class="center">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Important Notice !
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>
                        <?php
                        if (isset($_SESSION['Msg']))
                            echo $_SESSION['Msg'];
                        ?>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>