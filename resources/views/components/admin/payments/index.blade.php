<x-layouts.admin title="Manajemen Metode Pembayaran">
    @if (session('success'))
        <div class="toast toast-bottom toast-center">
            <div class="alert alert-success">
                <span>{{ session('success') }}</span>
            </div>
        </div>

        <script>
        setTimeout(() => {
            document.querySelector('.toast')?.remove()
        }, 3000)
        </script>
    @endif

    <div class="container mx-auto p-10">
        <div class="flex">
            <h1 class="text-3xl font-semibold mb-4">Manajemen Metode Pembayaran</h1>
            <a href="{{ route('admin.payments.create') }}" class="btn btn-primary ml-auto">Tambah Metode Pembayaran</a>
        </div>
        <div class="overflow-x-auto rounded-box bg-white p-5 shadow-xs">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="w-1/3">Kode Pembayaran</th>
                        <th>Metode Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $index => $payment)
                    <tr>
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $payment->kode_pembayaran }}</td>
                        <td>{{ $payment->metode_pembayaran }}</td>
                        <td>
                            <a href="{{ route('admin.payments.show', $payment->id) }}" class="btn btn-sm btn-info mr-2">Detail</a>
                            <a href="{{ route('admin.payments.edit', $payment->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                            <button class="btn btn-sm bg-red-500 text-white" onclick="openDeleteModal(this)" data-id="{{ $payment->id }}">Hapus</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada metode pembayaran tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Modal -->
    <dialog id="delete_modal" class="modal">
        <form method="POST" class="modal-box">
            @csrf
            @method('DELETE')

            <input type="hidden" name="payment_id" id="delete_payment_id">

            <h3 class="text-lg font-bold mb-4">Hapus Metode Pembayaran</h3>
            <p>Apakah Anda yakin ingin menghapus metode pembayaran ini?</p>
            <div class="modal-action">
                <button class="btn btn-primary" type="submit">Hapus</button>
                <button class="btn" onclick="delete_modal.close()" type="reset">Batal</button>
            </div>
        </form>
    </dialog>

    <script>
        function openDeleteModal(button) {
            const id = button.dataset.id;
            const form = document.querySelector('#delete_modal form');
            document.getElementById("delete_payment_id").value = id;

            form.action = `/admin/payments/${id}`;

            delete_modal.showModal();
        }
    </script>


</x-layouts.admin>