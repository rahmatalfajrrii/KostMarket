<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer</title>
</head>
<body>
    <h2>Edit Customer</h2>

    <form action="{{ route('customers.update', $customer->id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <label>Nama Customer</label><br>
        <input type="text" name="nama_customer"
               value="{{ old('nama_customer', $customer->nama_customer) }}" required><br><br>

        <label>Email</label><br>
        <input type="email" name="email"
               value="{{ old('email', $customer->email) }}" required><br><br>

        <label>No. HP</label><br>
        <input type="text" name="no_hp"
               value="{{ old('no_hp', $customer->no_hp) }}" required><br><br>

        <label>Alamat</label><br>
        <textarea name="alamat">{{ old('alamat', $customer->alamat) }}</textarea><br><br>

        <button type="submit">Perbarui</button>
        <a href="{{ route('customers.index') }}">Kembali</a>
    </form>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
</body>
</html>
