<!DOCTYPE html>
	<html lang="en">
	  <head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	

	    <title>@yield('title') -CosmerGarciaC</title>
	    
	    <!-- Tailwind CSS Link -->
	    <link rel="stylesheet" 
	    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
	

	    <!-- Fontawesome Link -->
	    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
	 
	  </head>
	  <body class=" bg-gray-100 text-gray-800">
	  
	  <nav class="flex py-5 bg-indigo-500 text-white">
       <div class="w-1/2 px-12 mr-auto">  
	  <h2 class="text-2xl font-bold">Instituto Cosmer Garcia C.</h2>
        </div>


	  @yield('content')
	  </body>
	</html>
