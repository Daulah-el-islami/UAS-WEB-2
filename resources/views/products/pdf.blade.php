<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #000;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        .no-image {
            color: #ff0000;
        }
        .name-column {
            width: 25%;
        }
        .detail-column {
            width: 35%;
        }
    </style>
</head>
<body>

    <h2>Data Produk</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th class="name-column">Nama Produk</th>
                <th class="detail-column">Detail</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp 
            @forelse ($products as $product)
                <tr>
                    <td>{{ $i++ }}</td> 
                    <td>
                        @if($product->image)
                            <img src="{{ public_path('images/' . $product->image) }}" style="width: 100px;" alt="Product Image">
                        @else
                            <span class="no-image">No Image</span>
                        @endif
                    </td>
                    <td class="name-column">{{ $product->name }}</td>
                    <td class="detail-column">{{ $product->detail }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada data tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
