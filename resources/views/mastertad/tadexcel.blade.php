@php
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Master Data Barang NewPOS.xls");
header("Cache-Control: private",false);
header("Pragma: no-cache");
header("Expires: 0");
@endphp
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@php
	$no=1;
	@endphp
	<p><center><font size="3" font-weight=bold color="red">DATA MASTER BARANG</font></center></p>
	<table class="table table-bordered" id="example1" cellspacing="0" width="100%" border="1">
		<thead>
			<tr align="center">
				<th>No</th>
				<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Satuan Barang</th>
				<th>Harga Barang</th>
				<th>Grup Barang</th>
			</tr>
		</thead>
		<tbody>
			@if ($Barang)
			@foreach ($Barang as $item)
			<tr align="center">
				<td>{{$no}}</td>
				<td>{{ $item->Kode_Barang }}</td>
				<td>{{ $item->Nama_Barang }}</td> 
				<td>{{ $item->Satuan }}</td> 
				<td>{{ $item->Harga_Barang }}</td> 
				<td>{{ $item->Grup_Barang }}</td> 
				
			</tr>
			@php
			$no++
			@endphp
			@endforeach
			@endif
		</tbody>
	</table>
</body>
</html>