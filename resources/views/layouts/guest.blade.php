<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar container navbar-expand-lg navbar-light bg-light rounded">
	  
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	    	<li class="nav-item active">
		        <a class="nav-link" href="#">Home </a>
	      	</li>
	      @guest
	      @else
	      	@if(Auth::user()->is_admin>0)
	      		<li class="nav-item active">
			        <a class="nav-link" href="#">Adminpanel <span class="sr-only">(current)</span></a>
		      	</li>
		    @endif
		      
	      @endguest
	      
	    </ul>
	    
	  </div>
	</nav>
	

	@yield("content")


	<script src="https://code.jquery.com/jquery-3.4.0.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	@yield('js')
</body>
</html>