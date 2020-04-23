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
<div class="popup shadow" id="popup">
    <div class="row  m-4 " style="position: relative;">
        <span style="position: absolute; right: -26px;top:-10px;z-index: 999999" class="btn bg-transparent border-0">
            <i class="fa fa-times fa-2x"></i>
        </span>
        <div class="form-group col-md-12">
            <input type="text" name="name" placeholder="სახელი" class="form-control w-100" id="recname">
        </div>
        <div class="form-group col-md-12">
            <input type="date" name="name" placeholder="გამოშვების თარიღი" class="form-control w-100" id="recdate">
        </div>
        
        <div class="form-group col-md-12">
            
            <span class="btn btn-success w-100" onclick="saverec()">დამატება</span>
        </div>
    </div>
</div>
<div class="container rounded bg-white p-4"> 
    <table>
        <tr>
            <th>სახელი</th>
            <th>ოდენობა</th>
            <th>გამოშვების თარიღი</th>
            <th>მარაგის კოდი</th>
            <th>ვარგისიანობა</th>
            <th>ბაზაში ჩაწერის თარიღი</th>
            <th>მოქმედება</th>
        </tr>
        @foreach ($storage as $st)
            <tr>
                <td>{{ $st->name }}</td>
                <td>{{ $st->quantity }}</td>
                <td>{{ $st->creatdate }}</td>
                <td>{{ $st->code }}</td>
                <td>{{ $st->goodfor }}</td>
                <td>{{ $st->created_at }}</td>
                <td>

                    <span class=" btn btn-danger" onclick="deleterec({{ $st->s_id }})">
                        
                        წაშლა
                    </span>
                    <span class="btn btn-primary">
                        
                        <a href="{{ route('editrecord',["id"=>$st->s_id]) }}" class="text-light">
                            
                            ჩასწორება
                        </a>
                    </span>
                </td>
            </tr>
        @endforeach
    </table>
    <button class="btn btn-info w-100 mt-2 text-light" id="add">ჩანაწერის დამატება</button>
</div>
@endsection

@section("js")
<script type="text/javascript">
    $(document).ready(function(){

        $("#add").click(function(){
            $("#add").toggle();
            $("#popup").toggle();
        })
        
    });
    function saverec() {
        $.ajax({
           type:'POST',
           url:'{{ route('saverecord') }}',
           data:{
            "name":$("#recname").val(),
            "date":$("#recdate").val(),
            '_token':'{{csrf_token()}}'
           },
           success:function(data) {
                alert("ჩანაწერი წარმატებით დაემატა");
                $("#add").toggle();
                $("#popup").toggle();
           }
        });
    }
    function deleterec(id) {
        $.ajax({
           type:'POST',
           url:'{{ route('deleterecord') }}',
           data:{
            "id":id,
            '_token':'{{csrf_token()}}'
           },
           success:function(data) {
              alert("ჩანაწერი წარმატებით წაიშალა");
           }
        });
    }
    
    
</script>
@endsection