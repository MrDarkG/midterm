@extends('layouts.app')

@section("css")
<style type="text/css">
    table,tr,td,th{
        border:solid 1px black;
    }
    table,tr{
        width: 100%;

    }
    td{
        padding: 10px;
    }
    th{
        text-align: center;
        padding: 10px;

    }
</style>
@endsection

@section('content')
<div class="container p-4 bg-white rounded" id="popup">
    <form method="POST" action="{{ route('updaterecord') }}">
        @csrf
        <div class="row  m-4 " style="position: relative;">
            
            <div class="form-group col-md-12">
                <input type="text" name="name" placeholder="სახელი" class="form-control w-100" id="recname" value="{{ $recs->name }}">
            </div>
            <input type="hidden" name="id" value="{{ $recs->s_id }}" id>
            <div class="form-group col-md-12">
                <input type="date" name="date" placeholder="გამოშვების თარიღი" class="form-control w-100" id="recdate" value="{{ $recs->creatdate }}"> 
            </div>
            
            <div class="form-group col-md-12">
                
                <button class="btn btn-success w-100" onclick="saverec()">დამატება</button>
            </div>
        </div>
    </form>
</div>

@endsection
