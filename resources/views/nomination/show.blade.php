@extends('layouts.app')

@section('content')

    <h3>Preview Nomination Notification</h3>

    <div id="nomination" >
        <div style="width: 600px; padding: 10px;">
            <div id="letter" contenteditable="true">
                Hi {{$nom->nominee->firstName}},<br>
                Since I know and respect you, I think you should run for office.
                I hope you'll consider accepting the nomination.
            </div>
            <div id="about">
                <h4>About iNominate</h4>
                <p>
                    iNominate is a platform designed to 
                </p>

            </div>
        </div>
    </div>

@stop

@push('style')

@endpush

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.inline( 'letter' );
    </script>
@endpush