<section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    {{ Form::label('name', 'Nombre del empleado') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'nameCompany']) }}  
                </div>
            </div>
        
            <div class="col-md-12">
                <div class="form-group row">
                    {{ Form::label('company_id', 'Empresa') }}
                    {{ Form::select('company_id', $companies, null, ['class' => 'form-control']) }}
                </div>
            </div>
        
            <div class="col-md-12">
                <div class="form-group row">
                    <button type="submit" class="btn btn-sm btn-success">Guardar</button> 
                </div>
            </div>
        </div>
    </section>