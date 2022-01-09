  
                </div>
        </div>
    </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Delete this item ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a class="deletion_link" href="">
                <button type="button" class="btn btn-danger">Delete</button>
                </a>
            </div>
        </div>
    </div>
</div>


<script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'editor' );
</script>

<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
    <!-- jquery -->

<script type="text/javascript" src="./assets/scripts/index.js"></script></body>


<?php 
successful_login_notification();
display_msg();
 ?>
</html>
