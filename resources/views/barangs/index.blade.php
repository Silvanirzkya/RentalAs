@extends('layouts.template')
@section('content')

    
    <!-- Main content -->
   <section class="content">
   <div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Home</a></li>
					<li class="active">Alat - Alat Produktif</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Alat - Alat Produktif</h2>
					</div>
					
					<div class="panel-body">
						<p> <a class="btn btn-primary" href="{{ url('/admin/barangs/create') }}">Tambah</a>
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td>No</td>
									<td>Kode Barang</td>
									<td>Nama Barang</td>
									<td>Tanggal Masuk</td>
									<td>Jenis Barang</td>
									<td>Stok</td>
									<td colspan="2">Opsi</td>
								</tr>
								@php
								$no = 1;
								@endphp
								@foreach($barang as $data)
								<tr>
									<td>{{ $no }}</td>
									<td>{{ $data->kode_barang }}</td>
									<td>{{ $data->nama_barang }}</td>
									<td>{{ $data->tgl_masuk }}</td>
									<td>{{ $data->nama }}</td>
									<td>{{ $data->amount }}</td>
									<td><a href="{{ route('barangs.edit', $data->id) }}" class="btn btn-warning">Edit</a></td>
									<td><form action="{{route('barangs.destroy', $data->id)}}" method="post">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token">
									<input type="submit" class="btn btn-danger" value="delete">
									{{csrf_field()}}
								</form>
								</tr>
								@php
								$no++;
								@endphp
								@endforeach
							</table>
						</div>
					</div>
				</div>
			</div>
			</div>
</section>
</div>
@endsection