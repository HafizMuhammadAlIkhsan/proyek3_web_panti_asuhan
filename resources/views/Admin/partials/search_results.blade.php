@foreach ($admins as $admin)
    <div class="search-result-item">
        <p><strong>{{ $admin->nama_pengurus }}</strong> - {{ $admin->email_admin }} - {{ $admin->jabatan }}</p>
    </div>
@endforeach

@if ($admins->isEmpty())
    <p>Admin tidak ditemukan.</p>
@endif
