@extends('setting')

@section('setting')

<div class="container">
    <div class="row justify-content-center">
        <div class="mt-4">
            {{-- @if(session()->get('message'))
            <div class="alert prof-pic-alert" role="alert">
                <strong>Success: </strong>{{session()->get('message')}}
            </div>
            @endif --}}        
         {{-- <div class="card-body"> --}}
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <h1>Profile picture </h1><br>
            {{-- {{ __('Please upload your profile picture here !') }} --}}
            <form action="{{route('changePhotoPost')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="p" class="custom-file-upload">Click here to get the image
                    <input type="file" name="image" id="p">
                </label>
                <input type="submit" value="Upload" id="btn-upload">
            </form>
        {{-- </div> --}}
    </div>
</div>
@endsection

@section('setting-title','Change profil picture')

