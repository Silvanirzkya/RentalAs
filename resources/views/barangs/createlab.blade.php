@extends('layouts.template')

@section('content')

    
    <!-- Main content -->
   <section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Home</a></li>
					<li><a href="{{ url('/admin/barangslab') }}">Alat Lab</a></li>
					<li class="active">Tambah Alat Lab</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Tambah Alat Lab</h2>
					</div>

					<div class="panel-body">
						{!! Form::open(['url' => route('barangslab.store'),'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
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