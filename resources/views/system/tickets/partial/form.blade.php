<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                {{ Form::label('user_id', 'Usuario quien levanta el ticket') }}
                {{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                {{ Form::label('activity', 'Actividad') }}
                {{ Form::textarea('activity', null, ['class' => 'form-control', 'placeholder' => 'Actividad a desarrollar']) }} 
            </div>
        </div>
    
        <div class="col-md-12">
            <div class="form-group row">
                {{ Form::label('priority', 'Prioridad') }}
                {{ Form::select('priority', ['ALTA' => 'Alta', 'MEDIA' => 'Media', 'BAJA' => 'Baja'], null, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                {{ Form::label('employee_id', 'Usuario') }}
                {{ Form::select('employee_id', $employees, null, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                {{ Form::label('engineer_id', 'Ingeniero asignado') }}
                {{ Form::select('engineer_id', $engineers, null, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                {{ Form::label('notes', 'Notas') }}
                {{ Form::textarea('notes', null, ['class' => 'form-control', 'placeholder' => 'Notas']) }} 
            </div>
        </div>
    
        <div class="col-md-12">
            <div class="form-group row">
                <button type="submit" class="btn btn-sm btn-success">Guardar</button> 
            </div>
        </div>
    </div>
</section>