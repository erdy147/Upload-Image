<!DOCTYPE html>
<html>
<head>
    <title>Upload Proof of Payment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
    
<body>
<div class="container">
     
    <div class="panel panel-primary">
      <div class="panel-heading"><h2>Upload Proof of Payment</h2></div>
      <div class="panel-body">
     
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        
        @endif
        <br><br>
        <h2>All Profiles</h2>
        <table class="table">
        <tr>
            <th>Image</th>

        </tr>
        @foreach( $profiles as $profile)
        <tr>
            <td>{{$profile->name}}</td>

            <td>
                <img height="100" width=100 src="{{$profile->profile_picture}}"  />
            </td>

        </tr>
        @endforeach
        </table>
       

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('ProfileUpload') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
    
              
             <div class="col-md-6">
                    <input type="file" name="profile_picture" id="imgInp" class="form-control">
                    <img style="visibility:hidden"  id="prview" src=""  width=100 height=100 />
                </div>
               
     
            </div>
            <div class="row">
    
               
     
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
     
            </div>
        </form>
    
      </div>
    </div>
</div>
</body>
<script>
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    prview.style.visibility = 'visible';

    prview.src = URL.createObjectURL(file)
  }
}
</script>
  
</html>
﻿