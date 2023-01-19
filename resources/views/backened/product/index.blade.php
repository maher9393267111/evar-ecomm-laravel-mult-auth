@extends('backened.layouts.master')

@section('content')
<section class="content-main">
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">

        <div class="content-header">
          <div>
            <h2 class="content-title card-title">Product Data </h2>

          </div>



        </div>
        <div>
          @include('backened.layouts.notification')
        </div>
        <div class="row">
          <div class="card mb-4">
            <table id="example" class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">S.N</th>
                  <th scope="col">Title</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Price</th>
                  <th scope="col">Discount</th>
                  <th scope="col">Size</th>
                  <th scope="col">Condition</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $item)
                @php
                 $photo=explode(',',$item->photo);
                @endphp
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->title}}</td>
                  <td><img src="{{$photo[0]}}" alt="banner image" style="max-height:98px;max-width:120px;"></td>
                  <td>${{number_format($item->price,2)}}</td>
                  <td>{{$item->discount}}%</td>
                  <td>{{$item->size}}</td>
                  <td>
                    @if($item->conditions=='new')
                    <span class="badge rounded-pill alert-success">{{$item->conditions}}</span>
                    @elseif($item->conditions=='popular')
                    <span class="badge rounded-pill alert-warning">{{$item->conditions}}</span>
                    @else
                    <span class="badge rounded-pill alert-primary">{{$item->conditions}}</span>
                    @endif
                  </td>
                  <td>
                    @if($item->status=='active')
                    <span class="badge rounded-pill alert-success">{{$item->status}}</span>
                    @else
                    <span class="badge rounded-pill alert-danger">{{$item->status}}</span>
                    @endif
                  </td>
                  <td>

                   
                    <a href="{{route('product.edit',$item->id)}}" data-toggle="tooltip" title="edit" class="float-left btn  btn-outline-warning" data-placment="bottom" style="float:left; margin-left: 10px;"><i class="icon material-icons md-edit"></i></a>
                    <form style="float:left;margin-left: 10px;" action="{{route('product.destroy',$item->id)}}" method="POST">
                      @csrf
                      @method('delete')
                      <a href="" data-toggle="tooltip" title="delete" data-id="{{$item->id}}" class="dltBtn btn  btn-outline-danger" data-placment="bottom"><i class="icon material-icons md-delete"></i></a>
                    </form>
                  </td>
                  <!-- Modal -->
                 
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection
@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('.dltBtn').click(function(e) {
    var form = $(this).closest('form');
    var dataid = $(this).data('id');
    e.preventDefault();
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your imaginary file is safe!");
        }
      });


  })
</script>

@endsection
