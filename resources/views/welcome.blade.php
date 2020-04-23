@extends('layouts.guest')

@section('content')
<div class="container">
	<div class="bg-white shadow mt-4 p-4 rounded">
		
	    <form action="{{ route('search') }}" method="POST">
	    	@csrf
	    	<div class="row">
				<div class="form-group col-md-4">
			        <input type="text" name="name" placeholder="სახელი" class="form-control w-100" id="recname">
			    </div>
			    <div class="form-group col-md-4">
			        <input type="number" name="quantity" placeholder="ოდენობა" class="form-control w-100" id="recdate">
			    </div>
			    <div class="form-group col-md-4">
			        <input type="date" name="creatdate" placeholder="გამოშვების თარიღი" class="form-control w-100" id="recdate">
			    </div>
			    <div class="form-group col-md-4">
			        <input type="text" name="code" placeholder="კოდი" class="form-control w-100" id="recdate">
			    </div>
			    <div class="form-group col-md-4">
			        <input type="number" name="goodfor" placeholder="ვარგისიანობა" class="form-control w-100" id="recdate">
			    </div>
			    <div class="form-group col-md-4">
			        <input type="date" name="created_at" placeholder="ბაზაში დამატების თარიღი" class="form-control w-100" id="recdate">
			    </div>
			    <div class="form-group col-md-12">
		        
			        <button class="btn btn-success w-100" onclick="saverec()">ძებნა</button>
			    </div>
	    	</div>
	    	
		    
	    </form>
	</div>

    
</div>
@endsection
