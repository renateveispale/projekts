@include('layouts.header')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        @livewire('files')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html>
