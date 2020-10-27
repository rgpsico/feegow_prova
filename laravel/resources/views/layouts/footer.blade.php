<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Preencha seus dados</h4>
                <button type="button" class="close" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <form id="solicitar_form">
                @csrf
                    <div class="input-group">
                       
            <input type="nome" class="form-control" id="nome" value="" placeholder="Nome Completo" required>
                         <select class="form-control form-control-sm como_conheceu" id="source_id" required>
                            <option>Como Conheceu</option>
                           
                        </select>
                    </div>
                      <div class="input-group">
  <input type="nacimento" class="form-control" id="birthDate" placeholder="Seu aniversário" >
                <input type="text" class="form-control" id="cpf"  placeholder="CPF" >
                      
                      
                         
                           </div>
                        <input type="hidden" class="form-control" id="professional_id" value="" placeholder="">
                            
                       
                        <input type="hidden" class="form-control" id="espec_id" value="" placeholder="espec_id">
                         </div>
                    <button type="button" class="btn btn-success solicitar">Solicitar Horários</button>
                </form>
            </div>
           
        </div>
    </div>
</div>
<div class="modal fade" id="modal_confirm" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body-confirm">
                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
