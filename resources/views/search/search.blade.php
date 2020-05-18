@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Suche
                </h5>
            </div>
            <div class="card-body">
                <div class="container-fluid">

                        <div class="form-row">
                            <input type="text" id="txtSearch" name="txtSearch" class="form-control"  placeholder="Mindestens 4 Buchstaben eingeben ..." >
                        </div>

                </div>
            </div>
            <div class="card-body">
                <ul class="list-group" id="result">

                </ul>

            </div>
        </div>
    </div>
@endsection

@push('js')

    <script type="application/javascript">
        $(document).ready(function(){
            $('#txtSearch').on('keyup', function(){
                var text = $(this).val();
                if (text.length > 3){
                    $.ajax({
                        type:"POST",
                        url: '{{url('search')}}',
                        data: {
                            'text': $('#txtSearch').val(),
                            '_token': "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            console.log(data);

                            data.forEach(result =>
                            {
                                $("#result").append('<li class="list-group-item"><a href="{{url('themes')}}/'+ result.id +'">'+ result.theme + '</a></li>')
                            });
                        }
                    });
                }
            });
        });
    </script>

@endpush
