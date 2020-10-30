$(document).ready(function () {
    $('a[data-confirm]').click(function (ev) {
        var href = $(this).attr('href');
        if (!$('#confirm-delete').lenght) {
            $('body').append(
/* 
                '<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                < div class= "modal-dialog modal-dialog-centered" role = "document" >
                <div class="modal-content">
                    <div class="modal-header">
                        Excluir item
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir o item selecionado?
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sucess" data-dismiss="modal">Cancelar</button>
                        <a type="button" class="btn btn-danger text-white">Apagar</button>

                    </div>
                </div>
            </div >
            </div > */
                ');
        }
        $(#dataComfirmOK).attr('href', href);
        $('#confirm-delete').modal({ show: true });
        return false;

    })
})