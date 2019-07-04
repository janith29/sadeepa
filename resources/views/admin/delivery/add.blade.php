@extends('admin.layouts.admin')

@section('title',"Add a delivery") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="adddelivery" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
        @php
        use Illuminate\Support\Facades\DB;
        use Carbon\Carbon;
        $deliveres = DB::select('select * from delivered ORDER BY id DESC LIMIT 1');
        
        $lastid=null;
        foreach($deliveres as $deliveree)
        {
            $lastid=$deliveree->id;
        }

        
        $lastid=$lastid+1;
        $mytime =  Carbon::now();
        Carbon::setToStringFormat('Ymd');
        if($lastid<10)
        {
        $refkey=$mytime."0".$lastid;
        }
        else {
            $refkey=$mytime.$lastid;
        }
        $Issue=Carbon::now();
        Carbon::setToStringFormat('Y-m-d');
        @endphp
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @php
            $articleNoDelvery=$delivery->articleNo ;
        @endphp
        @if(Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif
        <div class="form-group">
            <label for="articleNo">Article No *</label>
            <h2>{{$articleNoDelvery}}</h2>
        </div>
        <div class="form-group">
            <label for="articleNo">Reference No *</label>
            <h2>{{$refkey}}</h2>
        </div>
        <div class="form-group">
            <label for="articleNo">Issue date *</label>
            <h2>{{$Issue}}</h2>
        </div>
        <div class="container">
            <div class="form-group">
                {!! Form::label('request_date', 'Request date') !!}
                {!! Form::date('request_date', null, ['class'=> 'form-control']) !!}
            </div>
        </div>
        {{-- <div class="container">
            <div class="form-group">
                {!! Form::label('issue_date', 'Issue date') !!}
                {!! Form::date('issue_date', null, ['class'=> 'form-control']) !!}
            </div>
        </div> --}}
        <div class="form-group">
            <label for="quantity">Quantity *</label>
            <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="{{ old('quantity') }}"  @if ( $articleNoDelvery==null)disabled @endif>
        </div>
       
        <input type="hidden" name="articleNo" id="articleNo" value="{{ $delivery->articleNo }}" >
        <input type="hidden" name="issue_date" id="issue_date" value="{{ $Issue }}" >
        <input type="hidden" name="refkey" id="refkey" value="{{ $refkey }}" >
        <a href="{{ route('admin.delivery') }}" class="btn btn-danger">Cancel</a>
        @if ( $articleNoDelvery!=null) 
        <button type="submit" class="btn btn-primary">Add</button>
        @endif
      </form>
    </div>

         
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection