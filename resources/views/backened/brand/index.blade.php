
@extends('backened.layouts.master')

@section('content')
<section class="content-main">
 <div class="row">
 <div class="col-lg-12">
                    <div class="card mb-4">
                  
            <div class="content-header">
                <div>
                    <h2 class="content-title card-title">Brand Data </h2>
                    
                </div>
              

               
            </div>
            <div >
                  @include('backened.layouts.notification')
                </div>
        <div class="row">
        <div class="card mb-4">
        <table id="example" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">photo</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($brand as $item)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$item->title}}</td>
      <td>{{$item->slug}}</td>
      <td><img src="{{$item->photo}}" alt="brand image" style="max-height:98px;max-width:120px;"></td>
      <td>
        @if($item->status=='active')
        <span class="badge rounded-pill alert-success">{{$item->status}}</span>
        @else
        <span class="badge rounded-pill alert-danger">{{$item->status}}</span>
        @endif
      </td>
      <td>
        <a href="{{route('brand.edit',$item->id)}}" data-toggle="tooltip" title="edit" class="float-left btn  btn-outline-warning" data-placment="bottom" style="float:left;"><i class="icon material-icons md-edit"></i></a>
        <form style="float:left;margin-left: 10px;" action="{{route('brand.destroy',$item->id)}}" method="POST">
          @csrf
          @method('delete')
        <a href="" data-toggle="tooltip" title="delete" data-id="{{$item->id}}"class="dltBtn btn  btn-outline-danger" data-placment="bottom"><i class="icon material-icons md-delete"></i></a>
        </form>
      </td>
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
$('.dltBtn').click(function(e){
  var form=$(this).closest('form');
  var dataid=$(this).data('id');
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






