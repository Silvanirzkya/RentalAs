@extends('layouts.template')

@section('content')

    
    <!-- Main content -->
   <section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Home</a></li>
					<li><a href="{{ url('/admin/barangsbengkel') }}">Alat Bengkel </a></li>
					<li class="active">Tambah Alat Bengkel</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Tambah Alat Bengkel</h2>
					</div>

					<div class="panel-body">
						{!! Form::open(['url' => route('barangsbengkel.store'),'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
						@include('barangs._form2')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
@endsection