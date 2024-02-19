<!DOCTYPE html>
<html lang="en">
@csrf
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</script>
<header class="fixed-top">
    <nav id="nav" class="  navbar navbar-expand-lg navbar-light navcolor">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" ></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item button">
          <a  class="nav-link mx-5 " aria-current="page" href="{{route('tests.index')}}"><strong class="text-light">List</strong></a>
        </li>
        <li class="nav-item">
          <a  class="nav-link mx-5" href="{{route('tests.create')}}"><strong class="text-light">Ajouter</strong></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </header>
</head>
<body>
@include('test.navigation')
<h2 class="text-center pt-3 pb-2"><strong>Ajouter Contrat</strong></h2>

@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
@endif

<div class="container mx-auto pt-2">

<form action="{{Route('tests.store')}}"method="POST">
@csrf 
<div class="container border border-5 rounded p-4" style="width:15cm">

            <div class="row " style="height: 50vh;">
                <div class="mx-auto col-10 col-md-8">
                    <div class="form-outline mb-2 ">
                        <strong class="mb-3">Numero:</strong></br>
                        <input type="text" name="numero" value="{{ old('numero') }}" class="form-control"required >
                        @if ($errors->has('numero'))
        <div class="text-red-500">{{ $errors->first('numero') }}</div>
    @endif
                    </div>
                </div>
                <div class="mx-auto col-10 col-md-8">
                    <div class="form-outline mb-2 ">
                        <strong class="mb-3">Data:</strong></br>
                        <input type="number" name="data" value="{{ old('data') }}"  class="form-control" required >
                        @if ($errors->has('data'))
        <div class="text-red-500">{{ $errors->first('data') }}</div>
    @endif
                    </div>
                </div>
                <div class="mx-auto col-10 col-md-8">
                    <div class="form-outline mb-2 ">
                        <strong class="mb-3">Heurs:</strong></br>
                        <input type="number" name="heurs"  class="form-control "value="{{ old('heurs') }}" required>
                        @if ($errors->has('heurs'))
        <div class="text-red-500">{{ $errors->first('heurs') }}</div>
    @endif
                    </div>
                </div>
                <div class="mx-auto col-10 col-md-8">
                    <div class="form-outline mb-2 ">
                        <strong class="mb-3">Prix:</strong></br>
                        <input type="number" name="prix"  class="form-control" value="{{ old('prix') }}" required>
                        @if ($errors->has('prix'))
        <div class="text-red-500">{{ $errors->first('prix') }}</div>
    @endif
                    </div>
                </div>
                </div>
                <div class="text-center button">
                <button type="button" class="btn btn-primary addRow" id="add">Ajouter numero</button>
                </br></br>
                </div>


@if(count($errors)>0)
 @foreach($errors->all() as $e)
<strong class="text-danger text-center">{{$e}}</strong></br>
 @endforeach
@endif



        <div class="text-center repeater-heading">
  
</div>
        <div id="y" style="display:none">
        
        <table class="table table-bordered" id="table">
            <thead>
            <tr>
                <th class="text-center">Numero</th>
                <th class="text-center">Status</th>
                <th><div class="text-center"></div></th>
            </tr>
            </thead>
            <tbody class="x">
            <tr>
                
                
            </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary col-md-2">Save</button>
        </form>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        $("#add").one("click" ,function(){
        $("#y").toggle();
    });
        $('.button').on('click','.addRow',function(){
            var tr= '<tr class="mb-0">'+
                '<td>'+
                '<input type="number" value="" name="number[]" class="form-control" required/></td>'+
                
                '<td>'+
                '<select type="text" class="form-select"  name="status[]">'+
                            '<option value="active">Active</option>'+
                            '<option value="disactive">Disactive</option>'+
                 '</select>'+
                '</td>'+
                '<td><div class="text-center"><a href="javascript:void(0)" class="btn btn-danger deleteRow">Delete</a></div></td>'+
            '</tr>'
            $('.x').append(tr);
        });
        $(".x").on('click','.deleteRow',function(){
            $(this).parent().parent().parent().remove();
        });
    </script>
</body>
</html>