@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Pembayaran</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered"> 
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Bukti Pembayaran</th>
                            <th>Total Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($payments as $payment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $payment->nama }}</td>
                                <td>{{ $payment->email }}</td>
                                <td>
                                    @if ($payment->bukti)
                                        <img src="{{ Storage::url($payment->bukti) }}" width="200" alt="Bukti Pembayaran">
                                    @else
                                        No Image
                                    @endif
                                </td>                                                              
                                <td>{{ $payment->total_payment }}</td>
                                <td>
                                    <a href="{{ route('payments.index', $payment->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form onclick="return confirm('Anda yakin data dihapus');" class="d-inline" action="{{ route('payments.destroy', $payment->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
