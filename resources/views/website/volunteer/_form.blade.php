<form id="cadastro" class="d-flex flex-column p-5 mb-lg-5">
    <div class="form-group">
        <label for="nome">Nome completo</label>
        <input type="text" id="nome" name="nome" class="form-control">
    </div>
    <div class="form-group">
        <label for="data_nasc">Data de nascimento</label>
        <input type="text" id="data_nasc" name="data_nasc" class="form-control" onkeypress="mascara(this, mdata);" maxlength="10">
    </div>
    <div class="form-group">
        <label for="cpf">CPF</label>
        <input type="text" id="cpf" name="cpf" class="form-control" onkeypress="mascara(this, mcpf);" maxlength="14">
    </div>
    <div class="form-group">
        <label for="celular">Celular</label>
        <input type="text" id="celular" name="celular" class="form-control" onkeypress="mascara(this, mtel);" maxlength="15">
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="nome_resp">Nome do responsável</label>
        <span class="d-block text-uppercase">(Caso o voluntário não tenha atingido a maioridade)</span>
        <input type="text" id="nome_resp" name="nome_resp" class="form-control">
    </div>
    <div class="form-group">
        <label for="cpf_resp">CPF do responsável</label>
        <input type="text" id="cpf_resp" name="cpf_resp" class="form-control" onkeypress="mascara(this, mcpf);" maxlength="14">
    </div>
    <div class="form-group">
        <label for="profissao">Profissão do voluntário</label>
        <input type="text" id="profissao" name="profissao" class="form-control">
    </div>
    <div class="form-group">
        <label for="cidade">Cidade que reside</label>
        <select id="cidade" name="cidade" class="form-control custom-select erro_bg">
            <option>Opção 1</option>
            <option>Opção 2</option>
        </select>
    </div>
    <div class="form-group">
        <label for="horas">Horas que pode dedicar por dia</label>
        <select id="horas" name="horas" class="form-control custom-select">
            <option>Opção 1</option>
            <option>Opção 2</option>
        </select>
    </div>
    <div class="form-group">
        <label>Dias que pode dedicar por semana</label>
        <div class="custom-control custom-checkbox mb-1">
            <input class="custom-control-input" type="checkbox" value="domingo" id="domingo">
            <label class="custom-control-label" for="domingo">Domingo</label>                        
        </div>
        <div class="custom-control custom-checkbox mb-1">
            <input class="custom-control-input" type="checkbox" value="segunda" id="segunda">
            <label class="custom-control-label" for="segunda">Segunda-feira</label>                        
        </div>
        <div class="custom-control custom-checkbox mb-1">
            <input class="custom-control-input" type="checkbox" value="terca" id="terca">
            <label class="custom-control-label" for="terca">Terça-feira</label>                        
        </div>
        <div class="custom-control custom-checkbox mb-1">
            <input class="custom-control-input" type="checkbox" value="quarta" id="quarta">
            <label class="custom-control-label" for="quarta">Quarta-feira</label>                        
        </div>
        <div class="custom-control custom-checkbox mb-1">
            <input class="custom-control-input" type="checkbox" value="quinta" id="quinta">
            <label class="custom-control-label" for="quinta">Quinta-feira</label>                        
        </div>
        <div class="custom-control custom-checkbox mb-1">
            <input class="custom-control-input" type="checkbox" value="sexta" id="sexta">
            <label class="custom-control-label" for="sexta">Sexta-feira</label>                        
        </div>
        <div class="custom-control custom-checkbox mb-1">
            <input class="custom-control-input" type="checkbox" value="sabado" id="sabado">
            <label class="custom-control-label" for="sabado">Sábado</label>                        
        </div>
    </div>
    <div class="form-group">
        <label for="area"><h2><strong>Indique a área em que deseja atuar:</strong></h2></label>
        <select id="area" name="area" class="form-control custom-select">
            <option>Opção 1</option>
            <option>Opção 2</option>
        </select>
    </div>
    <div class="custom-control custom-radio">
        <input class="custom-control-input" type="radio" name="termo" id="termo">
        <label class="custom-control-label" for="termo">Confirme seu interesse em ser voluntário aceitando nosso <a href="#" target="_blank">termo de adesão</a>.</label>
    </div>
    <button type="submit" class="text-uppercase align-self-center mt-4"><strong>Enviar</strong></button>
    <div>
        <div class="form_alert row align-items-center justify-content-center justify-content-sm-start text-uppercase mt-3">
            <img class="col-6 col-sm-3" src="{{ asset('images/error.png') }}">
            <div class="col-12 col-sm-9 col-lg-8 col-xl-9 pl-3 text-center text-sm-left">
                <h2 class="text-danger mb-0"><strong>Erro no envio.</strong></h2>
                <p class="mb-0 text-white">Favor verificar o formulário</p>
            </div>
        </div>
    </div>
    <div>
        <div class="form_alert row align-items-center justify-content-center justify-content-sm-start text-uppercase mt-3">
            <img class="col-6 col-sm-3" src="{{ asset('images/check.png') }}">
            <div class="col-12 col-sm-9 col-lg-8 col-xl-9 pl-3 text-center text-sm-left">
                <h2 class="text-success mb-0"><strong>Feito! Muito obrigado.</strong></h2>
                <p class="mb-0 text-white">As informações foram enviadas no seu e-mail</p>
            </div>
        </div>
    </div>
</form>