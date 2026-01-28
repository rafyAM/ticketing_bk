<x-layouts.admin title="Edit Metode Pembayaran">
    @if ($errors->any())
        <div class="toast toast-bottom toast-center z-50">
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        <script>
            setTimeout(() => {
                document.querySelector('.toast')?.remove()
            }, 5000)
        </script>
    @endif

    <div class="container mx-auto p-10">
        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-2xl mb-6">Edit Metode Pembayaran</h2>

                <form id="paymentForm" class="space-y-4" method="post" action="{{ route('admin.payments.update', $payment->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <!-- Kode Pembayaran -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Kode Pembayaran</span>
                        </label>
                        <input
                            type="number"
                            name="kode_pembayaran"
                            value="{{ $payment->kode_pembayaran }}"
                            class="input input-bordered w-full"
                            required />
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Metode Pembayaran</span>
                        </label>
                        <input
                            type="text"
                            name="metode_pembayaran"
                            value="{{ $payment->metode_pembayaran }}"
                            class="input input-bordered w-full"
                            required />
                    </div>

                    <!-- Tombol Submit -->
                    <div class="card-actions justify-end mt-6">
                        <button type="reset" class="btn btn-ghost">Reset</button>
                        <button type="submit" class="btn btn-primary">Perbarui Metode Pembayaran</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Alert Success -->
        <div id="successAlert" class="alert alert-success mt-4 hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Metode Pembayaran berhasil disimpan!</span>
        </div>
    </div>
</x-layouts.admin>