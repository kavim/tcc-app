@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css"> --}}
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>

<script>
    $(document).ready(function(){

        $( ".formato_data" ).datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR"
        });

        $('#switch').change(function(){
            // alert('The switch is: ' + ($(this).is(':checked') ? 'ON' : 'OFF'));
            if($(this).is(':checked')){
                $('#course_completed_at').show('fast');
            }else{
                $('#course_completed_at').hide('fast');
            }
        });

        if($('#switch').is(':checked')){
            $('#course_completed_at').show();
        }else{
            $('#course_completed_at').hide();
        }
    });
</script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Status</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('app.profile.update.status') }}" method="POST">

                            @csrf

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="flexCheckDefault" name="open_to_work"
                                    @if(isset($user->student->open_to_work))
                                        {{ old('open_to_work') == 'on' || $user->student->open_to_work == 1 ? 'checked' : '' }}
                                    @else
                                        {{ old('open_to_work') == 'on' ? 'checked' : '' }}
                                    @endif
                                >
                              <label class="form-check-label" for="flexCheckDefault">
                                {{ __('sentences.open_to_work') }}
                              </label>
                            </div>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
