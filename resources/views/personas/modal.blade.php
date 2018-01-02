<!-- notice modal -->
<div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h5 class="modal-title" id="myModalLabel">How Do You Become an Affiliate?</h5>
            </div>
            <div class="modal-body">
                @include('personas.form_roles')
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-info btn-round" data-dismiss="modal">Sounds good!</button>
            </div>
        </div>
    </div>
</div>
<!-- end notice modal -->