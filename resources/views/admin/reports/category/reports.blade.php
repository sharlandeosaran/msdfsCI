@extends('admin.app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{route('adminhome')}}"><i class="fa fa-tachometer-alt"></i> Home</a></li>
    <li><a href="{{route('reports')}}">Submission Reports</a></li>
    <li class="active">{{$title}}</li>
</ol>
@endsection

@section('content')
<section class="content">
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                
                <form id="form" method="POST" action="{{route('reportbycategorypost')}}" role="form">
                    {{ csrf_field() }}
                    <input type="hidden" id="categories" name="categories">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>                                    
                                    <tr>
                                        <th class="text-center checkboxAllRow" style="width: 60px; vertical-align: middle;" id="checkboxAllRow">
                                            <h3 style="margin-top: 10px; margin-bottom: 0px;"><i class="fa fa-square-o checkboxes checkboxAll" aria-hidden="true" id="checkboxAll"></i></h3>
                                        </th>
                                        <th>
                                            <h3>
                                                Category
                                                <small>
                                                    <button type="submit" id="submitBtn" class="btn btn-danger pull-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> generate</button>
                                                </small>
                                            </h3>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($categories as $item)
                                    <tr id="tableRow{{$item->id}}" class=" checkboxRow" catId="{{$item->id}}">
                                        <td class="text-center" catId="{{$item->id}}">
                                            <h3 style="margin-top: 10px;"><i class="fa fa-square-o checkboxes" catId="{{$item->id}}" aria-hidden="true" id="checkbox{{$item->id}}"></i></h3>
                                        </td>
                                        <td><h4>{{$item->category}}</h4></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    
                                    <tr>
                                        <th class="text-center checkboxAllRow" style="width: 60px; vertical-align: middle;" id="checkboxAllRow">
                                            <h3 style="margin-top: 10px; margin-bottom: 0px;"><i class="fa fa-square-o checkboxes checkboxAll" aria-hidden="true" id="checkboxAll"></i></h3>
                                        </th>
                                        <th>
                                            <h3>
                                                Category
                                                <small>
                                                    <button type="submit" id="submitBtn" class="btn btn-danger pull-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> generate</button>
                                                </small>
                                            </h3>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    var cats = [];
    var allCats = {!! json_encode($categories->pluck('id')->toJson()) !!};

    $('.checkboxRow').on('click', function() {
        var id = $(this).attr('catId');
        if ($('#checkbox'+id).hasClass('fa-square-o')) {
            $('#checkbox'+id).removeClass('fa-square-o').addClass('fa-square');
            cats.push(id);
        } else {
            $('.checkboxAll, #checkbox'+id).addClass('fa-square-o').removeClass('fa-square');
            removeValueFromArray(id);          
        }
        $('#categories').val(cats);
        // console.log(cats);
    });
    
    $('.checkboxAllRow').on('click', function() {
        if ($('.checkboxAll').hasClass('fa-square-o')) {
            $('.checkboxes').removeClass('fa-square-o').addClass('fa-square');
            cats = allCats;
        } else {
            $('.checkboxes').addClass('fa-square-o').removeClass('fa-square');
            cats = [];
        }
        $('#categories').val(cats);
        // console.log(cats);
    });

    function removeValueFromArray(val) {
        cats = $.grep(cats, function(value) {
            return value != val;
        });
    }
</script>
@endsection