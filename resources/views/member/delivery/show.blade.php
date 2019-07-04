@extends('member.layouts.member')
@section('title', "Delivery Management")

@section('content')
@php
        use Illuminate\Support\Facades\DB;
        $invertys = DB::table('inverty')->where('articleNo', $Delivery->articleNo)->get();
           
           $ArticleNo="panding";
           $invertyCount=null;
           foreach($invertys as $inverty)
           {
               $ArticleNo=$inverty->articleNo;
               $invertyCount=$inverty->qty;
               $color=$inverty->color;
               $collection=$inverty->collection;
               $location=$inverty->location;

           }
        @endphp
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th>
                <h2>Inverty Details</h2>
                </th>
            </tr>

            <tr>
                <th>Article No</th>
                <td>{{ $ArticleNo }}</td>
            </tr>

            <tr>
                    <th>Color</th>
                    <td>{{ $location}}</td>
                </tr>
            <tr>
                    <th>Collection</th>
                    <td>{{ $collection }}</td>
                </tr>
            <tr>
                <th>Location</th>
                <td>
                        {{ $location }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>Inverty Quantity</th>
                <td>
                    {{ ($invertyCount)}} 
                </td>
            </tr>
            <tr>
            <th>
                <h2>Delivery Details</h2>
                </th>
            </tr>
            <tr>
                <th>Reference No</th>
                <td>
                        {{ $Delivery->refkey }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>Issue date</th>
                <td>
                        {{ $Delivery->issudate }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>Request date</th>
                <td>
                        {{ $Delivery->reqdate }}
                    </a>
                </td>
            </tr>

            <tr>
                <th>Delivery Quantity</th>
                <td>
                        {{ $Delivery->qty }}
                    </a>
                </td>
            </tr>

            </tbody>
        </table>
        <a href="{{ route('member.delivery') }}" class="btn btn-danger">Delivery home</a>
        {{-- <a class="btn btn-info" href="{{ route('admin.inverty.edit',[$Delivery->id]) }}">Edit</a> --}}
    </div>
    <script>
            // Get the modal
            var modal = document.getElementById('myModal');
            // var img=document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
           
              function displayIMG(clicked_id)
            {
                modal.style.display = "block";
                modalImg.src = document.getElementById(clicked_id).src;
                captionText.innerHTML =document.getElementById(clicked_id).alt;
            }  
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() { 
                modal.style.display = "none";
            }
            </script>
            
@endsection