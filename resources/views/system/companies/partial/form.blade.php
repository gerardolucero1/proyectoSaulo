<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                {{ Form::label('name', 'Nombre de la compañia') }}
                {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'nameCompany']) }}  
            </div>
        </div>
    
        <div class="col-md-12">
            <div class="form-group row">
                {{ Form::label('direction', 'Nombre de la compañia') }}
                {{ Form::text('direction', null, ['class' => 'form-control', 'id' => 'directionCompany']) }}  
            </div>
        </div>
    
        <div class="col-md-12">
            <div class="form-group row">
                <button type="submit" class="btn btn-sm btn-success">Guardar</button> 
            </div>
        </div>
    </div>
</section>