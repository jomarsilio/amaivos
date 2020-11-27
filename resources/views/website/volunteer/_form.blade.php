{!! Form::open([
    'route' => 'volunteer.store',
    'method' => 'post',
    'id' => 'cadastro',
    'class' => 'd-flex flex-column p-5 mb-lg-5'
]) !!}
    <div class="form-group">
        {{ Form::label('vonlunteer-name', 'Nome completo') }}
        {{ Form::text(
            'volunteer[name]',
            old('vonlunteer.name'),
            [
                'class' => 'form-control',
                'id' => 'vonlunteer-name',
                'maxlength' => 255,
                'required' => true
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('vonlunteer-birth-date', 'Data de nascimento') }}
        {{ Form::text(
            'volunteer[birth_date]',
            old('vonlunteer.birth_date'),
            [
                'class' => 'form-control',
                'id' => 'vonlunteer-birth-date',
                'maxlength' => 10,
                'required' => true,
                'onkeypress' => 'mascara(this, mdata);'
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('vonlunteer-cpf', 'CPF') }}
        {{ Form::text(
            'volunteer[cpf]',
            old('vonlunteer.cpf'),
            [
                'class' => 'form-control',
                'id' => 'vonlunteer-cpf',
                'maxlength' => 14,
                'required' => true,
                'onkeypress' => 'mascara(this, mcpf);'
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('vonlunteer-cell-phone', 'Celular') }}
        {{ Form::text(
            'volunteer[cell_phone]',
            old('vonlunteer.cell_phone'),
            [
                'class' => 'form-control',
                'id' => 'vonlunteer-cell-phone',
                'maxlength' => 15,
                'required' => true,
                'onkeypress' => 'mascara(this, mtel);'
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('vonlunteer-email', 'E-mail') }}
        {{ Form::text(
            'volunteer[email]',
            old('vonlunteer.email'),
            [
                'class' => 'form-control',
                'id' => 'vonlunteer-email',
                'maxlength' => 150
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('vonlunteer-responsible-name', 'Nome do responsável') }}
        <span class="d-block text-uppercase">(Caso o voluntário não tenha atingido a maioridade)</span>
        {{ Form::text(
            'volunteer[responsible_name]',
            old('vonlunteer.responsible_name'),
            [
                'class' => 'form-control',
                'id' => 'vonlunteer-responsible-name',
                'maxlength' => 255
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('vonlunteer-responsible-cpf', 'CPF do responsável') }}
        {{ Form::text(
            'volunteer[responsible_cpf]',
            old('vonlunteer.responsible_cpf'),
            [
                'class' => 'form-control',
                'id' => 'vonlunteer-responsible-cpf',
                'maxlength' => 14,
                'onkeypress' => 'mascara(this, mcpf);'
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('vonlunteer-occupation', 'Profissão do voluntário') }}
        {{ Form::text(
            'volunteer[occupation]',
            old('vonlunteer.occupation'),
            [
                'class' => 'form-control',
                'id' => 'vonlunteer-occupation',
                'maxlength' => 150,
                'required' => true
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('vonlunteer-city', 'Cidade que reside') }}
        {{ Form::select(
            'volunteer[city_id]',
            $cities->mapWithKeys(function ($item) {
                return [$item['id'] => "{$item['name']} - {$item['uf']}"];
            }),
            old('volunteer.city_id'),
            [
                'placeholder' => '...',
                'class' => 'form-control custom-select',
                'id' => 'vonlunteer-city',
                'required' => true
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('vonlunteer-available-time', 'Horas que pode dedicar por dia') }}
        {{ Form::select(
            'volunteer[available_time]',
            $availableTimes,
            old('volunteer.available_time'),
            [
                'placeholder' => '...',
                'class' => 'form-control custom-select',
                'id' => 'vonlunteer-available-time',
                'required' => true
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('vonlunteer-week-day', 'Dias que pode dedicar por semana') }}
        @foreach ($weekDays as $item)
            <div class="custom-control custom-checkbox mb-1">
                {{ Form::checkbox(
                    'volunteer-week-day[]',
                    $item->id,
                    false,
                    [
                        'class' => 'custom-control-input',
                        'id' => 'vonlunteer-week-day-'.$item->id
                    ]
                ) }}
                {{ Form::label(
                    'vonlunteer-week-day-'.$item->id,
                    $item->name,
                    [
                        'class' => 'custom-control-label'
                    ]
                ) }}
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="vonlunteer-expertise-area"><h2><strong>Indique a área em que deseja atuar:</strong></h2></label>
        {{ Form::select(
            'volunteer[expertise_area_id]',
            $expertiseAreas->mapWithKeys(function ($item) {
                return [$item['id'] => $item['name']];
            }),
            old('volunteer.expertise_area_id'),
            [
                'placeholder' => '...',
                'class' => 'form-control custom-select',
                'id' => 'vonlunteer-expertise-area',
                'required' => true
            ]
        ) }}
    </div>
    <div class="custom-control custom-radio">
        {{ Form::radio(
            'volunteer[confirmation]',
            1,
            false,
            [
                'class' => 'custom-control-input',
                'id' => 'vonlunteer-confirmation',
                'required' => true
            ]
        ) }}
        <label class="custom-control-label" for="vonlunteer-confirmation">
            Confirme seu interesse em ser voluntário aceitando nosso <a href="#" target="_blank">termo de adesão</a>.
        </label>
    </div>
    {{ Form::button(
        '<strong>Enviar</strong>',
        [
            'type' => 'submit',
            'class' => 'text-uppercase align-self-center mt-4'
        ]
    ) }}

    {{-- Mensagens --}}
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
{!! Form::close() !!}