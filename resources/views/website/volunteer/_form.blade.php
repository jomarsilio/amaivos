{!! Form::open([
    'route' => 'volunteer.store',
    'method' => 'post',
    'id' => 'cadastro',
    'class' => 'd-flex flex-column p-5 mb-lg-5'
]) !!}

    {{-- Mensagem de erro. --}}
    @if ($errors->any())
        <div>
            <div class="form_alert row align-items-center justify-content-center justify-content-sm-start text-uppercase mb-3">
                <img class="col-6 col-sm-3" src="{{ asset('images/error.png') }}">
                <div class="col-12 col-sm-9 col-lg-8 col-xl-9 pl-3 text-center text-sm-left">
                    <h2 class="text-danger mb-0"><strong>Erro no envio.</strong></h2>
                    <p class="mb-0 text-white">Favor verificar o formulário</p>
                </div>
            </div>
        </div>
    @endif

    {{-- Mensagem de sucesso --}}
    @if (session('volunteer_created'))
        <div>
            <div class="form_alert row align-items-center justify-content-center justify-content-sm-start text-uppercase mb-3">
                <img class="col-6 col-sm-3" src="{{ asset('images/check.png') }}">
                <div class="col-12 col-sm-9 col-lg-8 col-xl-9 pl-3 text-center text-sm-left">
                    <h2 class="text-success mb-0"><strong>Feito! Muito obrigado.</strong></h2>
                    <p class="mb-0 text-white">As informações foram enviadas no seu e-mail</p>
                </div>
            </div>
        </div>
    @endif

    <div class="form-group">
        {{ Form::label('volunteer-name', 'Nome completo') }}
        {{ Form::text(
            'volunteer[name]',
            old('volunteer.name'),
            [
                'class' => $errors->has('volunteer.name') == true ? 'form-control erro_bg' : 'form-control',
                'id' => 'volunteer-name',
                'maxlength' => 255,
                'required' => true
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('volunteer-birth-date', 'Data de nascimento') }}
        {{ Form::text(
            'volunteer[birth_date]',
            old('volunteer.birth_date'),
            [
                'class' => $errors->has('volunteer.birth_date') == true ? 'form-control erro_bg' : 'form-control',
                'id' => 'volunteer-birth-date',
                'maxlength' => 10,
                'required' => true,
                'onkeypress' => 'mascara(this, mdata);'
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('volunteer-cpf', 'CPF') }}
        {{ Form::text(
            'volunteer[cpf]',
            old('volunteer.cpf'),
            [
                'class' => $errors->has('volunteer.cpf') == true ? 'form-control erro_bg' : 'form-control',
                'id' => 'volunteer-cpf',
                'maxlength' => 14,
                'required' => true,
                'onkeypress' => 'mascara(this, mcpf);'
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('volunteer-cell-phone', 'Celular') }}
        {{ Form::text(
            'volunteer[cell_phone]',
            old('volunteer.cell_phone'),
            [
                'class' => $errors->has('volunteer.cell_phone') == true ? 'form-control erro_bg' : 'form-control',
                'id' => 'volunteer-cell-phone',
                'maxlength' => 15,
                'required' => true,
                'onkeypress' => 'mascara(this, mtel);'
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('volunteer-email', 'E-mail') }}
        {{ Form::text(
            'volunteer[email]',
            old('volunteer.email'),
            [
                'class' => $errors->has('volunteer.email') == true ? 'form-control erro_bg' : 'form-control',
                'id' => 'volunteer-email',
                'maxlength' => 150
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('volunteer-responsible-name', 'Nome do responsável') }}
        <span class="d-block text-uppercase">(Caso o voluntário não tenha atingido a maioridade)</span>
        {{ Form::text(
            'volunteer[responsible_name]',
            old('volunteer.responsible_name'),
            [
                'class' => $errors->has('volunteer.responsible_name') == true ? 'form-control erro_bg' : 'form-control',
                'id' => 'volunteer-responsible-name',
                'maxlength' => 255
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('volunteer-responsible-cpf', 'CPF do responsável') }}
        {{ Form::text(
            'volunteer[responsible_cpf]',
            old('volunteer.responsible_cpf'),
            [
                'class' => $errors->has('volunteer.responsible_cpf') == true ? 'form-control erro_bg' : 'form-control',
                'id' => 'volunteer-responsible-cpf',
                'maxlength' => 14,
                'onkeypress' => 'mascara(this, mcpf);'
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('volunteer-occupation', 'Profissão do voluntário') }}
        {{ Form::text(
            'volunteer[occupation]',
            old('volunteer.occupation'),
            [
                'class' => $errors->has('volunteer.occupation') == true ? 'form-control erro_bg' : 'form-control',
                'id' => 'volunteer-occupation',
                'maxlength' => 150,
                'required' => true
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('volunteer-city', 'Cidade que reside') }}
        {{ Form::select(
            'volunteer[city_id]',
            $cities->mapWithKeys(function ($item) {
                return [$item['id'] => "{$item['name']} - {$item['uf']}"];
            }),
            old('volunteer.city_id'),
            [
                'placeholder' => '...',
                'class' => $errors->has('volunteer.city_id') == true ? 'form-control custom-select erro_bg' : 'form-control custom-select',
                'id' => 'volunteer-city',
                'required' => true
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('volunteer-available-time', 'Horas que pode dedicar por dia') }}
        {{ Form::select(
            'volunteer[available_time]',
            $availableTimes,
            old('volunteer.available_time'),
            [
                'placeholder' => '...',
                'class' => $errors->has('volunteer.available_time') == true ? 'form-control custom-select erro_bg' : 'form-control custom-select',
                'id' => 'volunteer-available-time',
                'required' => true
            ]
        ) }}
    </div>
    <div class="form-group">
        {{ Form::label('volunteer-week-day', 'Dias que pode dedicar por semana') }}
        @foreach ($weekDays as $item)
            <div class="custom-control custom-checkbox mb-1 {{ $errors->has('volunteer_week_day') == true ? 'erro_bg' : null }}">
                {{ Form::checkbox(
                    'volunteer_week_day[]',
                    $item->id,
                    false,
                    [
                        'class' => 'custom-control-input',
                        'id' => 'volunteer-week-day-'.$item->id
                    ]
                ) }}
                {{ Form::label(
                    'volunteer-week-day-'.$item->id,
                    $item->name,
                    [
                        'class' => 'custom-control-label'
                    ]
                ) }}
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="volunteer-expertise-area"><h2><strong>Indique a área em que deseja atuar:</strong></h2></label>
        {{ Form::select(
            'volunteer[expertise_area_id]',
            $expertiseAreas->mapWithKeys(function ($item) {
                return [$item['id'] => $item['name']];
            }),
            old('volunteer.expertise_area_id'),
            [
                'placeholder' => '...',
                'class' => $errors->has('volunteer.expertise_area_id') == true ? 'form-control custom-select erro_bg' : 'form-control custom-select',
                'id' => 'volunteer-expertise-area',
                'required' => true
            ]
        ) }}
    </div>
    <div class="custom-control custom-radio {{ $errors->has('volunteer.confirmation') == true ? 'erro_bg' : null }}">
        {{ Form::radio(
            'volunteer[confirmation]',
            1,
            false,
            [
                'class' => 'custom-control-input',
                'id' => 'volunteer-confirmation',
                'required' => true
            ]
        ) }}
        <label class="custom-control-label" for="volunteer-confirmation">
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
{!! Form::close() !!}