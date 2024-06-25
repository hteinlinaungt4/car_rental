@extends('user.master.layout')
@section('title',"User Dashboard")
@section('content')
<div class="tab-content">
    @if (session('booksuccess'))
        <div id="success-message" style="display: none;">{{ session('booksuccess') }}</div>
    @endif
    @if (session('wrong'))
        <div id="wrong" style="display: none;">{{ session('wrong') }}</div>
    @endif
    <div role="tabpanel" class="tab-pane active" id="resentnewcar">
        @foreach ($vehicles as $v)
        <div class="col-list-3">
            <div class="recent-car-list">
                <div class="car-info-box"> <a href="{{route('detail',$v->id)}}"><img src="{{asset('storage/vehicle/'.$v->image1)}}"
                            class="img-responsive  object-fill" style="width:100%; height:200px;" alt="image"></a>
                    <ul>
                        <li><i class="fa fa-car" aria-hidden="true"></i> <span class=" uppercase">{{$v->fuel}}</span></li>
                        <li><i class="fa fa-calendar" aria-hidden="true"></i> {{$v->modelyear}} Model
                        </li>
                        <li><i class="fa fa-user" aria-hidden="true"></i> {{$v->seatingCapacity}} seats
                        </li>
                    </ul>
                </div>
                <div class="car-title-m">
                    <h6><a href=""> {{$v->brand->name}} , {{$v->title}}</a></h6>
                    <span class="price">$ {{$v->perDay}} /Day</span>
                </div>
                <div class="inventory_info_m">
                    <p>{{ substr($v->overview,0,70) }} </p>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</div>
@endsection
@section('script')
<script>
    window.addEventListener('DOMContentLoaded', () => {
    const successMessage = document.getElementById('success-message');
    const wrongMessage = document.getElementById('wrong');

    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: successMessage.innerText,
            position: "top-end",
            showConfirmButton: false,

        });
     }

     if (wrongMessage) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: wrong.innerText,
            position: "top-end",
            showConfirmButton: false,
        });
     }
    });

</script>
@endsection
