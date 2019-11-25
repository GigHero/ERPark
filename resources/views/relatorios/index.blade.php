@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Mensalista</div>
        <div class="card-body">
            
            <div class="row">
            <div class="container">
                <div class="row">
                    Date formats: yyyy-mm-dd, yyyymmdd, dd-mm-yyyy, dd/mm/yyyy, ddmmyyyyy
                </div>
                <br />
                    <div class="row">
                        <div class='col-sm-3'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop