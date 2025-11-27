<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Daftar Produk</h1>
    <br>
    <a href="{{ route('products.create') }}">Tambah Produk</a>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Deskripsi</td>
            <td>Harga</td>
            <td>Stok</td>
            <td>Pilihan</td>
        </tr>
        @forelse ($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->description }}</td>
            <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        data kosong

        @endforelse
    </table>
</body>
</html>
