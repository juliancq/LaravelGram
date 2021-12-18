@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-dark">
                <div class="card-header">{{ 'Add New Post' }}</div>

                <div class="card-body">
                    <form action="/posts" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                        @csrf
                        
                        <div class="row">

                            <div class="col-8 offset-2">

                                <div class="row">  </div> 


                                <div class="form-group row">
                                    <label for="caption" class="col-md-4 col-form-label">{{ "Caption" }}</label>
                        
                                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}"  autocomplete="caption" autofocus>

                                    @error('caption')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                

                                </div>

                                <div class="form-group row">

                                    <label for="image" class="col-md-4 col-form-label">{{ "Post Image" }}</label>
                                    <input type="file" name="image" class="form-control-file" id="image">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="row pt-4 float-right">
                                    
                                    <button class="btn btn-primary btn-md" type="submit">Submit</button>



                                </div>
                                
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
