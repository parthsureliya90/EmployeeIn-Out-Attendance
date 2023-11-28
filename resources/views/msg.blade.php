@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" data-bs-dismiss="alert">
        <ul style="list-style:circle; text-transform: capitalize">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" data-bs-dismiss="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('danger'))
    <div class="aalert alert-danger alert-dismissible fade show" data-bs-dismiss="alert">
        {{ session('danger') }}
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" data-bs-dismiss="alert">
        {{ session('warning') }}
    </div>
@endif
@if (session('info'))
    <div class="alert alert-info alert-dismissible fade show" data-bs-dismiss="alert">
        {{ session('info') }}
    </div>
@endif
