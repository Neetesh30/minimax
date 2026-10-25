<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Price List</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f3f4f6;
        }

        .header {
            margin-bottom: 20px;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 15px;
        }
    </style>
</head>

<body>

<div class="header">
    <h2>{{ config('app.name') }}</h2>
    <p>Price List</p>
    <p>Date: {{ now()->format('d M Y') }}</p>
</div>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Code</th>
            <th>Capacity</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
    </thead>

    <tbody>
        @foreach($items as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['product_code'] }}</td>
                <td>{{ $item['capacity'] }}</td>
                <td>₹{{ number_format($item['price'], 2) }}</td>
                <td>{{ $item['qty'] }}</td>
                <td>₹{{ number_format($item['total'], 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="total">
    Grand Total: ₹{{ number_format($grandTotal, 2) }}
</div>

</body>
</html>
