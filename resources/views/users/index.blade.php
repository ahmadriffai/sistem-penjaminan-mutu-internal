@extends('layouts.admin')


@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">
            <a href="{{ route('users.create') }}" class="btn btn-success mb-4">Tambah</a>
            <table class="table table-bordered">
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th width="280px">Action</th>
              </tr>
              @foreach ($data as $key => $user)
               <tr>
                 <td>{{ ++$i }}</td>
                 <td>{{ $user->name }}</td>
                 <td>{{ $user->email }}</td>
                 <td>
                   @if(!empty($user->getRoleNames()))
                     @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                     @endforeach
                   @endif
                 </td>
                 <td>
                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                     {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                         {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                     {!! Form::close() !!}
                 </td>
               </tr>
              @endforeach
             </table>
             
             
             {!! $data->render() !!}
             
          </div>
      </div>
  </div>
</div>

@endsection