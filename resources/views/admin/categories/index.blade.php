@extends('admin.master')
@section('title','Categories')
@section('content')

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Advanced DataTable</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">DataTables</a>
                </li>
                <li class="breadcrumb-item active">Advanced DataTable
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
            <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton"
            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
            <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton"><a class="dropdown-item" href="#"><i class="la la-calendar-check-o"></i> Calender</a>
              <a class="dropdown-item" href="#"><i class="la la-cart-plus"></i> Cart</a>
              <a class="dropdown-item" href="#"><i class="la la-life-ring"></i> Support</a>
              <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="la la-cog"></i> Settings</a>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body" >
        <!-- DOM - jQuery events table -->
        <section id="dom">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Category Table</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">

                    <table id="example" class="table table-striped table-bordered dom-jQuery-events">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>icon</th>
                          <th>Status</th>
                          <th>Products Count</th>
                          <th>Created_at</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- @foreach ($categories as $category)
                          <tr>
                            <td>{{ $categories->firstItem()+ $loop->index }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->icon }}</td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>

                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href=" route('admin.categories.edit', $category->id) }}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>
                                <a href=" route('admin.categories.destroy', $category->id) "
                                     class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">Delete</a>
                              </div>
                            </td>
                          </tr>
                        @endforeach --}}
                      </tbody>

                      <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>icon</th>
                          <th>Status</th>
                          <th>Products Count</th>
                          <th>Created_at</th>
                          <th>Actions</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- DOM - jQuery events table -->
      </div>
    </div>
  </div>
@endsection

@push('css')
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
    
@endpush

@push('js')
  <script src="//cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
          var lang="{{ app()->getLocale() }}";
            $('#example').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('admin.categories.get') }}",
              columns: [

                {data: 'DT_RowIndex' },
                {data: 'name', },
                  {data: 'icon',},
                  {data: 'status', },
                  {data: 'products_count', },
                  {data: 'created_at', },
                  {data: 'action',searchable: false, orderable: false},
              ],
       language: lang==='ar'? {
        url: '//cdn.datatables.net/plug-ins/2.3.4/i18n/ar.json',
    } : {},
            }
            
            );
        } );
    </script>
@endpush